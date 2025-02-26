<?php

require_once("./models/GiftsModel.php");

class GiftsController {

    public $giftsModel;

    public function __construct() {
        $this->giftsModel = new GiftsModel();
    }

    public function allGifts() {
        $gifts = $this->giftsModel->getAllGifts();
        require __DIR__ . '/../views/pages/listDetailPage.php';
    }

    public function viewGifts() {
/*         if (!isset($_SESSION['user_id'])) {
            header("Location:" . ROOT . "monCompte/authentification");
            exit();           
        } 
        $user_id = $_SESSION['user_id']; */
        $datas = $this->giftsModel->getGiftsByWishlist();
        return $datas;
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
            header("Location:" . ROOT . "monCompte/mesListes");
                exit();
            } else {
                throw new Exception("Erreur lors de l'ajout du cadeau") ;
        }
    }

    public function deleteGift($gift_id) {
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            if ($this->giftsModel->deleteGiftById($gift_id, $user_id)) {
                header("Location:" . ROOT . "monCompte/gestionListe/DetailDeMaListe" );
            } else {
                echo "Erreur lors de la suppression du cadeau";
            }
        }
    }
}