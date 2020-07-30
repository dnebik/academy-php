<?php

//Функция проверки на простату
function PrimeNumber($number){
    if ($number < 2) //меньше двух - не простое
        return false;

    //метод перебора
    for ($i = 2; $i < $number; $i++){
        if ($number % $i == 0)
            return false; //не простое если нашли хоть 1 делитель
    }

    //если не нашли то простое
    return true;
}

//Функция проверки на високосный год
function bissextile($year){
    if ($year % 400 == 0) //если кратен 400 - високосный
        return true;
    elseif ($year % 100 == 0) //если кратен 100 но не кратен 400 - не високосный
        return false;
    elseif ($year % 4 == 0) //в остольных случаях если кратен 4 - високосный, иначе - нет
        return true;
    else
        return false;
}

$primeNumbers = array();

echo "Тест на простоту<br>";
for ($i = 0; $i <= 100; $i++){ //проверяем первые 100 чисел на простоту
    if (PrimeNumber($i))
        array_push($primeNumbers, $i); //Простое число добовляем в массив
}

//Выводим простые числа
foreach ($primeNumbers as $key => $number){
    echo "$number - это простое число №" . ($key + 1) . "<br>";
}

echo "<br>";

$year = date("Y");
echo "год $year " . (bissextile($year) ? "високосный" : "не високосный"); //пример работы функции bissextile
?>