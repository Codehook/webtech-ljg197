<?php

session_start();
include('database.php');
include('functions.php');
$conn = connect_db();

    //function NewUser(){

        $username = sanitizeString($_POST['username']);
        $password = sanitizeString($_POST['password']);
        $hash = base64_encode($password);
        $name = sanitizeString($_POST['Name']);
        $email = sanitizeString($_POST['email']);
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $veri_quest = sanitizeString($_POST['veri_quest']);
        $veri_ans = sanitizeString($_POST['veri_ans']);
        $loc = sanitizeString($_POST['location']);
        $profile_pic = sanitizeString($_POST['profile_pic']);




        $result_insert = mysqli_query($conn, "INSERT INTO users(username, password, Name, email, dob, gender,  verification_question, verification_answer, location, profile_pic) VALUES('$username','$hash','$name','$email','$dob','$gender','$veri_quest','$veri_ans','$loc','$profile_pic')") or die(mysqli_error($conn));

        //check to see if insert was okay
        if($result_insert){
            //redirect to login page
            header('Location: login.html');
        }else{
            echo "Oops! Something went wrong :(";
        }
    //}


    /*function SignUp() {
        if(!empty($_POST['username']))
    //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
        {
        $query = mysqli_query("SELECT * FROM users WHERE username = '$_POST['username']'") or die(mysql_error($conn));
            if(!$row = mysqli_fetch_array($query) or die(mysqli_error($conn))) {
                newuser();
            } else {
                echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
             }
        }
    }

    if(isset($_POST['submit'])) {
        SignUp();
    }*/


?>