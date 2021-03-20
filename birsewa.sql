-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 04:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birsewa`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_db`
--

CREATE TABLE `adminlogin_db` (
  `a_login_id` int(60) NOT NULL,
  `a_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `a_email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `a_password` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `adminlogin_db`
--

INSERT INTO `adminlogin_db` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `awork_db`
--

CREATE TABLE `awork_db` (
  `rno` int(60) NOT NULL,
  `r_id` int(60) NOT NULL,
  `r_illness` text COLLATE utf8mb4_bin NOT NULL,
  `r_speciality` text COLLATE utf8mb4_bin NOT NULL,
  `r_shift` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `r_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `r_gender` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `r_age` int(3) NOT NULL,
  `r_phone` bigint(11) NOT NULL,
  `r_add` text COLLATE utf8mb4_bin NOT NULL,
  `r_doc` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `awork_db`
--

INSERT INTO `awork_db` (`rno`, `r_id`, `r_illness`, `r_speciality`, `r_shift`, `r_name`, `r_gender`, `r_age`, `r_phone`, `r_add`, `r_doc`, `r_date`) VALUES
(10, 16, 'Swelling', 'Orthopaedic ', '10am-1pm', 'Sabita Guragain', 'female', 23, 9862295215, ' Biratnagar', 'Rabindra Mishra', '2021-03-19');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_db`
--

CREATE TABLE `doctor_db` (
  `doctor_id` int(60) NOT NULL,
  `d_name` text COLLATE utf8mb4_bin NOT NULL,
  `d_shift` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `d_email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `d_phone` bigint(11) NOT NULL,
  `nmc_no` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `doctor_db`
--

INSERT INTO `doctor_db` (`doctor_id`, `d_name`, `d_shift`, `d_email`, `d_phone`, `nmc_no`, `speciality_id`) VALUES
(47, 'one', 'testdd', 'test@gmail.com', 56565, 6565656, 2),
(48, 'testq', 'test', 'test@gmail.com', 45645, 456456, 1),
(49, 'test', 'two', 'two@gmail.com', 34534535, 3545345, 1),
(50, 'test', 'two', 'two@gmail.com', 345345, 35434, 1),
(51, 'Rojin', 'bihana', 'rojin@gmail.com', 9898989898, 989898, 7);

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_db`
--

CREATE TABLE `requesterlogin_db` (
  `r_login_id` int(60) NOT NULL,
  `r_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `r_email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `r_password` varchar(70) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `speciality_db`
--

CREATE TABLE `speciality_db` (
  `speciality_id` int(11) NOT NULL,
  `speciality_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speciality_db`
--

INSERT INTO `speciality_db` (`speciality_id`, `speciality_name`) VALUES
(1, 'fa'),
(2, 'dd'),
(5, 'yys'),
(6, 'ggggg'),
(7, 'new speciality');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_db`
--

CREATE TABLE `submitrequest_db` (
  `r_id` int(60) NOT NULL,
  `r_illness` text COLLATE utf8mb4_bin NOT NULL,
  `r_speciality` text COLLATE utf8mb4_bin NOT NULL,
  `r_shift` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `r_name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `r_gender` varchar(10) COLLATE utf8mb4_bin NOT NULL,
  `r_age` int(3) NOT NULL,
  `r_phone` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `r_add` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `r_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `submitrequest_db`
--

INSERT INTO `submitrequest_db` (`r_id`, `r_illness`, `r_speciality`, `r_shift`, `r_name`, `r_gender`, `r_age`, `r_phone`, `r_add`, `r_date`) VALUES
(17, 'kala aazar', 'Physician ', '10am-1pm', 'sabita', 'Female', 8, '9875655455', ' Lamjung', '2021-03-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_db`
--
ALTER TABLE `adminlogin_db`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `awork_db`
--
ALTER TABLE `awork_db`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `doctor_db`
--
ALTER TABLE `doctor_db`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `speciality` (`speciality_id`);

--
-- Indexes for table `requesterlogin_db`
--
ALTER TABLE `requesterlogin_db`
  ADD PRIMARY KEY (`r_login_id`);

--
-- Indexes for table `speciality_db`
--
ALTER TABLE `speciality_db`
  ADD PRIMARY KEY (`speciality_id`);

--
-- Indexes for table `submitrequest_db`
--
ALTER TABLE `submitrequest_db`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_db`
--
ALTER TABLE `adminlogin_db`
  MODIFY `a_login_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `awork_db`
--
ALTER TABLE `awork_db`
  MODIFY `rno` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor_db`
--
ALTER TABLE `doctor_db`
  MODIFY `doctor_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `requesterlogin_db`
--
ALTER TABLE `requesterlogin_db`
  MODIFY `r_login_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `speciality_db`
--
ALTER TABLE `speciality_db`
  MODIFY `speciality_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `submitrequest_db`
--
ALTER TABLE `submitrequest_db`
  MODIFY `r_id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_db`
--
ALTER TABLE `doctor_db`
  ADD CONSTRAINT `speciality` FOREIGN KEY (`speciality_id`) REFERENCES `speciality_db` (`speciality_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
