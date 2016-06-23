<?php

    session_start();

    include('database.php');
    include('functions.php');

    $content = $_POST['content'];
    $UID = $_POST['UID'];

    $conn = connect_db();
    $result = mysqli_query($conn, "SELECT * FROM users WHERE id = '$UID'");
    $row = mysqli_fetch_assoc($result);

    //Fetch user information
    $name = $row["Name"];
    $profile_pic = $row["profile_pic"];


    $result_insert = mysqli_query($conn, "INSERT INTO posts(content, UID, name, profile_pic, likes) VALUES ('$content', $UID, '$name', '$profile_pic', 0)")or die(mysqli_error($conn));


    //check to see if insert was okay
    if($result_insert){
        //redirect to feed page
        header("Location: feed.php");
    }else{
        echo "Oops! Something went wrong :(";
    }


?>