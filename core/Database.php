<?php

declare(strict_types=1);

namespace Core;

use Exception;
use PDO;
use PDOException;
use RuntimeException;

class Database
{
    private static ?self $instance = null;
    private PDO $connection;

    private function __construct(string $host, string $username, string $password, string $database)
    {
        try
        {
            $this->connection = new PDO(
                "mysql:host=$host;dbname=$database;charset=utf8mb4",
                $username,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        }
        catch (PDOException $e)
        {
            throw new RuntimeException(
                'Erreur de connexion à la base de données : ' . $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
        }
    }
    public static function getPDO(): PDO
    {
        require_once("config.php");
        if (!self::$instance)
        {
            require_once("config.php");
            self::$instance = new Database(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        }
        return (self::$instance)->connection;
    }
    public static function query(string $query, array $data = []): \PDOStatement
    {
        $pdo  = self::getPDO();
        $stmt = $pdo->prepare($query);

        foreach ($data as $key => &$value)
        {
            $stmt->bindParam($key, $value);
        }

        $stmt->execute();

        return $stmt;
    }
    //  Exécute une requête d'insertion et retourne l'ID inséré, ou false en cas d'erreur.
    public static function insertQuery(string $query, array $data = []): int|false
    {
        $pdo = self::getPDO();

        try
        {
            $stmt = $pdo->prepare($query);
            foreach ($data as $key => &$value)
            {
                $stmt->bindParam($key, $value);
            }
            $stmt->execute();
            $id = intval($pdo->lastInsertId());
            var_dump($id);
            return $id;
        }
        catch (PDOException $e)
        {
            throw new RuntimeException(
                'Erreur lors de l\'insertion : ' . $e->getMessage(),
                (int) $e->getCode(),
                $e
            );
            return false;
        }
    }
    //  * Retourne le résultat d'un COUNT.

    public static function countQuery(string $sql, array $data = []): int
    {
        $stmt = self::query($sql, $data);

        return (int) $stmt->fetchColumn();
    }
    //   Exécute une requête SELECT et retourne les résultats sous forme d'objets ou de tableaux associatifs.
    public static function findBySql(string $query, array $data = [], bool $outputArray = false): array|false
    {
        $stmt = self::query($query, $data);

        $fetchMode = $outputArray ? PDO::FETCH_ASSOC : PDO::FETCH_OBJ;

        return $stmt->fetchAll($fetchMode) ?: false;
    }


    //   Trouve un enregistrement par son ID.
    public static function findById(string $table, int $id): object|false
    {
        $sql    = "SELECT * FROM `$table` WHERE `id` = :id LIMIT 1";
        $result = self::findBySql($sql, [':id' => $id]);

        return $result ? array_shift($result) : false;
    }


    //  * Trouve des enregistrements par la valeur d'un attribut.

    public static function findByAttribute(string $table, string $attribute, mixed $value): array|false
    {
        $sql = "SELECT * FROM `$table` WHERE `$attribute` = :attribute";

        return self::findBySql($sql, [':attribute' => $value]);
    }
}
