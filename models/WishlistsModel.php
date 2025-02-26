<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class WishlistsModel extends Database {
    private $wishlist_id;
    private $wishlist_year;
    private $wishlist_recipient;
    private $user_id;

    public function __construct($wishlist_id = null, $wishlist_year = null, $wishlist_recipient = null, $user_id = null) {
        $this->wishlist_id = $wishlist_id;
        $this->wishlist_year = $wishlist_year;
        $this->wishlist_recipient = $wishlist_recipient;
        $this->user_id = $user_id;
    }

    public function getAllLists() {
        $sql= "SELECT * FROM wishlist";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $wishlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $wishlists;
    }   

    public function getUserWishlists($user_id) {
        $sql = "SELECT * FROM wishlist WHERE user_id = :user_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $myWishlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $myWishlists;
    } 

    public function createWishlist($wishlist_year, $wishlist_recipient, $user_id) {
        $sql = "INSERT INTO wishlist (wishlist_year, wishlist_recipient, user_id) 
        VALUES (:wishlist_year, :wishlist_recipient, :user_id)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_year", $wishlist_year, PDO::PARAM_INT);
        $stmt->bindParam(":wishlist_recipient", $wishlist_recipient, PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $newWishlist = $stmt->execute();
        $stmt->closeCursor(); 
        return $newWishlist;     
    }    

    public function deleteWishlistById($wishlist_id) {
        $sql = "DELETE FROM wishlist WHERE wishlist_id = :wishlist_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_id", $wishlist_id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
        return true;
    }  
    
    public function getListDetailById($wishlist_id) {
        $sql = "SELECT
        gift.*,
        wishlist.wishlist_id
        FROM gift INNER JOIN wishlist ON gift.wishlist_id = wishlist.wishlist_id
        WHERE gift.wishlist_id = :wishlist_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_id", $wishlist_id, PDO::PARAM_INT);
        $stmt->execute();
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $datas;
    }
    
/*     public function getWishlistById($wishlist_id) {
        $sql = "SELECT * FROM wishlist WHERE wishlist_id = :wishlist_id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":wishlist_id", $wishlist_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } */
}    


       