<?php
include_once 'Users.php';

$user = new Users();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $register = $user-> register($_REQUEST['username'],$_REQUEST['email'],$_REQUEST['password']);

    if($register){
        header("location:signing.php");
    }
    
    else {
        echo "Fields are wrong or user exists!";
    }
}