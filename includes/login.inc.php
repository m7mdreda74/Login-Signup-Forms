<?php

if (isset($_POST["submit"])) {

    //Grabing the data
    $uid = $_POST["uid"];
    $pwd = $_POST["pwd"];

    //Instantiate Login controller class
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-contr.class.php";
    $login = new LoginContr($uid, $pwd);
    
    //Runnning error handelers and user signUp
    $login->loginUser();

    //Going to back to front page
    header("location: ../index.php?error=none");
       


}