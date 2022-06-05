-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 10:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fishstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cookedby` varchar(100) NOT NULL,
  `deliveredby` varchar(100) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `status`, `cookedby`, `deliveredby`, `totalprice`, `address`) VALUES
(1, '2022-05-23', 'Delivered', 'Ahmed Mahmoud', 'Ahmed Salah', 200, '53 Ramsis'),
(2, '2022-05-01', 'Delivered', 'Yussef Ayman', 'Youssef Khaled', 322, 'In Place'),
(3, '2022-04-22', 'Delivered', 'Ahmed Mahmoud', 'Yousef Wael', 120, '45 Giza'),
(9, '2022-5-23', 'Delivered', 'Yussef Ayman', 'Youssef Khaled', 210, ''),
(10, '2022-5-23', 'Received', '', '', 210, ''),
(14, '2022-5-23', 'Received', '', '', 550, ''),
(15, '2022-5-23', 'Cooked', 'Yussef Ayman', '', 550, '');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cookingType` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_id`, `product_name`, `cookingType`, `price`) VALUES
(10, 1, 'Salmon', '', 100),
(10, 3, 'Sardines', '', 110),
(14, 1, 'Salmon', '', 100),
(14, 3, 'Sardines', '', 110),
(14, 4, 'Shrimp', '', 130),
(15, 1, 'Salmon', '', 100),
(15, 3, 'Sardines', '', 110),
(15, 4, 'Shrimp', '', 130);

-- --------------------------------------------------------

--
-- Table structure for table `order_user`
--

CREATE TABLE `order_user` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_user`
--

INSERT INTO `order_user` (`order_id`, `user_id`) VALUES
(9, 2),
(10, 2),
(14, 24),
(15, 24);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Salmon', 100),
(2, 'Tuna', 90),
(3, 'Sardines', 110),
(4, 'Shrimp', 130);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`) VALUES
(1, 'Ahmed Mohamed', 'generalmanager@gmail.com', '12345', 'General Manager'),
(2, 'Ward', 'rose.essam38@gmail.com', '123', 'customer'),
(11, 'Ahmed Salah', 'ah@gmail.com', '678', 'Delivery Department Worker'),
(19, 'Khaled Mohy', 'kh@gmail.com', '12345', 'Delivery Department Manager'),
(20, 'Fady Shawky', 'fady@gmail.com', '12345', 'Cooking Department Manager'),
(21, 'Yussef Ayman', 'yussef@gmail.com', '123', 'Cooking Department Worker'),
(23, 'Youssef Khaled', 'yousef@gmail.com', '123', 'Delivery Department Worker'),
(24, 'Noha', 'noha@gmail.com', '123', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`order_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `order_user_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
