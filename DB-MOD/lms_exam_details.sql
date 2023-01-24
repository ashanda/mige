-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2023 at 12:15 PM
-- Server version: 5.7.33
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mige`
--

-- --------------------------------------------------------

--
-- Table structure for table `lms_exam_details`
--

CREATE TABLE `lms_exam_details` (
  `lms_exam_id` int(11) NOT NULL,
  `lms_exam_add_user` int(11) DEFAULT NULL,
  `lms_exam_system_id` int(11) NOT NULL,
  `lms_exam_name` varchar(255) NOT NULL,
  `lms_exam_course` int(11) NOT NULL,
  `lms_exam_question` int(11) NOT NULL,
  `lms_exam_time_duration` int(11) NOT NULL,
  `lms_exam_start_time` datetime NOT NULL,
  `lms_exam_end_time` datetime NOT NULL,
  `lms_exam_add_time` datetime NOT NULL,
  `lms_exam_pay_type` int(11) DEFAULT NULL COMMENT '1=pay, 0=free'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_exam_details`
--

INSERT INTO `lms_exam_details` (`lms_exam_id`, `lms_exam_add_user`, `lms_exam_system_id`, `lms_exam_name`, `lms_exam_course`, `lms_exam_question`, `lms_exam_time_duration`, `lms_exam_start_time`, `lms_exam_end_time`, `lms_exam_add_time`, `lms_exam_pay_type`) VALUES
(11, 68, 1640751056, 'test 01', 387, 5, 20, '2021-12-29 09:10:00', '2021-12-29 09:30:00', '2021-12-29 09:40:56', 0),
(12, NULL, 1669444955, 'test', 628, 5, 30, '2022-11-26 10:00:00', '2022-11-27 11:00:00', '2022-11-26 12:12:35', NULL),
(13, NULL, 1669446966, 'test02', 729, 2, 30, '2022-11-26 10:00:00', '2022-11-27 11:00:00', '2022-11-26 12:46:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_exam_details`
--
ALTER TABLE `lms_exam_details`
  ADD PRIMARY KEY (`lms_exam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_exam_details`
--
ALTER TABLE `lms_exam_details`
  MODIFY `lms_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
