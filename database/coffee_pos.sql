-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2026 at 01:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_logs`
--

CREATE TABLE `inventory_logs` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `type` enum('in','out') DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_logs`
--

INSERT INTO `inventory_logs` (`id`, `product_id`, `type`, `quantity`, `created_at`) VALUES
(1, 20, 'out', 23224, '2026-04-28 11:10:10'),
(2, 20, 'out', 9, '2026-04-28 11:11:08'),
(3, 20, 'in', 7, '2026-04-28 11:11:17'),
(4, 20, 'in', 7, '2026-04-28 11:11:25'),
(5, 20, 'in', 1200, '2026-04-28 11:12:26'),
(6, 20, 'in', 123444242, '2026-04-28 11:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','preparing','completed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `status`, `created_at`) VALUES
(96, 1, 35.00, 'completed', '2026-04-23 11:53:04'),
(97, 1, 21555.00, 'preparing', '2026-04-23 11:57:11'),
(98, 1, 57.00, 'pending', '2026-04-23 11:59:35'),
(99, 1, 57.00, 'completed', '2026-04-23 12:01:39'),
(100, 1, 813.00, 'completed', '2026-04-23 12:01:58'),
(101, 1, 126.00, 'preparing', '2026-04-25 15:10:15'),
(102, 1, 114.00, 'completed', '2026-04-25 15:10:23'),
(103, 1, 273.00, 'pending', '2026-04-25 15:48:56'),
(104, 1, 6994.00, 'pending', '2026-04-25 15:54:23'),
(105, 1, 5748.00, 'preparing', '2026-04-25 15:55:18'),
(106, 1, 11626.00, 'preparing', '2026-04-28 10:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `customization` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `customization`) VALUES
(51, 96, 9, NULL, 15.00, NULL),
(52, 96, 8, NULL, 10.00, NULL),
(53, 97, 11, NULL, 21323.00, NULL),
(54, 97, 10, NULL, 232.00, NULL),
(55, 98, 13, NULL, 45.00, NULL),
(56, 98, 12, NULL, 12.00, NULL),
(57, 99, 13, 1, 45.00, NULL),
(58, 99, 12, 1, 12.00, NULL),
(59, 100, 13, 13, 45.00, NULL),
(60, 100, 12, 19, 12.00, NULL),
(61, 101, 13, 2, 45.00, NULL),
(62, 101, 12, 3, 12.00, NULL),
(63, 102, 12, 2, 12.00, NULL),
(64, 102, 13, 2, 45.00, NULL),
(65, 103, 13, 5, 45.00, NULL),
(66, 103, 12, 4, 12.00, NULL),
(67, 104, 13, 3, 45.00, NULL),
(68, 104, 14, 2, 1212.00, NULL),
(69, 104, 12, 2, 12.00, NULL),
(70, 104, 15, 1, 34.00, NULL),
(71, 104, 16, 1, 4343.00, NULL),
(72, 104, 17, 1, 34.00, NULL),
(73, 105, 19, 1, 34.00, NULL),
(74, 105, 18, 1, 34.00, NULL),
(75, 105, 17, 1, 34.00, NULL),
(76, 105, 16, 1, 4343.00, NULL),
(77, 105, 15, 1, 34.00, NULL),
(78, 105, 14, 1, 1212.00, NULL),
(79, 105, 13, 1, 45.00, NULL),
(80, 105, 12, 1, 12.00, NULL),
(81, 106, 12, 2, 12.00, NULL),
(82, 106, 13, 2, 45.00, NULL),
(83, 106, 14, 2, 1212.00, NULL),
(84, 106, 15, 2, 34.00, NULL),
(85, 106, 16, 2, 4343.00, NULL),
(86, 106, 17, 1, 34.00, NULL),
(87, 106, 19, 2, 34.00, NULL),
(88, 106, 20, 1, 232.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `stock`, `created_at`) VALUES
(12, 'qwer', 12.00, 'qwer', 465, '2026-04-23 11:59:20'),
(13, 'asdf', 45.00, 'asdfd', 470, '2026-04-23 11:59:31'),
(14, 'asdasd', 1212.00, 'asdasd', 2318, '2026-04-25 15:53:39'),
(15, 'sadasd', 34.00, 'dsfdsfdsf', -1, '2026-04-25 15:53:46'),
(16, 'asdasdasdasdasd', 4343.00, 'asdasdas', 5450, '2026-04-25 15:54:04'),
(17, 'asdasdasdsad', 34.00, 'sadsdasd', 31, '2026-04-25 15:54:14'),
(18, 'sdasda', 34.00, 'sdfdfdfdf', 3452, '2026-04-25 15:55:04'),
(19, 'ghghghg', 34.00, 'sdfdsfds', 31, '2026-04-25 15:55:10'),
(20, 'sadasdasd', 232.00, 'asdasdas', 123445454, '2026-04-28 07:51:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','cashier') DEFAULT 'cashier',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_logs`
--
ALTER TABLE `inventory_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `inventory_logs`
--
ALTER TABLE `inventory_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
