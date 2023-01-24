-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2023 at 12:16 PM
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
-- Table structure for table `lms_exam_report`
--

CREATE TABLE `lms_exam_report` (
  `lms_report_id` int(11) NOT NULL,
  `exam_report_user` int(11) NOT NULL,
  `exam_report_paper` int(11) NOT NULL,
  `exam_report_faced` int(11) NOT NULL,
  `exam_report_corect` int(11) NOT NULL,
  `exam_report_percent` int(11) NOT NULL,
  `exam_report_complet_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_exam_report`
--
ALTER TABLE `lms_exam_report`
  ADD PRIMARY KEY (`lms_report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_exam_report`
--
ALTER TABLE `lms_exam_report`
  MODIFY `lms_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
