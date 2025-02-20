<?php

require_once ("./app/controllers/HomeController.php");
require_once ("./app/controllers/WishlistController.php");
$homeController = new HomeController(); // Instancie la classe HomeController
$wishlistController = new WishlistController();

if (empty($_GET['page'])) { //Vérifie si le paramètre page est vide
    $url[0] = "accueil"; //Renvoie une page d'accueil par défaut
} else {
    // Divise l'URL en plusieurs parties en nettoyant l'URL pour la sécurité
    $url= explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL)); 
}
/*session_start();
require_once 'config/Database.php';
$database = new Database();
$db = $database->getConnection();

require "app/controllers/UserController.php";

require "app/controllers/GiftController.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo $controller->allLists($db);
}

$userController = new UserController($db);

$GiftController = new GiftController($db);*/

try {
    switch ($url[0]) {
        case "accueil":
            $homeController->homePage(); //Objet appelle la méthode homePage
            break;

        case '/authentication':
            require_once "app/views/pages/authenticationPage.php";
            break;
        
        case "listes":
            $wishlistController->allLists();
            break;

        case '/listDetail':
            require_once "app/views/pages/listDetailPage.php";
            break;
            
        default:
            throw new Exception ("La page n'existe pas");
            break;
    }
} catch(Exception $e) {
    echo "Erreur: " . $e->getMessage();
}
?>

