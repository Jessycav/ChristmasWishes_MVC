<?php

define("ROOT", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]));

require_once ("./controllers/HomeController.php");
$homeController = new HomeController(); // Instancie la classe HomeController grâce à l'objet homeController
require_once ("./controllers/WishlistsController.php");
$wishlistsController = new WishlistsController();

try {
    if (empty($_GET['page'])) { //Vérifie si le paramètre page est vide
        $url[0] = "accueil"; //Renvoie une page d'accueil par défaut
    } else {
        // Divise l'URL en plusieurs parties en nettoyant l'URL pour la sécurité
        $url = explode("/", filter_var($_GET["page"],FILTER_SANITIZE_URL));
    }

    switch ($url[0]) {
        case "accueil":
            $homeController->homePage(); //Objet appelle la méthode homePage
            break;
            
            default:
            throw new Exception ("La page demandée n'existe pas");

        case "listes":
            switch ($url[1]) {
                case "toutesleslistes":
                    $wishlistsController->allLists(); //Objet appelle la méthode homePage
                    break;
            }
    }    
} catch(Exception $e) {
    echo "Erreur: " . $e->getMessage();
}