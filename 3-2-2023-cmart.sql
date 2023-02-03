-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 12:06 PM
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
(1, 'Fossil', '', 1),
(2, 'Rolex', '1269403542wristwatch.png', 1),
(6, 'ZTE', '', 1);

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
(1, 'Cloths', 'clothes-hanger.png', 0, 0),
(2, 'Watches', 'wristwatch.png', 0, 1),
(3, 'Electronics', '0', 0, 1),
(4, 'Bags', 'school-bag.png', 0, 1),
(7, 'Handbag', '0', 4, 1),
(8, 'Phone', '0', 3, 1),
(10, 'Headphone', '0', 3, 0),
(11, 'Ladies Watch', '0', 2, 1),
(13, 'Charger', '0', 3, 1);

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
(2, 'ZTE Blade V40', '                                                                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.                                                                                                ', '                                                        Ebar thik ase                                                    ', 50000, 48000, '598717161V40.png', NULL, 0, 1, 8, 6),
(3, 'Townsman 44mm Chronograph Luggage Leather Watch', 'Sku: FS5279\r\nCase Size: 44MM\r\nMovement: Quartz Chronograph\r\nPlatform: Townsman\r\nStrap Material: Leather\r\nStrap Color: Light Brown\r\nCase Water Resistance: 5 ATM\r\nCase Material: Stainless Steel', '', 16000, 0, '2107851915FS5279_main.png', NULL, 4, 1, 2, 1),
(7, 'Rolex AR', '                      \r\n                    ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 12000, 0, '924268383rolex.png', ';rolex.png;FS5279_main.png', 0, 1, 2, 2),
(11, 'Rolex Golden Age', '                      \r\n                    ', 'there is nothing to add', 62, 32, '1986199520rolex2.png', '@rolex2.png@rolex.png', 0, 1, 2, 2),
(12, 'Rolex Golden Age', '                      \r\n                    ', 'there is nothing to add', 62, 32, '170014236rolex2.png', '@rolex2.png@rolex.png', 0, 1, 2, 2),
(14, 'Rolex new edition 2023', '                      \r\n                    ', 'Nothing to add', 1633, 0, '310935539rolex.png', '@rolex2.png@rolex.png@FS5279_main.png', 0, 1, 2, 2),
(18, 'ZTE Blade V40', 'nothing', 'nothing is here', 2323, 2, '1658929211person_1.jpg', '', 23, 1, 2, 1),
(22, 'Hanging Plant', 'es, but also the leap into electronic typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 650, 0, '522410108plant.jpg', '@plant1.jpg@plant2.jpg', 5, 1, 4, 6);

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
  `status` int(11) DEFAULT NULL COMMENT '0 for inactive and 1 for active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mart_users`
--

INSERT INTO `mart_users` (`ID`, `firstname`, `lastname`, `username`, `email`, `pass`, `address`, `photo`, `phone`, `status`) VALUES
(2, '', '', 'Prince Mahmud', 'prince@gmail.com', 'db5353edc160d65e1b3359fd8724a2f317654993', 'Dhaka, Bangladesh', '', '1773357272', 1);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mart_coupon`
--
ALTER TABLE `mart_coupon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mart_products`
--
ALTER TABLE `mart_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `mart_users`
--
ALTER TABLE `mart_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
