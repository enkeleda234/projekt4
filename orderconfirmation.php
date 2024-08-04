<?php
include "Order.php";
include "./Users.php";
include "./Cart.php";
$order = new Order();
$user = new Users();
$cart = new Cart();
$current_user = $user->getCurrentUserDetails ();
$user_id = $current_user['id'];
$grandTotal = $cart->totalOfProducts ();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $order = $order->createOrder ($user_id,$_REQUEST['payment'],$grandTotal);

    if ($order){

        header("location:reset-session.php");
    }

}

