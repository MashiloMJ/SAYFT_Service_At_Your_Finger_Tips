-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 10:09 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS sayft;
USE sayft;

--
-- Database: `sayft`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `booking_date`, `status`) VALUES
(84, 8, '2021-08-07 21:09:09', 1),
(85, 8, '2021-08-07 22:32:40', 1),
(86, 8, '2021-08-16 12:04:19', 1),
(87, 8, '2021-08-16 12:04:15', 1),
(88, 8, '2021-08-16 12:04:10', 1),
(89, 8, '2021-08-10 00:08:54', 1),
(90, 8, '2021-08-10 00:20:51', 1),
(91, 8, '2021-08-10 00:23:49', 0),
(92, 8, '2021-08-16 12:59:18', 1),
(93, 8, '2021-08-25 07:07:03', 1),
(94, 8, '2021-08-25 07:07:09', 1),
(95, 8, '2021-08-25 07:08:01', 0),
(96, 8, '2021-08-25 07:20:09', 0),
(97, 8, '2021-08-25 07:35:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `bd_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`bd_id`, `user_id`, `booking_id`, `service_id`, `qty`, `price`) VALUES
(20, 8, 76, 15, 200, '35'),
(21, 8, 76, 13, 1, '1699'),
(22, 8, 77, 13, 5, '1699'),
(23, 8, 79, 13, 1, '1699'),
(24, 8, 80, 13, 1, '1699'),
(25, 8, 80, 15, 175, '35'),
(26, 8, 81, 13, 1, '1699'),
(27, 8, 81, 15, 176, '35'),
(28, 8, 82, 13, 10, '1699'),
(29, 8, 83, 13, 3, '1699'),
(30, 8, 83, 15, 900, '35'),
(31, 8, 84, 15, 70, '35'),
(32, 8, 85, 14, 1, '4000'),
(33, 8, 86, 15, 60, '35'),
(34, 8, 87, 13, 10, '1699'),
(35, 8, 88, 15, 42, '35'),
(36, 8, 88, 14, 2, '4000'),
(37, 8, 88, 13, 3, '1699'),
(38, 8, 0, 15, 2, '35'),
(39, 8, 0, 14, 10, '4000'),
(40, 8, 0, 15, 28, '35'),
(41, 8, 89, 14, 12, '4000'),
(42, 8, 90, 15, 50, '35'),
(43, 8, 91, 14, 5, '4000'),
(44, 8, 91, 15, 500, '35'),
(45, 8, 92, 15, 96, '35'),
(46, 8, 93, 15, 150, '35'),
(47, 8, 94, 14, 1, '4000'),
(48, 8, 95, 15, 103, '35'),
(49, 8, 96, 15, 2, '35'),
(50, 8, 97, 15, 40, '35');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `suburb` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `stand_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `user_id`, `province`, `city`, `suburb`, `street_name`, `stand_no`) VALUES
(14, 10, 'Kwazulu Natal', 'Durban', 'Kwa mashu', 'Van Stripen', '2001'),
(15, 11, 'Limpopo', 'Tzaneen', 'Bolobedu', 'Sambo', '73'),
(17, 6, 'Gauteng', 'Pretoria', 'Soshanguve', 'Van Stripen', '2001'),
(19, 8, 'Gauteng', 'Pretoria', 'Soshanguve', '88 jaivane', '73');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `balAmount` decimal(10,0) NOT NULL,
  `totAmount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `booking_id`, `payment_type`, `payment_method`, `balAmount`, `totAmount`) VALUES
(17, 8, 80, 'Deposit', 'EFT', '8', '8'),
(18, 8, 81, 'Deposit', 'EFT', '8', '8'),
(19, 8, 82, 'Deposit', 'EFT', '17', '17'),
(20, 8, 83, 'Deposit', 'EFT', '37', '37'),
(21, 8, 84, 'Deposit', 'EFT', '2', '2'),
(22, 8, 85, 'Deposit', 'EFT', '4', '4'),
(23, 8, 86, 'Full Amount', 'EFT', '2', '2'),
(24, 8, 87, 'Deposit', 'EFT', '17', '17'),
(25, 8, 88, 'Deposit', 'EFT', '15', '15'),
(29, 8, 89, 'Full Amount', 'EFT', '48', '48'),
(30, 8, 90, 'Full Amount', 'EFT', '2', '2250'),
(31, 8, 91, 'Full Amount', 'EFT', '38000', '38000'),
(32, 8, 92, 'Deposit', 'EFT', '600', '600'),
(33, 8, 93, 'Full Amount', 'EFT', '1150', '1150'),
(34, 8, 94, 'Full Amount', 'EFT', '900', '900'),
(35, 8, 95, 'Full Amount', 'EFT', '3605', '3605'),
(36, 8, 96, 'Deposit', 'EFT', '30', '70'),
(37, 8, 97, 'Deposit', 'EFT', '700', '1400');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `user_id`, `service_type`, `quantity`, `image`, `description`, `price`) VALUES
(14, 10, 'Tents', 20, 'tent.jpeg', 'white tent, for big events and small events', '4000'),
(15, 10, 'Food', 1000, 'food.jpeg', 'Meat and pap', '35.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `id_number` varchar(13) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `surname`, `id_number`, `age`, `gender`, `email`, `phone_number`, `account_type`, `password`) VALUES
(8, 'Kabelo', 'Bantwini', '0111015696082', '20', 'Male', 'kabelomighty@gmail.com', '0727780512', 'Client', '12eaab111b446b732cc93aa6ba43cf80'),
(10, 'Manuel', 'sambo', '0212055696082', '19', 'Male', 'kabelo1@gmail.com', '0727780521', 'Service Provider', '12eaab111b446b732cc93aa6ba43cf80'),
(11, 'Kabelo', 'Hlungwani', '0212115696082', '19', 'Male', 'kabelomighty@gmail.co.za', '0727780512', 'Admin', '12eaab111b446b732cc93aa6ba43cf80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `account_id` (`user_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`bd_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `account_id` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `account_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `bd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
