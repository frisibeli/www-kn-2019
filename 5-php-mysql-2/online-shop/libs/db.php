<?php 

class DB {
    public static function getConnection()
    {
        $config = parse_ini_file("config.ini", true);

        $host = $config["mysql"]["host"];
        $db = $config["mysql"]["database"];
        $user = $config["mysql"]["user"];
        $password = $config["mysql"]["password"];

        return new PDO(
            "mysql:host=$host;dbname=$db;charset=utf8mb4",
            $config["mysql"]["user"],
            $config["mysql"]["password"],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]
        );
    }
}