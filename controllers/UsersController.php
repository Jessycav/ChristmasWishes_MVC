<?php

require_once("./models/UsersModel.php");

class UsersController {

    private $usersModel;

    public function __construct() {
        $this->usersModel = new UsersModel();
    }

    public function dashboardPage() { 
        require_once ("./views/pages/dashboardPage.php");
    }

    public function createAccount() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user_firstname = htmlspecialchars($_POST['user_firstname'], ENT_QUOTES);
            $user_lastname = htmlspecialchars($_POST['user_lastname'], ENT_QUOTES);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            if ($this->usersModel->register($user_firstname, $user_lastname, $email, $password)) {
                header("Location: /login");
                exit();
            } else {
                echo "Echec de l'inscription";
            }
        }
    }

    public function login() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /authenticationPage");
        exit();
    }
}
?>