<?php
$exceptions = array('.', '..', '.git', '.idea'); //файлы - исключения

$dir = opendir($_SERVER["DOCUMENT_ROOT"]); //путь к корню проекта
//пробег по директории
while (($f = readdir($dir)) != false)
    if (is_dir($f) && !in_array($f, $exceptions))
        echo "<a href='$f'>$f</a> <br>"; //вывод ссылок
closedir($dir); //закрыть папку

?>