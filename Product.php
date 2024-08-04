<?php

class Product{

    private $id=null;
    private $name=null;
    private $price=null;
    private $image=null;

    public function __construct($id,$name,$price,$image)
    {
        $this->id=$id;
        $this->name=$name;
        $this->price=$price;
        $this->image=$image;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return null
     */
    public function getImage()
    {
        return $this->image;
    }


}