<?php
namespace Core\Database;
use PDO;

class Database
{
    public static function connect($host, $dbname, $username = 'root',  $password = '')
    {
        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";
        try {
            return new PDO($dsn, $username, $password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_STRINGIFY_FETCHES => false
            ]);
        } catch (\PDOException $e) {
            die('Could not connect' . $e->getMessage());
        }
    }
}
