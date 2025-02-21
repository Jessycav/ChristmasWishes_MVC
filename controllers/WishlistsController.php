<?php

require_once("./models/WishlistsModel.php");

class WishlistsController {
    
    public $wishlistsModel;

    public function __construct() {
        $this->wishlistsModel = new WishlistsModel();
    }

    public function allLists() {
        
        $wishlists = $this->wishlistsModel->getAllLists();
        require __DIR__ . '/../views/pages/allListsPage.php';
    }

    /*public function allLists() { 
        require_once ("./app/views/pages/allListsPage.php");
    }*/

    /*public function createWishlist() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $year = filter_var($_POST['wishlist_year'], FILTER_VALIDATE_INT);
            $recipient = htmlspecialchars($_POST['wishlist_recipient'], ENT_QUOTES);
            $user_id = $_SESSION['user_id'];

            if ($this->wishlistModel->createWishlist($year, $recipient, $user_id)) {
                header("Location: /dashboard");
            } else {
                echo "Erreur de création de la liste";
            }
        }
    }

    public function viewUserWishlists() {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            return $this->wishlistModel->getUserWishlists($user_id);
        }
        return [];
    }

    public function deleteWishlist($wishlist_id) {
        if (isset($_SESSION['user_id'])) {
            if ($this->wishlistModel->deleteWishlist($wishlist_id)) {
                header("Location: /dashboard");
            } else {
                echo "Erreur de suppression de la liste";
            }
        }
    }*/
}
?>
