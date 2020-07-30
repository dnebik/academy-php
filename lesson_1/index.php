<?php
//путь
$file = $_SERVER["DOCUMENT_ROOT"] . $_SERVER["PHP_SELF"];
$_dir = substr($file, 0, strrpos($file, '/'));

$exceptions = array("index.php"); //файлы - исключения

$dir = opendir($_dir); //открыть директорию
//пройти по всем элементам в директории
while (($f = readdir($dir)) != false)
    if (strrpos($f, '.php') && !in_array($f, $exceptions))
        echo "<a href='$f'>$f</a> <br>"; //вывод ссылок на файлы директории
closedir($dir); //закрыть директорию

?>