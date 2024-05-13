-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 07:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=not_ban,1=ban',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `is_ban`, `created_at`) VALUES
(3, 'sahan', 'sahanmewantha00@gmail.com', '1870151', '2345678765432', 0, '2024-04-04'),
(5, 'navodya', 'navolak@gmail.com', '7899123', '76889875', 0, '2024-04-05'),
(8, 'mewantha', 'sahan@gmail', '18701051', '76556822', 0, '2024-04-05'),
(10, 'ire', 'ire@gmail.com', '$2y$10$8CI979XeEJwrgskiAudnq.dMHUl/4T9KrebGmAmjGkX2ZVdGx6NY2', '789587468', 0, '2024-04-07'),
(11, 'weqewewe3', 'mdmdf@gmail.com', '$2y$10$4nanXZvHmaGOEaXGg9/ateNvJ/bewrb8Gkgc7y.SbhWnUiLlY70vO', '78958952', 0, '2024-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `description`) VALUES
(1, 'vegitable', NULL),
(2, 'vegitabl', ';bk;jdbfjkda'),
(10, 'spices', 'cinomen'),
(11, 'fruits', 'mango');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `cusname` varchar(255) NOT NULL,
  `phone` int(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `cusname`, `phone`, `email`, `status`, `created_at`) VALUES
(1, 'pasiya', 78559641, 'paziya123@gmail.com', 1, '2024-04-11'),
(2, 'ayoj', 725689974, 'ajgfsg@gmail.com', 0, '2024-04-11'),
(7, 'hjk,asd', 564945, 'ndkanflknkssaan@gmail.com', 1, '2024-04-12'),
(8, 'faaadadlk', 2147483647, 'dsDSddddddddddddddd@gmail.com', 0, '2024-04-12'),
(9, 'sahan', 765568860, 'sahanmewantha00@gmail.com', 0, '2024-04-22'),
(10, 'sahanm', 765568860, 'mewanthasahan2000@gmail.com', 0, '2024-04-22'),
(11, 'safff', 975, '', 0, '2024-04-22'),
(12, 'sahanME', 769844614, '', 0, '2024-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `catogory_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quntity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catogory_id`, `name`, `price`, `quntity`, `status`, `created_at`) VALUES
(1, 2, 'Tomato', 200, 5, 0, '2024-04-12'),
(2, 10, 'Cinomen', 500, 5, 0, '2024-04-12'),
(3, 2, 'Carrot', 1200, 2, 0, '2024-04-13'),
(7, 11, 'Mango', 100, 1, 0, '2024-04-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
