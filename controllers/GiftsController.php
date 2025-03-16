<?php

require_once __DIR__ . "/../models/GiftsModel.php";

class GiftsController {

    public $giftsModel;

    public function __construct() {
        $this->giftsModel = new GiftsModel();
    }

    public function showGiftsByWishlist() {
        if (!isset($_POST['wishlist_id']) || empty($_POST['wishlist_id'])) {
            throw new Exception("Erreur : ID de la liste manquant");          
        } 
        $wishlist_id = intval($_POST['wishlist_id']);
        $gifts = $this->giftsModel->getGiftsByWishlist($wishlist_id);
        require_once __DIR__ . "/../views/pages/listDetailPage.php";
    }

    public function createNewGift() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $gift_title = htmlspecialchars($_POST['gift_title']);
            $gift_description = htmlspecialchars($_POST['gift_description']);
            $gift_link = filter_var($_POST['gift_link'], FILTER_SANITIZE_URL);
            $gift_image = htmlspecialchars($_POST['gift_image']);
            $wishlist_id = $_POST['wishlist_id'];
        }            
        if ($this->giftsModel->addGift($gift_title, $gift_description, $gift_link, $gift_image, $wishlist_id)) {
            header("Location:" . ROOT . "monCompte/gestionListe/modifierListe");
            exit();
        } else {
            throw new Exception("Erreur lors de l'ajout du cadeau") ;
        }
    }

    public function deleteGift($gift_id) {
        //Récupérer l'ID de la liste avant la suppression de cadeau
        $wishlist_id = $this->giftsModel->getWishlistIdByGift($gift_id);
        if ($this->giftsModel->deleteGiftById($gift_id)) {
            header("Location:" . ROOT . "monCompte/gestionListe/modifierListe");
            exit();
        } else {
            echo "Erreur lors de la suppression du cadeau";
        }     
    }

    public function editGiftForm($gift_id) {
        $gift_id = intval($_POST['gift_id']);
        $gift = $this->giftsModel->getOneGiftById($gift_id);
        if (empty($gift)) {
            die("Cadeau introuvable");
        }
        require_once __DIR__ . '/../views/pages/editGiftPage.php'; // Page du formulaire de modification
    }    
    
    public function updateGift() {
        if (!isset($_POST['gift_id'], $_POST['gift_title'], $_POST['wishlist_id'])) {
            die("Erreur : données invalides");
        }
        $gift_id = intval($_POST['gift_id']);
        $wishlist_id = intval($_POST['wishlist_id']);
        $gift_title = htmlspecialchars($_POST['gift_title']);
        $gift_description = htmlspecialchars($_POST['gift_description'] ?? '');
        $gift_link = filter_var($_POST['gift_link'], FILTER_SANITIZE_URL) ?? '';
        $gift_image = filter_var($_POST['gift_image'], FILTER_SANITIZE_URL) ?? '';

        if ($this->giftsModel->updateGift($gift_id, $gift_title, $gift_description, $gift_link, $gift_image, $wishlist_id)) {
            header("Location:" . ROOT . "monCompte/gestionListe/modifierListe");
            exit();
        } else {
            throw new Exception("Erreur lors de la modification du cadeau");
        }
    }

    public function viewOneGiftDetail($gift_id) {
        $gift_id = intval($_POST['gift_id']);
        $oneGift = $this->giftsModel->getGiftDetailById($gift_id);
        if (empty($oneGift)) {
            die("Cadeau introuvable");
        }
        require __DIR__ . '/../views/pages/viewGiftDetailPage.php';
    }
}