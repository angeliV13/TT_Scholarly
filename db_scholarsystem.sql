-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 09:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scholarsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` int(10) NOT NULL,
  `access_level` int(10) NOT NULL,
  `account_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `educ_id` int(11) NOT NULL COMMENT 'user_education',
  `school` int(11) NOT NULL,
  `year_level` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `school_address` varchar(255) NOT NULL,
  `education_level` int(11) NOT NULL COMMENT '0 Collegiate\r\n1 Senior High School\r\n2 High School\r\n3 Elementary School'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int(10) NOT NULL,
  `grad_w_honor` int(10) NOT NULL COMMENT '0 No\r\n1 Yes',
  `grad_this_sem` int(10) NOT NULL COMMENT '0 No\r\n1 Yes',
  `grad_award` varchar(255) NOT NULL,
  `year_of_grad` varchar(255) NOT NULL,
  `college` int(10) NOT NULL,
  `shs` int(10) NOT NULL,
  `hs` int(10) NOT NULL,
  `elem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `suffix` varchar(5) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` int(11) NOT NULL,
  `address_line` varchar(255) NOT NULL,
  `barangay` int(11) NOT NULL,
  `municipality` int(11) NOT NULL,
  `province` int(11) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  `citizenship` varchar(255) NOT NULL,
  `years_of_residency` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL COMMENT '0 Female\r\n1 Male',
  `civil_status` int(11) NOT NULL COMMENT '0 Single\r\n1 Married\r\n2 Widowed\r\n3 Separated',
  `contact_info` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE_USER_NAME` (`user_name`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`educ_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `educ_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'user_education';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
