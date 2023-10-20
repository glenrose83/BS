-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 22, 2022 at 12:05 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basicshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat` tinytext COLLATE utf8mb4_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

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

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `status` tinyint(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_danish_ci NOT NULL,
  `code` text COLLATE utf8_danish_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `status`, `name`, `code`, `discount`) VALUES
(1, 1, '10% black friday', 'blackfriday', '');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `currency` text COLLATE utf8_danish_ci NOT NULL,
  `symbol` tinytext COLLATE utf8_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `status`, `currency`, `symbol`) VALUES
(0, 1, 'American Dollers', '$');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `streetname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `housenr` int(11) NOT NULL,
  `etc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `postcode` int(11) NOT NULL,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_danish_ci NOT NULL,
  `email_subscribe` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `streetname`, `housenr`, `etc`, `postcode`, `city`, `country`, `phone`, `email`, `email_subscribe`) VALUES
(1, 'Glen Rose', 'Roarsvej', 33, 'sdf', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(2, 'Malene Rose', 'Roarsvej', 33, 'sadasdad', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(3, 'LUNA Rose', 'Roarsvej', 33, 'dkflsdklf', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(4, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(5, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(6, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(7, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(8, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(9, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(10, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(11, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(12, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(13, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL),
(14, 'Glen Rose', 'Roarsvej', 33, '', 3650, 'Ølstykke', 'Denmark', 28141529, 'glenrose83@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `id` int(11) NOT NULL,
  `fk_orders` int(11) NOT NULL,
  `Item` int(11) NOT NULL,
  `qty` smallint(6) NOT NULL,
  `price` smallint(6) DEFAULT NULL,
  `name` text COLLATE utf8_danish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`id`, `fk_orders`, `Item`, `qty`, `price`, `name`) VALUES
(1, 1, 2, 1, 0, ''),
(2, 1, 26, 1, 0, ''),
(3, 1, 8, 1, 0, ''),
(4, 2, 2, 1, 0, ''),
(5, 2, 26, 1, 0, ''),
(6, 3, 2, 4, 0, ''),
(7, 3, 26, 3, 0, ''),
(8, 3, 8, 3, 0, ''),
(9, 8, 26, 5, 300, NULL),
(10, 9, 26, 6, 300, 'Vitrineskab'),
(11, 10, 26, 3, 300, 'Vitrineskab'),
(12, 10, 31, 1, 200, 'kiwi fresh fruit'),
(13, 11, 26, 1, 300, 'Vitrineskab'),
(14, 11, 31, 1, 200, 'kiwi fresh fruit'),
(15, 11, 8, 3, 2888, 'Gloves'),
(16, 12, 26, 3, 300, 'Vitrineskab');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fk_customer` int(11) NOT NULL,
  `order_date` tinytext COLLATE utf8_danish_ci NOT NULL,
  `payment_method` tinytext COLLATE utf8_danish_ci NOT NULL,
  `delivery_method` tinytext COLLATE utf8_danish_ci NOT NULL,
  `status` tinytext COLLATE utf8_danish_ci,
  `date_completed` timestamp NULL DEFAULT NULL,
  `total_price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fk_customer`, `order_date`, `payment_method`, `delivery_method`, `status`, `date_completed`, `total_price`) VALUES
(1, 1, '2021.12.28 - 11.49', 'creditcard', 'postal service', 'completed', NULL, 4186),
(2, 2, '2021.12.28 - 11.51', 'creditcard', 'pickup', 'completed', NULL, 720),
(3, 3, '2021.12.28 - 11.52', 'creditcard', 'postal service', 'Handling', NULL, 4186),
(5, 8, '2022.04.04 - 11.45', 'creditcard', 'postal service', 'not handled', NULL, 360),
(6, 8, '2022.04.04 - 11.47', 'creditcard', 'postal service', 'not handled', NULL, 360),
(7, 9, '2022.04.04 - 11.50', 'creditcard', 'postal service', 'not handled', NULL, 360),
(8, 10, '2022.04.04 - 11.54', 'creditcard', 'postal service', 'not handled', NULL, 360),
(9, 11, '2022.04.04 - 13.11', 'creditcard', 'postal service', 'not handled', NULL, 360),
(10, 12, '2022.04.04 - 13.15', 'creditcard', 'postal service', 'not handled', NULL, 600),
(11, 13, '2022.04.04 - 13.17', 'creditcard', 'postal service', 'not handled', NULL, 4066),
(12, 14, '2022.04.04 - 13.20', 'creditcard', 'postal service', 'not handled', NULL, 360);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productstatus` tinyint(1) NOT NULL,
  `productname` varchar(5000) COLLATE utf8_danish_ci NOT NULL,
  `productdescription` text COLLATE utf8_danish_ci NOT NULL,
  `pricesxvat` text COLLATE utf8_danish_ci NOT NULL,
  `costprice` text COLLATE utf8_danish_ci NOT NULL,
  `expenses` text COLLATE utf8_danish_ci NOT NULL,
  `item` longtext COLLATE utf8_danish_ci NOT NULL,
  `category` text COLLATE utf8_danish_ci NOT NULL,
  `deliverytime` tinytext COLLATE utf8_danish_ci NOT NULL,
  `howmanyinstock` longtext COLLATE utf8_danish_ci NOT NULL,
  `keeptrackofstock` tinytext COLLATE utf8_danish_ci NOT NULL,
  `allowpurchasewhenempty` tinytext COLLATE utf8_danish_ci NOT NULL,
  `weight` tinytext COLLATE utf8_danish_ci NOT NULL,
  `yournotes` varchar(5000) COLLATE utf8_danish_ci NOT NULL,
  `front_img` text COLLATE utf8_danish_ci,
  `image` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productstatus`, `productname`, `productdescription`, `pricesxvat`, `costprice`, `expenses`, `item`, `category`, `deliverytime`, `howmanyinstock`, `keeptrackofstock`, `allowpurchasewhenempty`, `weight`, `yournotes`, `front_img`, `image`) VALUES
(2, 1, 'keyboard', 'nice golden keyboard', '300', '12', '11', '2343125245345gsd5', '', '1-2 days', '10', '1', '0', '2444', 'no notes', '', 1),
(8, 1, 'Gloves', 'these are insanelt populare', '2888', '39', '2', '034889327y489', 'gloves', '1', '13', '1', '1', '3898989', '', '', 1),
(26, 1, 'Vitrineskab', 'Dette er et fint skab for vores lille hus', '300', '100', '12', '1212', 'tøj', '1-2 days', '1', '0', '0', '5000', '', 'img/img_0170.jpg.jpeg', 1),
(31, 1, 'kiwi fresh fruit', 'This is a green kiwi', '200', '100', '13', '334345678976544', 'headset', '1-2 dats', '30', '1', '1', '3400', '', NULL, 0),
(32, 1, 'dfsdf', 'sdfsdf', '', '', '', 'sdfsdf', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 0),
(33, 1, '1111', 'sdfsdf', '', '', '', 'sdfsdf', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 0),
(34, 1, 'asdasd', 'asdasd', '12312424324', '', '', '12312333dddd', 'phones', '2323', '222222', '1', '1', '', '', NULL, 0),
(35, 1, 'sdfsdf', 'sdfsdf', '', '', '', 'asdasd', 'covers', '12', '23', '1', '1', '', '', NULL, 1),
(36, 1, 'sdfsdf', 'sdfsdf', '', '', '', 'asdasd', 'covers', '12', '23', '1', '1', '', '', NULL, 0),
(37, 1, 'sdfsdf', 'sdfsdf', '', '', '', 'asdasd', 'covers', '12', '23', '1', '1', '', '', NULL, 0),
(38, 1, 'sdfsdf', 'sdfsdf', '', '', '', 'asdasd', 'covers', '12', '23', '1', '1', '', '', NULL, 0),
(39, 1, 'sdfsdf', 'sdfsdf', '', '', '', 'asdasd', 'covers', '12', '23', '1', '1', '', '', NULL, 0),
(40, 1, 'sdfsdf', 'sdfsdf', '', '', '', 'asdasd', 'covers', '12', '23', '1', '1', '', '', NULL, 0),
(41, 1, 'sdfsdf', 'sdfsdf', '', '', '', 'asdasd', 'covers', '12', '23', '1', '1', '', '', NULL, 0),
(42, 1, 'sadasd', 'asdasd', '22222', '', '', '12312333ddddasdasdasd', 'covers', 'asdasdasd', '', '1', '1', '', '', NULL, 0),
(43, 1, 'sdfsdfsdf', 'sdfsdfsdf', '2323', '', '', 'asdasd', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 0),
(44, 1, 'sdfsdfsdf', 'sdfsdfsdf', '2323', '', '', 'asdasd', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 1),
(45, 1, 'sdfsdfsdf', 'sdfsdfsdf', '2323', '', '', 'asdasd', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 9),
(46, 1, 'sdfsdfsdf', 'sdfsdfsdf', '2323', '', '', 'asdasd', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 8),
(47, 1, 'sdfsdfsdf', 'sdfsdfsdf', '2323', '', '', 'asdasd', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 0),
(48, 1, 'sdfsdfsdf', 'sdfsdfsdf', '2323', '', '', 'asdasd', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 7),
(49, 1, 'sdfsdfsdf', 'sdfsdfsdf', '2323', '', '', 'asdasd', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 7),
(50, 1, 'sdfsdfsdf', 'sdfsdfsdf', '2323', '', '', 'asdasd', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 7),
(51, 1, 'sdfsdfsdf', 'sdfsdfsdf', '2323', '', '', 'asdasd', 'headset', 'sdfsdfsdf', '', '1', '1', '', '', NULL, 7),
(52, 1, 'new screen', 'nice moinsjugn', '25000', '', '', 'dfsfsdfsdf', 'phones', '130', '', '1', '1', '', '', NULL, 7),
(53, 1, 'Monitor Samsung', 'no idea', '4000', '', '', 'sodkfkdjfg9', 'chargers', '10', '2', '1', '1', '', '', NULL, 0),
(54, 1, 'Acer monitor', 'there is no news', '2000', '', '', 'dfgfdgfdg', 'samsung', '1-2', '222222', '1', '1', '', '', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `fk_id` int(11) NOT NULL,
  `name` text COLLATE utf8_danish_ci NOT NULL,
  `url` text COLLATE utf8_danish_ci NOT NULL,
  `primary_pic` text COLLATE utf8_danish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `fk_id`, `name`, `url`, `primary_pic`) VALUES
(11, 26, 'img_0170.jpg.jpeg', 'img/img_0170.jpg.jpeg', NULL),
(12, 31, 'alimentarium_kiwis_0.jpg', 'img/alimentarium_kiwis_0.jpg', NULL),
(13, 31, 'kiwi-1296x728-header.jpg', 'img/kiwi-1296x728-header.jpg', NULL),
(14, 31, 'Kiwi.jpeg', 'img/Kiwi.jpeg', NULL),
(15, 51, 'dcreen.jpeg', 'img/dcreen.jpeg', NULL),
(16, 52, 'download.jpeg', 'img/download.jpeg', NULL),
(17, 2, 'ca-curved-cf390-46-lc27f396fhnxza-512429305.webp', 'img/ca-curved-cf390-46-lc27f396fhnxza-512429305.webp', 'img/ca-curved-cf390-46-lc27f396fhnxza-512429305.webp'),
(18, 2, '43 samsung.jpeg', 'img/43 samsung.jpeg', NULL),
(19, 8, 'colored samsung.jpeg', 'img/colored samsung.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` smallint(6) NOT NULL,
  `status` int(11) NOT NULL,
  `description` text COLLATE utf8_danish_ci NOT NULL,
  `shippingTime` text COLLATE utf8_danish_ci NOT NULL,
  `price` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `status`, `description`, `shippingTime`, `price`) VALUES
(7, 0, 'Bicycle', '90 days', 5),
(8, 0, 'PostNord', '1-3 days', 85),
(9, 1, 'Birdi', '1 day', 149);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_danish_ci NOT NULL,
  `email` text COLLATE utf8_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

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

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` tinytext COLLATE utf8_danish_ci NOT NULL,
  `userpassword` tinytext COLLATE utf8_danish_ci NOT NULL,
  `companyname` tinytext COLLATE utf8_danish_ci,
  `address` tinytext COLLATE utf8_danish_ci,
  `zip` smallint(4) DEFAULT NULL,
  `city` tinytext COLLATE utf8_danish_ci,
  `country` tinytext COLLATE utf8_danish_ci,
  `vat` tinytext COLLATE utf8_danish_ci,
  `phone` tinytext COLLATE utf8_danish_ci,
  `email` tinytext COLLATE utf8_danish_ci NOT NULL,
  `shopname` tinytext COLLATE utf8_danish_ci NOT NULL,
  `role` tinytext COLLATE utf8_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_danish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `userpassword`, `companyname`, `address`, `zip`, `city`, `country`, `vat`, `phone`, `email`, `shopname`, `role`) VALUES
(3, 'Glen', '$2y$10$cnGr4EvTj8rzculgTQ65I.2YHnhZ718lMnjbc6.qbtQg2oxqBxtXS', 'Webshop', 'Hagbardsvej 4', 3650, 'ølstykke', 'Denmark', '27825283', '28141529', 'glenrose83@gmail.com', 'Shopshop', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders` (`fk_orders`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers` (`fk_customer`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images` (`fk_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
