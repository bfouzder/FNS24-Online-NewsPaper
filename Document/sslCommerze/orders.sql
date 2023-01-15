-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2022 at 01:31 AM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fns24bangla_shopmaindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(1, 'Daily Asia bani', 'dailyasiabani2012@gmail.com', '01720090514', 2500, 'Dhaka', 'Pending', 'FNS_PAY_20220731_62e67d8e95ea7', 'BDT'),
(2, 'Daily Asia bani', 'dailyasiabani2012@gmail.com', '01720090514', 2500, 'Dhaka', 'Pending', 'FNS_PAY_20220731_62e67eb094f5a', 'BDT'),
(3, 'Daily Asia bani', 'dailyasiabani2012@gmail.com', '01720090514', 2500, 'Dhaka', 'Processing', 'FNS_PAY_20220731_62e6825667099', 'BDT'),
(4, 'TheARSoft', 'info@thearsoft.com', '01912527479', 100, 'Dhaka', 'Processing', 'FNS_10001_20220731_62e68a8ca2db1', 'BDT'),
(5, 'FNS24', 'saykat@yahoo.com', '01781906052', 1500, 'Dhaka', 'Pending', 'FNS_10002_20220731_62e68c5411584', 'BDT'),
(6, '', '', '', 100, 'Dhaka', 'Pending', 'FNS_1001_20220802_62e8bc83898f9', 'BDT'),
(7, '', '', '', 100, 'Dhaka', 'Pending', 'FNS_1001_20220802_62e8bc8cc1493', 'BDT'),
(8, '', '', '', 100, 'Dhaka', 'Pending', 'FNS_1001_20220802_62e8bc9179d7b', 'BDT'),
(9, 'TheARSoft', 'info@thearsoft.com', '01912527479', 1000, 'Dhaka', 'Pending', 'FNS_10001_20220802_62e8bce6710c7', 'BDT'),
(10, 'TheARSoft', 'info@thearsoft.com', '01912527479', 100, 'Dhaka', 'Pending', 'FNS_10001_20220802_62e936f08a1bd', 'BDT'),
(11, 'TheARSoft', 'info@thearsoft.com', '01912527479', 1000, 'Dhaka', 'Pending', 'FNS_10001_20220802_62e937625851b', 'BDT'),
(12, '', '', '', 2500, 'Dhaka', 'Pending', 'FNS_1000_20220804_62ebcc171410a', 'BDT'),
(13, 'TheARSoft', 'info@thearsoft.com', '01912527479', 1000, 'Dhaka', 'Pending', 'FNS_10001_20220807_62efbfd27d15c', 'BDT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
