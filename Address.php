<?php

include "db/address.php";



class Address  {
    public $user_id;
    public $address;
    public $city;
    public $state;
    public $zipcode;


    public function createAddress($user_id,$address, $city, $state, $zipcode)
    {
        if (empty($address) && empty($city) && empty($state) && empty($zipcode)) {
            return false;
        }

            return registerAddress ($user_id, $address, $city, $state, $zipcode);
    }


}