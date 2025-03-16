CREATE TABLE `gift` (
  `gift_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `gift_title` varchar(255) NOT NULL,
  `gift_description` text DEFAULT NULL,
  `gift_link` varchar(255) DEFAULT NULL,
  `gift_image` varchar(255) DEFAULT NULL,
  `wishlist_id` int(11) DEFAULT NULL,
  FOREIGN KEY (`wishlist_id`) REFERENCES `wishlist` (`wishlist_id`) ON DELETE CASCADE
) 

INSERT INTO `gift` VALUES (117,'DOMINO MUSIQUE','DÃ©couvrez les animaux de la jungle et les instruments de musique. ComposÃ© de 28 piÃ¨ces, ce jeu de dominos est aussi bien ludique qu&#039;Ã©ducatif. ','https://www.joueclub.fr/jeux-educatifs/domino-musique-3700217326234.html','https://joueclub-joueclub-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/fb00ebacffa75621fc50498f4c0535be3ce2381a_41138581.jpeg',30),(118,'ENSEMBLE DE 5 POCHOIRS MEGASKETCHER','Set de pochoirs marins pour prolonger l&amp;amp;#039;expÃ©rience de dessin avec votre ardoise magique Megasketcher','https://www.joueclub.fr/activites-creatives-et-manuelles/ensemble-de-5-pochoirs-megasketcher-5011666735828.html','https://joueclub-joueclub-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/89527193ec40f0854d4213e038b9c0b466f3dc96_41127885.jpeg',3),(119,'DOMINO MUSIQUE','DÃ©couvrez les animaux de la jungle et les instruments de musique. ComposÃ© de 28 piÃ¨ces, ce jeu de dominos est aussi bien ludique qu&#039;Ã©ducatif. ','https://www.joueclub.fr/jeux-educatifs/domino-musique-3700217326234.html','https://joueclub-joueclub-fr-storage.omn.proximis.com/Imagestorage/imagesSynchro/0/0/fb00ebacffa75621fc50498f4c0535be3ce2381a_41138581.jpeg',3);

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_firstname` varchar(150) DEFAULT NULL,
  `user_lastname` varchar(150) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL UNIQUE,
  `password` varchar(255) DEFAULT NULL,
) 

INSERT INTO `user` VALUES (5,'Jessyca','jess','miss_anandhi@hotmail.fr','$2y$10$krpWqPYghhBXPhbTv.DHbev1Flfih9jEZbBnGMmlMridiZxVRmNwS');

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `wishlist_year` int(4) NOT NULL,
  `wishlist_recipient` varchar(150) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE
) 

INSERT INTO `wishlist` VALUES (3,2024,'Ileana',5),(30,2024,'Chase',5);