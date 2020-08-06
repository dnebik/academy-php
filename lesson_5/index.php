<?php
abstract class Product
{
    protected $name;
    protected $price;
    protected $weight;

    function __construct(string $name, float $price, float $weight)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    function info()
    {
        return [
            "name"=>$this->name,
            "weight"=>$this->weight,
            "price"=>$this->price
        ];
    }

    function Price()
    {
        return $this->price . "<br>";
    }

    function PriceWithVAT()
    {
        return $this->price + ($this->price / 100 * 20) . "<br>";
    }

    function showImage()
    {

    }
}

class Chocolate extends Product
{
    protected $calories;

    public function __construct(string $name, float $price, float $weight, int $calories)
    {
        $this->calories = $calories;
        parent::__construct($name, $price, $weight);
    }

    public function showImage()
    {
        echo "<img src='Chocolate.png' width='200' height='200'>";
    }
}

class Candy extends Product
{

    public function showImage()
    {
        echo "<img src='Sweets_Candy.jpg' width='200' height='200'>";
    }
}

$candy = new Candy("Восторг", 58.99, 10);
$chocolate = new Chocolate("Радость", 120, 100, 1560);

$candy->showImage();
$chocolate->showImage();