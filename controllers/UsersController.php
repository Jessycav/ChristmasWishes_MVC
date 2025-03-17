<?php

require_once __DIR__ . '/../models/UsersModel.php';

class UsersController {

    public $usersModel;

    public function __construct() {
        $this->usersModel = new UsersModel();
    }

    public function createAccount($user_firstname, $user_lastname, $email, $password) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if (!$this->usersModel->getUserByEmail($email)) {
                if ($this->usersModel->createAccountDB($user_firstname, $user_lastname, $email, $hashedPassword)) {
                    header("Location: " . ROOT . "monCompte/authentification");
                } else {
                    echo "Echec de l'inscription";
                }
            } else {
                throw new Exception ("Les noms et prénoms saisis sont déjà pris");
            }
        }
    }

    public function login($email, $password) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datasUser = $this->usersModel->getUserByEmail($email);
            if ($this->usersModel->isAccountValid($email, $password)) {
                $_SESSION['email'] = $datasUser['email'];
                $_SESSION['user_id'] = $datasUser['user_id'];
                header("Location: " . ROOT . "monCompte/dashboard");
            } else {
                echo "Le mot de passe saisi est incorrect";
                header("Location: " . ROOT . "monCompte/authentification");
            }
        }
    }

    public function dashboardPage() { 
        require __DIR__ . '/../views/pages/dashboardPage.php';
    } 
    
    public function showProfile($user_id) {
        return $this->usersModel->getUserById($user_id);
    }

    public function logout() {
        session_destroy();
        header("Location: " . ROOT);
    }
}
?>