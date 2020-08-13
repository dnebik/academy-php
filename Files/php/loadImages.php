<?php

require_once("database.php");

$db = database::getLink();

$error = array();

if ($_FILES["file"]){
    $size = $_FILES["file"]["size"];
    $file = $_FILES["file"]["name"];
    $type = $_FILES["file"]["type"];

    $fileType = substr($type, 0, strrpos($type, "/"));
    $fileExtension = strtolower(end(explode(".", $file)));
    $fileName = substr($file, 0, strrpos($file, "."));

    error_log("[extension]: " . $fileExtension);
    error_log("[filename]: " . $fileName);
    error_log("[type]: " . $fileType);

    if ($fileType != "image"){
        array_push($error, "Unknown file type.");
    }
    elseif ($size > 131072){
        array_push($error, "File size is too large.");
    }
    else {
        $data = $db->prepare("SELECT MAX(id) as max FROM files.imeges");
        $data->execute();
        $maxID = $data->fetch(PDO::FETCH_ASSOC)["max"];

        error_log("[maxID]: " . $maxID);
    }

    if ($error){
        error_log("[errors] " . json_encode($error));
    }
}

?>
