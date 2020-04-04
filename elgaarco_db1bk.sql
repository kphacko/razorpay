-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2020 at 09:34 AM
-- Server version: 10.2.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elgaarco_db1bk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `key_id` varchar(256) NOT NULL,
  `key_secret` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `pass`, `id`, `name`, `key_id`, `key_secret`) VALUES
('admin@elgaar.com', '$2y$10$OZq4T9gkWPpyzPvNSWE6u.iKM7IMFG7CmJuBWcT4YUqaOihBD4oN.', 1, 'admin', 'rzp_live_VTtadhpMkvdyGi', 'T2cpOXybkh1u6TrCnmj46rKg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `kid` varchar(256) DEFAULT NULL,
  `fname` varchar(256) NOT NULL,
  `mname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `dob` varchar(256) NOT NULL,
  `Gender` varchar(256) NOT NULL DEFAULT 'male',
  `age` int(50) NOT NULL DEFAULT 21,
  `martial` varchar(256) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `pincode` int(50) NOT NULL,
  `aadhar` varchar(256) NOT NULL,
  `blood` varchar(256) NOT NULL,
  `place` varchar(256) NOT NULL,
  `date` varchar(256) NOT NULL,
  `district` varchar(256) NOT NULL,
  `state` varchar(256) NOT NULL,
  `profile` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment_id` varchar(256) DEFAULT NULL,
  `post` varchar(256) NOT NULL DEFAULT 'Kamgar',
  `tow` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
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
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
