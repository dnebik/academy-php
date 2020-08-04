<?php
class Product{
    public $name;
    public $price;
    public $weight;

    function __construct($name, $price, $weight)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    function info(){
        return $this->name . "<br>" . $this->price . "<br>" . $this->weight;
    }
}