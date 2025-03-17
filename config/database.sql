CREATE TABLE `user` (
  `user_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_firstname` VARCHAR(150) DEFAULT NULL,
  `user_lastname` VARCHAR(150) DEFAULT NULL,
  `email` VARCHAR(255) DEFAULT NULL,
  `password` VARCHAR(255) DEFAULT NULL,
  UNIQUE (`email`)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `wishlist` (
  `wishlist_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `wishlist_year` INT NOT NULL,
  `wishlist_recipient` VARCHAR(150) NOT NULL,
  `user_id` INT(11) DEFAULT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE `gift` (
  `gift_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `gift_title` VARCHAR(255) NOT NULL,
  `gift_description` TEXT DEFAULT NULL,
  `gift_link` VARCHAR(255) DEFAULT NULL,
  `gift_image` VARCHAR(255) DEFAULT NULL,
  `wishlist_id` INT(11) DEFAULT NULL,
  FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`wishlist_id`) ON DELETE CASCADE
) ENGINE=InnoDB CHARSET=utf8;