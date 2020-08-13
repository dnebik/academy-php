<?php

session_start();

if ($_SESSION["login"]) {
    header("Location: administration.php");
    die();
}

if (isset($_POST["login"])) {
    $db = require_once("database.php");
    $data = $db->prepare("SELECT m.password, l.name as level FROM security.moderation AS m 
        JOIN security.moderation_level AS l ON m.level = l.id 
        WHERE m.login = ?");
    $data->execute([$_POST["login"]]);
    $accaunt = $data->fetch(PDO::FETCH_ASSOC);

    if ($_POST["password"] == $accaunt["password"]) {
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["level"] = $accaunt["level"];

        header("Location: administration.php");
        die();
    } else {
        unset($_POST);
    }
}

?>

<html>

<head>
    <title>Авторизация</title>
</head>

<body>
<form style="background-color: #4CAC9D; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px 15px; border-radius: 5px"
      action="" method="post">
    Логин: <input style="display: block; margin-bottom: 15px; border: 0px; padding: 3px 6px" type="text" name="login">
    Пароль: <input style="display: block; margin-bottom: 15px; border: 0px; padding: 3px 6px" type="password"
                   name="password">
    <input style="display: block; border: 0px; padding: 3px 6px" type="submit" value="Войти">
</form>
</body>

</html>
