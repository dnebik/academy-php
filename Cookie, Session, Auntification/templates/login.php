<?php
session_start();

$error = array();

if ($_POST["registration"])
{
    header("Location: register.php");
    die();
}

if ($_POST["in"] && $_POST["login"]){
    $connection = require_once("../database.php");

    $md5_password = md5($_POST["password"]);
    $sql = "SELECT password, verification, email FROM logintraning.users WHERE login = ?";
    $data = $connection->prepare($sql);
    $data->execute([$_POST["login"]]);
    $data = $data->fetch(PDO::FETCH_ASSOC);

    if (!$data){
        array_push($error, "Неверный логин или пароль!");
    }
    elseif ($data["password"] != $md5_password){
        array_push($error, "Неверный логин или пароль!");
    }else{
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["verification"] = $data["verification"];
        $_SESSION["email"] = $data["email"];

        setcookie("login", $_SESSION["login"], time() + 3600);

        header("Location: ..");
        die();
    }
}

if (isset($_SESSION["login"]))
{
    header("Location: ..");
    die();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <div style="overflow: hidden; background: #1b6d85; width: min-content; transform: translate(-50%, -50%); position: absolute; top: 50%; left: 50%; border-radius: 8px"">
        <? if ($error != null) {
            foreach ($error as $item) {
                echo "<div style='margin-top: 10px; padding: 3px 5px 3px 5px; width: auto; background: turquoise; color: darkblue; text-align: center'><span>$item</span></div>";
            }
        } ?>
        <form action="" method="post"  style="color: ghostwhite; padding: 5px 20px;">
            <p>Login:<input style="padding: 2px 1px 2px 5px " type="text" name="login" placeholder="login" alt="Login" required></p>
            <p>Password: <input style="padding: 2px 1px 2px 5px " type="password" name="password" placeholder="password" alt="Password" required></p>
            <input type="submit" value="Login" name="in">
            <p><a href="register.php">Registration</a></p>
        </form>
    </div>
</body>

</html>