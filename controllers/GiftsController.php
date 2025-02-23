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

    public function viewGifts($wishlist_id) {
        $giftsByWishlist = $this->giftsModel->getGiftsByWishlist($wishlist_id);
        require __DIR__ . '/../views/pages/listDetailPage.php';
    }

    public function addGift() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $gift_title = htmlspecialchars($_POST['gift_title']);
            $gift_description = htmlspecialchars($_POST['gift_description']);
            $gift_link = filter_var($_POST['gift_link'], FILTER_SANITIZE_URL);
            $gift_image = htmlspecialchars($_POST['gift_image']);
            $wishlist_id = $_POST['wishlist_id'];
            
            if ($this->giftsModel->addGift($gift_title, $gift_description, $gift_link, $gift_image, $wishlist_id)) {
                header("Location: /wishlist");
            } else {
                echo "Erreur lors de l'ajout du cadeau";
            }
        }
    }
    public function deleteGift($gift_id, $wishlist_id) {
        if (isset($_SESSION['user_id'])) {
            if ($this->giftsModel->deleteGift($gift_id)) {
                header("Location: /wishlist/view?id=" . $wishlist_id);
            } else {
                echo "Erreur lors de la suppression du cadeau";
            }
        }
    }
}