<?php

require_once './config/Database.php'; //Connexion à la base de données

class WishlistModel {
    private $conn;

    public function getAllLists() {
        $sql= "SELECT * FROM wishlist";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $wishlists = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

?>