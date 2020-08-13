<?php

class database{
    private static $link;

    public static function getLink(){
        if (self::$link) {
            return self::$link;
        }
        else {
            $data = parse_ini_file($_SERVER["DOCUMENT_ROOT"] . "/Files/settings.ini", true);
            $databaseData = $data["database"];
            $dsn = "{$databaseData["driver"]}:host={$databaseData["host"]};port={$databaseData["port"]};dbname={$databaseData["schema"]}";

            self::$link = new PDO($dsn, $databaseData["username"], $databaseData["password"]);

            return self::$link;
        }
    }
}