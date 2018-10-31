-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 07:15 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank_system`
--
CREATE DATABASE IF NOT EXISTS `blood_bank_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blood_bank_system`;

-- --------------------------------------------------------

--
-- Table structure for table `blood_request`
--

DROP TABLE IF EXISTS `blood_request`;
CREATE TABLE `blood_request` (
  `sn` int(5) NOT NULL,
  `receiver` varchar(45) NOT NULL,
  `hospital` varchar(45) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `units` int(5) NOT NULL,
  `status` varchar(15) NOT NULL,
  `time_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `blood_request`:
--

--
-- Truncate table before insert `blood_request`
--

TRUNCATE TABLE `blood_request`;
--
-- Dumping data for table `blood_request`
--

INSERT INTO `blood_request` (`sn`, `receiver`, `hospital`, `blood_group`, `units`, `status`, `time_stamp`) VALUES
(1, 'ram@gmail.com', 'kgh@gmail.com', 'B+', 1, 'Pending', '2018-10-22 22:34:01'),
(2, 'vasavi@gmail.com', 'care@gmail.com', 'AB-', 1, 'Approved', '2018-10-22 22:34:34'),
(3, 'vineetha@gmail.com', 'care@gmail.com', 'O-', 1, 'Approved', '2018-10-22 22:35:14'),
(4, 'priya@gmail.com', 'kgh@gmail.com', 'B-', 1, 'Approved', '2018-10-22 22:35:55'),
(5, 'geetha@gmail.com', 'apollo@gmail.com', 'O+', 1, 'Approved', '2018-10-22 22:36:40'),
(6, 'mahesh@gmail.com', 'kgh@gmail.com', 'AB+', 1, 'Approved', '2018-10-22 22:37:25'),
(7, 'uday@gmail.com', 'abc@gmail.com', 'A-', 1, 'Pending', '2018-10-22 22:41:04'),
(8, 'uday@gmail.com', 'abc@gmail.com', 'A-', 1, 'Approved', '2018-10-22 22:41:07'),
(9, 'uday@gmail.com', 'apollo@gmail.com', 'A-', 1, 'Pending', '2018-10-22 22:41:10');

-- --------------------------------------------------------

--
-- Table structure for table `blood_sample`
--

DROP TABLE IF EXISTS `blood_sample`;
CREATE TABLE `blood_sample` (
  `email` varchar(45) NOT NULL,
  `a_plus` int(5) NOT NULL DEFAULT '0',
  `b_plus` int(5) NOT NULL DEFAULT '0',
  `o_plus` int(5) NOT NULL DEFAULT '0',
  `a_neg` int(5) NOT NULL DEFAULT '0',
  `b_neg` int(5) NOT NULL DEFAULT '0',
  `o_neg` int(5) NOT NULL DEFAULT '0',
  `ab_plus` int(5) NOT NULL DEFAULT '0',
  `ab_neg` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `blood_sample`:
--

--
-- Truncate table before insert `blood_sample`
--

TRUNCATE TABLE `blood_sample`;
--
-- Dumping data for table `blood_sample`
--

INSERT INTO `blood_sample` (`email`, `a_plus`, `b_plus`, `o_plus`, `a_neg`, `b_neg`, `o_neg`, `ab_plus`, `ab_neg`) VALUES
('abc@gmail.com', 20, 20, 20, 19, 20, 20, 20, 20),
('apollo@gmail.com', 10, 9, 20, 16, 21, 31, 28, 20),
('care@gmail.com', 50, 31, 24, 45, 9, 36, 15, 10),
('kgh@gmail.com', 31, 22, 13, 43, 24, 19, 27, 38);

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
CREATE TABLE `hospital` (
  `hname` varchar(45) NOT NULL,
  `cname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `mob` bigint(13) NOT NULL,
  `city` varchar(45) NOT NULL,
  `pin` int(10) NOT NULL,
  `address` text NOT NULL,
  `time_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `hospital`:
--

--
-- Truncate table before insert `hospital`
--

TRUNCATE TABLE `hospital`;
--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`hname`, `cname`, `email`, `phone`, `mob`, `city`, `pin`, `address`, `time_stamp`) VALUES
('ABC Hospital', 'Ramesh', 'abc@gmail.com', 2356789, 9856734512, 'Visakhapatnam', 530021, 'Beach Road, Visakhapatnam.', '2018-10-22 20:57:21'),
('Apollo Hospital', 'Mahesh', 'apollo@gmail.com', 2345678, 9876543210, 'Gurgaon', 530029, 'Gurgaon, New Delhi.', '2018-10-22 21:45:55'),
('Care hospitals', 'Suresh', 'care@gmail.com', 2573642, 9874562314, 'Hyderabad', 530025, 'Hitech city, Hyderabad.', '2018-10-22 21:28:57'),
('KGH Hospital', 'Rahul', 'kgh@gmail.com', 2546783, 7845632713, 'Vizianagaram', 530078, 'Near railway station, Vizianagaram.', '2018-10-22 21:47:21');

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

DROP TABLE IF EXISTS `receiver`;
CREATE TABLE `receiver` (
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `mob` bigint(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(45) NOT NULL,
  `pin` int(10) NOT NULL,
  `time_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `receiver`:
--

--
-- Truncate table before insert `receiver`
--

TRUNCATE TABLE `receiver`;
--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`name`, `email`, `dob`, `gender`, `blood_group`, `weight`, `phone`, `mob`, `address`, `city`, `pin`, `time_stamp`) VALUES
('Geetha', 'geetha@gmail.com', '2003-06-19', '', 'O+', 55, 3586574, 9978345623, 'Madhapur, Hyderabad.', 'Hyderabad', 530001, '2018-10-22 21:33:37'),
('Mahesh', 'mahesh@gmail.com', '1987-06-18', '', 'AB+', 68, 2456987, 8965742381, 'Near Vizianagaram Bus stop, Vizianagaram.', 'Vizianagaram', 530024, '2018-10-22 21:41:47'),
('Priya', 'priya@gmail.com', '1990-08-23', '', 'B-', 60, 2478594, 9984567312, 'Gurgaon, New Delhi.', 'Gurgaon', 530056, '2018-10-22 21:37:46'),
('Ram', 'ram@gmail.com', '1998-07-20', '', 'B+', 60, 7654321, 9987564312, 'Benj circle Road, Hill towers Vijayawada.', 'Vijayawada', 539921, '2018-10-22 20:48:59'),
('Sam', 'sam@gmail.com', '2001-10-21', '', 'A+', 50, 2345678, 9842431870, 'Port area, Visakhaptnam, Andhra Pradesh', 'Visakhapatnam', 530031, '2018-10-22 20:47:05'),
('uday', 'uday@gmail.com', '1994-07-21', '', 'A-', 75, 2524789, 8333824566, 'Mysore, Karnataka.', 'Mysore', 530067, '2018-10-22 21:34:57'),
('Vasavi', 'vasavi@gmail.com', '1998-01-17', '', 'AB-', 65, 2856743, 9834568723, 'Gachibowli, Hyderabad.', 'Hyderabad', 530073, '2018-10-22 21:43:25'),
('vineetha', 'vineetha@gmail.com', '1997-05-18', '', 'O-', 50, 2569875, 9543286754, 'Beach Road, Visakhapatnam.', 'Visakhapatnam', 540076, '2018-10-22 21:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE `user_details` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user_details`:
--   `type_id`
--       `user_type` -> `type_id`
--

--
-- Truncate table before insert `user_details`
--

TRUNCATE TABLE `user_details`;
--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`email`, `name`, `pass`, `type_id`) VALUES
('abc@gmail.com', 'ABC Hospital', '$2y$10$q3iwd1WA0OreRasEeTf2n.oXuB9q6RKo6c6BPlvInQCURL8HBjvB2', 2),
('apollo@gmail.com', 'Apollo Hospital', '$2y$10$CqsG.kbmi3ADApGWVjcwFOKZX5qWKNVDnw0I2I7FpAA0JMD41tcA6', 2),
('care@gmail.com', 'Care hospitals', '$2y$10$zfKs91pEeF4VdemN7mZgvu54nwYm68HRa3qQD4.cdJumIFWLJD92y', 2),
('geetha@gmail.com', 'Geetha', '$2y$10$VcUs9sAVwNIxD3tMBij.EO1v7n4ndyv2N69XXcsn6Ia0G1pMZCama', 1),
('kgh@gmail.com', 'KGH Hospital', '$2y$10$IJr1Wqn3CPZW0rjxgQ9gAu6qVFAa6zaFcfgRWVm3UaE9YTuZ1SqH6', 2),
('mahesh@gmail.com', 'Mahesh', '$2y$10$1dRHk/3y.L/9WS8ONoGtv.teUXpImMsZedEwrg2T9sm598v07lxpG', 1),
('priya@gmail.com', 'Priya', '$2y$10$E9NLeivLuQC09FL3lTi0G.kUH0XPnQOtbsbZj3SZREP8PxLlSt7Ca', 1),
('ram@gmail.com', 'Ram', '$2y$10$I/H.ihH6FwWgTUmHTjMqW.vfpShNYf0RI4Rgy8ubX3dRXaCyMa2OO', 1),
('sam@gmail.com', 'Sam', '$2y$10$TLwGw2Hzus2NGUEluDzq4elHJeiCSiTefsgXZJ1vUkNeOoItxO742', 1),
('uday@gmail.com', 'uday', '$2y$10$Jd6vMbsxx2.WhG.IIpzH/eC9qNWl6xUIoBd5CLEKNnbtqDX.xgKjW', 1),
('vasavi@gmail.com', 'Vasavi', '$2y$10$gL7ynhQwmiJAww4mSbvtE.debARpuykbksI7fb9gG4ISabUSYVKJ.', 1),
('vineetha@gmail.com', 'vineetha', '$2y$10$tDMc3ECkDCyaUvt/F0HMRuH39l7VvW.2Yyr.GMD1zXl7R4Jutr28K', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `type_id` int(5) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `user_type`:
--

--
-- Truncate table before insert `user_type`
--

TRUNCATE TABLE `user_type`;
--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type`) VALUES
(1, 'receiver'),
(2, 'hospital');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_request`
--
ALTER TABLE `blood_request`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `blood_sample`
--
ALTER TABLE `blood_sample`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_details_fk0` (`type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `type_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_fk0` FOREIGN KEY (`type_id`) REFERENCES `user_type` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
