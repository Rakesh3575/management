-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 03:09 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `banner_mstr`
--

CREATE TABLE `banner_mstr` (
  `banner_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_mstr`
--

INSERT INTO `banner_mstr` (`banner_id`, `title`, `banner`, `created_at`, `modified_at`, `status`) VALUES
(4, 'sss11', '1561133902~2351275_0.jpg', '2019-07-04 14:33:57', '2019-07-04 14:33:57', 1),
(5, 'sss21', '1561166397~hare.jpg', '2019-06-22 01:19:57', '2019-06-22 01:19:57', 1),
(6, 'fd', '1561173549~2351275_0.jpg', '2019-06-22 03:19:23', '2019-06-22 03:19:23', 1),
(7, 'fd', '1561173791~Fly.jpg', '2019-06-22 03:23:11', '2019-06-22 03:23:11', 1),
(8, 'fd1', '1561180368~m21.jpg', '2019-06-22 06:08:34', '2019-06-22 06:08:34', 1),
(10, 'new', '1562142413~m21.jpg', '2019-07-03 04:56:53', '2019-07-03 08:26:53', 1),
(11, 'fist img', '1562139668~WhatsApp_Image_2019-02-24_at_10_34_43_PM.jpeg', '2019-07-03 04:11:08', NULL, 1),
(12, 'fist img1', '1562142282~2351275_0.jpg', '2019-07-03 04:54:42', '2019-07-03 08:24:42', 1),
(13, 'fist img1', '1562142266~hare.jpg', '2019-07-03 04:54:26', '2019-07-03 08:24:26', 1),
(14, 'LAST', '1562142347~Fly.jpg', '2019-07-03 04:55:47', '2019-07-03 08:25:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`, `modify_at`) VALUES
(1, 'Electronics1', '2019-03-19 06:25:16', '2019-04-18 17:59:23'),
(3, 'Plastic Materials', '2019-03-21 17:58:13', '2019-04-05 07:15:53'),
(4, 'furniture', '2019-04-01 18:58:20', '2019-04-05 07:25:03'),
(5, 'fv', '2019-05-05 09:23:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `status`) VALUES
(1, 'Nepal', 0),
(2, 'india', 0),
(3, 'Afghanistan', 1),
(4, 'Australia', 0),
(6, 'sd', 1),
(7, 'Japan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee`, `address`, `status`, `created_at`, `modified_at`) VALUES
(1, 'rakesh', 'sapariya', 1, '2019-07-08 22:54:53', '2019-07-10 06:09:54'),
(3, 'Vijay', 'Address1', 1, '2019-07-10 02:40:43', '2019-07-10 07:39:05'),
(4, 'new', 'add', 1, '2019-07-10 07:37:28', NULL),
(5, 'new name', 'address', 1, '2019-07-10 07:39:46', '2019-07-10 07:41:06'),
(6, 'best', 'sdf', 1, '2019-07-10 07:41:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `country_id`, `status`) VALUES
(1, 'Gujarat1', 3, 1),
(3, 'pritoria', 6, 1),
(4, 'Punjab', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `subcategory_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `subcategory_name`, `category_id`, `created_at`, `modified_at`) VALUES
(2, 'Iphone', 2, '2019-03-22 22:53:23', '2019-07-03 12:21:12'),
(3, 'Washing Machine', 3, '2019-03-22 22:53:52', '2019-07-06 11:05:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_mstr`
--
ALTER TABLE `banner_mstr`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner_mstr`
--
ALTER TABLE `banner_mstr`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
