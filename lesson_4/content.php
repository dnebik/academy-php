<?php

$firstname = ""; //имя
$secondname = ""; //фамилия
$age = ""; //возрост
$birthdate = ""; //дата рождения

if (isset($_GET["firstname"]) && isset($_GET["secondname"]) && isset($_GET["age"])){ //проверка GET
    $firstname = $_GET["firstname"];
    $secondname = $_GET["secondname"];
    $age = $_GET["age"];
}

if (isset($_POST["firstname"]) && isset($_POST["secondname"]) && isset($_POST["age"])){ //проверка POST
    $firstname = $_POST["firstname"];
    $secondname = $_POST["secondname"];
    $age = $_POST["age"];
}

if ($firstname != "" && $secondname != "" && $age != ""){   //вывод сообщения если поля не пусты
    echo "Привет, меня зовут $firstname $secondname, мой возраст - $age";
}

if (isset($_POST["birthdate"])){ //Проверка даты рождения
    $birthdate = $_POST["birthdate"];
}

if ($birthdate != ""){ //расчет возраста и вывод если поле не пустое
    $_age = floor((time() - strtotime($birthdate))/ 86400 / 364);
    echo "Ваш полный возраст: $_age";
}
