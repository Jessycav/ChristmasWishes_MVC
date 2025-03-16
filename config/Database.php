<?php

abstract class Database {
    public static $pdo;

    private $host;
    private $dbName;
    private $user;
    private $password;

    protected function connect() {
        try {
            $url = getenv('JAWSDB_URL');
            $dbparts = parse_url($url);

            $this->host = $dbparts['host'];
            $this->user = $dbparts['user'];
            $this->password = $dbparts['pass'];
            $this->dbName = ltrim($dbparts['path'],'/');

            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName . ";charset=utf8";
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $pdo;
    }
}