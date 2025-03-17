<?php

require_once __DIR__ . '/../config/Database.php'; //Connexion à la base de données

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
    
    public function createAccountDB($user_firstname, $user_lastname, $email, $password) {
        $sql = "INSERT INTO user (user_firstname, user_lastname, email, password) VALUES (:user_firstname, :user_lastname, :email, :password)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':user_firstname', $user_firstname, PDO::PARAM_STR);
        $stmt->bindParam(':user_lastname', $user_lastname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        $isCreate = ($stmt->rowCount()>0);
        $stmt->closeCursor();
        return $isCreate;
    }    
    
    public function getUserByEmail($email) {
        $sql = "SELECT * FROM user WHERE email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $users;
    }

    public function isAccountValid($email, $password) {
        $sql = "SELECT password FROM user WHERE email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $passwordDB = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return password_verify($password, $passwordDB['password']);
    }

    public function getUserById($user_id) {
        $sql = "SELECT * FROM user WHERE user_id = :user_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $datasUser = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datasUser;
    }
}     
?>