<?php

// visible pour $url[0] = monCompte

switch($url[1]) {        
    case "authentification":
        $authController->authPage(); //Objet appelle la méthode authPage
        break;
        
    case "inscription":
        $user_firstname = htmlentities($_POST['user_firstname']);
        $user_lastname = htmlentities($_POST['user_lastname']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        if(empty($user_firstname) || empty($user_lastname) || empty($email) || empty($password)) {
            throw new Exception("Veuillez remplir tous les champs");
        }
        $usersController->createAccount($user_firstname, $user_lastname, $email, $password);
        break;
    
    case "connexion":
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']); 
        if(empty($email) || empty($password)) {
            throw new Exception("Veuillez remplir tous les champs");
        }                   
        $usersController->login($email, $password);
        break;
    
    case "dashboard":
        $wishlistCount = $wishlistsController->getUserWishlistsCount();
        include './views/pages/dashboardPage.php';
        
        $usersController->dashboardPage(); 
        break;

    case "profil":
        if ($user_id) {   
            $user_id = $_SESSION['user_id'];                 
            $datasUser = $usersController->showProfile($user_id); // Définition de la variable avant inclusion
            include './views/pages/myAccountPage.php';
        } else {
            header("Location:" . ROOT . "monCompte/authentification");
        }
        break;
    
    case "mesListes":
        $myWishlists = $wishlistsController->showUserWishlists(); //Objet appelle la méthode authPage
        include './views/pages/myListsPage.php';
        break;

    case "logout":
        $usersController->logout();
        break;

    case "gestionListe":
        require_once('./indexComponents/gestionListeIndex.php');
        break;

    default:
        throw new Exception ("La page Mon Compte demandée n'existe pas");
}