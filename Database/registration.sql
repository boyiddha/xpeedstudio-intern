-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2024 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `entry_at` date NOT NULL,
  `entry_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `entry_at`, `entry_by`) VALUES
(3, 2, 'Boyiddhanath Roy', 'boyiddha', 'Mango', 'boyiddha.hstu.ece@gmail.com', '::1', 'Order 2 Kg mango!', 'Dinajpur Sadar', '01785441285', '2024-09-25', 1),
(4, 6, 'Abdul Rahim', 'rahim', 'Jackfruit', 'abrahim@yahoo.com', '::1', '৬ কেজি কাঁঠাল। ', 'Dhaka', '0189763544', '2024-09-25', 2),
(5, 5, 'Md Sunney Ahmed', 'sunney', 'Fish', 'sunney@gmail.com', '::1', '৫ কেজি ইলিশ মাছ।', 'Chattogram', '0157834583', '2024-09-25', 3),
(6, 100, 'Abdul Hakim', 'ayman', 'Watermelon', 'abhakim@gmail.com', '::1', '১০০ পিস তরমুজ । ', 'Gulshan Dhaka', '0179387394672', '2024-09-25', 4),
(7, 10, 'Virat Kohli', 'virat', 'bat', 'imvirat@gmail.com', '::1', '10 Bats for playing cricket.', 'Mumbai', '01346597826', '2024-09-25', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
