-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2019 at 01:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mite_olx`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_to_sale`
--

CREATE TABLE `item_to_sale` (
  `username` varchar(50) NOT NULL,
  `id` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `price` int(10) NOT NULL,
  `pic` varchar(80) NOT NULL,
  `decription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(25) NOT NULL,
  `phone_number` bigint(15) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `phone_number`, `branch`, `email`, `password`) VALUES
('Niranjan Malya', 9591280007, 'ISE', 'niranjanmalya5@gmail.com', 'niranjanmalyavn'),
('Sandhya Bhagavath', 8884810439, 'EC', 'sandhyabhagavath@gmail.com', 'sandhya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_to_sale`
--
ALTER TABLE `item_to_sale`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
