<?php

session_start();

if ($_SESSION["login"])
{
    header("Location: administration.php");
    die();
}

?>

<html>

<head>
    <title>Авторизация</title>
</head>

<body>
    <form style="background-color: #4CAC9D; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px 15px; border-radius: 5px">
        Логин: <input style="display: block; margin-bottom: 15px; border: 0px; padding: 3px 6px" type="text" name="login">
        Пароль: <input style="display: block; margin-bottom: 15px; border: 0px; padding: 3px 6px" type="password" name="password">
        <input style="display: block; border: 0px; padding: 3px 6px" type="submit" value="Войти">
    </form>
</body>

</html>
