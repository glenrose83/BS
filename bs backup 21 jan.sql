-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2024 at 09:52 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bs`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cat` tinytext CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat`) VALUES
(2, 'headset'),
(3, 'covers'),
(4, 'chargers'),
(5, 'samsung'),
(6, 'Apple'),
(10, 'cars'),
(11, 'Monitors');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` tinyint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `code` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `discount` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `status`, `name`, `code`, `discount`) VALUES
(1, 0, '10% black friday', 'blackfriday', '');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` tinyint NOT NULL,
  `currency` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `symbol` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `status`, `currency`, `symbol`) VALUES
(0, 1, 'kroner', 'kr.');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `streetname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `housenr` int NOT NULL,
  `etc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `postcode` int NOT NULL,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `phone` int NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `ip` tinytext COLLATE utf8mb3_danish_ci NOT NULL,
  `iptwo` tinytext COLLATE utf8mb3_danish_ci,
  `ipthree` tinytext COLLATE utf8mb3_danish_ci,
  `ipfour` tinytext COLLATE utf8mb3_danish_ci,
  `browser` tinytext COLLATE utf8mb3_danish_ci NOT NULL,
  `email_subscribe` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `streetname`, `housenr`, `etc`, `postcode`, `city`, `country`, `phone`, `email`, `ip`, `iptwo`, `ipthree`, `ipfour`, `browser`, `email_subscribe`) VALUES
(1, 'Glen Rose', 'Roarsvej', 33, 'sdf', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(2, 'Malene Rose', 'Roarsvej', 33, 'sadasdad', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(3, 'LUNA Rose', 'Roarsvej', 33, 'dkflsdklf', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(4, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(5, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(6, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(7, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(8, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(9, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(10, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(11, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(12, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(13, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(14, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', '', NULL, NULL, NULL, '', NULL),
(15, 'Malene Rose', 'Egtvedvej', 2, '', 3650, 'Ølstykke', 'Denmark', 31215529, 'Mmmlene@hotmail.com', '', NULL, NULL, NULL, '', NULL),
(16, 'Din mor', 'morvej ', 3, 'sal', 2400, 'Kbh', 'Tyskland', 12451245, 'dinmo2@mor.dk', '', NULL, NULL, NULL, '', NULL),
(17, 'george', 'Geo', 1, 'suite10', 2400, 'kbh', 'DK', 123457896, 'adsfdf@fdwsf.com', '', NULL, NULL, NULL, '', NULL),
(18, 'Glen Rose', 'Egtvedvej', 2, '', 3650, 'Ølstykke', 'Danmark', 2147483647, 'glenrose83@gmail.com', '::1', NULL, NULL, NULL, 'Chrome', NULL),
(19, 'Glen Rose', 'Egtvedvej', 2, '', 3650, 'Ølstykke', 'Danmark', 2147483647, 'glenrose83@gmail.com', '::1', NULL, NULL, NULL, 'Chrome', NULL),
(20, 'Glen Rose', 'Egtvedvej', 2, '', 3650, 'Ølstykke', 'Danmark', 2147483647, 'glenrose83@gmail.com', '::1', NULL, NULL, NULL, 'Chrome', NULL),
(21, 'Glen Rose', 'Egtvedvej', 2, '', 3650, 'Ølstykke', 'Danmark', 2147483647, 'glenrose83@gmail.com', '::1', NULL, NULL, '::1', 'Chrome', NULL),
(22, 'Glen Rose', 'Egtvedvej', 2, '', 3650, 'Ølstykke', 'Danmark', 2147483647, 'glenrose83@gmail.com', '::1', NULL, NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

DROP TABLE IF EXISTS `ordered_products`;
CREATE TABLE IF NOT EXISTS `ordered_products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_orders` int NOT NULL,
  `fk_products` int NOT NULL,
  `qty` smallint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders` (`fk_orders`),
  KEY `fk_products` (`fk_products`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`id`, `fk_orders`, `fk_products`, `qty`) VALUES
(17, 13, 2, 1),
(18, 13, 4, 1),
(20, 13, 3, 1),
(21, 14, 3, 2),
(23, 15, 2, 1),
(24, 15, 3, 2),
(26, 17, 2, 1),
(27, 17, 2, 1),
(28, 18, 11, 1),
(29, 18, 12, 1),
(30, 18, 22, 1),
(31, 18, 29, 1),
(32, 19, 11, 1),
(33, 19, 12, 5),
(34, 20, 11, 1),
(35, 20, 12, 1),
(36, 20, 22, 1),
(37, 20, 29, 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_customer` int NOT NULL,
  `order_date` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `payment_method` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `delivery_method` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci,
  `status` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci,
  `date_completed` timestamp NULL DEFAULT NULL,
  `total_price` bigint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customers` (`fk_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fk_customer`, `order_date`, `payment_method`, `delivery_method`, `status`, `date_completed`, `total_price`) VALUES
(1, 1, '2021.12.28 - 11.49', 'creditcard', 'postal service', 'processed', NULL, 4186),
(2, 2, '2021.12.28 - 11.51', 'creditcard', 'pickup', 'completed', NULL, 720),
(3, 3, '2021.12.28 - 11.52', 'creditcard', 'postal service', 'processed', NULL, 4186),
(5, 8, '2022.04.04 - 11.45', 'creditcard', 'postal service', 'not handled', NULL, 360),
(6, 8, '2022.04.04 - 11.47', 'creditcard', 'postal service', 'not handled', NULL, 360),
(7, 9, '2022.04.04 - 11.50', 'creditcard', 'postal service', 'not handled', NULL, 360),
(8, 10, '2022.04.04 - 11.54', 'creditcard', 'postal service', 'not handled', NULL, 360),
(9, 11, '2022.04.04 - 13.11', 'creditcard', 'postal service', 'not handled', NULL, 360),
(10, 12, '2022.04.04 - 13.15', 'creditcard', 'postal service', 'not handled', NULL, 600),
(11, 13, '2022.04.04 - 13.17', 'creditcard', 'postal service', 'not handled', NULL, 4066),
(12, 14, '2022.04.04 - 13.20', 'creditcard', 'postal service', 'not handled', NULL, 360),
(13, 15, '2023.10.18 - 09.33', 'Wire transfer', 'postal service', 'not handled', NULL, 4426),
(14, 16, '2023.10.18 - 09.37', 'Wire transfer', 'pickup', 'not handled', NULL, 720),
(15, 17, '2023.10.19 - 12.15', 'creditcard', 'pickup', 'not handled', NULL, 4186),
(16, 18, '2024.01.08 - 12.32', 'store', 'pickup', 'not handled', NULL, 5400),
(17, 19, '2024.01.08 - 13.02', 'creditcard', 'postal service', 'not handled', NULL, 5400),
(18, 20, '2024.01.08 - 13.10', 'creditcard', 'postal service', 'not handled', NULL, 6000),
(19, 21, '2024.01.08 - 13.30', 'creditcard', 'postal service', 'not handled', NULL, 1560),
(20, 22, '2024.01.08 - 13.39', 'creditcard', 'postal service', 'not handled', NULL, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

DROP TABLE IF EXISTS `order_statuses`;
CREATE TABLE IF NOT EXISTS `order_statuses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `status`) VALUES
(1, 'not handled'),
(2, 'processed'),
(3, 'in progress');

-- --------------------------------------------------------

--
-- Table structure for table `payment_options`
--

DROP TABLE IF EXISTS `payment_options`;
CREATE TABLE IF NOT EXISTS `payment_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `options` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `payment_options`
--

INSERT INTO `payment_options` (`id`, `options`, `status`) VALUES
(1, 'Bambora', 1),
(2, 'Mobilepay', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_options_custom`
--

DROP TABLE IF EXISTS `payment_options_custom`;
CREATE TABLE IF NOT EXISTS `payment_options_custom` (
  `id` int NOT NULL AUTO_INCREMENT,
  `options` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `payment_options_custom`
--

INSERT INTO `payment_options_custom` (`id`, `options`, `info`, `status`) VALUES
(4, 'Pay when you pickup', 'Remember invoice', 1),
(2, 'Pay in 10 rates', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `productstatus` tinyint(1) NOT NULL,
  `productname` varchar(5000) CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `productdescription` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `pricesxvat` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `costprice` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `expenses` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `item` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `category` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `deliverytime` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `howmanyinstock` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `keeptrackofstock` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `allowpurchasewhenempty` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `weight` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `yournotes` varchar(5000) CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productstatus`, `productname`, `productdescription`, `pricesxvat`, `costprice`, `expenses`, `item`, `category`, `deliverytime`, `howmanyinstock`, `keeptrackofstock`, `allowpurchasewhenempty`, `weight`, `yournotes`) VALUES
(2, 0, 'Gloves', 'these are insanelt populare', '2500', '39', '2', '034889327y489', 'gloves', '1', '13', '1', '1', '3898989', ''),
(3, 1, 'Vitrineskab', 'Dette er et fint skab for vores lille hus', '300', '100', '12', '1212', 'Monitors', '1-2 days', '1', '1', '1', '5000', ''),
(4, 1, 'kiwi fresh fruit', 'This is a green kiwi', '200', '100', '13', '334345678976544', 'headset', '1-2 dats', '30', '1', '1', '3400', ''),
(55, 1, 'Mobiltelefon', 'den er rød', '2000', '1500', '5', 'sfgsdfgsertwer34444', 'samsung', '1-2 days', '10', '1', '1', '200', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fk_id` int NOT NULL,
  `name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `url` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `primary_pic` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images` (`fk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `fk_id`, `name`, `url`, `primary_pic`) VALUES
(11, 3, 'img_0170.jpg.jpeg', 'img/img_0170.jpg.jpeg', 1),
(12, 4, 'alimentarium_kiwis_0.jpg', 'img/alimentarium_kiwis_0.jpg', 1),
(13, 4, 'kiwi-1296x728-header.jpg', 'img/kiwi-1296x728-header.jpg', NULL),
(14, 4, 'Kiwi.jpeg', 'img/Kiwi.jpeg', NULL),
(22, 55, '370373889_228947550143688_4545862118780280373_n.jpg', 'img/370373889_228947550143688_4545862118780280373_n.jpg', 1),
(23, 3, '370373889_228947550143688_4545862118780280373_n.jpg', 'img/370373889_228947550143688_4545862118780280373_n.jpg', 0),
(24, 3, 'pictui.png', 'img/pictui.png', 0),
(25, 3, 'pictui.png', 'img/pictui.png', NULL),
(26, 3, '370276231_229282340110209_4803205530142750826_n (1).jpg', 'img/370276231_229282340110209_4803205530142750826_n (1).jpg', 0),
(27, 3, 'pictui.png', 'img/pictui.png', NULL),
(28, 2, '370373889_228947550143688_4545862118780280373_n.jpg', 'img/370373889_228947550143688_4545862118780280373_n.jpg', 0),
(29, 2, '370373889_228947550143688_4545862118780280373_n.jpg', 'img/handsker.jpg', 1),
(30, 2, '370276231_229282340110209_4803205530142750826_n (1).jpg', 'img/370276231_229282340110209_4803205530142750826_n (1).jpg', 0),
(31, 2, '370276231_229282340110209_4803205530142750826_n.jpg', 'img/370276231_229282340110209_4803205530142750826_n.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
CREATE TABLE IF NOT EXISTS `shipping` (
  `id` smallint NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `shippingTime` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `price` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `status`, `description`, `shippingTime`, `price`) VALUES
(7, 1, 'Bicycle', '90 days', 5),
(8, 0, 'PostNord', '1-3 days', 85),
(9, 1, 'Birdi', '1 day', 149);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `email` text CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`) VALUES
(1, 'glen', 'glenrose83@gmail.com'),
(2, 'tom', 'sfom@dfer.com'),
(3, 'kjkjk', 'kdsjfsdf@dfer.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `userpassword` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `companyname` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci,
  `address` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci,
  `zip` smallint DEFAULT NULL,
  `city` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci,
  `country` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci,
  `vat` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci,
  `phone` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci,
  `email` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `shopname` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `role` tinytext CHARACTER SET utf8mb3 COLLATE utf8mb3_danish_ci NOT NULL,
  `databasename` varchar(255) COLLATE utf8mb3_danish_ci NOT NULL,
  `ga4status` tinyint(1) DEFAULT NULL,
  `ga4tracking` tinytext COLLATE utf8mb3_danish_ci,
  `template` varchar(5000) COLLATE utf8mb3_danish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_danish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `userpassword`, `companyname`, `address`, `zip`, `city`, `country`, `vat`, `phone`, `email`, `shopname`, `role`, `databasename`, `ga4status`, `ga4tracking`, `template`) VALUES
(3, 'Glen', '$2y$10$cnGr4EvTj8rzculgTQ65I.2YHnhZ718lMnjbc6.qbtQg2oxqBxtXS', 'Webshop', 'Hagbardsvej 4', 3650, 'ølstykke', 'Denmark', '27825283', '28141529', 'glenrose83@gmail.com', 'Shopshop', 'admin', '', 1, 'UA-1510255', NULL),
(6, 'jan', '$2y$10$up102/7xVWNOU1AqDdR/qe3f11AldksjIHYd1RX5GMRHnW3i9lAo6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1212@sd.com', 'myshopper', 'admin', '', NULL, NULL, NULL),
(7, 'jan', '$2y$10$LSGvp.tAJ8j1u.NJtX45UOZITa47SC2BAwtYNlermXJ/8wbLVuy0q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfdfe@sdfe.com', 'janhouse', 'admin', '', NULL, NULL, NULL),
(8, 'shopusername', '$2y$10$2xl7B.r1Oz9zmUifxzo01eqaeOzflyoOySag6G16TDn8pR/AHtPNy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdfdfe@sdfe.com', 'Shopname', 'admin', '', NULL, NULL, NULL),
(9, 'Kenneth', '$2y$10$tqbYEiNCDFHrXv3rfZKwy.GZcrxuLmr3eV2tmtuPeXKd/T8bD4DBG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'kenneth@gmail.com', 'hundeshoppen', 'admin', '', NULL, NULL, NULL),
(10, 'jonas', '$2y$10$qJ70ParpbpLS4c5j3DoC0.0F1/WFDX2N4aJt2ETnOyqXzc6DZAyHG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jonas@xn--gmail-wra.com', 'alarmShoppen', 'admin', '', NULL, NULL, NULL),
(11, 'martin1', '$2y$10$AKpXxCK1.jZumfJymNiH..20o4K.2YYcwaJq5mwpMCZ4B9DLfqA6G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jonas@xn--gmail-wra.com', 'elestikShop1', 'admin', '', NULL, NULL, NULL),
(12, 'ken', '$2y$10$EhoCkgNvhoUSUC71kQqLZeGRJ5f7lo.DS7gZRpECw5/lpWAjnWnmm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jonas@xn--gmail-wra.com', 'skrivebordet', 'admin', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

DROP TABLE IF EXISTS `vat`;
CREATE TABLE IF NOT EXISTS `vat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(255) NOT NULL,
  `vat` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vat`
--

INSERT INTO `vat` (`id`, `country`, `vat`) VALUES
(8, 'dkkk', 25);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD CONSTRAINT `orders` FOREIGN KEY (`fk_orders`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customers` FOREIGN KEY (`fk_customer`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `images` FOREIGN KEY (`fk_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
