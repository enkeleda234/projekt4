<?php

include_once 'Users.php';
$user = new Users;

$user->logout();
header("location:signing.php");
