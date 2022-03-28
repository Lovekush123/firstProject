-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 10, 2022 at 05:53 PM
-- Server version: 5.7.37-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(12) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '2022-03-10 00:00:00', '2022-03-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shoes', 'Nice Shoes with good price', '1646913945photo-1610878180933-123728745d22.jpeg', 0, '2022-03-23 04:11:24', '2022-03-30 11:33:37'),
(2, 'Bags', 'Nice Bags Ever', '1646912650beautiful-rain-forest-ang-ka-nature-trail-doi-inthanon-national-park-thailand-36703721.jpg', 1, '2022-03-30 09:00:00', '2022-03-24 00:19:00'),
(3, 'dfsd', 'fsdfsdfsd', '1646914957photo-1610878180933-123728745d22.jpeg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userproducts`
--

CREATE TABLE `userproducts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `product_id` int(11) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userproducts`
--

INSERT INTO `userproducts` (`id`, `user_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 69, 1, 20, 8000, '2022-03-10 17:11:51', '2022-03-10 17:11:51'),
(2, 69, 2, 12, 120, '2022-03-10 17:41:27', '2022-03-10 17:41:27'),
(3, 80, 2, 20, 300, '2022-03-10 17:51:45', '2022-03-10 17:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `userproducts_old`
--

CREATE TABLE `userproducts_old` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userproducts_old`
--

INSERT INTO `userproducts_old` (`id`, `user_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 12, 12, '2022-03-09 18:04:39', '2022-03-09 18:04:39'),
(22, 68, 1, 20, 200, '2022-03-09 19:28:39', '2022-03-09 19:28:39'),
(28, 69, 1, 12, 100002, '2022-03-10 15:59:31', '2022-03-10 15:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(220) NOT NULL,
  `firstName` varchar(220) DEFAULT NULL,
  `lastName` varchar(220) DEFAULT NULL,
  `password` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `firstName`, `lastName`, `password`, `email`, `status`, `created_at`, `updated_at`) VALUES
(68, 'Mr. Khan', 'sharma', '43cca4b3de2097b9558efefd0ecc3588', 'aaa@gmail.com', 0, NULL, '2022-03-10 17:49:33'),
(69, 'love', 'kush', '827ccb0eea8a706c4c34a16891f84e7b', 'love.kush@kindlebit.com', 1, NULL, NULL),
(70, 'Love', 'Kush', '827ccb0eea8a706c4c34a16891f84e7b', 'admin@admin.com', 0, NULL, NULL),
(71, 'chandan', 'kumar', '827ccb0eea8a706c4c34a16891f84e7b', 'chandan@gmail.com', 0, NULL, NULL),
(72, 'Love', 'Kush', '9a69e50114a30c4c5c1d455a2cfb87d1', 'root1@gmail.com', 0, NULL, NULL),
(74, 'Hero', 'Rajput', '827ccb0eea8a706c4c34a16891f84e7b', 'hero@gmail.com', 1, NULL, NULL),
(75, 'Summer', 'sharma', '25f9e794323b453885f5181f1b624d0b', 'summer@gmail.com', 1, NULL, NULL),
(76, 'Sumit ', 'Singh', '25f9e794323b453885f5181f1b624d0b', 'sumit@gmail.com', 0, '2022-03-10 11:46:28', '2022-03-10 11:46:28'),
(77, 'Sumit ', 'Singh', '25f9e794323b453885f5181f1b624d0b', 'sumit123@gmail.com', 0, '2022-03-10 11:46:48', '2022-03-10 11:46:48'),
(78, 'Sumit ', 'Singh', '25f9e794323b453885f5181f1b624d0b', 'sumit123123@gmail.com', 0, '2022-03-10 11:47:51', '2022-03-10 11:47:51'),
(79, 'Aman', 'Pal', '827ccb0eea8a706c4c34a16891f84e7b', 'aman@gmail.com', 1, '2022-03-10 15:04:09', '2022-03-10 15:04:09'),
(80, 'amit', 'singh', '827ccb0eea8a706c4c34a16891f84e7b', 'amit123@gmail.com', 1, '2022-03-10 17:50:02', '2022-03-10 17:50:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userproducts`
--
ALTER TABLE `userproducts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `userproducts_old`
--
ALTER TABLE `userproducts_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userproducts`
--
ALTER TABLE `userproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userproducts_old`
--
ALTER TABLE `userproducts_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(220) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `userproducts_old`
--
ALTER TABLE `userproducts_old`
  ADD CONSTRAINT `userproducts_old_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `userproducts_old_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
