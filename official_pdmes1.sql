-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2022 at 02:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `official_pdmes`
--

-- --------------------------------------------------------

--
-- Table structure for table `a`
--

CREATE TABLE `a` (
  `aaaaaa` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `name2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `a`
--

INSERT INTO `a` (`aaaaaa`, `name`, `name2`) VALUES
(6, 'mathew', 'pogi');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eligibility_for_elementary_school_enrollment`
--

CREATE TABLE `eligibility_for_elementary_school_enrollment` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `credential_presented` varchar(255) NOT NULL,
  `name_of_school` varchar(50) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `address_of_school` varchar(255) NOT NULL,
  `pept_passer` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `date_of_assessment` varchar(50) NOT NULL,
  `others` varchar(50) NOT NULL,
  `specify` varchar(50) NOT NULL,
  `name_and_address_testing_center` varchar(255) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eligibility_for_elementary_school_enrollment`
--

INSERT INTO `eligibility_for_elementary_school_enrollment` (`id`, `lrn`, `credential_presented`, `name_of_school`, `school_id`, `address_of_school`, `pept_passer`, `rating`, `date_of_assessment`, `others`, `specify`, `name_and_address_testing_center`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(20, '109857060083', 'ECCD Checklist,Kindergarden Certificate of Completion', 'SECRET', '19283', 'PUTOTOY', '1', 'sample rating', 'Mar-02-2022', '1', 'sample other', 'SAMPLE TESTER', 'sample remarks', '2022-03-28 12:43:00', '2022-03-28 12:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `learners_personal_infos`
--

CREATE TABLE `learners_personal_infos` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `birth_date` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `learners_personal_infos`
--

INSERT INTO `learners_personal_infos` (`id`, `lrn`, `last_name`, `first_name`, `middle_name`, `suffix`, `birth_date`, `sex`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(27, '109857060083', 'Lapore', 'Jade mark', 'Hundsum', '', 'Mar-28-2022', 'Male', 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `remedial_classes`
--

CREATE TABLE `remedial_classes` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `learning_areas` varchar(50) NOT NULL,
  `final_rating` varchar(50) NOT NULL,
  `remedial_class_mark` varchar(50) NOT NULL,
  `recomputed_final_grade` varchar(50) NOT NULL,
  `phase` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remedial_classes`
--

INSERT INTO `remedial_classes` (`id`, `lrn`, `date_from`, `date_to`, `learning_areas`, `final_rating`, `remedial_class_mark`, `recomputed_final_grade`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(1, '109857060083', '2022-03-23', '2022-03-24', 'sample areas', '89', 'PASSED', '88', 1, 'PASSED', '2022-03-27 18:45:41', '2022-03-27 18:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `scholastic_records`
--

CREATE TABLE `scholastic_records` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `school_id` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `classified_as_grade` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `name_of_teacher` varchar(50) NOT NULL,
  `signature` varchar(50) NOT NULL,
  `phase` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` date NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholastic_records`
--

INSERT INTO `scholastic_records` (`id`, `lrn`, `school`, `school_id`, `district`, `division`, `region`, `classified_as_grade`, `section`, `school_year`, `name_of_teacher`, `signature`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(3, '109857060083', 'beang', '9281', '6', '6', 'ncr', '4', 'a', '2021-2022', 'boang', '', 1, 'none', '2022-03-28', '2022-03-28 12:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_final_ratings`
--

CREATE TABLE `student_final_ratings` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `subject_id` int(50) NOT NULL,
  `final_rating` int(11) NOT NULL,
  `term` varchar(50) NOT NULL,
  `phase` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_final_ratings`
--

INSERT INTO `student_final_ratings` (`id`, `lrn`, `subject_id`, `final_rating`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(145, '109857060083', 1, 83, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(146, '109857060083', 2, 85, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(147, '109857060083', 3, 87, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(148, '109857060083', 4, 85, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(149, '109857060083', 5, 85, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(150, '109857060083', 6, 87, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(151, '109857060083', 7, 87, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(152, '109857060083', 8, 86, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(153, '109857060083', 9, 87, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(154, '109857060083', 10, 85, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(155, '109857060083', 11, 87, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(156, '109857060083', 12, 85, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(157, '109857060083', 13, 85, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(158, '109857060083', 14, 85, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(159, '109857060083', 15, 87, 'Final Rating', 1, 'PASSED', '2022-03-28 12:43:00', '2022-03-28 12:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_general_averages`
--

CREATE TABLE `student_general_averages` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `general_average` int(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `phase` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_general_averages`
--

INSERT INTO `student_general_averages` (`id`, `lrn`, `general_average`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(2, '109857060083', 90, '1', 1, 'PASSED', '2022-03-27 20:09:23', '2022-03-27 20:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade` int(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `phase` int(11) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id`, `lrn`, `subject_id`, `grade`, `term`, `phase`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(116, '109857060083', 1, 10, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(117, '109857060083', 2, 20, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(118, '109857060083', 3, 30, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(119, '109857060083', 4, 40, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(120, '109857060083', 5, 50, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(121, '109857060083', 6, 60, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(122, '109857060083', 7, 70, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(123, '109857060083', 8, 80, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(124, '109857060083', 9, 90, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(125, '109857060083', 10, 100, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(126, '109857060083', 11, 110, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(127, '109857060083', 12, 120, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(128, '109857060083', 13, 130, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(129, '109857060083', 14, 140, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(130, '109857060083', 15, 150, '1', 1, 'none', '2022-03-28 12:43:00', '2022-03-28 12:43:00'),
(132, '109857060083', 1, 89, '2', 1, 'none', '2022-03-27 20:11:16', '2022-03-27 20:11:16'),
(135, '109857060083', 1, 87, '3', 1, 'none', '2022-03-29 22:40:50', '2022-03-29 22:40:50'),
(136, '109857060083', 1, 88, '4', 1, 'none', '2022-03-29 22:40:50', '2022-03-29 22:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_id`, `name`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(1, 1, 'Mother Tongue', '', '2022-03-26 16:36:55', '2022-03-26 16:36:55'),
(2, 2, 'Filipino', '', '2022-03-26 16:37:06', '2022-03-26 16:37:06'),
(3, 3, 'English', '', '2022-03-26 16:37:06', '2022-03-26 16:37:07'),
(4, 4, 'Mathematics', '', '2022-03-26 16:37:28', '2022-03-26 16:37:28'),
(5, 5, 'Science', '', '2022-03-26 16:37:28', '2022-03-26 16:37:28'),
(6, 6, 'Araling Panlipunan', '', '2022-03-26 16:37:45', '2022-03-26 16:37:45'),
(7, 7, 'EPP TLE', '', '2022-03-26 16:37:45', '2022-03-26 16:37:45'),
(8, 8, 'MAPEH ', '', '2022-03-26 16:38:11', '2022-03-26 16:38:11'),
(9, 9, 'Music', '', '2022-03-26 16:38:11', '2022-03-26 16:38:11'),
(10, 10, 'Arts', '', '2022-03-26 16:38:25', '2022-03-26 16:38:25'),
(11, 11, 'P.E.', '', '2022-03-26 16:38:25', '2022-03-26 16:38:25'),
(12, 12, 'Health', '', '2022-03-26 16:38:37', '2022-03-26 16:38:37'),
(13, 13, 'ESP', '', '2022-03-26 16:38:37', '2022-03-26 16:38:37'),
(14, 14, 'Arabic Language', '', '2022-03-26 16:39:18', '2022-03-26 16:39:18'),
(15, 15, 'Islamic Values Education', '', '2022-03-26 16:39:18', '2022-03-26 16:39:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a`
--
ALTER TABLE `a`
  ADD PRIMARY KEY (`aaaaaa`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eligibility_for_elementary_school_enrollment`
--
ALTER TABLE `eligibility_for_elementary_school_enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `learners_personal_infos`
--
ALTER TABLE `learners_personal_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `student_final_ratings`
--
ALTER TABLE `student_final_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`,`subject_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `student_general_averages`
--
ALTER TABLE `student_general_averages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn` (`lrn`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a`
--
ALTER TABLE `a`
  MODIFY `aaaaaa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eligibility_for_elementary_school_enrollment`
--
ALTER TABLE `eligibility_for_elementary_school_enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `learners_personal_infos`
--
ALTER TABLE `learners_personal_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_final_ratings`
--
ALTER TABLE `student_final_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `student_general_averages`
--
ALTER TABLE `student_general_averages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `eligibility_for_elementary_school_enrollment`
--
ALTER TABLE `eligibility_for_elementary_school_enrollment`
  ADD CONSTRAINT `eligibility_for_elementary_school_enrollment_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  ADD CONSTRAINT `remedial_classes_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  ADD CONSTRAINT `scholastic_records_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_final_ratings`
--
ALTER TABLE `student_final_ratings`
  ADD CONSTRAINT `student_final_ratings_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_final_ratings_ibfk_2` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_general_averages`
--
ALTER TABLE `student_general_averages`
  ADD CONSTRAINT `student_general_averages_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD CONSTRAINT `student_grades_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_grades_ibfk_2` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
