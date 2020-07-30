<?php

$firstname = "";
$secondname = "";
$age = "";
$birthdate = "";

if (isset($_GET["firstname"]) && isset($_GET["secondname"]) && isset($_GET["age"])){
    $firstname = $_GET["firstname"];
    $secondname = $_GET["secondname"];
    $age = $_GET["age"];
}

if (isset($_POST["firstname"]) && isset($_POST["secondname"]) && isset($_POST["age"])){
    $firstname = $_POST["firstname"];
    $secondname = $_POST["secondname"];
    $age = $_POST["age"];
}

if ($firstname != "" && $secondname != "" && $age != "")
    echo "Привет, меня зовут $firstname $secondname, мой возраст - $age";

if (isset($_POST["birthdate"])){
    $birthdate = $_POST["birthdate"];
}

if ($birthdate != ""){
    $_age = floor((time() - strtotime($birthdate))/ 86400 / 364);
    echo "Ваш полный возраст: $_age";
}
