<?php

class Database
{
    private static $instance;
    private $connection;

    private function __construct($host, $username, $password, $database)
    {
        try
        {
            $this->connection = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception  $e)
        {
            die("Erreur de la connection à la base de données : " . $e->getMessage());
        }
    }
    public static function getPDO()
    {
        require_once("config.php");
        if (!self::$instance)
        {
            self::$instance = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        }
        return (self::$instance)->connection;
    }
    public static function query($query, $data = [])
    {
        $pdo = self::getPDO();
        $req = $pdo->prepare($query);
        foreach ($data as $key => &$value)
        {
            $req->bindParam(":$key", $value);
        }
        $req->execute();
        return $req;
    }
    public static function findBySql($query, $data = [])
    {
        $stm = self::query($query, $data);
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    static function findById($table = "client", $id = 15)
    {
        $sql   = "SELECT * FROM `" . $table . "` WHERE `id`= :id LIMIT 1";
        $res   = self::findBySql($sql, ["id" => $id]);
        return array_shift($res);
    }
    static function findByAttribute($table = "client",  $attribute = "id", $val = 15)
    {
        $sql   = "SELECT * FROM `" . $table . "` WHERE `$attribute`= :$attribute ";
        $res   = self::findBySql($sql, [$attribute => $val]);
        return ($res);
    }
}
