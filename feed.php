<!DOCTYPE html>
<html>
<head>
    <title>MyFacebook Feed</title>
</head>
<body>
<?php
    include('database.php');

    session_start();

    $conn = connect_db();

    $username = $_SESSION["username"];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    //user information
    $row = mysqli_fetch_assoc($result);

    echo "<h1>Welcome back ".$row['Name']."!</h1>";
    echo "<img src='".$row['profile_pic']."'>";
    echo "<hr>";

    echo "<form method='POST' action='posts.php'>";
    echo "<p><textarea name='content'>Say something...</textarea></p>";
    echo "<input type='hidden' name='UID' value='$row[id]'>";
    echo "<p><input type='submit'></p>";
    echo "</form>";

    echo "<br>";

    $result_posts = mysqli_query($conn, "SELECT * FROM posts");
    $num_of_rows = mysqli_num_rows($result_posts);

    $result_comments = mysqli_query($conn, "SELECT * FROM comments");


    echo "<h2>My Feed</h2>";
    if ($num_of_rows == 0) {
        echo "<p>No new posts to show!</p>";
    }


    //show all posts on myfacebook
    for($i = 0; $i < $num_of_rows; $i++){

        $rows = mysqli_fetch_row($result_posts);
        $com = mysqli_fetch_row($result_comments);
        echo "$rows[3] said $rows[1] ($rows[5])";
        echo "<form action='likes.php' method='POST'> <input type='hidden' name='PID' value='$rows[0]'> <br> <input type='submit' value='Like'></form>";
        //echo $rows[0];
        //echo $com[0];
        //echo $num_rows_comment;
        $comOnly = mysqli_query($conn, "SELECT * FROM comments WHERE PID='$com[0]'");
            if($com[0] == $rows[0]){
                $num_rows_comment = mysqli_num_rows($result_comments);
                //echo $num_rows_comment;
                while($coms = mysqli_fetch_array($comOnly)){
                    echo "$coms[3]    $coms[1]";
                    echo "<br>";
                }
            }
        echo "<form action='comments.php' method='POST'> <textarea name='comment'> </textarea> <br>
                <input type='hidden' name='UID' value='$row[id]'> <input type='hidden' name='PID' value='$rows[0]'> <p><input type='submit'><p> </form>";
    }
?>


</body>
</html>
