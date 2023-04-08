-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table user_db.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE armscii8_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table user_db.categories: ~4 rows (approximately)
INSERT INTO `categories` (`id`, `category_name`) VALUES
	(1, 'Cigarettes'),
	(2, 'Beverages'),
	(3, 'Bath & Body'),
	(4, 'Foods & Snacks');

-- Dumping structure for table user_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE armscii8_bin NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(255) COLLATE armscii8_bin NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table user_db.products: ~3 rows (approximately)
INSERT INTO `products` (`product_id`, `product_name`, `quantity`, `price`, `category`) VALUES
	(1, 'Marlboro', 600, 37000, 'Cigarettes'),
	(2, 'Sampoerna', 500, 32000, 'Cigarettes'),
	(3, 'Sprite', 500, 3500, 'Beverages');

-- Dumping structure for table user_db.user_form
CREATE TABLE IF NOT EXISTS `user_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE armscii8_bin NOT NULL DEFAULT '',
  `email` varchar(50) COLLATE armscii8_bin NOT NULL DEFAULT '',
  `password` varchar(50) COLLATE armscii8_bin NOT NULL DEFAULT '',
  `image` varbinary(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

-- Dumping data for table user_db.user_form: ~3 rows (approximately)
INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `image`) VALUES
	(1, 'ryan130302', 'nicholasrgunawan@gmail.com', 'f6c8dd4a2b43431769872eb50f4f486a', _binary 0x70726f66696c655f312e6a7067),
	(2, 'admin', 'admin@mail.com', '5f4dcc3b5aa765d61d8327deb882cf99', _binary 0x64656661756c742e706e67),
	(3, 'Rai Dzikri', 'rai.dzikri.n999@gmail.com', 'ffb523ff233449e21cd37a761c6d62c7', _binary 0x70726f66696c655f322e6a7067);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
