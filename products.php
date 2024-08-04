<?php

require_once 'connection.php';

function getAllProducts(){

    $connection = getDbConnection ();

    $sql = "SELECT * FROM products";

    $result = $connection->query ($sql);

    $connection->close ();

    $products=[];

    if($result->num_rows>0){
        while ($row = $result->fetch_assoc()){
            array_push ($products,$row);
        }
    }

    return $products;

}

function getProductById($product_id){

    $connection = getDbConnection ();

    $sql = "SELECT * FROM products where id=$product_id";

    $result = $connection->query ($sql);

    $connection->close ();

    return $result->fetch_assoc ();

}