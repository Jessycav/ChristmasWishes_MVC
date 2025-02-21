<?php
require_once "app/models/Gift.php";

class GiftController {
    private $giftModel;

    public function __construct($db) {
        $this->giftModel = new Gift($db);
    }

    public function addGift() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user_id'])) {
            $title = htmlspecialchars($_POST['title']);
            $description = htmlspecialchars($_POST['description']);
            $link = filter_var($_POST['link'], FILTER_SANITIZE_URL);
            $image = htmlspecialchars($_POST['image']);
            $wishlist_id = $_POST['wishlist_id'];
            
            if ($this->giftModel->addGift($title, $description, $link, $image, $wishlist_id)) {
                header("Location: /wishlist/view?id=" . $wishlist_id);
            } else {
                echo "Erreur lors de l'ajout du cadeau";
            }
        }
    }

    public function viewGifts($wishlist_id) {
        return $this->giftModel->getGiftsByWishlist($wishlist_id);
    }

    public function deleteGift($gift_id, $wishlist_id) {
        if (isset($_SESSION['user_id'])) {
            if ($this->giftModel->deleteGift($gift_id)) {
                header("Location: /wishlist/view?id=" . $wishlist_id);
            } else {
                echo "Erreur lors de la suppression du cadeau";
            }
        }
    }

}