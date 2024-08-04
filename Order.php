<?php
require_once "./db/orders.php";

class Order
{
    public function createOrder($user_id, $address, $payment, $grandTotal)
    {
        if (isset($_SESSION['products'])) {
            $products = $_SESSION['products'];
            return setOrderToDb ($user_id, $address, $payment, $grandTotal, $products);
        }
    }

    public function removeOrder($order_id)
    {

        return removeOrderFromDb ($order_id);
    }

}