<?php

namespace Core;

use PDO, PDOStatement;

class Database
{
    private PDO $connection;

    public function __construct($config)
    {
        $dsn = "mysql:" . http_build_query($config, "", ";") . ";unix_socket=/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock";

        $this->connection = new PDO(
            $dsn,
            "root",
            "",
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    public function query(String $query, $params = []): false|PDOStatement
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }

    public function lastInsertedID()
    {
        return $this->connection->lastInsertId();
    }
}