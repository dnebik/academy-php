<?php

$db = require_once("database.php");

if (isset($_POST["name"])) {
    $name = htmlspecialchars($_POST["name"]);
    $text = htmlspecialchars($_POST["text"]);

    $data = $db->prepare("INSERT INTO security.comments (name, text) VALUES (:name, :text)");
    $data->execute(["name" => $name, "text" => $text]);

    unset($_POST);
    header("Location: index.php");
    die();
}

?>

<html>

<head>
    <title>Чат</title>
</head>

<body>
<form action="" method="POST">
    <h1>Оставить сообщение</h1>
    <b>Ваше имя: </b><input style="display: block; margin-bottom: 15px" type="text" alt="name" placeholder="Псевдоним"
                            name="name" required>
    <b>Сообщение: </b><textarea style="display: block; margin-bottom: 15px" placeholder="Сообщение" name="text"
                                rows="12" cols="30" required></textarea>
    <input type="submit" value="Отправить" name="send">
</form>
<hr>
<h1>Сообщения: </h1>
<?
    $data = $db->prepare("SELECT * FROM security.comments WHERE moderation = 'ok' ORDER BY publish_date");
    $data->execute();
    $messages = $data->fetchALL(PDO::FETCH_ASSOC);

    foreach ($messages as $item)
    {
        echo "<hr>";
        echo "[{$item["publish_date"]}] <b>{$item["name"]}</b>: {$item["text"]}";
    }
?>
</body>


</html>
