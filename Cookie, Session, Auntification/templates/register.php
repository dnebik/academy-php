<?php

session_start();

$error = array();

if ($_SESSION["login"]) {
    echo("Вы тут по ошибке");
    die();
}

if ($_POST["login"]) {

    $connection = require_once("../database.php");

    $md5_password = md5($_POST["password"]);
    $sql = "INSERT INTO logintraning.users (login, password, email) VALUES (?,?,?)";
    $data = $connection->prepare($sql)->execute([$_POST["login"], $md5_password, $_POST["email"]]);

    if (!$data) {
        array_push($error, "Пользователь с таким именем уже существует");
    }else{
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["verification"] = false;
        header("Location: verification.php");
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
</head>

<body>
<div style="overflow: hidden; background: #1b6d85; width: min-content; transform: translate(-50%, -50%); position: absolute; top: 50%; left: 50%; border-radius: 8px">
    <? if ($error != null) {
        foreach ($error as $item) {
            echo "<div style='margin-top: 10px; padding: 3px 5px 3px 5px; width: auto; background: turquoise; color: darkblue; text-align: center'><span>$item</span></div>";
        }
    } ?>
    <form action="" method="post" style="color: ghostwhite; padding: 5px 20px">
        <p>Login:<input style="padding: 2px 1px 2px 5px " type="text" name="login" placeholder="login" alt="Login"
                        value="<? if ($_POST["login"]) echo $_POST["login"] ?>"
                        required></p>
        <p>Email: <input style="padding: 2px 1px 2px 5px " type="email" name="email" placeholder="email"
                         value="<? if ($_POST["email"]) echo $_POST["email"] ?>"
                         alt="Email" required></p>
        <p>Password: <input style="padding: 2px 1px 2px 5px " type="password" name="password" placeholder="password"
                            value="<? if ($_POST["password"]) echo $_POST["password"] ?>"
                            alt="Password" required></p>
        <p><input type="submit" value="Register"></p>
        <p><a href="login.php">I'am already have account</a></p>
    </form>
</div>
</body>

</html>