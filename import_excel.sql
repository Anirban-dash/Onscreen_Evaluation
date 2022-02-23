-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 06:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `import_excel`
--

-- --------------------------------------------------------

--
-- Table structure for table `coe`
--

CREATE TABLE `coe` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coe`
--

INSERT INTO `coe` (`id`, `name`, `mail`, `pass`) VALUES
(1, 'Coe', 'coe@nist.edu', 'coe@nist');

-- --------------------------------------------------------

--
-- Table structure for table `exan`
--

CREATE TABLE `exan` (
  `exam_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `statuss` varchar(255) DEFAULT NULL,
  `mcq` int(11) DEFAULT NULL,
  `saq` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exan`
--

INSERT INTO `exan` (`exam_id`, `name`, `statuss`, `mcq`, `saq`, `sub_id`) VALUES
(1, 'Computer', 'end', 2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fac_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_id`, `name`, `mail`, `pass`) VALUES
(1, 'Anirban', 'ani@dash.com', 'abcd'),
(2, 'somthing', 'anirbandash.cse.2019@nist.edu', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `op_id` int(11) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `q_id` int(11) DEFAULT NULL,
  `op_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`op_id`, `answer`, `q_id`, `op_no`) VALUES
(17, 'sdf', 235260, 1),
(18, 'fsdf', 235260, 2),
(19, 'fsdfff', 235260, 3),
(20, 'sdf', 235260, 4),
(21, 'sdf', 235261, 1),
(22, 'dsf', 235261, 2),
(23, 'sdf', 235261, 3),
(24, 'sdf', 235261, 4);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `e_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `question`, `type`, `e_id`) VALUES
(235260, 'cdssd', 'mcq', 1),
(235261, 'sdf', 'mcq', 1),
(235262, 'sdfdsf', 'saq', 1),
(235263, 'sdfsd', 'saq', 1),
(235264, 'sdf', 'saq', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`st_id`, `name`, `pass`, `branch`, `mail`) VALUES
(1, 'Example Name', 'abcd', 'CSE', 'example@name.cmom'),
(2, 'someone', 'abcd', 'ECE', 'anirbandash.cse.2019@nist.edu'),
(3, 'anirban dash', 'abcd', 'CSE', 'example@nist.edu'),
(4, 'example', 'cdef', 'ECE', 'example@nist.edu'),
(5, 'example', 'mnop', 'CSE', 'example@nist.edu'),
(6, 'example', 'qrst', 'EEE', 'example@nist.edu');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_code` varchar(255) DEFAULT NULL,
  `sub_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_code`, `sub_name`) VALUES
(1, '19CM201S2T', 'Something'),
(3, '19CM3HS02t', 'Computer'),
(4, 'Python', '2093843CM');

-- --------------------------------------------------------

--
-- Table structure for table `user_ans`
--

CREATE TABLE `user_ans` (
  `ua_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `stat` varchar(255) DEFAULT NULL,
  `e_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_ans`
--

INSERT INTO `user_ans` (`ua_id`, `u_id`, `score`, `stat`, `e_id`) VALUES
(1, 1, '6', 'check', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_exam`
--

CREATE TABLE `user_exam` (
  `ux_id` int(11) NOT NULL,
  `q_id` varchar(255) DEFAULT NULL,
  `u_ans` varchar(255) DEFAULT NULL,
  `e_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_exam`
--

INSERT INTO `user_exam` (`ux_id`, `q_id`, `u_ans`, `e_id`, `u_id`) VALUES
(11, 'cdssd', 'sdf', 1, 1),
(12, 'sdf', 'Unattempt', 1, 1),
(13, 'sdfdsf', 'zv', 1, 1),
(14, 'sdfsd', 'xcvxv', 1, 1),
(15, 'sdf', 'xv', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `us_mark`
--

CREATE TABLE `us_mark` (
  `um_id` int(11) NOT NULL,
  `us_id` int(11) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `q_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coe`
--
ALTER TABLE `coe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exan`
--
ALTER TABLE `exan`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fac_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user_ans`
--
ALTER TABLE `user_ans`
  ADD PRIMARY KEY (`ua_id`);

--
-- Indexes for table `user_exam`
--
ALTER TABLE `user_exam`
  ADD PRIMARY KEY (`ux_id`);

--
-- Indexes for table `us_mark`
--
ALTER TABLE `us_mark`
  ADD PRIMARY KEY (`um_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coe`
--
ALTER TABLE `coe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exan`
--
ALTER TABLE `exan`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `fac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235265;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_ans`
--
ALTER TABLE `user_ans`
  MODIFY `ua_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_exam`
--
ALTER TABLE `user_exam`
  MODIFY `ux_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `us_mark`
--
ALTER TABLE `us_mark`
  MODIFY `um_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
