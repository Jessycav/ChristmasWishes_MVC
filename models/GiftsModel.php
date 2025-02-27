<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class GiftsModel extends Database {
    private $gift_id;
    private $gift_title;
    private $gift_description;
    private $gift_link;
    private $gift_image;
    private $wishlist_id;


    public function __construct($gift_id = null, $gift_title = null, $gift_description = null, $gift_link = null, $gift_image = null, $wishlist_id = null) {
        $this->gift_id = $gift_id;
        $this->gift_title = $gift_title;
        $this->gift_description = $gift_description;
        $this->gift_link = $gift_link;
        $this->gift_image = $gift_image;
        $this->wishlist_id = $wishlist_id;
    }

    public function getGiftsByWishlist($wishlist_id) {
        $sql = "SELECT
        gift.*,
        wishlist.wishlist_id
        FROM gift INNER JOIN wishlist ON gift.wishlist_id = wishlist.wishlist_id
        WHERE gift.wishlist_id = :wishlist_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_id", $wishlist_id, PDO::PARAM_INT);
        $stmt->execute();
        $gifts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $gifts;
    }
    
    public function addGift($gift_title, $gift_description, $gift_link, $gift_image, $wishlist_id) {
        $sql = "INSERT INTO gift(gift_title, gift_description, gift_link, gift_image, wishlist_id) 
        VALUES (:gift_title, :gift_description, :gift_link, :gift_image, :wishlist_id)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":gift_title", $gift_title, PDO::PARAM_STR);
        $stmt->bindParam(":gift_description", $gift_description, PDO::PARAM_STR);
        $stmt->bindParam(":gift_link", $gift_link, PDO::PARAM_STR);
        $stmt->bindParam(":gift_image", $gift_image, PDO::PARAM_STR);
        $stmt->bindParam(":wishlist_id", $wishlist_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    }

    public function deleteGiftById($gift_id) {
        $sql = "DELETE FROM gift WHERE gift_id = :gift_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":gift_id", $gift_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true;    
    }    
    
    public function getOneGiftById($gift_id) {
        $sql = "SELECT
        gift.*,
        wishlist.wishlist_id
        FROM gift JOIN wishlist ON gift.wishlist_id = wishlist.wishlist_id
        WHERE gift_id = :gift_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":gift_id", $gift_id, PDO::PARAM_INT);
        $stmt->execute();
        $gift = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $gift;
    }    
    
    public function updateGift($gift_id, $gift_title, $gift_description, $gift_link, $gift_image) {
        $sql = "UPDATE gift SET gift_title = :gift_title, gift_description = :gift_description, gift_link = :gift_link, gift_image = :gift_image
        WHERE gift_id = :gift_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":gift_id", $gift_id, PDO::PARAM_INT);
        $stmt->bindParam(":gift_title", $gift_title, PDO::PARAM_STR);
        $stmt->bindParam(":gift_description", $gift_description, PDO::PARAM_STR);
        $stmt->bindParam(":gift_link", $gift_link, PDO::PARAM_STR);
        $stmt->bindParam(":gift_image", $gift_image, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getWishlistIdByGift($gift_id) {
        $sql = "SELECT wishlist_id FROM gift WHERE gift_id = :gift_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":gift_id", $gift_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn(); // Retourne l'ID Liste

    }    
}