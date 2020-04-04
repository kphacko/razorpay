-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2020 at 04:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pincode` int(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment_id` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`name`, `email`, `id`, `address`, `phone`, `pincode`, `status`, `payment_id`) VALUES
('karan patil', 'karan2000patil@gmail.com', 1, 'n m joshi marg', '8228288888', 400011, 0, NULL),
('karan patil', 'karan2000patil@gmail.com', 2, 'n m joshi marg', '8228288888', 400011, 0, NULL),
('karan patil 2', 'karan2000patil@gmail.com', 3, 'n m joshi marg', '8228288888', 400011, 0, NULL),
('karan patil 2', 'karan2000patil@gmail.com', 4, 'asff', '21231', 232, 0, NULL),
('yash karade', 'ysah@jdsj.in', 5, 'aedwewe', '1234567890', 400011, 0, NULL),
('test 2', 'karan2000patil@gmail.com', 6, 'asf', '8112134567', 400011, 0, NULL),
('kp ', 'karan2000patil@gmail.com', 7, 'asff', '1212213456', 3333, 0, NULL),
('ff', 'karan2000patil@gmail.com', 8, 'asee', '2345679089', 222, 1, 'pay_EGfeWjahkPNOWS'),
('karan patil', 'karan2000patil@gmail.com', 9, 'aeffef', '1233567890', 233422, 1, 'pay_EGfptg181HEUNh'),
('payment failed test', 'karan2000patil@gmail.com', 10, 'aedwedw', '1234567809', 234242, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
