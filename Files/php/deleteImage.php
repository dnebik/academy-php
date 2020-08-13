<?php

require_once("database.php");

$db = database::getLink();

if ($_POST["delete"]){

    $db->query("DELETE FROM files.imeges WHERE id = {$_POST["id"]}");
    unlink($_SERVER["DOCUMENT_ROOT"] . "/Files/uploads/{$_POST["id"]}.{$_POST["filename"]}.{$_POST["extension"]}");

    header("Location: " . $_SERVER["HTTP_REFERER"]);
}