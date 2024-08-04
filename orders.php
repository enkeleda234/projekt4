<?php

require_once "connection.php";

   function setOrderToDb($user_id,$address,$payment,$grandTotal,$products){

       $connection = getDbConnection ();
       $date = date('Y-m-d H:i:s');
       $result = mysqli_query ($connection, "Insert into orders ( user_id,address_id,payment,created_at,grand_total) values ('$user_id','$address','$payment','$date','$grandTotal')");

       $order_id = mysqli_insert_id ($connection);

       insertProductsOrder ($order_id, $products,$connection);
       return $result;
   }

   function insertProductsOrder($order_id,$products,$connection){
       $query = "";
       foreach ($products as $product){
           $product_id = $product["id"];
           $quantity = $product["quantity"];
           $query .= "INSERT INTO order_products (order_id, product_id, quantity) VALUES ('$order_id','$product_id','$quantity'); ";
       }

       if(count ($products)>0 && isset($order_id)){
           $result = mysqli_multi_query($connection, $query);
           return $result;
       }
       return null;
   }

   function getOrderFromDb($user_id): array{

       $connection = getDbConnection();
       $sql = "SELECT * FROM orders where user_id=$user_id";
       $result = $connection->query ($sql);
       $connection->close ();
       $orders=[];
       if($result ){
           while ($row = $result->fetch_assoc()){
               array_push ($orders,$row);
           }
       }
       return $orders;
   }

   function removeOrderFromDb($order_id){

        $connection = getDbConnection ();
        $sql="DELETE orders, order_products FROM orders INNER JOIN order_products ON orders.id = order_products.order_id WHERE id=$order_id";
        $result = $connection->query ($sql);
        $connection->close ();
        return $result;

    }





