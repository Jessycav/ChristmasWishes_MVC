<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'christmas_wishes';
    private $username = 'root';
    private $password = '';
    public $conn;

    public function getConnection() {
        $this->conn = null; //Tester si la connexion existe

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";db_name=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

?>