<?php
require_once 'Cart.php';

if (isset($_POST['product_id']) && $_POST['product_id']){

    $product_id = $_POST['product_id'];

    $cart = new Cart();

    $cart->addToCart ($product_id);

    $cart->redirectToHome ();
}
else{
    echo "Please add a product";
}
?>