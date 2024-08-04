<?php
include "Order.php";
$order= new Order ();
$order->removeOrder($_GET['order_id']);

if ($order){

    header ("Location:/Profile.php");

}


