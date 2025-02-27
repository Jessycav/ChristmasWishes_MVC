CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(150) DEFAULT NULL,
  `user_lastname` varchar(150) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL UNIQUE,
  `password` varchar(255) DEFAULT NULL
)

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `wishlist_year` int(4) NOT NULL,
  `wishlist_recipient` varchar(150) NOT NULL,
  `user_id` int(11) DEFAULT NULL
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
)

CREATE TABLE `gift` (
  `gift_id` int(11) NOT NULL,
  `gift_title` varchar(255) NOT NULL,
  `gift_description` text DEFAULT NULL,
  `gift_link` varchar(255) DEFAULT NULL,
  `gift_image` varchar(255) DEFAULT NULL,
  `wishlist_id` int(11) DEFAULT NULL
  FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`wishlist_id`) ON DELETE CASCADE
)