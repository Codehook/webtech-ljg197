<?php
    session_start();

    include('database.php');
    //get username and password from $_POST

    //Check in the DB

    //If authenticated: say Konnichiwa!

    //Else ask to login again..

    $username = $_POST["username"];
    $password = base64_encode($_POST["password"]);

    $conn = connect_db();


    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    $num_of_rows = mysqli_num_rows($result);

    if($num_of_rows > 0){
        //echo "Success!!  Welcome to the Mongo $username";
        $_SESSION["username"] = $username;
        header("Location: feed.php");

    }else{
        echo "Username or password was incorrect";
    }

?>