<?php
require_once "app/models/User.php";

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function register() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
            $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            if ($this->userModel->register($firstname, $lastname, $email, $password)) {
                header("Location: /account");
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

            $user = $this->userModel->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: /dashboard");
                exit();
            } else {
                echo "Email ou mot de passe incorrect";
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: /authentication");
        exit();
    }
}
?>