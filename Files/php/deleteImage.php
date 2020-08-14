<?php

session_start();

require_once("database.php");

$db = database::getLink();

if ($_SESSION["duplicate_delete"] != $_POST["id"])
{
    if ($_POST["delete"]){
        $db->query("DELETE FROM files.imeges WHERE id = {$_POST["id"]}");
        unlink($_SERVER["DOCUMENT_ROOT"] . "/Files/uploads/{$_POST["id"]}.{$_POST["filename"]}.{$_POST["extension"]}");
        $_SESSION["duplicate_delete"] = $_POST["id"];
    }
}