-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 10:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hicmis_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) DEFAULT NULL,
  `status` enum('accept','not accept') NOT NULL DEFAULT 'accept'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `status`) VALUES
(2, 'admin', 'admin@gmail.com', '$2y$10$KQrkgkp7jlWt.nhlmwyhruojxf0hgvG7mAmZQ4YxO4UFJFF5Gu1Zi', 1, 'accept'),
(3, 'saico', 'sayed@gmail.com', '$2y$10$ENikruWFCFDQaVcUXYiUrOiMCbjlaQK..XeEEJxeYaVv0gVVcCvW.', 2, 'not accept'),
(4, 'saico', 'ahmed@gmail.com', '$2y$10$zSeThWk0TDTInE/51P5QJualrvpc8BsSz.QEiAxth8GNCqlkfs5MG', 1, 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `lecture_id` bigint(20) NOT NULL,
  `lecture_name` varchar(255) NOT NULL,
  `typ` int(11) NOT NULL,
  `date_lec` time DEFAULT current_timestamp(),
  `material_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`) VALUES
(1, 'first group'),
(2, 'second group'),
(3, 'third group'),
(4, 'four group');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` bigint(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_mat` date NOT NULL DEFAULT current_timestamp(),
  `sub_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `code_st` bigint(20) NOT NULL,
  `national` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT 'male',
  `birthday` date DEFAULT NULL,
  `status` enum('accept','not accept') NOT NULL DEFAULT 'accept',
  `lev_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`code_st`, `national`, `name`, `address`, `phone`, `gender`, `birthday`, `status`, `lev_id`) VALUES
(123, 123, 'sauc', NULL, NULL, NULL, NULL, 'accept', 1),
(233, 233, 'ahmed amin', 'gizza', '012454555', 'female', '2019-11-28', 'not accept', 3),
(333, 222, 'saico', 'city nassir', '111111111', 'male', '0000-00-00', 'accept', 1),
(3232, 54978246852136, 'yasser', 'city nassir', '11111111111', 'male', '1995-07-20', 'accept', 1),
(3333, 12345687921346, 'خالد زيدان', 'city nassir', '01245459112', 'male', '2001-03-01', 'accept', 3),
(4444, 23145678974154, 'osama', 'city nassir', '11111111111', 'male', '1999-10-11', 'accept', 2),
(5546, 5464654, 'saf', 'gizza', '11111111111', '', '1995-08-17', 'accept', 1),
(6489, 15648921648645, 'ahmed sfgsdfg', 'city nassir', '11111111111', 'male', '1998-10-20', 'not accept', 1),
(6589, 15489721354600, 'sayed', 'city nassir', '01666664486', 'male', '1995-12-28', 'not accept', 2),
(8799, 54978246852132, 'ashraf', 'gizza', '01245459112', 'male', '1996-08-21', 'not accept', 1),
(8888, 15489721354689, 'شهد', 'مصر الجديدة', '11111111111', 'female', '1994-08-19', 'accept', 1),
(9757, 12345679814562, 'omar', 'gizza', '01666664486', 'male', '1998-10-27', 'accept', 1),
(9895, 12345687921366, 'loay', 'cairo', '11111111111', 'male', '1999-10-11', 'accept', 2),
(9999, 12354897216452, 'khaled', 'gizza', '11111111111', 'male', '1999-10-11', 'accept', 2),
(32131, 555, 'sayed', 'city nassir', '01245459112', '', '1995-03-09', 'not accept', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lev_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`lecture_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`code_st`),
  ADD UNIQUE KEY `national` (`national`),
  ADD KEY `lev_id` (`lev_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lev_id` (`lev_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`lev_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`lev_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
