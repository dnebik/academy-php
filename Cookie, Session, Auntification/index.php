<?php

session_start();

if ($_POST["exit"])
{
    session_destroy();
    header("Location: templates/login.php");
    die();
}

if (!$_SESSION["login"])
{
    header("Location: templates/login.php");
    die();
}

if (!$_SESSION["verification"]){
    $connection = require_once("database.php");

    $query = "SELECT id, login, verification FROM logintraning.users WHERE login = ?";
    $data = $connection->prepare($query);
    $data->execute([$_SESSION["login"]]);
    $data = $data->fetch(PDO::FETCH_ASSOC);

    if ($data["verification"] == 0)
    {
        header("Location: templates/verification.php");
        die();
    }
}

?>

<html>

<head>

</head>

<body style="text-align: center">

<h1>Привет</h1>

<form method="post">
    <input type="submit" name="exit" value="Выйти">
</form>

</body>

</html>