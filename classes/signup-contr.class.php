<?php

class SignupContr extends Signup {

    private $uid;
    private $pwd;
    private $pwd2;
    private $email;

    public function __construct($uid, $pwd, $pwd2, $email){
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwd2 = $pwd2;
        $this->email = $email;
    }

    public function signupUser(){
       if($this->emptyInput() == false){
        // echo "Invalid Username!";
        header("location: ../index.php?error=emptyinput");
        exit();
       }
       if($this->invaliduid() == false){
        // echo "Invalid Username!";
        header("location: ../index.php?error=username");
        exit();
       }
       if($this->invalidEmail() == false){
        // echo "Invalid Email!";
        header("location: ../index.php?error=email");
        exit();
       }
       if($this->pwdMatch() == false){
        // echo "Passwords Don't Match!";
        header("location: ../index.php?error=passwordmatch");
        exit();
       }
       if($this->uidTakenCheck() == false){
        // echo "Username Or Email Taken!";
        header("location: ../index.php?error=useroremailtaken");
        exit();
       }

       $this->setUser($this->uid, $this->pwd, $this->email);
    }

    private function emptyInput(){
        $result;
        if (empty($this->uid) || empty($this->pwd) || empty($this->pwd2) || empty($this->email)) {
           $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }

    private function invaliduid(){
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
           $result = false;
        } 
        else {
            $result = true;
        }
        return $result;  
    }

    private function invalidEmail(){
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
           $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }

    private function pwdMatch(){
        $result;
        if ($this->pwd !== $this->pwd2) {
           $result = false;
        } 
        else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck(){
        $result;
        if (!$this->checkUser($this->uid, $this->email)) {
           $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }
}