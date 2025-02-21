<?php

require_once ("./config/Database.php"); //Connexion à la base de données

class WishlistsModel extends Database {
    private $wishlist_id;
    private $wishlist_year;
    private $wishlist_recipient;

    public function __construct($wishlist_id = null, $wishlist_year = null, $wishlist_recipient = null) {
        $this->wishlist_id = $wishlist_id;
        $this->wishlist_year = $wishlist_year;
        $this->$wishlist_recipient = $wishlist_recipient;

    }

    public function getAllLists() {
        $sql= "SELECT * FROM wishlist";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $wishlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $wishlists;
    }
       
    /*public function getUserWishlists($user_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createWishlist($year, $recipient, $user_id) {
        $query = "INSERT INTO " . $this->table_name . " (wishlist_year, wishlist_recipient, user_id) VALUES (:year, :recipient, :user_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":year", $year);
        $stmt->bindParam(":recpient", $recipient);
        $stmt->bindParam(":user_id", $user_id);

        return $stmt->execute();
    }

    public function getWishlistById($wishlist_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE wishlist_id = :wishlist_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteWishlist($wishlist_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE wishlist_id = :wishlist_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        return $stmt->execute();
    }*/
}