<?php

if (isset($_POST["submit"])) {

    //Grabing the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwd2 = $_POST["pwd2"];
    $email = $_POST["email"];

    //Instantiate SignUp controller class
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-contr.class.php";
    $signup = new SignupContr($uid, $pwd, $pwd2, $email);
    
    //Runnning error handelers and user signUp
    $signup->signupUser();

    //Going to back to front page
    header("location: ../index.php?error=none");
       


}