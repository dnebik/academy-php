<?php

$db_settings = parse_ini_file("settings.ini", true)["database"];
$dsn = "{$db_settings["driver"]}:host={$db_settings["host"]};port={$db_settings["port"]};dbname={$db_settings["schema"]}";

return new PDO($dsn, $db_settings["username"], $db_settings["password"]);