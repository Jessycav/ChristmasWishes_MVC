<?php

abstract class Database
{
    public static $pdo;

    private $host = "localhost";
    private $dbName = "christmas_wishes";
    private $user = "root";
    private $password = "";

    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $pdo;
    }
}