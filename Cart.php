<?php

if (!session_id ()) {
    session_start ();
}

require_once "./db/products.php";

class Cart{

    private $products_on_cart = [];

    public function __construct()
    {
        if (empty($_SESSION['products'])) {
            $this->products_on_cart = [];
            $_SESSION['products'] = [];
        } else {
            $this->products_on_cart = $_SESSION['products'];
        }
    }

    function addToCart($product_id){

        $existing_product = $this->checkIfProductExistsInCart ($product_id);

        if ($existing_product || $existing_product === 0) {

            $_SESSION['products'][$existing_product]['quantity'] = $_SESSION['products'][$existing_product]['quantity'] + 1;

        } else {
            $product = getProductById ($product_id);
            if($product){
                array_push ($_SESSION['products'],[
                    "id"=>$product_id,
                    "quantity"=>1,
                    "name"=>$product['name'],
                    "price"=>$product['price'],
                    "image"=>$product['image']
                ]);
            }
        }
    }

    function getAllProductsFromCart(){
        if (isset($_SESSION['products']) && count($_SESSION['products'])>0){

            return $_SESSION['products'];
        }
        return [];
    }

    function emptyCart(){
        unset($_SESSION["products"]);

        $this->redirectToHome ();
    }

    function redirectToHome()
    {
        header ('Location: /');
    }

    function redirectTo($path){
        header ("Location:$path");

    }

    function checkIfProductExistsInCart($product_id)
    {

        $products = [];

        if($_SESSION['products']){
            $products = $_SESSION['products'];
        }

        return array_search ($product_id, array_column ($products, 'id'));


    }

    function removeProductFromCart($product_id)
    {
        if (!empty($_SESSION["products"])) {
            $existing_product = $this->checkIfProductExistsInCart ($product_id);
            if ($existing_product !== false) {
                unset($_SESSION["products"][$existing_product]);
            }
            $this->redirectTo ("/checkout.php");
        }
    }

    function incrementProductQuantity($product_id){

        if (!empty($_SESSION["products"])) {
            $existing_product = $this->checkIfProductExistsInCart ($product_id);
            if ($existing_product !== false) {

                $old_quantity = $_SESSION["products"][$existing_product]['quantity'];
                if($old_quantity<15) {
                    $_SESSION["products"][$existing_product]['quantity'] = $old_quantity + 1;
                }

            }
            $this->redirectTo ("/checkout.php");
        }

    }

    function decrementProductQuantity($product_id)
    {
        if (!empty($_SESSION["products"])) {
            $existing_product = $this->checkIfProductExistsInCart ($product_id);
            if ($existing_product !== false) {

                $old_quantity = $_SESSION["products"][$existing_product]['quantity'];

                if($old_quantity>1){
                    $_SESSION["products"][$existing_product]['quantity'] = $old_quantity - 1;
                }
            }
            $this->redirectTo ("/checkout.php");
        }
    }

    function getNrOfProducts(): int
    {
        if (isset($_SESSION['products'])){

            return count($_SESSION['products']);
        }
        return 0;
    }

    function totalOfProducts(){
        $products = $this->getAllProductsFromCart ();
        $total = 0;
        $total_quantity = 0;
        if (count ($products) > 0) {
            foreach ($products as $product) {
                $row_total = $product['price'] * $product['quantity'];
                $total = $total + $row_total;
                $total_quantity += $product['quantity'];
            }
            return $total;
        }
    }
}


