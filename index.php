<?php

session_start();
var_dump($_SESSION);
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

define("ROOT", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require_once ("./controllers/HomeController.php");
$homeController = new HomeController(); // Instancie la classe HomeController grâce à l'objet homeController
require_once ("./controllers/WishlistsController.php");
$wishlistsController = new WishlistsController();
require_once ("./controllers/AuthController.php");
$authController = new AuthController();
require_once ("./controllers/GiftsController.php");
$giftsController = new GiftsController();
require_once ("./controllers/UsersController.php");
$usersController = new UsersController();
$dashboardController = new UsersController(); 


try {
    if (empty($_GET['page'])) { //Vérifie si le paramètre page est vide
        $url[0] = "accueil"; //Renvoie une page d'accueil par défaut
    } else {
        // Divise l'URL en plusieurs parties en nettoyant l'URL pour la sécurité
        $url = explode("/", filter_var($_GET['page'],FILTER_SANITIZE_URL));
    }

    switch ($url[0]) {
        case "accueil":
            $homeController->homePage(); //Objet appelle la méthode homePage
            break;
  
        case "listes":
            switch ($url[1]) {        
                case "toutesleslistes":
                    $wishlistsController->allLists(); //Objet appelle la méthode allLists
                    break;
                case "detailListe":
                    $giftsController->allGifts();
                    break;
                default:
                    throw new Exception ("La page Listes demandée n'existe pas");
            }
            break;

        case "monCompte":
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
                    $dashboardController->dashboardPage(); 
                    break;

                case "profil":
                    if ($useri_d) {   
                        $user_id = $_SESSION['user_id'];                 
                        $datasUser = $usersController->showProfile($user_id); // Définition de la variable avant inclusion
                        include './views/pages/myAccountPage.php';
                    } else {
                        header("Location:" . ROOT . "monCompte/authentification");
                    }
                    break;
                
                case "logout":
                    $usersController->logout();
                    break;

                case "mesListes":
                    $myWishlists = $wishlistsController->showUserWishlists(); //Objet appelle la méthode authPage
                    include './views/pages/viewMyListsPage.php';
                    break;
                    
                case "gestionListe":
                    switch($url[2]) {
                        case "nouvelleListe":
                            //Sécuriser les informations
                            if (empty($wishlist_year) || empty($wishlist_recipient)) {
                                throw new Exception("Tous les champs sont requis");
                            }
                            $wishlistsController->createNewWishlist($wishlist_year, $wishlist_recipient, $user_id);
                            break;
                        //case "modifierListe":
                            //$wishlistsController->updateWishlist();
                            //break;
                        
                        case "supprimerListe":
                            $wishlistsController->deleteWishlist($wishlist_id);
                            break;
                    }
                    break;
    


                default:
                    throw new Exception ("La page Mon Compte demandée n'existe pas");
            }
            break;
        
        default:
            throw new Exception ("La page demandée n'existe pas");
    }
} catch(Exception $e) {
    echo "Erreur: " . $e->getMessage();
}