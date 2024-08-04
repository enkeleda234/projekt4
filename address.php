<?php
require_once "connection.php";

function getAddressById($address_id): ?array{
    $connection = getDbConnection();
    $sql = "SELECT * FROM addresses where id=$address_id";
    $result = $connection->query ($sql);
    $connection->close ();
    return $result->fetch_assoc ();

}

function getAddressesByUserId($id): ?array{

    $connection = getDbConnection();

    $sql = "SELECT * FROM addresses where id=$id";

    $result = $connection->query ($sql);

    $connection->close ();

    $addresses=[];

    if($result ){
        while ($row = $result->fetch_assoc()){
            array_push ($addresses,$row);
        }
    }

    return $addresses;

}

function registerAddress($id,$address, $city, $state, $zipcode){

    $connection = getDbConnection ();

        return mysqli_query ($connection, "Insert into addresses ( id,address, city, state, zipcode) values ('$user_id','$address','$city','$state','$zipcode')");



}


