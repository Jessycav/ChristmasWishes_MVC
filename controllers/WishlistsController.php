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

    public function showUserWishlists() {
        if (!isset($_SESSION['user_id'])) {
            header("Location:" . ROOT . "monCompte/authentification");
            exit();           
        } 
        $user_id = $_SESSION['user_id'];
        $myWishlists = $this->wishlistsModel->getUserWishlists($user_id);
        return $myWishlists;
    }
    
    public function createNewWishlist($wishlist_year, $wishlist_recipient, $user_id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $wishlist_year = filter_var($_POST['wishlist_year'], FILTER_VALIDATE_INT);
            $wishlist_recipient = htmlspecialchars($_POST['wishlist_recipient'], ENT_QUOTES);
            $user_id = $_SESSION['user_id'];
        }            
        if ($this->wishlistsModel->createWishlist($wishlist_year, $wishlist_recipient, $user_id)) {
                header("Location:" . ROOT . "monCompte/mesListes");
                exit();
            } else {
                throw new Exception("Erreur lors de la création de la liste") ;
        }
    }

    public function modifyWishlist($wishlist_id) {
        $datas = $this->wishlistsModel->getListDetailById($wishlist_id);
        include './views/pages/modifyWishlistPage.php';   
    }
    
    public function deleteWishlist($wishlist_id) {
        if ($this->wishlistsModel->deleteWishlistById($wishlist_id)) {
            header("Location:" . ROOT . "monCompte/mesListes");
            exit();
        } else {
            throw new Exception("Erreur de suppression de la liste");
        }
    }

    public function getUserWishlistsCount() {
        if (!isset($_SESSION['user_id'])) {
            return 0;
        }
        $wishlistCount = $this->wishlistsModel->countUserWishlists($_SESSION['user_id']);
        return $wishlistCount;
    }    
}