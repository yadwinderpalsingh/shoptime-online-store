-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 11, 2016 at 08:07 AM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ShopTime`
--
CREATE DATABASE IF NOT EXISTS `ShopTime` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ShopTime`;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `Id` int(9) NOT NULL,
  `ProductName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL DEFAULT '0',
  `Gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`Id`, `ProductName`, `Price`, `Gender`, `Image`) VALUES
(1, 'Cap', 30, 'Men', '/men/1.jpg'),
(2, 'T-shirt', 40, 'Men', '/men/2.jpg'),
(3, 'Shoe', 110.5, 'Men', '/men/3.jpg'),
(4, 'Glasses', 150.43, 'Men', '/men/4.jpg'),
(5, 'Dress 1', 30, 'Women', '/women/1.jpg'),
(6, 'Dress 2', 40, 'Women', '/women/2.jpg'),
(7, 'Dress 3', 110.5, 'Women', '/women/3.jpg'),
(8, 'Dress 3', 150.43, 'Women', '/women/4.jpg'),
(9, 'Short', 40, 'kids', '/kids/1.jpg'),
(10, 'T-shirts', 60, 'kids', '/kids/2.jpg'),
(11, 'T-shirt', 50.5, 'kids', '/kids/3.jpg'),
(12, 'Jeans', 60.43, 'kids', '/kids/4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;