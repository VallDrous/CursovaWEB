-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2025 at 05:49 PM
-- Server version: 8.0.41
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capybarashopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `user_id`, `item_id`, `count`) VALUES
(5, 4, 1, 1),
(6, 4, 3, 1),
(41, 4, 4, 1),
(44, 2, 3, 26);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Phone'),
(2, 'TradingCards');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int NOT NULL,
  `name_stuff` varchar(100) NOT NULL,
  `category_id` int DEFAULT NULL,
  `count` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name_stuff`, `category_id`, `count`, `price`, `image`) VALUES
(1, 'Iphone 16 128GB', 1, 13, 30000.00, '\\Phones\\iphone16_128GB.jpg'),
(2, 'Samsung S25 Ultra', 1, 10, 60000.00, ''),
(3, 'Poco X3 Pro 128GB', 1, 2, 6999.00, ''),
(4, 'charizard 1995 holo', 2, 3, 15999.55, ''),
(5, 'вава', 2, 12, 12.00, NULL),
(9, 'fdfdf', 2, 12, 132.23, NULL),
(11, 'fdfdfd', 2, 12, 132.23, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `item_id` int NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`id`, `user_id`, `item_id`, `purchase_date`, `count`, `total_price`) VALUES
(1, 2, 1, '2025-05-19 14:42:21', 4, 120000.00),
(2, 2, 4, '2025-05-19 14:42:21', 3, 47998.65),
(3, 2, 3, '2025-05-19 14:42:21', 1, 6999.00),
(4, 2, 2, '2025-05-19 14:42:21', 1, 60000.00),
(5, 2, 1, '2025-05-19 17:43:32', 4, 120000.00),
(6, 2, 4, '2025-05-19 17:43:32', 3, 47998.65),
(7, 2, 3, '2025-05-19 17:43:32', 1, 6999.00),
(8, 2, 2, '2025-05-19 17:43:32', 1, 60000.00),
(9, 2, 1, '2025-05-19 18:07:05', 5, 150000.00),
(10, 2, 4, '2025-05-19 18:07:05', 3, 47998.65),
(11, 2, 3, '2025-05-19 18:07:05', 1, 6999.00),
(12, 2, 2, '2025-05-19 18:07:05', 1, 60000.00),
(13, 2, 1, '2025-05-19 18:18:11', 5, 150000.00),
(14, 2, 4, '2025-05-19 18:18:11', 3, 47998.65),
(15, 2, 3, '2025-05-19 18:18:11', 1, 6999.00),
(16, 2, 2, '2025-05-19 18:18:11', 1, 60000.00),
(17, 2, 1, '2025-05-19 18:36:22', 1, 30000.00),
(18, 2, 2, '2025-05-19 18:36:22', 1, 60000.00),
(19, 2, 3, '2025-05-19 18:36:22', 1, 6999.00),
(20, 2, 1, '2025-05-25 18:17:18', 1, 30000.00);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(3, 'admin'),
(2, 'manager'),
(1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `data_of_reg` date NOT NULL,
  `role_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `user_password`, `data_of_reg`, `role_id`) VALUES
(2, 'hello', '202cb962ac59075b964b07152d234b70', '2025-04-21', 3),
(4, 'hello1', '202cb962ac59075b964b07152d234b70', '2025-04-21', 2),
(6, 'rrr', '202cb962ac59075b964b07152d234b70', '2025-05-24', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_basket_user` (`user_id`),
  ADD KEY `fk_basket_item` (`item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_stuff` (`name_stuff`),
  ADD KEY `fk_item_category` (`category_id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_purchase_user` (`user_id`),
  ADD KEY `fk_purchase_item` (`item_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `fk_basket_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_basket_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD CONSTRAINT `fk_purchase_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_purchase_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
