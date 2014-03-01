-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2014 at 04:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `salemydatabase`
--
CREATE DATABASE IF NOT EXISTS `salemydatabase` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `salemydatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` int(3) NOT NULL,
  `brand` int(3) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `status` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `brand`, `price`, `status`) VALUES
(1, 'Sony TV', 16, 1, '100.01', 1),
(2, 'Elite desktop pc', 15, 3, '999.99', 2),
(3, 'Sausage', 14, 7, '800.00', 3),
(4, '32inch monitor ', 17, 7, '100.00', 1),
(5, 'Xbox 360', 13, 3, '180.00', 2),
(6, 'PlayStation 4', 13, 2, '500.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE IF NOT EXISTS `product_brands` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `product_brands`
--

INSERT INTO `product_brands` (`id`, `brand_name`) VALUES
(1, 'Samsung'),
(2, 'Sony'),
(3, 'Microsoft'),
(4, 'Apple'),
(5, 'Alien '),
(6, 'Nokia '),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`) VALUES
(12, 'Phone'),
(13, 'Console'),
(14, 'Accessory'),
(15, 'Desktop'),
(16, 'TV'),
(17, 'Monitor '),
(18, 'DVD'),
(19, 'CD'),
(20, 'Laptop'),
(21, 'Games');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE IF NOT EXISTS `product_comments` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `comment`) VALUES
(1, 3, 1, 'This is not a gadget, this is a sausage so has been removed from sale. ');

-- --------------------------------------------------------

--
-- Table structure for table `product_conditions`
--

CREATE TABLE IF NOT EXISTS `product_conditions` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `condition_name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product_conditions`
--

INSERT INTO `product_conditions` (`id`, `condition_name`) VALUES
(1, 'New'),
(2, 'Mint'),
(3, 'Near Mint'),
(4, 'Worn'),
(5, 'Damaged'),
(6, 'Needs Repair');

-- --------------------------------------------------------

--
-- Table structure for table `product_delivery`
--

CREATE TABLE IF NOT EXISTS `product_delivery` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `delivery_status` varchar(20) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `delivery_cost` decimal(4,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_delivery`
--

INSERT INTO `product_delivery` (`id`, `delivery_status`, `delivery_date`, `delivery_cost`) VALUES
(1, 'Ready to dispatch', '2014-02-27 00:00:00', '5.00'),
(2, 'Collect on payment ', '2014-02-27 00:00:00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE IF NOT EXISTS `product_details` (
  `product_id` bigint(20) NOT NULL,
  `primary_image` bigint(20) DEFAULT NULL,
  `description` text NOT NULL,
  `condition_id` int(3) NOT NULL,
  `delivery_id` bigint(20) DEFAULT NULL,
  `creation_date` datetime NOT NULL,
  `created_by` bigint(20) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` bigint(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`product_id`, `primary_image`, `description`, `condition_id`, `delivery_id`, `creation_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 2, 'Brand new Sony 48 inch television ', 1, 1, '2014-02-26 00:00:00', 3, '2014-02-26 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE IF NOT EXISTS `product_media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `extension` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`id`, `product_id`, `title`, `extension`) VALUES
(1, 3, 'Sausage', 'jpg'),
(2, 1, 'TV', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_status`
--

CREATE TABLE IF NOT EXISTS `product_status` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product_status`
--

INSERT INTO `product_status` (`id`, `status`) VALUES
(1, 'Active'),
(2, 'Awaiting review '),
(3, 'Disapproved '),
(4, 'Sold');

-- --------------------------------------------------------

--
-- Table structure for table `site_content`
--

CREATE TABLE IF NOT EXISTS `site_content` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `page` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `active`) VALUES
(1, 'username', 'password', 1, 1),
(2, 'Isac', 'PassW0rdT00Str0nk', 2, 1),
(3, 'Bill', 'Somewordsandnumbershere', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `town_city` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `contact_number` int(12) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `first_name`, `surname`, `address_1`, `address_2`, `town_city`, `county`, `postcode`, `contact_number`, `contact_email`) VALUES
(1, 'Ashley', 'Bell', '42 Derpstreet', NULL, 'Chard', 'UK', 'Ta20 2dt', 1234567890, 'somthing@hotmail.co.uk'),
(2, 'Isac', 'Hunt', '33 Anaddress', NULL, 'Bristol', 'England', 'ta20 2rr', 987654321, ' anemail@gmail.com'),
(3, 'Bill', 'Board', '44 Signpost', NULL, 'Direction', 'Germany', 'ta44 h00', 689053, 'Billboard@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE IF NOT EXISTS `user_products` (
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_products`
--

INSERT INTO `user_products` (`user_id`, `product_id`) VALUES
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Registered User'),
(3, 'Unregistered User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
