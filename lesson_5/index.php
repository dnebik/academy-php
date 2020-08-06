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
        return [
            "name"=>$this->name,
            "weight"=>$this->weight,
            "price"=>$this->price
        ];
    }

    function Price(){
        return $this->price . "<br>";
    }

    function PriceWithVAT(){
        return $this->price + ($this->price / 100 * 20) . "<br>";
    }
}

function printInfo(Product $product){
    $info = $product->info();
    foreach ($info as $key=>$stat){
        echo "$key: $stat <br>";
    }
}

$product_1 = new Product("auto", 1000000, 1600);
$product_2 = new Product("brick", 50, 5);
$product_3 = new Product("smartphone", 25000, 0.4);

printInfo($product_1);
echo "Цена без НДС:" . $product_1->Price();
echo "Цена с НДС" . $product_1->PriceWithVAT() . "<br>";

printInfo($product_2);
echo "Цена без НДС:" . $product_2->Price();
echo "Цена с НДС" . $product_2->PriceWithVAT() . "<br>";

printInfo($product_3);
echo "Цена без НДС:" . $product_3->Price();
echo "Цена с НДС" . $product_3->PriceWithVAT() . "<br>";