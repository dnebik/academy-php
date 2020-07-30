<?php
if (isset($_GET["firstname"]) && isset($_GET["secondname"]) && isset($_GET["age"])){
    $firstname = $_GET["firstname"];
    $secondname = $_GET["secondname"];
    $age = $_GET["age"];

    echo "Привет, меня зовут $firstname $secondname, мой возраст - $age";
}