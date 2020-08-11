<?php
    if(!$_SESSION["post_send"] || $_POST["send"]){
        //отправка email
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
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