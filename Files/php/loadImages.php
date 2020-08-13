<?php

require_once("database.php");

$db = database::getLink();

$error = array();

if ($_FILES["file"]){
    $size = $_FILES["file"]["size"];
    $file = $_FILES["file"]["name"];
    $tmp = $_FILES["file"]["tmp_name"];
    $type = $_FILES["file"]["type"];
    $fileErrors = $_FILES["file"]["error"];

    $fileType = substr($type, 0, strrpos($type, "/"));
    $fileExtension = strtolower(end(explode(".", $file)));
    $fileName = substr($file, 0, strrpos($file, "."));
    $fileName = preg_replace("/[0-9]/", "", $fileName);

    error_log("[extension]: " . $fileExtension);
    error_log("[filename]: " . $fileName);
    error_log("[type]: " . $fileType);

    if ($fileErrors !== 0){
        array_push($error, "Something wrong.");
    }
    if ($fileType != "image"){
        array_push($error, "Unknown file type.");
    }
    if ($size > 2097152){
        array_push($error, "File size is too large.");
    }

    if (!$error) {
        $db->query("INSERT INTO files.imeges (filename, extension) VALUES ('$fileName', '$fileExtension')");

        $data = $db->prepare("SELECT MAX(id) as max FROM files.imeges");
        $data->execute();
        $maxID = $data->fetch(PDO::FETCH_ASSOC)["max"];

        $fileNameNEW = $maxID . "." . $fileName . "." . $fileExtension;
        $fileDirNEW = $_SERVER["DOCUMENT_ROOT"] . "/Files/uploads";

        if (!is_dir($fileDirNEW)){
            mkdir($fileDirNEW);
        }
        move_uploaded_file($tmp, $fileDirNEW . "/" . $fileNameNEW);

        error_log("[maxID]: " . $maxID);
    }else {
        error_log("[errors] " . json_encode($error));
    }
}

?>
