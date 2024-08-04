<?php

require_once "Address.php";
require_once "Users.php";

$address = new Address();
$user = new Users();
$current_user = $user->getCurrentUserDetails ();
$user_id = $current_user['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $createAddress = $address->createAddress ($user_id,$_REQUEST['address'], $_REQUEST['city'], $_REQUEST['state'], $_REQUEST['zipcode']);

    if($createAddress){

        header("location:account.php");

    }else{
      echo "This address already exists";
    }
}