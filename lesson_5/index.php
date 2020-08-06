<?php

interface iInfo
{
    function info();
}

interface iCount
{
    function getCount();
}

interface iPrice
{
    function price();
}

abstract class Product implements iCount, iPrice, iInfo
{
    protected const YEAR_START = 2020;

    protected static $count;
    protected static $companyName = "Сласти Индастри";

    protected $name;
    protected $price;
    protected $weight;

    public function __construct(string $name, float $price, float $weight)
    {
        self::$count++;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;

        $this->showImage();
        $this->getCount();
    }

    public function __get($name)
    {
        echo "Переменная '$name' вне доступа.";
    }

    public function __set($name, $value)
    {
        echo "Невозможно присвоить '$value' преременной '$name', так как она находится вне доступа.";
    }

    public function info()
    {
        return [
            "name" => $this->name,
            "weight" => $this->weight,
            "price" => $this->price
        ];
    }

    public function price()
    {
        return $this->price . "<br>";
    }

    public function priceWithVAT()
    {
        return $this->price + ($this->price / 100 * 20) . "<br>";
    }

    public function getCount()
    {
        echo "<p>Количество продукции: " . self::$count . "</p>";
    }

    public static function showCompanyInfo()
    {
        echo "<p>Компания: " . self::$companyName . "</p><p>Год основания: " . self::YEAR_START . "</p>";
    }

    abstract protected function showImage();
}

class Chocolate extends Product
{
    protected $calories;

    public function __construct(string $name, float $price, float $weight, int $calories)
    {
        $this->calories = $calories;
        parent::__construct($name, $price, $weight);
    }

    protected function showImage()
    {
        echo "<img src='Chocolate.png' width='200' height='200'>";
    }
}

class Candy extends Product
{
    protected function showImage()
    {
        echo "<img src='Sweets_Candy.jpg' width='200' height='200'>";
    }
}

$candy = new Candy("Восторг", 58.99, 10);
$chocolate = new Chocolate("Радость", 120, 100, 1560);

echo "<br><br>";

Product::showCompanyInfo();
Candy::showCompanyInfo();