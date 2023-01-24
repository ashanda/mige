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
-- Table structure for table `lms_answer`
--

CREATE TABLE `lms_answer` (
  `lms_answer_id` int(11) NOT NULL,
  `lms_answer_user` int(11) NOT NULL,
  `lms_answer_paper` int(11) NOT NULL,
  `lms_answer_q` int(11) NOT NULL,
  `lms_answer_a` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_answer`
--

INSERT INTO `lms_answer` (`lms_answer_id`, `lms_answer_user`, `lms_answer_paper`, `lms_answer_q`, `lms_answer_a`) VALUES
(16, 671, 12, 14, 2),
(15, 671, 12, 13, 2),
(17, 671, 12, 15, 2),
(18, 671, 12, 16, 2),
(19, 671, 12, 17, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_answer`
--
ALTER TABLE `lms_answer`
  ADD PRIMARY KEY (`lms_answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_answer`
--
ALTER TABLE `lms_answer`
  MODIFY `lms_answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
