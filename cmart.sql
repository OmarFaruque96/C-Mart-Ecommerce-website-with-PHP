-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 11:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `mart_brand`
--

CREATE TABLE `mart_brand` (
  `ID` int(11) NOT NULL,
  `b_name` varchar(50) NOT NULL,
  `b_logo` varchar(255) DEFAULT NULL,
  `b_status` int(1) DEFAULT 1 COMMENT '0 for inactive and 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_brand`
--

INSERT INTO `mart_brand` (`ID`, `b_name`, `b_logo`, `b_status`) VALUES
(1, 'Shopno', '', 1),
(2, 'Agora', '1269403542wristwatch.png', 1),
(6, 'Meena Bazar', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mart_category`
--

CREATE TABLE `mart_category` (
  `ID` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_image` varchar(255) DEFAULT '0',
  `is_parent` int(11) NOT NULL DEFAULT 0,
  `c_status` int(11) DEFAULT 1 COMMENT '0 for inactive and 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_category`
--

INSERT INTO `mart_category` (`ID`, `c_name`, `c_image`, `is_parent`, `c_status`) VALUES
(1, 'Vegetables', '677870725product-12.jpg', 0, 1),
(4, 'Junk-Food', '408658722cat-2.jpg', 0, 1),
(16, 'Drinks', '912580196cat-4.jpg', 0, 1),
(17, 'Fruits', '2078831846cat-1.jpg', 0, 1),
(19, 'Chips', '1515751677cat-2.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mart_coupon`
--

CREATE TABLE `mart_coupon` (
  `ID` int(11) NOT NULL,
  `coupon` varchar(15) NOT NULL,
  `amount` int(11) NOT NULL,
  `dis_type` int(11) DEFAULT NULL COMMENT '0 for % and 1 for fixed',
  `starting_date` date DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `dis_on_type` int(11) DEFAULT NULL COMMENT '0 for specific products, 1 for specific category and 2 for specific brand',
  `discount_on` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 for active and 0 for inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_coupon`
--

INSERT INTO `mart_coupon` (`ID`, `coupon`, `amount`, `dis_type`, `starting_date`, `expire_date`, `dis_on_type`, `discount_on`, `status`) VALUES
(1, 'valentine50', 50, 1, '2023-02-10', '2023-02-15', 2, ',2,3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mart_orders`
--

CREATE TABLE `mart_orders` (
  `ID` int(11) NOT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `postCode` int(10) DEFAULT NULL,
  `additional_info` varchar(255) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL COMMENT '0 for cash on and 1 for bkash',
  `total_amount` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL COMMENT '1 for success and 0 for fail',
  `order_status` int(11) DEFAULT NULL COMMENT '1 for pending 2 for processing and 3 for delivery',
  `products` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_orders`
--

INSERT INTO `mart_orders` (`ID`, `user_email`, `phone`, `country`, `state`, `address`, `city`, `postCode`, `additional_info`, `payment_method`, `total_amount`, `payment_status`, `order_status`, `products`, `order_date`) VALUES
(1, 'prince@gmail.com', '01737429077', 'Bangladesh', 'Mirpur', '171, Bagbari Mirpur1', 'Dhaka', 1216, '', 0, 24, 0, 3, '26,27,', '03/03/2023'),
(2, 'umarfaruque.tipu@gmail.com', '01773357272', 'bangladesh', 'dhaka', 'mirput', 'mirpiur', 1216, '', 0, 12, 0, 1, '26,', ''),
(3, 'prince@gmail.com', '0177357272', 'Bangladesh', 'Mirpur', 'Dhaka', 'Dhaka', 1216, '', 0, 50, 0, 1, '28,32,', '2023-03-10 16:56:00'),
(4, 'umarfaruque.tipu@gmail.com', '0177357272', 'Bangladesh', 'Mirpur', 'Dhaka', 'Dhaka', 1216, '', 0, 144, 0, 1, '26,27,', '2023-03-17 16:11:38'),
(5, 'umarfaruque.tipu@gmail.com', '0177357272', 'Bangladesh', 'Mirpur', 'Dhaka', 'Dhaka', 1216, '', 0, 144, 0, 1, '26,27,', '2023-03-17 16:12:08'),
(6, 'umarfaruque.tipu@gmail.com', '0177357272', 'Bangladesh', 'Mirpur', 'Dhaka', 'Dhaka', 1216, '', 0, 144, 0, 1, '26,27,', '2023-03-17 16:12:44'),
(7, 'omar@shikhbeshobai.com', '0177357272', 'Bangladesh', 'Mirpur', 'Dhaka', 'Dhaka', 1216, '', 0, 144, 0, 1, '26,27,', '2023-03-17 16:14:20'),
(8, 'umarfaruque.tipu@gmail.com', '0177357272', 'Bangladesh', 'Mirpur', 'Dhaka', 'Dhaka', 1216, '', 0, 144, 0, 1, '26,27,', '2023-03-17 16:20:15'),
(9, 'umarfaruque.tipu@gmail.com', '0177357272', 'Bangladesh', 'Mirpur', 'Dhaka', 'Dhaka', 1216, '', 0, 174, 0, 1, '26,27,28,', '2023-03-17 16:25:25'),
(10, 'umarfaruque.tipu@gmail.com', '0177357272', 'Bangladesh', 'Mirpur', 'Dhaka', 'Dhaka', 1216, '', 0, 174, 0, 1, '26,27,28,', '2023-03-17 16:27:28'),
(11, 'omar@shikhbeshobai.com', '0177357272', 'Bangladesh', 'Mirpur11', 'Dhaka', 'Dhaka', 1216, '', 0, 174, 0, 1, '26,27,28,', '2023-03-17 16:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `mart_products`
--

CREATE TABLE `mart_products` (
  `ID` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_short_desc` text NOT NULL,
  `p_big_desc` text DEFAULT NULL,
  `p_reg_price` int(11) NOT NULL DEFAULT 0,
  `p_offer_price` int(11) NOT NULL DEFAULT 0,
  `p_featured_img` varchar(255) DEFAULT NULL,
  `p_image_gallery` text DEFAULT NULL COMMENT 'concate image name with ;',
  `p_quantity` int(11) NOT NULL DEFAULT 0,
  `p_status` int(11) DEFAULT 1 COMMENT '0 for inactive and 1 for active',
  `p_category` int(11) DEFAULT NULL,
  `p_brand` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_products`
--

INSERT INTO `mart_products` (`ID`, `p_name`, `p_short_desc`, `p_big_desc`, `p_reg_price`, `p_offer_price`, `p_featured_img`, `p_image_gallery`, `p_quantity`, `p_status`, `p_category`, `p_brand`) VALUES
(25, 'Vetgetable’s Package', '                          Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\r\n                                            ', '                            Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor risus.\r\n\r\nPraesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.                          ', 50, 30, '913378533product-12.jpg', '', 0, 1, 1, 1),
(26, 'Banana', '                          Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.                        ', '                            Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor risus.\r\n\r\nPraesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.                          ', 20, 12, '1092362697product-2.jpg', '', 0, 1, 17, 2),
(27, 'Guava', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 12, 0, '209580252product-3.jpg', '', 12, 1, 17, 1),
(28, 'Water Melon', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 30, 0, '473373713product-7.jpg', '', 30, 1, 17, 6),
(29, 'Black Berry', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\r\n                    ', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 35, 0, '851378498product-4.jpg', '', 4, 1, 17, 6),
(30, 'Spicy Beef Burger Blast', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 12, 0, '1753324364product-5.jpg', '', 8, 1, 4, 1),
(31, 'Mango ', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 14, 0, '1255063752product-6.jpg', '', 6, 1, 17, 1),
(32, 'Fruits Juice', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 20, 0, '779935439product-11.jpg', '', 30, 1, 16, 1),
(33, 'Chicken fries', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 'Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Proin eget tortor risus.', 30, 0, '748185623product-10.jpg', '', 10, 1, 4, 1),
(34, 'Chicken Lolipop', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 40, 35, '1935463279product-10.jpg', '', 6, 1, 4, 2),
(35, 'King Burgur', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 100, 0, '746444524images.png', '', 7, 1, 4, 6),
(36, 'Pizza', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 90, 0, '1906280683pizza.png', '', 0, 1, 4, 1),
(37, 'Hotdog', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 80, 0, '148734883download.png', '', 9, 1, 4, 1),
(38, 'Mini-Burger', 'Mini Burgur is good orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 'Mini Burorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 50, 0, '352220918mini.png', '', 9, 1, 4, 2),
(39, 'Lacchi', 'Lacchi orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 'Lacchi orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 30, 25, '296640068lacchi.png', '', 8, 1, 16, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mart_users`
--

CREATE TABLE `mart_users` (
  `ID` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `userrole` int(11) NOT NULL COMMENT '0 for subscriber, 1 for customer and 2 for editor, 3 for super admin',
  `status` int(11) DEFAULT NULL COMMENT '0 for inactive and 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_users`
--

INSERT INTO `mart_users` (`ID`, `firstname`, `lastname`, `username`, `email`, `pass`, `address`, `photo`, `phone`, `userrole`, `status`) VALUES
(2, '', '', 'Prince Mahmud', 'prince@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '                                            Dhaka, Bangladesh                                        ', '1411584120ebong himu by Humayun Ahmed.jpg', '1773357272', 1, 1),
(3, NULL, NULL, 'admin', 'admin@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, NULL, '1773357272', 3, 1),
(4, NULL, NULL, 'hafiz', 'hafiz@gmail.com', '672672', NULL, NULL, NULL, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mart_brand`
--
ALTER TABLE `mart_brand`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `b_name` (`b_name`);

--
-- Indexes for table `mart_category`
--
ALTER TABLE `mart_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mart_coupon`
--
ALTER TABLE `mart_coupon`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `coupon` (`coupon`);

--
-- Indexes for table `mart_orders`
--
ALTER TABLE `mart_orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mart_products`
--
ALTER TABLE `mart_products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `p_category` (`p_category`),
  ADD KEY `p_brand` (`p_brand`);

--
-- Indexes for table `mart_users`
--
ALTER TABLE `mart_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mart_brand`
--
ALTER TABLE `mart_brand`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mart_category`
--
ALTER TABLE `mart_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mart_coupon`
--
ALTER TABLE `mart_coupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mart_orders`
--
ALTER TABLE `mart_orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mart_products`
--
ALTER TABLE `mart_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `mart_users`
--
ALTER TABLE `mart_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mart_products`
--
ALTER TABLE `mart_products`
  ADD CONSTRAINT `mart_products_ibfk_1` FOREIGN KEY (`p_category`) REFERENCES `mart_category` (`ID`),
  ADD CONSTRAINT `mart_products_ibfk_2` FOREIGN KEY (`p_brand`) REFERENCES `mart_brand` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
