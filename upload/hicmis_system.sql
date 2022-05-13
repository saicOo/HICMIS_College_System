-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2022 at 04:35 AM
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
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `exam_id` bigint(20) NOT NULL,
  `attendance_status` enum('attend','completed') NOT NULL DEFAULT 'attend',
  `exam_end_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enroll_id`, `student_id`, `exam_id`, `attendance_status`, `exam_end_time`) VALUES
(24, 6489, 5, 'completed', NULL),
(38, 9757, 5, 'completed', '2022-05-12 04:55:00'),
(39, 8799, 5, 'completed', '2022-05-12 05:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` bigint(20) NOT NULL,
  `exam_title` varchar(255) NOT NULL,
  `exam_datetime` datetime NOT NULL,
  `exam_duration` varchar(50) NOT NULL,
  `total_question` int(3) NOT NULL,
  `status` enum('pending','completed','created') NOT NULL DEFAULT 'pending',
  `level_id` bigint(20) NOT NULL,
  `subject_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_title`, `exam_datetime`, `exam_duration`, `total_question`, `status`, `level_id`, `subject_id`) VALUES
(4, 'امتحان تكاليف الفرقة الاولي', '2022-05-11 02:15:00', '5 Minute', 5, 'completed', 1, 80),
(5, 'امتحان محاسبة', '2022-05-11 12:58:00', '5 Minute', 5, 'completed', 1, 77);

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
(42, 'production ID_4986111.mp4', 2, '21:56:20', 91),
(43, 'floor-park.jpg', 1, '22:12:45', 92),
(44, 'pexels-mikhail-nilov-8298336.mp4', 1, '00:51:56', 94);

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
(91, 'المحاضرة الاولي', '2022-05-05', 75),
(92, 'المحاضرة الثانية', '2022-05-05', 75),
(93, 'المحاضرة الثالثة', '2022-05-05', 75),
(94, 'المحاضرة الاولي', '2022-05-05', 78);

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
(17, 5, 1, '1'),
(18, 5, 2, '6'),
(19, 5, 3, '9'),
(20, 5, 4, '3'),
(21, 6, 1, 'طه حسين'),
(22, 6, 2, 'فريد شوقي'),
(23, 6, 3, 'لا شئ مما سبق'),
(24, 6, 4, 'الاهلي'),
(25, 7, 1, '4'),
(26, 7, 2, '585'),
(27, 7, 3, '8797'),
(28, 7, 4, 'لا شئ مما سبق'),
(29, 8, 1, 'باريس'),
(30, 8, 2, 'برشلونه'),
(31, 8, 3, 'ريال مدريد'),
(32, 8, 4, 'الاهلي'),
(33, 9, 1, 'سسس'),
(34, 9, 2, 'ئئئ'),
(35, 9, 3, 'ببب'),
(36, 9, 4, 'يي'),
(37, 10, 1, 'باريس'),
(38, 10, 2, 'فريد شوقي'),
(39, 10, 3, 'لا شئ مما سبق'),
(40, 10, 4, 'الاهلي'),
(41, 11, 1, '1'),
(42, 11, 2, '7'),
(43, 11, 3, '9'),
(44, 11, 4, '3'),
(45, 12, 1, 'ممثل'),
(46, 12, 2, 'رجل اعمال'),
(47, 12, 3, 'ريال مدريد'),
(48, 12, 4, 'مطرب شعبي'),
(49, 13, 1, 'طه حسين'),
(50, 13, 2, 'فريد شوقي'),
(51, 13, 3, 'فؤاد المهندس'),
(52, 13, 4, 'لا شئ مما سبق'),
(53, 14, 1, 'ممثل'),
(54, 14, 2, 'ئئئ'),
(55, 14, 3, 'لا شئ مما سبق'),
(56, 14, 4, 'اجابة اخري');

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

--
-- Dumping data for table `presences`
--

INSERT INTO `presences` (`pres_id`, `std_id`, `sub_id`, `presence_count`, `pres_date`) VALUES
(1, 9999, 78, 2, '2022-05-05 11:24:39'),
(2, 32131, 76, 2, '2022-05-05 11:24:39'),
(3, 32131, 75, 2, '2022-05-09 22:54:56'),
(4, 3232, 76, 5, '2022-05-05 11:30:26'),
(5, 32131, 77, 5, '2022-05-05 12:42:40'),
(6, 8799, 75, 2, '2022-05-13 02:32:40'),
(7, 8799, 76, 1, '2022-05-05 13:31:01'),
(8, 333, 75, 4, '2022-05-05 23:59:42'),
(9, 333, 77, 1, '2022-05-05 23:30:48'),
(10, 6489, 75, 1, '2022-05-11 08:43:10'),
(11, 6489, 77, 1, '2022-05-12 02:48:22'),
(12, 9757, 75, 1, '2022-05-12 23:27:26'),
(13, 9757, 77, 1, '2022-05-12 23:53:00'),
(14, 8799, 77, 1, '2022-05-13 01:44:40');

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
(5, 4, '4  - 3 =', '1'),
(6, 4, 'من قائل هذه العبارة', '3'),
(7, 4, 'السمبلويين', '4'),
(8, 4, 'احسن نادي في اروبا', '4'),
(9, 4, 'شنيبمشكحيب', '1'),
(10, 5, 'احسن نادي في اروبا', '3'),
(11, 5, '4  - 3 =', '2'),
(12, 5, 'من قائل هذه العبارة', '2'),
(13, 5, 'من الذي قتل علي بيه الكبير', '3'),
(14, 5, 'من هو نيوتين', '4');

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
(233, 233, 'ahmed amin', 'gizza', '012454555', 'female', '2019-11-28', 'accept', 3),
(333, 222, 'saico', 'city nassir', '111111111', 'male', '0000-00-00', 'not accept', 1),
(3232, 54978246852136, 'yasser', 'city nassir', '11111111111', 'male', '1995-07-20', 'accept', 1),
(3333, 12345687921346, 'خالد زيدان', 'city nassir', '01245459112', 'male', '2001-03-01', 'accept', 3),
(4444, 23145678974154, 'osama', 'city nassir', '11111111111', 'male', '1999-10-11', 'accept', 2),
(5546, 5464654, 'saf', 'gizza', '11111111111', '', '1995-08-17', 'accept', 1),
(6489, 15648921648645, 'ahmed sfgsdfg', 'city nassir', '11111111111', 'male', '1998-10-20', 'accept', 1),
(6589, 15489721354600, 'sayed', 'city nassir', '01666664486', 'male', '1995-12-28', 'not accept', 2),
(8799, 54978246852132, 'ashraf', 'gizza', '01245459112', 'male', '1996-08-21', 'accept', 1),
(8888, 15489721354689, 'شهد', 'مصر الجديدة', '11111111111', 'female', '1994-08-19', 'accept', 1),
(9757, 12345679814562, 'omar', 'gizza', '01666664486', 'male', '1998-10-27', 'accept', 1),
(9895, 12345687921366, 'loay', 'cairo', '11111111111', 'male', '1999-10-11', 'accept', 2),
(9999, 12354897216452, 'khaled', 'gizza', '11111111111', 'male', '1999-10-11', 'accept', 2),
(32131, 555, 'sayed', 'city nassir', '01245459112', '', '1995-03-09', 'accept', 1);

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

--
-- Dumping data for table `student_revisions`
--

INSERT INTO `student_revisions` (`revision_id`, `student_id`, `exam_id`, `question_id`, `answar_option`, `marks`) VALUES
(1, 9757, 5, 10, '3', '1 mark'),
(2, 9757, 5, 11, '2', '1 mark'),
(3, 9757, 5, 12, '2', '1 mark'),
(4, 9757, 5, 13, '3', '1 mark'),
(5, 9757, 5, 14, '2', '0 mark'),
(6, 8799, 5, 10, '2', '0 mark'),
(7, 8799, 5, 11, '2', '1 mark'),
(8, 8799, 5, 12, '1', '0 mark'),
(9, 8799, 5, 13, '4', '0 mark'),
(10, 8799, 5, 14, '4', '1 mark');

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
(75, 'قواعد بيانات', 1),
(76, 'نظم تشغيل', 1),
(77, 'محاسبة', 1),
(78, 'رياضة', 2),
(79, 'احصاء', 2),
(80, 'تكاليف', 1);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `option`
--
ALTER TABLE `option`
  MODIFY `option_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `presences`
--
ALTER TABLE `presences`
  MODIFY `pres_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_revisions`
--
ALTER TABLE `student_revisions`
  MODIFY `revision_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

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
