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

    public function getAllGifts() {
        $sql= "SELECT * FROM gift";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $gifts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $gifts;
    }    
    
    public function addGift($gift_title, $gift_description, $gift_link, $gift_image, $wishlist_id) {
        $sql = "INSERT INTO gift(gift_title, gift_description, gift_link, gift_image, wishlist_id) VALUES (:gift_title, :gift_description, :gift_link, :gift_image, :wishlist_id)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":gift_title", $gift_title);
        $stmt->bindParam(":gift_description", $gift_description);
        $stmt->bindParam(":gift_link", $gift_link);
        $stmt->bindParam(":gift_image", $gift_image);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        $stmt->execute();
        $addGift = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $addGift;
    }

    public function getGiftsByWishlist($wishlist_id) {
        $query = "SELECT
        gift.*,
        wishlist.wishlist_id
        FROM gift JOIN wishlist ON gift.wishlist_id = wishlist.wishlist_id
        WHERE gift.wishlist_id = :wishlist_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        $stmt->execute();
        $giftsByWishlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $giftsByWishlist;
    }

    public function getGiftById($gift_id) {
        $query = "SELECT * FROM gift WHERE gift_id = :gift_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":gift_id", $gift_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteGift($gift_id) {
        $query = "DELETE FROM gift WHERE gift_id = :gift_id";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":gift_id", $gift_id);
        return $stmt->execute();
    }
}
    /* public function getListDetail() {
        $sql = "SELECT * FROM gift WHERE wishlist_id = :wishlist_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        $stmt->execute();
        $gifts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $gifts;
    }



    public function getGiftsByWishlist($wishlist_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE wishlist_id = :wishlist_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }*/



?>