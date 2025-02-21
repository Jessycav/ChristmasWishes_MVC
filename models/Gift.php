<?php

class Gift {
    private $conn;
    private $table_name = "gift";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addGift($title, $description, $link, $image, $wishlist_id) {
        $query = "INSERT INTO " . $this->table_name . " (gift_title, gift_description, gift_link, gift_image, wishlist_id) VALUES (:title, :description, :link, :image, :wishlist_id)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":link", $link);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":wishlist_id", $wishlist_id);

        return $stmt->execute();
    }

    public function getGiftsByWishlist($wishlist_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE wishlist_id = :wishlist_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":wishlist_id", $wishlist_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGiftById($gift_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE gift_id = :gift_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":gift_id", $gift_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteGift($gift_id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE gift_id = :gift_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":gift_id", $gift_id);
        return $stmt->execute();
    }
}

?>