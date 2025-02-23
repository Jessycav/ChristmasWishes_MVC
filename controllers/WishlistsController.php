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

    public function createWishlist() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $wishlist_year = filter_var($_POST['wishlist_year'], FILTER_VALIDATE_INT);
            $wishlist_recipient = htmlspecialchars($_POST['wishlist_recipient'], ENT_QUOTES);
            $user_id = $_SESSION['user_id'];

            if ($newWishlists = $this->wishlistsModel->createWishlist($wishlist_year, $wishlist_recipient, $user_id)) {
                header("Location: /viewMyListsPage.php");
            } else {
                echo "Erreur de création de la liste";
            }
        }
    }

    public function viewUserWishlists() {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $myWishlists = $this->wishlistsModel->getUserWishlists($user_id);
            require __DIR__ . '/../views/pages/viewMyListsPage.php';
        }
        return [];
    }

    public function viewWishlistDetail($wishlist_id) {
        return $this->wishlistsModel->getWishlistById($wishlist_id);
    }

    public function deleteWishlist($wishlist_id) {
        if (isset($_SESSION['user_id'])) {
            if ($this->wishlistsModel->deleteWishlist($wishlist_id)) {
                header("Location: /dashboard");
            } else {
                echo "Erreur de suppression de la liste";
            }
        }
    }
}
?>
