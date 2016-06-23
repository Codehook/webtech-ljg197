<?php

    session_start();

    include('database.php');

    $UID = $_POST['UID'];
    $PID = $_POST['PID'];

    $conn = connect_db();

    //Fetch user information
    $name = $_SESSION["username"];
    $comm = $_POST['comment'];

    //echo printf("%d",$ID);
    //echo printf("%d",$UID);
    //echo $comm;
    //echo $name;


    $insert_comment = mysqli_query($conn, "INSERT INTO comments(PID, comment, UID, username) VALUES($PID, '$comm', $UID, '$name')")or die(mysqli_error($conn));
    //check to see if insert was okay
    if($insert_comment){
        //redirect to feed page
        header("Location: feed.php");
    }else{
        echo "Oops! Something went wrong :(";
    }


?>