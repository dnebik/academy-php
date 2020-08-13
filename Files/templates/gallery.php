<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/Files/php/loadImages.php");
?>

<html>

<head>
    <title>Галерея</title>
</head>

<body>
<?
    if ($error){
        foreach ($error as $key => $item){
            echo "[$key]: $item <br>";
        }
    }
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit">
</form>

</body>

</html>
