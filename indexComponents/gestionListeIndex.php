<?php

// visible si $url[0] = monCompte et $url[1] = gestionListe


switch($url[2]) {
/*                         case "detailDeMaListe":
            $wishlist_id = htmlentities($_POST['wishlist_id']);
            $giftsController->viewGifts($wishlist_id);
            break;
*/
    case "nouvelleListe":
        $wishlist_year = filter_var($_POST['wishlist_year'], FILTER_VALIDATE_INT);
        $wishlist_recipient = htmlspecialchars($_POST['wishlist_recipient'], ENT_QUOTES);
        $user_id = $_SESSION['user_id'];                            
        //Sécuriser les informations
        if(empty($wishlist_year) || empty($wishlist_recipient)) {
            throw new Exception("Tous les champs sont requis");
        }
        $wishlistsController->createNewWishlist($wishlist_year, $wishlist_recipient, $user_id);
        break;

    case "modifierListe":
        // Récupérer wishlist_id même après une redirection
        //On teste la requête POST sinon on utilise GET
        $wishlist_id = isset($_POST['wishlist_id']) ? htmlentities($_POST['wishlist_id']) :
        (isset($_GET['id']) ? htmlentities($_GET['id']) : null);
        $wishlistsController->modifyWishlist($wishlist_id);
        break;
        
    case "supprimerListe":
        $wishlist_id = htmlentities($_POST['wishlist_id']);
        $wishlistsController->deleteWishlist($wishlist_id);
        break;

    case "nouveauCadeau":
        $gift_title = htmlspecialchars($_POST['gift_title'], ENT_QUOTES);
        $gift_description = htmlspecialchars($_POST['gift_description'], ENT_QUOTES);
        $gift_link = htmlspecialchars($_POST['gift_link'], ENT_QUOTES);
        $gift_image = htmlspecialchars($_POST['gift_image'], ENT_QUOTES);                          
        $wishlist_id = htmlentities($_POST['wishlist_id']);

        //Sécuriser les informations
        if(empty($gift_title) || empty($gift_description)) {
            throw new Exception("Tous les champs sont requis");
        }
        $giftsController->createNewGift();
        break;

    case "supprimerCadeau":
        $gift_id = htmlentities($_POST['gift_id']);
        $giftsController->deleteGift($gift_id);
        break;

    case "modifierCadeau":
        $gift_id = intval($_POST['gift_id']);
        if (isset($_POST['gift_id']) && !empty($_POST['gift_id'])) {
            
            $giftsController->editGiftForm($gift_id);
        } else {
            die("Erreur : ID du cadeau manquant");
        } 
        break;

    case "updateCadeau":
        if($_SERVER["REQUEST_METHOD"] === "POST") {
            $giftsController->updateGift();
        } else {
            echo "Accès interdit";
        }
        break;
    
    default:
        throw new Exception ("La page Gestion Liste demandée n'existe pas");
}