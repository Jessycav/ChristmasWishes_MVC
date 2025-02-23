<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class WishlistsModel extends Database {
    private $wishlist_id;
    private $wishlist_year;
    private $wishlist_recipient;

    public function __construct($wishlist_id = null, $wishlist_year = null, $wishlist_recipient = null) {
        $this->wishlist_id = $wishlist_id;
        $this->wishlist_year = $wishlist_year;
        $this->wishlist_recipient = $wishlist_recipient;
    }

    public function getAllLists() {
        $sql= "SELECT * FROM wishlist";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $wishlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $wishlists;
    }   
    
    public function createWishlist($wishlist_year, $wishlist_recipient, $user_id) {
        $sql = "INSERT INTO wishlist(wishlist_year, wishlist_recipient, user_id) VALUES (:wishlist_year, :wishlist_recipient, :user_id)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_year", $wishlist_year);
        $stmt->bindParam(":wishlist_recipient", $wishlist_recipient);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        $newWishlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $newWishlists;
    }    
    
    public function getUserWishlists($user_id) {
        $sql = "SELECT * FROM user WHERE user_id = :user_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        $myWishlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $myWishlists;
    }    

    public function getWishlistById($wishlist_id) {
        $sql = "SELECT * FROM wishlist WHERE wishlist_id = :wishlist_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_id", $wishlist_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteWishlist($wishlist_id) {
        $sql = "DELETE FROM wishlist WHERE wishlist_id = :wishlist_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        return $stmt->execute();
    }
}    

/*public function getListDetail() {
        $sql = "SELECT * FROM gift WHERE wishlist_id = :wishlist_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        $stmt->execute();
        $wishlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $wishlists;
    }*/
       