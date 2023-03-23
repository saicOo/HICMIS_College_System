-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 05:27 AM
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
(2, 'admin', 'admin@app.com', '$2y$10$KQrkgkp7jlWt.nhlmwyhruojxf0hgvG7mAmZQ4YxO4UFJFF5Gu1Zi', 1, 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `exam_id` bigint(20) NOT NULL,
  `attendance_status` enum('attend','completed') NOT NULL DEFAULT 'attend',
  `exam_end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` bigint(20) NOT NULL,
  `exam_title` varchar(255) NOT NULL,
  `exam_datetime` datetime NOT NULL COMMENT 'Date Expire Exam',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `exam_duration` varchar(50) NOT NULL,
  `total_question` int(3) NOT NULL,
  `status` enum('pending','completed','created') NOT NULL DEFAULT 'pending',
  `level_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_title`, `exam_datetime`, `created_at`, `exam_duration`, `total_question`, `status`, `level_id`, `subject_id`) VALUES
(1, 'test 1', '2024-06-12 09:17:00', '2023-03-23 04:17:40', '5 Minute', 5, 'pending', 1, 2);

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

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecture_id`, `lecture_name`, `typ`, `date_lec`, `material_id`) VALUES
(1, 'pexels-mikhail-nilov-8298336.mp4', 1, '20:21:11', 5),
(2, 'production ID_4986111.mp4', 2, '21:12:37', 6),
(3, 'student.mp4', 1, '21:16:28', 8);

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

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `description`, `date_mat`, `sub_id`) VALUES
(5, 'week 1', '2023-09-20', 1),
(6, 'week 2', '2023-09-30', 1),
(7, 'week 3', '2023-10-05', 1),
(8, 'week 1', '2023-11-08', 2);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

CREATE TABLE `option` (
  `option_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `option_number` int(11) NOT NULL,
  `option_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`option_id`, `question_id`, `option_number`, `option_title`) VALUES
(1, 1, 1, 'er1'),
(2, 1, 2, 'er2'),
(3, 1, 3, 'er3'),
(4, 1, 4, 're4'),
(5, 2, 1, 'adf'),
(6, 2, 2, 'dfe'),
(7, 2, 3, 'dfed'),
(8, 2, 4, 'fe'),
(9, 3, 1, '2'),
(10, 3, 2, '11'),
(11, 3, 3, '1010'),
(12, 3, 4, '24'),
(13, 4, 1, 'adf'),
(14, 4, 2, 'dgsf'),
(15, 4, 3, 'gsfg'),
(16, 4, 4, 'sfg'),
(17, 5, 1, 'reqrf'),
(18, 5, 2, 'dsafgsa'),
(19, 5, 3, 'gsafg'),
(20, 5, 4, 'safg');

-- --------------------------------------------------------

--
-- Table structure for table `presences`
--

CREATE TABLE `presences` (
  `pres_id` bigint(20) NOT NULL,
  `std_id` bigint(20) NOT NULL,
  `sub_id` bigint(20) NOT NULL,
  `presence_count` int(11) NOT NULL,
  `pres_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` bigint(20) NOT NULL,
  `exam_id` bigint(20) NOT NULL,
  `question_title` text NOT NULL,
  `answer_option` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `exam_id`, `question_title`, `answer_option`) VALUES
(1, 1, 'qqq', '1'),
(2, 1, 'ssdasd', '2'),
(3, 1, '1+1', '1'),
(4, 1, 'qrqerqe', '1'),
(5, 1, 'asd hdghd shdghs', '1');

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
(1234, 12345649782123, 'maher', 'cairo', '05555555555', 'male', '2004-06-10', 'accept', 1),
(4321, 46655544897531, 'no3man', 'cairo', '02222222222', 'male', '1999-10-11', 'accept', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_revisions`
--

CREATE TABLE `student_revisions` (
  `revision_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `exam_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `answar_option` enum('1','2','3','4') NOT NULL,
  `marks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `lev_id`) VALUES
(1, 'Mathematics', 1),
(2, 'Computer Introduction', 1),
(3, 'Software Engineering', 2),
(4, 'Decision Support Systems', 2);

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
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `subject_id` (`subject_id`);

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
-- Indexes for table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `presences`
--
ALTER TABLE `presences`
  ADD PRIMARY KEY (`pres_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `exam_id` (`exam_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`code_st`),
  ADD UNIQUE KEY `national` (`national`),
  ADD KEY `lev_id` (`lev_id`);

--
-- Indexes for table `student_revisions`
--
ALTER TABLE `student_revisions`
  ADD PRIMARY KEY (`revision_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `exam_id` (`exam_id`),
  ADD KEY `question_id` (`question_id`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `option_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `presences`
--
ALTER TABLE `presences`
  MODIFY `pres_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_revisions`
--
ALTER TABLE `student_revisions`
  MODIFY `revision_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`code_st`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exams_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presences`
--
ALTER TABLE `presences`
  ADD CONSTRAINT `presences_ibfk_1` FOREIGN KEY (`std_id`) REFERENCES `student` (`code_st`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `presences_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`lev_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_revisions`
--
ALTER TABLE `student_revisions`
  ADD CONSTRAINT `student_revisions_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`code_st`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_revisions_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_revisions_ibfk_3` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`exam_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`lev_id`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
