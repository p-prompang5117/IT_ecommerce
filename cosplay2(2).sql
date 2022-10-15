-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 02:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosplay2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `bill_products_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `bill_customer` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `bill_price` int(11) NOT NULL,
  `bill_result_price` int(11) NOT NULL,
  `bill_product_qty` int(11) NOT NULL,
  `bill_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'not paid',
  `bill_img` text COLLATE utf8_unicode_ci NOT NULL,
  `bill_timestamp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `bill_products_name`, `bill_customer`, `bill_price`, `bill_result_price`, `bill_product_qty`, `bill_status`, `bill_img`, `bill_timestamp`) VALUES
(22, 'Room coffee', '1', 299, 299, 1, 'not paid', '', '2022-10-15'),
(23, 'Room Fiberry', '1', 590, 590, 1, 'not paid', '', '2022-10-15'),
(24, 'Boom D-nax', '1', 590, 590, 1, 'not paid', '', '2022-10-15'),
(25, 'Boom cocoa', '1', 399, 399, 1, 'not paid', '', '2022-10-15'),
(26, 'Boom cocoa', '9', 399, 399, 1, 'not paid', '', '2022-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'ผงชงพร้อมดื่ม'),
(2, 'เม็ดฟู่ละลายน้ำ'),
(3, 'ฉีกพร้อมทาน'),
(4, 'เม็ด');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `orders_buyer` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `orders_products` text COLLATE utf8_unicode_ci NOT NULL,
  `orders_price` int(11) NOT NULL,
  `orders_success` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ยังไม่ได้จัดส่ง',
  `orders_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `products__price` int(11) NOT NULL,
  `products_quantity` int(11) NOT NULL,
  `products_img` text COLLATE utf8_unicode_ci NOT NULL,
  `products_category` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `products_name`, `products__price`, `products_quantity`, `products_img`, `products_category`) VALUES
(1, 'Boom cocoa', 399, 99, 'img/2022-09-15-920633038.jpg', 'ผงชงพร้อมดื่ม'),
(3, 'Room coffee', 299, 99, 'img/2022-09-15-1909268275.jpg', 'ผงชงพร้อมดื่ม'),
(4, 'Boom D-nax', 590, 99, 'img/2022-09-15-1768980858.png', 'เม็ดฟู่ละลายน้ำ'),
(5, 'GLUTA SHOTS', 590, 99, 'img/2022-09-15-825247599.jpg', 'ผงชงพร้อมดื่ม'),
(6, 'VITAMIN C COMPLEX', 299, 99, 'img/2022-09-15-612645794.png', 'เม็ด'),
(7, 'Boom Collagen', 590, 99, 'img/2022-09-15-1724019250.jpg', 'ผงชงพร้อมดื่ม'),
(8, 'Room Fiberry', 590, 99, 'img/2022-09-15-1063898966.jpg', 'ผงชงพร้อมดื่ม'),
(9, ' Whey Protein ', 590, 99, 'img/2022-09-15-89265136.jpg', 'ผงชงพร้อมดื่ม'),
(10, 'ZIP LOCK', 590, 99, 'img/2022-09-15-1031194966.jpg', 'เม็ด');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_tier` int(11) NOT NULL DEFAULT 1 COMMENT '0=admin 1=customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`, `user_name`, `user_tier`) VALUES
(1, 'admin@admin', 'admin', 'BOOM', 0),
(6, 'Doom@doom', 'oom', 'Doomey', 1),
(7, '1', '1', '1', 0),
(9, 'test@test', 'test', 'test_customer', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
