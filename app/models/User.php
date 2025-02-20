<?php

class User {
    private $conn;
    private $table_name = "user";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($firstname, $lastname, $email, $password) {
        $query = "INSERT INTO " . $this->table_name . " (user_firstname, user_lastname, email, password) VALUES (:firstname, :lastname, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        
        return $stmt->execute();
    }

    public function login($email, $password) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function getUserById($user_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>