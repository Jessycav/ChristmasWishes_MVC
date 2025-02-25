<?php

require_once("./models/UsersModel.php");

class UsersController {

    public $usersModel;

    public function __construct() {
        $this->usersModel = new UsersModel();
    }

    public function dashboardPage() { 
        require_once ("./views/pages/dashboardPage.php");
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

    public function showProfile($user_id) {
        return $this->usersModel->getUserById($user_id);
    }

    public function logout() {
        session_destroy();
        header("Location: " . ROOT);
    }

/*         if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            $user = $this->usersModel->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: /monCompte/dashboard");
                exit();
            } else {
                echo "Email ou mot de passe incorrect";
            }
        } */
}
?>