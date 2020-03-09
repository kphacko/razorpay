-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 08:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `pass`, `id`, `name`) VALUES
('admin@elgaar.com', '$2y$10$OZq4T9gkWPpyzPvNSWE6u.iKM7IMFG7CmJuBWcT4YUqaOihBD4oN.', 1, 'admin');

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
  `Gender` varchar(256) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `pincode` int(50) NOT NULL,
  `aadhar` varchar(256) NOT NULL,
  `district` varchar(256) NOT NULL,
  `state` varchar(256) NOT NULL,
  `profile` varchar(256) NOT NULL,
  `post` varchar(256) NOT NULL,
  `tow` varchar(256) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `payment_id` varchar(256) DEFAULT NULL,
  `date` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `kid`, `fname`, `mname`, `lname`, `dob`, `Gender`, `phone`, `email`, `address`, `pincode`, `aadhar`, `district`, `state`, `profile`, `post`, `tow`, `status`, `payment_id`, `date`) VALUES
(60, '0000030', 'yash', 'Simone Rios', 'karaday', '1972-01-10', 'male', '9322244007', 'gagimoly@mailinator.net', 'Qui velit dolores r', 92, '123456789122', ' Siruguppa ', 'Karnataka', 'small.jpg', 'Kamgar', 'Non incididunt sit e', 3, 'order_EJjuTUbU2YE3y3', NULL),
(91, '0000091', 'karan', 'Marny Walters', 'patil', '1976-10-15', 'male', '8169157715', 'zovytutovi@mailinator.com', 'Unde dolor doloremqu', 90, '283682636283', ' Calicut ', 'Andaman & Nicobar', 'Passportsizephoto.jpg', 'Kamgar', 'Ea reprehenderit au', 0, 'pay_ELqupOqtACHw6P', '27 june, 2019'),
(100, '0000100', 'Yoko', 'Natalie Yang', 'Cross', '1974-02-15', 'male', '8169157715', '', 'Et vel voluptatem sa', 56, '283487234797', ' Mahore ', 'Jammu & Kashmir', 'Passportsizephoto.jpg', 'Kamgar', 'Aliquid occaecat non', 0, 'order_ENiw8jmPHMzLaQ', '27 june, 2019'),
(101, '0000101', 'Signe', 'Violet Rosario', 'Mccullough', '2000-11-11', 'male', '8169157715', 'gucucofok@mailinator.net', 'Dolore amet adipisi', 76, '836184619469', ' Dabwali ', 'Haryana', 'Passportsizephoto.jpg', 'Kamgar', 'Error est nemo volup', 0, 'pay_ENmyj2Ga1KLrfL', '27 june, 2019'),
(102, '0000102', 'Karan', 'Sas', 'Par', '2020-03-11', 'male', '8169157715', 'karan2000patil@gmail.com', '4/4,sohrab chawl,N.M. joshi marg, mumbai 400011', 40011, '166349253914', ' Barpeta Road ', 'Assam', '', 'Kamgar', 'hshhsh', 0, 'order_ENnF6KphmfrTQL', '27 june, 2019'),
(103, '0000103', 'Bree', 'Alfonso Conrad', 'Rios', '2011-04-10', 'male', '8169157715', 'kylynyrise@mailinator.com', 'Perferendis commodi ', 34, '273547153247', ' Hindoli ', 'Rajasthan', 'Passportsizephoto.jpg', 'Kamgar', 'Do nihil exercitatio', 0, 'pay_ENnFp5z2lNN7wn', '27 june, 2019'),
(128, '0000128', 'Callum', 'Briar Moon', 'Rowland', '1976-06-25', 'male', '8169157715', 'viliverifi@mailinator.com', 'Optio aut odit ulla', 54, '293749734239', ' Gangtok ', 'Sikkim', 'Passportsizephoto.jpg', 'member', 'Blanditiis dolor ea ', 0, 'order_EPiyNgpKVV3TRf', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
