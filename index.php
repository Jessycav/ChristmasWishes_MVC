<?php

define("ROOT", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require_once ("./controllers/HomeController.php");
$homeController = new HomeController(); // Instancie la classe HomeController grâce à l'objet homeController
require_once ("./controllers/WishlistsController.php");
$wishlistsController = new WishlistsController();
$wishlistController = new WishlistsController();
require_once ("./controllers/AuthController.php");
$authController = new AuthController();
require_once ("./controllers/GiftsController.php");
$giftsController = new GiftsController();
require_once ("./controllers/UsersController.php");
$loginController = new UsersController();
$registerController = new UsersController();
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
                    break;
                
                case "connexion":
                    break;

                case "dashboard":
                    $dashboardController->dashboardPage(); //Objet appelle la méthode authPage
                    break;

                case "mesListes":
                    $wishlistsController->viewUserWishlists(); //Objet appelle la méthode authPage
                    break;
                    
                case "nouvelleListe":
                    $wishlistController->createWishlist();
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