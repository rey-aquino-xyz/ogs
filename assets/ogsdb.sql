-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 09:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `typeid` varchar(50) DEFAULT NULL,
  `studentid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `typeid`, `studentid`) VALUES
(3, 'admin', 'admin', '1', '0'),
(5, 'werwer', 'qwe', '2', '05098d45-ea92-42aa-be91-f5745556a387'),
(6, '@lai', 'user', '2', 'fc320bb3-5277-49e8-94ab-3f6a547ba6e6'),
(7, 'qwe', 'qwe', '2', '1e905ab5-afba-47b5-b2f1-9d5f25d83fb6'),
(8, 'asdasd', 'asdasd', '2', '96144e28-5896-47a4-bcd6-91fc319ed798');

-- --------------------------------------------------------

--
-- Table structure for table `dbfile`
--

CREATE TABLE `dbfile` (
  `id` int(11) NOT NULL,
  `fileid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbfile`
--

INSERT INTO `dbfile` (`id`, `fileid`) VALUES
(20, 27),
(21, 28),
(22, 29),
(23, 30),
(24, 32);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(50) NOT NULL,
  `filename` varchar(50) DEFAULT NULL,
  `strandid` varchar(10) DEFAULT NULL,
  `semesterid` varchar(10) DEFAULT NULL,
  `subjectid` varchar(10) DEFAULT NULL,
  `quarterid` varchar(10) DEFAULT NULL,
  `sy` varchar(10) DEFAULT NULL,
  `gradelevelid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `filename`, `strandid`, `semesterid`, `subjectid`, `quarterid`, `sy`, `gradelevelid`) VALUES
(27, '6287b2022a25c.xlsx', '1', '1', '1', '1', '2021-2022', 1),
(28, '6287b20dd0ed9.xlsx', '1', '1', '1', '2', '2021-2022', 1),
(29, '6287b22ce0a65.xlsx', '1', '2', '10', '3', '2021-2022', 1),
(30, '6287b23ba8ac7.xlsx', '1', '2', '10', '4', '2021-2022', 1),
(32, '62884b14ebf67.xlsx', '1', '1', '2', '1', '2021-2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(50) NOT NULL,
  `lrn` varchar(50) DEFAULT NULL,
  `gradelevelid` varchar(5) DEFAULT NULL,
  `strandid` varchar(5) DEFAULT NULL,
  `semesterid` varchar(5) DEFAULT NULL,
  `quarterid` varchar(5) DEFAULT NULL,
  `subjectid` varchar(5) DEFAULT NULL,
  `grade` varchar(5) DEFAULT NULL,
  `sy` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `lrn`, `gradelevelid`, `strandid`, `semesterid`, `quarterid`, `subjectid`, `grade`, `sy`) VALUES
(229, '103877091255', '1', '1', '1', '1', '1', '85', '2021-2022'),
(230, '103877091256', '1', '1', '1', '1', '1', '84', '2021-2022'),
(231, '103877091257', '1', '1', '1', '1', '1', '86', '2021-2022'),
(232, '103877091258', '1', '1', '1', '1', '1', '85', '2021-2022'),
(233, '103877091259', '1', '1', '1', '1', '1', '84', '2021-2022'),
(234, '103877091260', '1', '1', '1', '1', '1', '85', '2021-2022'),
(235, '103877091261', '1', '1', '1', '1', '1', '82', '2021-2022'),
(236, '103877091262', '1', '1', '1', '1', '1', '86', '2021-2022'),
(237, '103877091263', '1', '1', '1', '1', '1', '81', '2021-2022'),
(238, '103877091255', '1', '1', '1', '2', '1', '87', '2021-2022'),
(239, '103877091256', '1', '1', '1', '2', '1', '85', '2021-2022'),
(240, '103877091257', '1', '1', '1', '2', '1', '84', '2021-2022'),
(241, '103877091258', '1', '1', '1', '2', '1', '81', '2021-2022'),
(242, '103877091259', '1', '1', '1', '2', '1', '82', '2021-2022'),
(243, '103877091260', '1', '1', '1', '2', '1', '86', '2021-2022'),
(244, '103877091261', '1', '1', '1', '2', '1', '85', '2021-2022'),
(245, '103877091262', '1', '1', '1', '2', '1', '84', '2021-2022'),
(246, '103877091263', '1', '1', '1', '2', '1', '85', '2021-2022'),
(247, '103877091255', '1', '1', '2', '3', '10', '81', '2021-2022'),
(248, '103877091256', '1', '1', '2', '3', '10', '85', '2021-2022'),
(249, '103877091257', '1', '1', '2', '3', '10', '84', '2021-2022'),
(250, '103877091258', '1', '1', '2', '3', '10', '81', '2021-2022'),
(251, '103877091259', '1', '1', '2', '3', '10', '89', '2021-2022'),
(252, '103877091260', '1', '1', '2', '3', '10', '86', '2021-2022'),
(253, '103877091261', '1', '1', '2', '3', '10', '82', '2021-2022'),
(254, '103877091262', '1', '1', '2', '3', '10', '86', '2021-2022'),
(255, '103877091263', '1', '1', '2', '3', '10', '85', '2021-2022'),
(256, '103877091255', '1', '1', '2', '4', '10', '87', '2021-2022'),
(257, '103877091256', '1', '1', '2', '4', '10', '85', '2021-2022'),
(258, '103877091257', '1', '1', '2', '4', '10', '85', '2021-2022'),
(259, '103877091258', '1', '1', '2', '4', '10', '86', '2021-2022'),
(260, '103877091259', '1', '1', '2', '4', '10', '85', '2021-2022'),
(261, '103877091260', '1', '1', '2', '4', '10', '85', '2021-2022'),
(262, '103877091261', '1', '1', '2', '4', '10', '84', '2021-2022'),
(263, '103877091262', '1', '1', '2', '4', '10', '85', '2021-2022'),
(264, '103877091263', '1', '1', '2', '4', '10', '86', '2021-2022'),
(265, '103877091255', '1', '1', '1', '1', '2', '81', '2021-2022'),
(266, '103877091256', '1', '1', '1', '1', '2', '85', '2021-2022'),
(267, '103877091257', '1', '1', '1', '1', '2', '84', '2021-2022'),
(268, '103877091258', '1', '1', '1', '1', '2', '81', '2021-2022'),
(269, '103877091259', '1', '1', '1', '1', '2', '89', '2021-2022'),
(270, '103877091260', '1', '1', '1', '1', '2', '86', '2021-2022'),
(271, '103877091261', '1', '1', '1', '1', '2', '82', '2021-2022'),
(272, '103877091262', '1', '1', '1', '1', '2', '86', '2021-2022'),
(273, '103877091263', '1', '1', '1', '1', '2', '85', '2021-2022');

-- --------------------------------------------------------

--
-- Table structure for table `strand`
--

CREATE TABLE `strand` (
  `id` int(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strand`
--

INSERT INTO `strand` (`id`, `name`) VALUES
(1, 'HUMSS');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(50) NOT NULL,
  `fisrtname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `lrn` varchar(50) DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `dib` varchar(50) DEFAULT NULL,
  `lrnstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fisrtname`, `lastname`, `lrn`, `sex`, `dib`, `lrnstatus`) VALUES
('05098d45-ea92-42aa-be91-f5745556a387', 'werwer', 'werwer', '345345345', 'Male', '2022-05-19', '1'),
('1e905ab5-afba-47b5-b2f1-9d5f25d83fb6', 'qweqwe', 'qweqwe', '234234234234', 'Male', '2022-04-26', '1'),
('96144e28-5896-47a4-bcd6-91fc319ed798', 'werwer', 'werwer', '425235423452', 'Female', '2022-04-25', '1'),
('fc320bb3-5277-49e8-94ab-3f6a547ba6e6', 'Lailanie', 'Tamang', '103877091255', 'Female', '1994-05-03', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(1, 'Oral Communication'),
(2, 'Komunikasyon at Pananaliksik sa Wika at Kulturang '),
(3, 'General Mathematics'),
(4, 'Physical Education and Health'),
(5, 'Personal Development/Pnasariling Kaunlaran'),
(6, 'Understanding Culture, Society and Politics'),
(7, 'empowerment Technologies'),
(8, 'Philippine Politics and Governance'),
(9, 'Discipline and Ideas in the Social Sciences'),
(10, 'Reading and Writing'),
(11, 'Pagbasa at Pagsusuri ng Iba\'t Ibang Teksto Tungo s'),
(12, '21st Century Literature from the Philippines and t'),
(13, 'Statistics and Probability'),
(14, 'Introduction to Philosophy of the Human Person'),
(15, 'Physical Education and Health'),
(16, 'English for Academic and Professional Purposes'),
(17, 'Practical Research I'),
(18, 'Introduction to World Religions and Belief Systems'),
(19, 'Disciplines and Ideas in the Applied Social Scienc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbfile`
--
ALTER TABLE `dbfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strand`
--
ALTER TABLE `strand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dbfile`
--
ALTER TABLE `dbfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `strand`
--
ALTER TABLE `strand`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
