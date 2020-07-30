<?php

    $arr = [
        "GET" => "Данные не скрыты и хранятся в url",
        "POST" => "Данные скрыты и пользователь их не видит и не может подделать"
    ];

    foreach ($arr as $key => $type){
        echo "$key - $type<br>";
    }
    echo "<br>";
?>

<form action="content.php" method="GET">
    <p>Имя: <input type="text" name="firstname"></p>
    <p>Фамилия: <input type="text" name="secondname"></p>
    <p>Возраст: <input type="number" name="age"></p>
    <p><input type="submit" value="Подтвердить"></p>
</form>