<!-- Fichier routeur point d'entrée de l'application -->
<?php
ini_set('display_errors',1);
ini_set('display_stratup_errors', 1);
error_reporting(E_ALL);

session_start(); // Démarre une session
// Vérifier si un utilisateur est connecté -<stockage dans la variable $user_id
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

/* Définir l'URL de base du projet avec : 
-> détection site HTTP ou HTTPS
-> récupération du nom de domaine 
-> récupération URL complète */
define("ROOT", (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] === "on" ? "https" : "http") . "://" . $_SERVER["HTTP_HOST"] . "/");

// Chargement des controlleurs
require_once __DIR__ . "/../controllers/HomeController.php";
$homeController = new HomeController(); // Instancie le controleur en objet
require_once __DIR__ . "/../controllers/WishlistsController.php";
$wishlistsController = new WishlistsController();
require_once __DIR__ . "/../controllers/AuthController.php";
$authController = new AuthController();
require_once __DIR__ . "/../controllers/UsersController.php";
$usersController = new UsersController();
require_once __DIR__ . "/../controllers/GiftsController.php";
$giftsController = new GiftsController();

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
                    $wishlist_id = isset($_POST['wishlist_id']) ? htmlentities($_POST['wishlist_id']) :
                    (isset($_GET['id']) ? htmlentities($_GET['id']) : null);
                    $giftsController->showGiftsByWishlist();
                    break;
                default:
                    throw new Exception ("La page Listes demandée n'existe pas");
            }
            break;

        case "monCompte":
            require_once __DIR__ . "/../indexComponents/usersIndex.php";
            break;
                  
        default:
            throw new Exception ("La page demandée n'existe pas");        
    }

} catch(Exception $e) {
    echo "Erreur: " . $e->getMessage();
}
