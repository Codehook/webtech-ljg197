<?php

    include('database.php');

    //connect to DB
    $conn = connect_db();

    //get data from the form
    $PID = $_POST['PID'];

    $result = mysqli_query($conn,"SELECT * FROM posts WHERE id='$PID'");
    $row = mysqli_fetch_assoc($result);
    $likes = $row['likes'];
    $likes = $likes + 1;

    //query DB for this post
    $result = mysqli_query($conn, "UPDATE posts SET likes='$likes' WHERE id='$PID'");
    if($result){
        header('Location: feed.php');
    }else{
        echo "Something is wrong";
    }

?>