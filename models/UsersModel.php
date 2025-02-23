<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class UsersModel extends Database {
    private $user_id;
    private $user_firstname;
    private $user_lastname;
    private $email;
    private $password;

    public function __construct($user_id = null, $user_firstname = null, $user_lastname = null, $email = null, $password = null) {
        $this->user_id = $user_id;
        $this->user_firstname = $user_firstname;
        $this->user_lastname = $user_lastname;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function register($firstname, $lastname, $email, $password) {
        $query = "INSERT INTO user(user_firstname, user_lastname, email, password) VALUES (:user_firstname, :user_lastname, :email, :password)";
        $stmt = $this->connect()->prepare($query);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bindParam(':user_firstname', $firstname);
        $stmt->bindParam(':user_lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        
        return $stmt->execute();
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
    
    public function getUserById($user_id) {
        $sql = "SELECT * FROM user WHERE user_id = :user_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $user_id;
    }
}     
?>