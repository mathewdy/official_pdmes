-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 03:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
(18, '109857060083', 'Kinder progress report, Kindergarten Certificate of Completion', 'PDMES', '12345', 'NOVALICHES, QUEZON CITY', '1', '80', 'Mar-21-2022', '1', 'sample other ', 'SAMPLE NAME AND ADDRESS', '', '2022-03-27 04:18:00', '2022-03-27 04:18:00');

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
(25, '109857060083', 'Dalisay', 'Mathew', 'Francisco', '', 'Mar-22-2022', 'Male', 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00');

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
  `remarks` varchar(50) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `remarks` varchar(50) NOT NULL,
  `date_time_created` date NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholastic_records`
--

INSERT INTO `scholastic_records` (`id`, `lrn`, `school`, `school_id`, `district`, `division`, `region`, `classified_as_grade`, `section`, `school_year`, `name_of_teacher`, `signature`, `remarks`, `date_time_created`, `date_time_updated`) VALUES
(1, '109857060083', 'Tondo High', '0987', '5', 'Manila', 'NCR', '2', 'A', '2022', 'Tondo High', '', 'none', '2022-03-27', '2022-03-27 04:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_averages`
--

CREATE TABLE `student_averages` (
  `id` int(11) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `general_average` int(50) NOT NULL,
  `final_remarks` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `phase` int(11) NOT NULL,
  `date_time_created` datetime NOT NULL,
  `date_time_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(115, '109857060083', 1, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(116, '109857060083', 2, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(117, '109857060083', 3, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(118, '109857060083', 4, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(119, '109857060083', 5, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(120, '109857060083', 6, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(121, '109857060083', 7, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(122, '109857060083', 8, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(123, '109857060083', 9, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(124, '109857060083', 10, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(125, '109857060083', 11, 76, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(126, '109857060083', 12, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(127, '109857060083', 13, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(128, '109857060083', 14, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(129, '109857060083', 15, 77, 'Final Rating', 1, 'PASSED', '2022-03-27 04:18:00', '2022-03-27 04:18:00');

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
(101, '109857060083', 1, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(102, '109857060083', 2, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(103, '109857060083', 3, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(104, '109857060083', 4, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(105, '109857060083', 5, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(106, '109857060083', 6, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(107, '109857060083', 7, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(108, '109857060083', 8, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(109, '109857060083', 9, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(110, '109857060083', 10, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(111, '109857060083', 11, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(112, '109857060083', 12, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(113, '109857060083', 13, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(114, '109857060083', 14, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00'),
(115, '109857060083', 15, 75, '1', 1, 'none', '2022-03-27 04:18:00', '2022-03-27 04:18:00');

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
-- Indexes for table `student_averages`
--
ALTER TABLE `student_averages`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `learners_personal_infos`
--
ALTER TABLE `learners_personal_infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `remedial_classes`
--
ALTER TABLE `remedial_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholastic_records`
--
ALTER TABLE `scholastic_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_averages`
--
ALTER TABLE `student_averages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_final_ratings`
--
ALTER TABLE `student_final_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

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
-- Constraints for table `student_averages`
--
ALTER TABLE `student_averages`
  ADD CONSTRAINT `student_averages_ibfk_1` FOREIGN KEY (`lrn`) REFERENCES `student_grades` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_final_ratings`
--
ALTER TABLE `student_final_ratings`
  ADD CONSTRAINT `student_final_ratings_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_final_ratings_ibfk_2` FOREIGN KEY (`lrn`) REFERENCES `learners_personal_infos` (`lrn`) ON DELETE CASCADE ON UPDATE CASCADE;

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
