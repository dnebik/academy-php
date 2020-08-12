<?php

session_start();

if (!$_SESSION["login"]) {
    header("Location: login.php");
    die();
}

if ($_POST["exit"]) {
    session_destroy();
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
<hr>
<form action="" method="post">
    <?
    $db = require_once("database.php");
    $data = $db->prepare("SELECT * FROM security.comments WHERE moderation = 'new'");
    $data->execute();
    $comments = $data->fetchALL(PDO::FETCH_ASSOC);

    foreach ($comments as $item) {
        ?>
        <select>
            <option <?= ($_SESSION["level"] != "Admin") ? "selected" : "" ?> value="miss">Не трогать</option>
            <? if ($_SESSION["level"] == "Admin") { ?>
                <option selected value="true">Принять</option>
            <? } ?>
            <option value="false">Отказать</option>
        </select>
        <?
    }
    echo "<b>{$item["name"]}</b>: {$item["text"]}";
    ?>
    <input style="display: block; margin-top: 15px" type="submit" name="confirm" value="Подтвердить">
</form>
<hr>
<form action="" method="post">
    <input type="submit" value="Выход" name="exit">
</form>
</body>


</html>
