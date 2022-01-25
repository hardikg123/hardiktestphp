-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 09:46 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtestproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_products`
--

CREATE TABLE `customer_products` (
  `sale_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_mail` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `sale_date` datetime NOT NULL,
  `version` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_products`
--

INSERT INTO `customer_products` (`sale_id`, `customer_name`, `customer_mail`, `product_id`, `product_name`, `product_price`, `sale_date`, `version`) VALUES
(1, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 1, 'Refactoring: Improving the Design of Existing Code', 49.99, '2019-04-02 06:05:12', '1.0.17+42'),
(2, 'Reto Fanzen', 'reto.fanzen@no-reply.rexx-systems.com', 2, 'Clean Architecture: A Craftsman\'s Guide to Software Structure and Design', 24.99, '2019-05-01 09:07:18', '1.0.17+59'),
(3, 'Leandro Bußmann', 'leandro.bussmann@no-reply.rexx-systems.com', 2, 'Clean Architecture: A Craftsman\'s Guide to Software Structure and Design', 19.99, '2019-05-06 12:26:14', '1.0.15+83'),
(4, 'Hans Schäfer', 'hans.schaefer@no-reply.rexx-systems.com', 1, 'Refactoring: Improving the Design of Existing Code', 37.98, '2019-06-07 11:38:39', '1.0.17+65'),
(5, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 1, 'Refactoring: Improving the Design of Existing Code', 37.98, '2019-07-01 15:01:13', '1.0.17+65'),
(6, 'Mia Wyss', 'mia.wyss@no-reply.rexx-systems.com', 2, 'Clean Architecture: A Craftsman\'s Guide to Software Structure and Design', 19.99, '2019-08-07 19:08:56', '1.1.3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_products`
--
ALTER TABLE `customer_products`
  ADD PRIMARY KEY (`sale_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_products`
--
ALTER TABLE `customer_products`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
