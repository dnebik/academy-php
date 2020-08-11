<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SESSION["verification"])
{
    header("Location: ..");
    die();
}

if ($_SESSION["email"])
{
    $connection = require_once("database.php");

    $query = "SELECT id, login, verification FROM logintraning.users WHERE login = ?";
    $data = $connection->prepare($query);
    $data->execute([$_SESSION["login"]]);
    $data = $data->fetch(PDO::FETCH_ASSOC);

    if ($data["verification"])
    {
        header("Location: ..");
        die();
    }
}

if($_GET["verification"])
{
    $connection = require_once("../database.php");

    $sql = "UPDATE logintraning.users SET verification = 1 WHERE login = ?";
    $some = $connection->prepare($sql)->execute([$_GET["verification"]]);
    $_SESSION["verification"] = 1;

    header("Location: ..");
    die();
}

if(!$_SESSION["email"])
{
    echo "Вы попали не туда.";
    die();
}

if((!$_SESSION["post_send"] || $_POST["send"]) && $_SESSION["email"])
{

    require_once ("../PHPMailer-master/src/Exception.php");
    require_once ("../PHPMailer-master/src/PHPMailer.php");
    require_once ("../PHPMailer-master/src/SMTP.php");

    $query = [
            "verification" => "{$_SESSION["login"]}"
    ];

    $verf_url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $verf_url .= "?" . http_build_query($query);


    $mail = new PHPMailer(true);
    try{
        //
        $mail->isSMTP();
        $mail->Host = "smtp.mail.ru";
        $mail->SMTPAuth = true;
        $mail->Username = "dneb97@mail.ru";
        $mail->Password = "k1n2m3a4";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        //
        //
        $mail->setFrom('dneb97@mail.ru', 'Mailer');
        $mail->addAddress("{$_SESSION["email"]}");
        //
        //
        $mail->isHTML(true);
        $mail->Subject = "Подтверждение почты";
        $mail->Body = "<p>Если вы получили это сообщение по ошибке проигнорируйте его.</p><p>Для завершения регистрации перейдите по следующей ссылке: <a href='$verf_url'>$verf_url</a></p>";
        //
        //
        $mail->send();
        //
        error_log("[PHPMailer]: message sand on {$_SESSION["email"]}");
    }catch (Exception $e){
        error_log("[PHPMailer ERROR]: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Verification</title>
</head>

<body>
<div style="background: #1b6d85; padding: 5px 20px; color: ghostwhite; transform: translate(-50%, -50%); position: absolute; top: 50%; left: 50%; border-radius: 8px">
    <p><span>Мы отправили вам сообщение на почту. Следуйте инструкции в сообщении чтобы завершить регистрацию.</span></p>
    <form action="" method="post">
        <p><span>Для повторной отправки сообщения нажмите сюда: <input type="submit" name="send" value="Отправить"></span></p>
    </form>
</div>
</body>

</html>