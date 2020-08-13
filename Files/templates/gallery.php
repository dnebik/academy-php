<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/Files/php/loadImages.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/Files/php/deleteImage.php");
?>

<html>

<head>
    <title>Галерея</title>
</head>

<body>
<?
if ($error) {
    foreach ($error as $key => $item) {
        echo "[$key]: $item <br>";
    }
}

if ($db) {
    $data = $db->query("SELECT * FROM files.imeges");
    $images = $data->fetchAll(PDO::FETCH_ASSOC);

    foreach ($images as $image) {
        ?>
        <form style="text-align: center; display: inline-block" action="" method="POST">
            <img style="display: block" width='150'
                 src='<?= "/Files/uploads/" . $image["id"] . "." . $image["filename"] . "." . $image["extension"] ?>'>
            <input type="hidden" name="id" value="<?= $image["id"] ?>">
            <input type="hidden" name="filename" value="<?= $image["filename"] ?>">
            <input type="hidden" name="extension" value="<?= $image["extension"] ?>">
            <input style="" type="submit" name="delete" value="Удалить">
        </form>

        <?
    }
}
?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit">
</form>

</body>

</html>
