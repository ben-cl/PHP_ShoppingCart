-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2018 at 04:31 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store2`
--

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

DROP TABLE IF EXISTS `store_categories`;
CREATE TABLE IF NOT EXISTS `store_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(50) DEFAULT NULL,
  `cat_desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `cat_title`, `cat_desc`) VALUES
(1, 'Hats', 'Funky hats in all shapes and sizes!'),
(2, 'Shirts', 'From t-shirts to sweatshirts to polo shirts and beyond'),
(3, 'Books', 'Paperback, hardback, books for school or play ');

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

DROP TABLE IF EXISTS `store_items`;
CREATE TABLE IF NOT EXISTS `store_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `item_title` varchar(75) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `item_desc` text,
  `item_image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `cat_id`, `item_title`, `item_price`, `item_desc`, `item_image`) VALUES
(1, 1, 'Baseball Hat', 12, 'Fancy, low-profile baseball hat.', 'baseballhat.jpg'),
(2, 1, 'Cowboy hat', 52, '10 gallon variety', 'cowboyhat.jpg'),
(3, 1, 'Top Hat', 102, 'good for costumes', 'tophat.jpg'),
(4, 2, 'Short-Sleeved T-Shirt', 12, '100% cotton, pre-shrunk', 'sstshirt.jpg'),
(5, 2, 'Long-Sleeved T-Shirt', 15, 'Just like the short-sleeved shirt, with longer sleeves', 'lstshirt.gif'),
(6, 2, 'Sweatshirt', 22, 'Heavy and warm', 'sweatshirt.jpg'),
(7, 3, 'Jane\\\'s Self-Help Book ', 12, 'Jane gives advice', 'selfhelpbook.gif'),
(8, 3, 'Generic Academic Book', 35, 'Some required reading for school, will put you to sleep.', 'boringbook.jpg'),
(9, 3, 'Chicago Manual of Style', 9.99, 'Good for copywriters', 'chicagostyle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_color`
--

DROP TABLE IF EXISTS `store_item_color`;
CREATE TABLE IF NOT EXISTS `store_item_color` (
  `item_id` int(11) NOT NULL,
  `item_color` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_color`
--

INSERT INTO `store_item_color` (`item_id`, `item_color`) VALUES
(1, 'red'),
(2, 'black'),
(3, 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `store_item_size`
--

DROP TABLE IF EXISTS `store_item_size`;
CREATE TABLE IF NOT EXISTS `store_item_size` (
  `item_id` int(11) NOT NULL,
  `item_size` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_item_size`
--

INSERT INTO `store_item_size` (`item_id`, `item_size`) VALUES
(1, 'One Size Fits All'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `store_orders`
--

DROP TABLE IF EXISTS `store_orders`;
CREATE TABLE IF NOT EXISTS `store_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime DEFAULT NULL,
  `order_name` varchar(100) DEFAULT NULL,
  `order_address` varchar(255) DEFAULT NULL,
  `order_city` varchar(50) DEFAULT NULL,
  `order_state` char(2) DEFAULT NULL,
  `order_zip` varchar(10) DEFAULT NULL,
  `order_tel` varchar(25) DEFAULT NULL,
  `order_email` varchar(100) DEFAULT NULL,
  `item_total` float DEFAULT NULL,
  `shipping_total` float DEFAULT NULL,
  `[authorization]` varchar(50) DEFAULT NULL,
  `status` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_orders_items`
--

DROP TABLE IF EXISTS `store_orders_items`;
CREATE TABLE IF NOT EXISTS `store_orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `sel_item_id` int(11) DEFAULT NULL,
  `sel_item_qty` smallint(6) DEFAULT NULL,
  `sel_item_size` varchar(25) DEFAULT NULL,
  `sel_item_color` varchar(25) DEFAULT NULL,
  `sel_item_price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store_variations`
--

DROP TABLE IF EXISTS `store_variations`;
CREATE TABLE IF NOT EXISTS `store_variations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_variations`
--

INSERT INTO `store_variations` (`id`, `item_id`, `color_id`, `size_id`, `Quantity`) VALUES
(1, 1, 1, 1, 2),
(2, 1, 2, 1, 3),
(3, 1, 3, 1, 4),
(4, 2, NULL, 1, 10),
(5, 3, NULL, 1, 5),
(6, 4, NULL, 2, 4),
(7, 4, NULL, 3, 6),
(8, 4, NULL, 4, 8),
(9, 4, NULL, 5, 5),
(10, 5, NULL, NULL, 9),
(11, 6, NULL, NULL, 12),
(12, 7, NULL, NULL, 14),
(13, 8, NULL, NULL, 3),
(14, 9, NULL, NULL, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
