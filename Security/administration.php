<?php

session_start();

if (!$_SESSION["login"])
{
    header("Location: login.php");
    die();
}

?>

<html>

<head>
    <title>Админестрирование</title>
</head>

<body>
    <h1>Админестрирование сайта</h1>
</body>


</html>
