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
-- Table structure for table `lms_mcq_questions`
--

CREATE TABLE `lms_mcq_questions` (
  `id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `ans_1` text NOT NULL,
  `ans_2` text NOT NULL,
  `ans_3` text NOT NULL,
  `ans_4` text NOT NULL,
  `ans` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lms_mcq_questions`
--

INSERT INTO `lms_mcq_questions` (`id`, `exam_id`, `question`, `ans_1`, `ans_2`, `ans_3`, `ans_4`, `ans`) VALUES
(6, 9, '<p>whai is micro organisms<img alt=\"\" src=\"https://guruniwasainstitute.lk/lms/dashboard/paper_img/1640494178ABHIMANA_SIR_SCIENCE_Low_quality.jpeg\" /></p>\r\n', 'qwdqw', 'qdqdqd', 'qdqdwq', 'dqwddq', 2),
(7, 9, '<p>afsgagearbeabzsvszvzafwefwefw</p>\r\n', 'fFFWFwf', 'qfFFw', 'dwfwaffafFAf', 'vsavasvasvsv', 4),
(8, 10, '<p>test 01?</p>\r\n', '1', '2', '3', '4', 2),
(9, 10, '<p>test 2</p>\r\n', '1', '2', '3', '4', 1),
(10, 10, '<p>test 03</p>\r\n', '1', '2', '3', '4', 3),
(11, 10, '<p>test 04</p>\r\n', '1', '2', '3', '4', 4),
(12, 10, '<p>test 05</p>\r\n', '1', '2', '3', '4', 2),
(13, 12, 'test 01', 'asd', 'sad', 'asd', 'asdasd', 2),
(14, 12, '7845', '1', '2', '3', '7', 1),
(15, 12, 'qwe', 'qwre', 'wqe', 'wqe', 'wqe', 3),
(16, 12, 'qweqweqwe', 'wqe', 'qwe', 'qweq', 'wqeqw', 2),
(17, 12, 'qweqweqwe', 'wqe', 'wqe', 'wqe', 'qwe', 2),
(18, 13, '128', 'fd', 'fdg', 'fdg', 'fdg', 2),
(19, 13, '5478', 'vvcbv', 'vcb', 'vcb', 'cvb', 4),
(20, 13, 'cbcv', 'vcb', 'vcb', 'vcb', 'vcb', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lms_mcq_questions`
--
ALTER TABLE `lms_mcq_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lms_mcq_questions`
--
ALTER TABLE `lms_mcq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
