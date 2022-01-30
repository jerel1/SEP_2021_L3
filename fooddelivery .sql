-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 30, 2022 at 12:56 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooddelivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

DROP TABLE IF EXISTS `cuisines`;
CREATE TABLE IF NOT EXISTS `cuisines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`) VALUES
(1, 'American'),
(2, 'Asian'),
(3, 'Beverages'),
(4, 'Burgers'),
(5, 'Chinese'),
(6, 'Dessert'),
(7, 'Fast Food'),
(8, 'Halal'),
(9, 'Healthy'),
(10, 'Indian'),
(11, 'Japanese'),
(12, 'Korean'),
(13, 'Pizza'),
(14, 'Seafood'),
(15, 'Sushi'),
(16, 'Thai'),
(17, 'Vegetarian'),
(18, 'Vietnamese'),
(19, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `user_id` int NOT NULL,
  `mobileNumber` int NOT NULL,
  `address` text NOT NULL,
  `reward_points` int DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`user_id`, `mobileNumber`, `address`, `reward_points`) VALUES
(6, 93377882, 'BLK 123 #08-103 Holland Drive Singapore(550123)', 20),
(7, 90024321, 'BLK 680 #02-901 Ang Mo Kio Avenue 3 Singapore(560680)', 64),
(21, 98538499, 'Ang Mo Kio Ave 3', 0),
(22, 91717465, 'Hougang Ave 6 ', 0),
(23, 98538499, 'Hello Ave 6', 0),
(24, 87654321, 'angmokio', 0),
(25, 98672345, 'Serangoon Ave2', 0),
(26, 9853849, 'Serangoon Ave 6', 0),
(27, 876543, 'Serangoon Ave 6', 0),
(28, 87654321, 'Mary stays at AngMoKio', 0),
(29, 87654321, 'Tharsh lives at Hougang', 0),
(32, 87654321, 'Isabella lives at sengkang', 0),
(33, 91717486, 'Skye lives at Kovan', 0),
(34, 98538499, 'Hougang street52', 0),
(35, 86409583, 'Hougang52', 0),
(36, 98538499, 'Sengkang52', 0),
(37, 98538499, 'Hougang\r\n', 0),
(38, 96304683, 'Hougang Ave 8 ', 0),
(40, 93456544, 'BLk 830 #09-102 Hougang Avenue 8', 0),
(41, 98726788, 'HOugang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int DEFAULT '0',
  `restaurant_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `restaurant` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `discount`, `restaurant_id`) VALUES
(1, 'Grilled Cajun Chicken', 'Comes with homemade mushroom sauce ', '8.90', 10, 1),
(2, 'Fried Breaded Fish ', 'Comes with tar tar sauce', '8.90', 0, 1),
(3, 'Australian Grain Fed Sirloin Steak', 'Comes with black pepper sauce ', '13.50', 0, 1),
(4, 'Grilled Chicken Aglio Olio', '', '7.90', 0, 1),
(5, 'Cajun Fries', 'Comes with nacho cheese dip', '3.90', 0, 1),
(6, '5 Pcs Chicken Buddy Meal ', '5 pcs Chicken (includes 1 drumstick & 1 wing), 5 pcs Hot & Crispy Tenders, 2 sides and 2 drinks.', '28.95', 0, 2),
(7, 'Chicken and Zinger Buddy Meal', '3 pcs Chicken (includes 1 drumstick or wing), 1 Zinger, 5 pcs Hot & Crispy Tenders, 2 sides and 2 drinks.', '28.95', 0, 2),
(8, '2 pcs Chicken Meal', '2 pcs Chicken, 3 pcs Nuggets, 1 Side and 1 Drink', '11.50', 5, 2),
(9, 'Zinger Meal ', '1 Zinger, 3 pcs Nuggets, 1 Side and 1 Drink', '11.00', 0, 2),
(10, 'BBQ Pockett Meal ', '1 BBQ Pockett, 1 Side and 1 Drink', '8.00', 0, 2),
(11, 'Cheese Fries', '', '4.00', 0, 2),
(12, 'Crispy Chicken (2pc) Extra Value Meal (M Fries)', '', '8.10', 0, 4),
(13, 'Buttermilk Crispy Chicken Extra Value Meal (M Fries)', '', '9.50', 0, 4),
(14, 'Fillet-O-Fish Extra Value Meal', '', '6.00', 0, 4),
(15, 'Double Fillet-O-Fish Extra Value Meal', '', '8.00', 0, 4),
(16, 'McSpicy® Extra Value Meal (M Fries)', '', '7.90', 0, 4),
(17, 'McWings® 4pc Extra Value Meal (M Fries)', '', '6.95', 0, 4),
(18, 'human feed size', '3 cold + 2 warm + 1 protein', '15.00', 0, 5),
(19, 'vegman feed size', '3 cold + 3 warm + no add-on protein', '12.00', 0, 5),
(20, 'j-box', 'lemon & garlic chicken, broccoli, mushroom, brown rice with sesame dressing', '11.00', 0, 5),
(22, 'Hot Plate Chicken ', 'Chicken with onions rice & kimchi', '7.30', 0, 6),
(23, 'Bibimbap', 'Rice Seaweed Carrot Cucumber Egg Kimchi Bibimbap Sauce', '6.80', 0, 6),
(24, 'Kimchi Seafood Ramen ', 'Ramen Prawn Crabstick Kimchi Egg', '6.30', 0, 6),
(25, 'Kimchi Soup + Rice ', 'Rice Chicken Meat Beancurd Enoki Mushroom Glass Noodle Egg Kimchi', '6.80', 10, 6),
(26, 'Omu Rice with Salmon ', 'Rice Salmon Egg Lettuce Ketchup Sauce', '7.30', 0, 6),
(29, 'Saba Teriyaki ', 'Mackerel with teriyaki sauce', '9.90', 0, 7),
(30, 'Oyako Don ', 'Chicken and egg rice bowl', '8.00', 0, 7),
(31, 'Tempura Udon ', 'Prawn tempura, chicken, onsen egg and spring onion', '7.50', 0, 7),
(32, 'Unatama', 'BBQ unagi (eel) with egg rice bowl', '10.00', 0, 7),
(33, 'Chicken Karaage Curry ', 'Crispy chicken served with Japanese curry', '8.50', 0, 7),
(34, 'Chawanmushi', '', '2.20', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `rider_id` int NOT NULL,
  `order_id` int NOT NULL,
  `delivery_status` varchar(20) DEFAULT 'Assigned' COMMENT 'Assigned, On Delivery, Delivered',
  `delivery_time` datetime DEFAULT NULL,
  KEY `rider_id` (`rider_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`rider_id`, `order_id`, `delivery_status`, `delivery_time`) VALUES
(17, 29, 'Delivered', '2021-10-28 10:00:00'),
(17, 30, 'Delivered', '2021-10-28 14:14:27'),
(18, 31, 'Delivered', '2021-10-28 14:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

DROP TABLE IF EXISTS `merchants`;
CREATE TABLE IF NOT EXISTS `merchants` (
  `user_id` int NOT NULL,
  `mobileNumber` int NOT NULL,
  `company` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`user_id`, `mobileNumber`, `company`) VALUES
(3, 91234567, 'Happy Meals'),
(4, 81234567, 'MeEat');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_restaurant`
--

DROP TABLE IF EXISTS `merchant_restaurant`;
CREATE TABLE IF NOT EXISTS `merchant_restaurant` (
  `merchant_id` int NOT NULL,
  `restaurant_id` int NOT NULL,
  KEY `merchant_id_idx` (`merchant_id`),
  KEY `restaurant_id_idx` (`restaurant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merchant_restaurant`
--

INSERT INTO `merchant_restaurant` (`merchant_id`, `restaurant_id`) VALUES
(3, 1),
(3, 2),
(3, 4),
(4, 5),
(4, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checked_out` tinyint(1) NOT NULL DEFAULT '0',
  `delivery_date` date DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  `status` varchar(20) DEFAULT 'unassigned' COMMENT 'only assigned or unassigned',
  PRIMARY KEY (`id`),
  KEY `customerid` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `amount`, `order_date`, `checked_out`, `delivery_date`, `delivery_time`, `status`) VALUES
(18, 7, '30.50', '2020-06-06 11:21:13', 1, '2020-06-08', '09:00:00', 'assigned'),
(19, 6, '28.70', '2020-06-06 11:48:58', 1, '2020-06-13', '14:00:00', 'assigned'),
(20, 6, '33.50', '2020-06-07 09:45:27', 1, '2020-06-07', '13:00:00', 'assigned'),
(27, 6, '24.03', '2020-06-25 11:37:24', 1, '2020-06-22', '15:00:00', 'assigned'),
(29, 6, '12.10', '2021-10-21 15:29:13', 1, '2021-10-26', '19:00:00', 'assigned'),
(30, 7, '42.00', '2021-10-21 15:32:24', 1, '2021-10-27', '14:00:00', 'assigned'),
(31, 7, '22.50', '2021-10-26 14:24:03', 1, '2021-10-27', '12:00:00', 'assigned'),
(32, 6, '57.20', '2021-10-28 14:58:35', 1, '2021-10-30', '19:00:00', 'assigned'),
(63, 6, '40.50', '2022-01-25 09:01:52', 1, '2022-01-26', '23:11:38', 'unassigned'),
(70, 6, '28.95', '2022-01-29 08:56:33', 1, '2022-01-31', '02:29:23', 'unassigned'),
(82, 6, '11.00', '2022-01-29 11:25:51', 1, '2022-01-31', '11:25:55', 'unassigned'),
(83, 6, '21.51', '2022-01-29 11:53:41', 1, '2022-01-30', '11:53:44', 'unassigned'),
(84, 6, '33.95', '2022-01-30 08:30:00', 1, '2022-01-31', '08:41:21', 'unassigned'),
(85, 6, '6.00', '2022-01-30 08:45:22', 1, '2022-01-31', '00:45:24', 'unassigned');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  KEY `orderid` (`order_id`),
  KEY `itemid` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `item_id`, `quantity`, `amount`) VALUES
(18, 22, 3, '21.90'),
(18, 26, 1, '7.30'),
(19, 29, 2, '19.80'),
(19, 1, 1, '8.90'),
(20, 8, 1, '11.50'),
(20, 9, 2, '22.00'),
(27, 1, 3, '24.03'),
(29, 29, 1, '9.90'),
(29, 34, 1, '2.20'),
(30, 19, 1, '12.00'),
(30, 18, 2, '30.00'),
(31, 12, 2, '16.20'),
(32, 31, 2, '15.00'),
(32, 32, 1, '10.00'),
(32, 34, 1, '2.20'),
(32, 18, 2, '30.00'),
(63, 3, 3, '40.50'),
(70, 6, 1, '28.95'),
(82, 20, 1, '11.00'),
(83, 3, 1, '13.50'),
(83, 1, 1, '8.01'),
(84, 6, 1, '28.95'),
(85, 14, 1, '6.00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `open_hours` time NOT NULL,
  `close_hours` time NOT NULL,
  `cuisine_id` int NOT NULL,
  `website` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `Rating` int NOT NULL,
  `Raters` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_idx` (`cuisine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `open_hours`, `close_hours`, `cuisine_id`, `website`, `image`, `address`, `Rating`, `Raters`, `status`) VALUES
(1, 'ABC Western', '10:30:00', '21:00:00', 19, 'http://www.abc-western.com', 'ABC Western.jpg', '#01-13 Amoy Street Hawker Centre Singapore(521003)', 2, 2, 0),
(2, 'KFC', '07:00:00', '21:00:00', 7, 'https://www.kfc.com.sg', 'KFC.jpg', '#02-01 Junction 8 Bishan Street 23 Singapore(541269)', 4, 2, 0),
(4, 'McDonalds', '07:00:00', '21:00:00', 7, 'https://www.mcdonalds.com.sg/', 'McDonalds.jpg', '#01-11 51 @ AMK Singapore(569120)', 3, 4, 0),
(5, 'Saladbrate', '11:00:00', '20:00:00', 9, 'http://letsaladbrate.sg', 'Saladbrate.jpg', '#03-01 Nex Shopping Centre Singapore(581021)', 3, 4, 0),
(6, 'Seoul Good', '10:00:00', '22:00:00', 12, 'http://itzseoulgood.com', 'Seoul Good.jpg', '#02-03 AMK Hub Singapore(569188)', 2, 4, 0),
(7, 'Ichiban', '10:30:00', '21:30:00', 11, 'http://www.ichiban.sg', 'Ichiban.jpg', '#04-05 Suntec Shopping Centre Tower 3 Singapore(590100)', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

DROP TABLE IF EXISTS `rewards`;
CREATE TABLE IF NOT EXISTS `rewards` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `cash_value` int NOT NULL,
  `redeem_points` int NOT NULL,
  `availability` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`id`, `description`, `cash_value`, `redeem_points`, `availability`) VALUES
(1, '$5 voucher to be grabbed!', 5, 10, 48),
(2, '$10 voucher to be grabbed!', 10, 20, 28),
(3, '$15 voucher to be grabbed!', 15, 30, 8),
(4, '$20 voucher to be grabbed!', 20, 40, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reward_redemption`
--

DROP TABLE IF EXISTS `reward_redemption`;
CREATE TABLE IF NOT EXISTS `reward_redemption` (
  `reward_id` int NOT NULL,
  `user_id` int NOT NULL,
  `redeemed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `has_used` tinyint(1) NOT NULL DEFAULT '0',
  KEY `reward_id` (`reward_id`),
  KEY `userid` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reward_redemption`
--

INSERT INTO `reward_redemption` (`reward_id`, `user_id`, `redeemed_on`, `has_used`) VALUES
(1, 7, '2020-05-27 07:14:54', 1),
(2, 6, '2020-05-27 07:19:03', 0),
(1, 6, '2020-05-27 07:19:08', 0),
(2, 7, '2020-06-06 02:02:59', 0),
(4, 7, '2020-06-06 02:59:33', 0),
(3, 6, '2022-01-12 09:33:48', 0);

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

DROP TABLE IF EXISTS `riders`;
CREATE TABLE IF NOT EXISTS `riders` (
  `user_id` int NOT NULL,
  `mobile_number` int NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `account_number` varchar(30) NOT NULL,
  `amount_earned` decimal(10,2) DEFAULT '0.00',
  `amount_withdrawn` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`user_id`, `mobile_number`, `vehicle_number`, `account_number`, `amount_earned`, `amount_withdrawn`) VALUES
(17, 81223365, 'FBH128A', '122-555-666-8', '12.40', '1.10'),
(18, 98336472, 'FBD2744D', '188-445-300-0', '2.26', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(20) NOT NULL,
  `profilepic` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `profilepic`) VALUES
(1, 'Admin', 'admin@fooddelivery.com', '58cebe28bb9556797af9436279b24680', 'admin', ''),
(3, 'Irene Lee', 'irene.lee@happymeals.com', '240475ca9c63c7141557dd00ab358d89', 'merchant', ''),
(4, 'Ben Joe', 'benjoe@meeat.com', '825d63a06cba239d3a305bb1a5622402', 'merchant', ''),
(6, 'Adam', 'adam@hotmail.com', '27b00d7dbc99124d1446740c9abd2aa1', 'customer', 'background.jpg'),
(7, 'Stephen Ong', 'stephen@gmail.com', '081c89b33fe1cd7aff65d9db6c15b60e', 'customer', ''),
(17, 'Kenneth Loh', 'ken@gmail.com', 'ccae7a2d10418ced10865b1592ab6c58', 'rider', ''),
(18, 'Ronald Lee', 'ronald@gmail.com', 'f912fad688c7079f38ef9921ac51588e', 'rider', ''),
(21, 'Tharshini', 'Tharshini@gmail.com', '86e529f55a08bdd0e3b8ee5152c30cbc', 'customer', ''),
(22, 'Mary Lim', 'Mary@gmail.com', '61f619f70f21acf46f4848e0768715fe', 'customer', ''),
(23, 'Tharshini', '202415x@mymail.nyp.edu.sg', 'd0aabe9a362cb2712ee90e04810902f3', 'customer', ''),
(24, 'Mary Lim', '202415x@mymail.nyp.edu.sg', 'ff71c50443f247fa7715f9b1a55c79eb', 'customer', ''),
(25, 'isabella', 'isabella@gmail.com', '2a89caee7060a126de8474c65a5e7979', 'customer', ''),
(26, 'Mary Lim', '202415x@mymail.nyp.edu.sg', '5302340b10d388e08ed7e41a66c4bd38', 'customer', ''),
(27, 'Mary Lim', '202415x@mymail.nyp.edu.sg', 'e4a6c0f023f0d091b951f22371fe5d31', 'customer', ''),
(28, 'Mary Lim', 'Mary02@gmail.com', 'a6483cbb774da30bad9b1ac1ab83f1e5', 'customer', ''),
(29, 'Tharshini', '202415x@mymail.nyp.edu.sg', 'a6483cbb774da30bad9b1ac1ab83f1e5', 'customer', ''),
(30, 'isabella', 'Isabella@gmail.com', 'a6483cbb774da30bad9b1ac1ab83f1e5', 'customer', ''),
(31, 'isabella', 'Isabella@gmail.com', 'bd64eb6e30c644cbe057fefc4a26a840', 'customer', ''),
(32, 'isabella', 'Isabella@gmail.com', '8abd727bed961e942f0fa25aa9b25f33', 'customer', ''),
(33, 'Skye', 'Skye@gmail.com', 'e92fa9813baacf5cbfc6f30506ba507b', 'customer', ''),
(34, 'Isaballe', 'Tharshini@gmail.com', 'a6483cbb774da30bad9b1ac1ab83f1e5', 'customer', ''),
(35, 'Tharshini', 'tharshini@gmail.com', 'a6483cbb774da30bad9b1ac1ab83f1e5', 'customer', ''),
(36, 'Tharshini', 'Tharshini@gmail.com', 'a6483cbb774da30bad9b1ac1ab83f1e5', 'customer', ''),
(37, 'Mary Lim', 'Mary@gmail.com', 'a6483cbb774da30bad9b1ac1ab83f1e5', 'customer', ''),
(38, 'Tharshini', 'Tharshini2003@gmail.com', 'a6483cbb774da30bad9b1ac1ab83f1e5', 'customer', ''),
(39, 'kcwnqiox', 'tharsh@gmail', 'ff71c50443f247fa7715f9b1a55c79eb', 'customer', ''),
(40, 'Macro', 'macro@yahoo.com', 'a6483cbb774da30bad9b1ac1ab83f1e5', 'customer', ''),
(41, 'Elisa', 'Elisa@gmail.com', 'cad1d27b8b775bde432f18f4d7f02792', 'customer', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `restaurant` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`rider_id`) REFERENCES `riders` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `merchants`
--
ALTER TABLE `merchants`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `merchant_restaurant`
--
ALTER TABLE `merchant_restaurant`
  ADD CONSTRAINT `merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customerid` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `itemid` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderid` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `cuisine_id` FOREIGN KEY (`cuisine_id`) REFERENCES `cuisines` (`id`);

--
-- Constraints for table `reward_redemption`
--
ALTER TABLE `reward_redemption`
  ADD CONSTRAINT `reward_id` FOREIGN KEY (`reward_id`) REFERENCES `rewards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `customers` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `riders`
--
ALTER TABLE `riders`
  ADD CONSTRAINT `riders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
