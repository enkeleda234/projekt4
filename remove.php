<?php
include "Cart.php";
$cart= new cart ();
$cart->removeProductFromCart($_GET['product_id']);


