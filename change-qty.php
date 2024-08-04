<?php
include_once "Cart.php";

if (isset($_GET["action"]) && isset($_GET["product_id"])){

    $cart = new Cart ();

    if ($_GET["action"]=="decrement"){

       $cart->decrementProductQuantity ($_GET["product_id"]);
    }

    if ($_GET["action"]=="increment"){

        $cart->incrementProductQuantity ($_GET["product_id"]);
    }



}