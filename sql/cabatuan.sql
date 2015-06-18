-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2015 at 03:13 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cabatuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE IF NOT EXISTS `admin_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`id`, `username`, `password`) VALUES
(1, 'superadmin', '25c3ec67442c1e84d19677889a019f5d');

-- --------------------------------------------------------

--
-- Table structure for table `curriculums`
--

CREATE TABLE IF NOT EXISTS `curriculums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curriculum` varchar(175) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `curriculums`
--

INSERT INTO `curriculums` (`id`, `curriculum`, `created`, `updated`) VALUES
(5, 'First Year', '2015-05-26 15:25:47', '0000-00-00 00:00:00'),
(6, 'Second Year', '2015-05-26 15:25:54', '0000-00-00 00:00:00'),
(7, 'Third Year', '2015-05-26 15:26:04', '0000-00-00 00:00:00'),
(8, 'Fourth Year', '2015-05-26 15:26:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_sections`
--

CREATE TABLE IF NOT EXISTS `curriculum_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section` varchar(175) NOT NULL,
  `curriculum_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curriculum_sections_ibfk_1` (`curriculum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `curriculum_sections`
--

INSERT INTO `curriculum_sections` (`id`, `section`, `curriculum_id`, `created`, `updated`) VALUES
(24, 'First Apple', 5, '2015-05-26 15:26:48', '0000-00-00 00:00:00'),
(25, 'First Boy', 5, '2015-05-26 15:26:59', '0000-00-00 00:00:00'),
(26, 'First Cat', 5, '2015-05-26 15:27:06', '0000-00-00 00:00:00'),
(27, 'Second Apple', 6, '2015-05-26 15:28:21', '0000-00-00 00:00:00'),
(28, 'Second Boy', 6, '2015-05-26 15:28:27', '0000-00-00 00:00:00'),
(29, 'Second Cat', 6, '2015-05-26 15:28:34', '0000-00-00 00:00:00'),
(30, 'Third Apple', 7, '2015-05-26 15:28:51', '0000-00-00 00:00:00'),
(31, 'Third Boy', 7, '2015-05-26 15:28:57', '0000-00-00 00:00:00'),
(32, 'Third Cat', 7, '2015-05-26 15:29:03', '0000-00-00 00:00:00'),
(33, 'Fourth Apple', 8, '2015-05-26 15:29:17', '0000-00-00 00:00:00'),
(34, 'Fourth Boy', 8, '2015-05-26 15:29:25', '0000-00-00 00:00:00'),
(35, 'Fourth Cat', 8, '2015-05-26 15:29:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum_subjects`
--

CREATE TABLE IF NOT EXISTS `curriculum_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(175) NOT NULL,
  `curriculum_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curriculum_subjects_ibfk_1` (`curriculum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `curriculum_subjects`
--

INSERT INTO `curriculum_subjects` (`id`, `subject`, `curriculum_id`, `created`, `updated`) VALUES
(15, 'English 101', 5, '2015-05-26 15:27:53', '0000-00-00 00:00:00'),
(17, 'Filipino 102', 6, '2015-05-26 15:29:57', '2015-05-27 20:13:07'),
(19, 'Math 103', 7, '2015-05-26 15:30:17', '0000-00-00 00:00:00'),
(20, 'English 103', 7, '2015-05-26 15:30:27', '0000-00-00 00:00:00'),
(21, 'Filipino 103', 7, '2015-05-26 15:30:39', '0000-00-00 00:00:00'),
(22, 'Math 104', 8, '2015-05-26 15:31:07', '0000-00-00 00:00:00'),
(23, 'English 104', 8, '2015-05-26 15:31:15', '0000-00-00 00:00:00'),
(24, 'Filipino 104', 8, '2015-05-26 15:31:24', '0000-00-00 00:00:00'),
(29, 'Math 101', 5, '2015-06-07 22:26:06', '0000-00-00 00:00:00'),
(30, 'Math 102', 6, '2015-06-07 22:27:24', '0000-00-00 00:00:00'),
(31, 'Sibika 101', 5, '2015-06-08 21:55:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_students`
--

CREATE TABLE IF NOT EXISTS `enrolled_students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `curriculum_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `school_year` varchar(175) NOT NULL,
  `current` tinyint(1) NOT NULL,
  `accomplished` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enrolled_students_ibfk_1` (`student_id`),
  KEY `enrolled_students_ibfk_2` (`curriculum_id`),
  KEY `enrolled_students_ibfk_3` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `enrolled_students`
--

INSERT INTO `enrolled_students` (`id`, `curriculum_id`, `section_id`, `student_id`, `school_year`, `current`, `accomplished`, `created`, `updated`) VALUES
(44, 5, 24, 14, '2015-2016', 1, 0, '2015-06-11 16:20:23', '0000-00-00 00:00:00'),
(46, 5, 24, 15, '2015-2016', 1, 0, '2015-06-15 21:18:15', '0000-00-00 00:00:00'),
(47, 5, 24, 13, '2015-2016', 1, 0, '2015-06-15 23:35:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_student_subjects`
--

CREATE TABLE IF NOT EXISTS `enrolled_student_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) unsigned NOT NULL,
  `enrolled_student_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `enrolled_student_subjects_ibfk_2` (`subject_id`),
  KEY `enrolled_student_subjects_ibfk_1` (`enrolled_student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `enrolled_student_subjects`
--

INSERT INTO `enrolled_student_subjects` (`id`, `subject_id`, `enrolled_student_id`, `created`, `updated`) VALUES
(117, 15, 44, '2015-06-11 16:20:23', '0000-00-00 00:00:00'),
(118, 29, 44, '2015-06-11 16:20:23', '0000-00-00 00:00:00'),
(119, 31, 44, '2015-06-11 16:20:23', '0000-00-00 00:00:00'),
(123, 15, 46, '2015-06-15 21:18:16', '0000-00-00 00:00:00'),
(124, 29, 46, '2015-06-15 21:18:16', '0000-00-00 00:00:00'),
(125, 31, 46, '2015-06-15 21:18:16', '0000-00-00 00:00:00'),
(126, 15, 47, '2015-06-15 23:35:45', '0000-00-00 00:00:00'),
(127, 29, 47, '2015-06-15 23:35:45', '0000-00-00 00:00:00'),
(128, 31, 47, '2015-06-15 23:35:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sur_name` varchar(175) NOT NULL,
  `first_name` varchar(175) NOT NULL,
  `middle_name` varchar(175) NOT NULL,
  `lrn` varchar(50) NOT NULL,
  `sex` varchar(75) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `age` int(10) unsigned NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `school_last_attended` varchar(255) NOT NULL,
  `school_address` varchar(255) NOT NULL,
  `grade_or_year_level` varchar(75) NOT NULL,
  `school_year` varchar(75) NOT NULL,
  `tve_specialization` varchar(255) NOT NULL,
  `father` varchar(175) NOT NULL,
  `mother` varchar(175) NOT NULL,
  `person_to_notify` varchar(175) NOT NULL,
  `address` varchar(175) NOT NULL,
  `contact_number` varchar(75) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sur_name`, `first_name`, `middle_name`, `lrn`, `sex`, `date_of_birth`, `place_of_birth`, `age`, `present_address`, `school_last_attended`, `school_address`, `grade_or_year_level`, `school_year`, `tve_specialization`, `father`, `mother`, `person_to_notify`, `address`, `contact_number`, `user_type`, `created`, `updated`) VALUES
(13, 'Boribor', 'Mark', 'Babon', 'dfdf', 'dfdf', '2015-06-24', 'dfdf', 34, 'dfdfdfdf', 'dfdf', 'dfdfdfdfdf', 'dfdf', 'dfdfdf', 'dfdfdf', 'dfdfdf', 'dfdf', 'dfdf', 'dfdfdf', 'dfdfdf', 'student', '2015-06-11 00:05:48', '2015-06-11 00:07:44'),
(14, 'Trocho', 'John Neal', 'Calzar', 'ghghgh', 'gghgh', '2015-06-09', 'ghgh', 23, 'vbvbvb', 'vbvbbv', 'vbbvbv', 'ghghgh', 'ghghgh', 'ghghgh', 'ghghgh', 'ghghgh', 'bvbvb', 'vbvb', 'vbvbv', 'student', '2015-06-11 00:06:08', '2015-06-11 00:08:03'),
(15, 'fgfg', 'fgfg', 'fgfg', 'fgfgf', 'fgfg', '2015-06-15', 'fgfg', 45, 'fgfg', 'fgfgfgfg', 'fgfgfgfgfg', 'fgfg', 'gcdfdf', 'fgfgfg', 'fgfgfg', 'fgfgfg', 'gffgfg', 'ffgfg', 'fgfgfg', 'student', '2015-06-11 00:33:55', '0000-00-00 00:00:00'),
(16, 'gtytyu', 'ytuyuuy', 'tyutyuuty', 'tyutyu', 'yutyutyutyutyu', '2015-06-24', 'tyutyutyu', 23, 'ghjhj', 'hj', 'hjhj', 'utyutyu', 'tyutyuty', 'utyutyut', 'yutyu', 'tyutyutyu', 'tyutyu', 'hjghj', 'hjhj', 'student', '2015-06-11 00:36:57', '0000-00-00 00:00:00'),
(18, 'gfdg', 'dfgfdfg', 'dfgdfg', 'gdfgdfg', 'dfgdfg', '2015-06-17', 'dfgdfgdfg', 26, 'gfhghfghf', 'fghgfhgfhgfh', 'gfhgfhgfhgfhgfhghf', 'dfgdfgdf', 'gdfgdfgdf', 'dfgdfgdfg', 'dfgdfgdfgdfg', 'fdgdfgdfg', 'dfgdfgdfg', 'ghgfhgfh', 'ghgfhgf', 'student', '2015-06-11 00:40:52', '0000-00-00 00:00:00'),
(19, 'gffg', 'fgfg', 'fgfg', 'fddfdgf', 'gdfgdfgdfgdfg', '2015-06-24', 'dfgdfgdf', 34, 'dfgdfgdfg', 'hgfhgf', 'gfhgfhgfhgfhghf', 'fgfg', 'fgg', 'dfdfgdf', 'fgdfg', 'dfgdfgdf', 'fdgdfg', 'fgfg', 'dfggfhgf', 'student', '2015-06-11 00:47:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students_account`
--

CREATE TABLE IF NOT EXISTS `students_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(75) NOT NULL,
  `password` varchar(100) NOT NULL,
  `md5_password` varchar(100) NOT NULL,
  `student_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `students_account`
--

INSERT INTO `students_account` (`id`, `username`, `password`, `md5_password`, `student_id`) VALUES
(6, 'markie', 'markie', '8ca29eb8ec2705cdb21a38e54a4c57a4', 13),
(7, 'bokie', 'bokie', '7883b3e96372f8b932a03f14923b69ba', 14);

-- --------------------------------------------------------

--
-- Table structure for table `students_subjects_grades`
--

CREATE TABLE IF NOT EXISTS `students_subjects_grades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_quarter` varchar(10) NOT NULL,
  `second_quarter` varchar(10) NOT NULL,
  `third_quarter` varchar(10) NOT NULL,
  `fourth_quarter` varchar(10) NOT NULL,
  `final_grade` varchar(10) NOT NULL,
  `remarks` varchar(75) NOT NULL,
  `enrolled_student_subject_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `students_subjects_grades_ibfk_1` (`enrolled_student_subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `students_subjects_grades`
--

INSERT INTO `students_subjects_grades` (`id`, `first_quarter`, `second_quarter`, `third_quarter`, `fourth_quarter`, `final_grade`, `remarks`, `enrolled_student_subject_id`) VALUES
(117, '75', '75', '75', '75', '75', 'passed', 117),
(118, '', '', '', '', '', '', 118),
(119, '', '', '', '', '', '', 119),
(123, '', '', '', '', '', '', 123),
(124, '', '', '', '', '', '', 124),
(125, '', '', '', '', '', '', 125),
(126, '', '', '', '', '', '', 126),
(127, '', '', '', '', '', '', 127),
(128, '', '', '', '', '', '', 128);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(175) NOT NULL,
  `last_name` varchar(175) NOT NULL,
  `middle_name` varchar(175) NOT NULL,
  `address` varchar(375) NOT NULL,
  `civilstatus` varchar(175) NOT NULL,
  `religion` varchar(175) NOT NULL,
  `birth_date` date NOT NULL,
  `user_type` varchar(75) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `middle_name`, `address`, `civilstatus`, `religion`, `birth_date`, `user_type`, `created`, `updated`) VALUES
(10, 'Ariel', 'Judilla', 'Reyes', 'Janiuay, Iloilo', 'Single', 'Roman Catholic', '1980-03-20', 'teacher', '2015-05-26 15:33:16', '0000-00-00 00:00:00'),
(11, 'Edwin', 'Herminado', 'Ranchodas', 'Janiuay, Iloilo', 'Single', 'Roman Catholic', '1995-11-01', 'teacher', '2015-05-28 10:18:51', '0000-00-00 00:00:00'),
(12, 'gfdddddddddddd', 'dddfgdgf', 'dfgdfgdf', 'dfgdfg', 'fgdfgdfg', 'dfgdfgdfgdfg', '2015-06-17', 'teacher', '2015-06-14 23:04:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_account`
--

CREATE TABLE IF NOT EXISTS `teachers_account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(75) NOT NULL,
  `password` varchar(75) NOT NULL,
  `md5_password` varchar(100) NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_account_ibfk_1` (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `teachers_account`
--

INSERT INTO `teachers_account` (`id`, `username`, `password`, `md5_password`, `teacher_id`) VALUES
(4, 'ariel', 'ariel', '4900d0a19b6894a4a514e9ff3afcc2c0', 10),
(5, 'dsdfg', 'gfhfhgh', 'a1925a84080d02521c55b01d9882e788', 11);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_subjects`
--

CREATE TABLE IF NOT EXISTS `teachers_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` int(10) unsigned NOT NULL,
  `subject_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_subjects_ibfk_1` (`teacher_id`),
  KEY `teachers_subjects_ibfk_2` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `teachers_subjects`
--

INSERT INTO `teachers_subjects` (`id`, `teacher_id`, `subject_id`, `created`, `updated`) VALUES
(22, 10, 15, '2015-05-30 09:31:35', '0000-00-00 00:00:00'),
(23, 10, 29, '2015-06-08 10:28:35', '0000-00-00 00:00:00'),
(26, 10, 31, '2015-06-13 16:23:20', '0000-00-00 00:00:00'),
(28, 11, 31, '2015-06-15 23:49:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_subjects_sections`
--

CREATE TABLE IF NOT EXISTS `teachers_subjects_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_subject_id` int(10) unsigned NOT NULL,
  `section_id` int(10) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_subjects_sections_ibfk_1` (`teacher_subject_id`),
  KEY `teachers_subjects_sections_ibfk_2` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `teachers_subjects_sections`
--

INSERT INTO `teachers_subjects_sections` (`id`, `teacher_subject_id`, `section_id`, `created`, `updated`) VALUES
(39, 22, 24, '2015-06-08 10:29:12', '0000-00-00 00:00:00'),
(40, 22, 25, '2015-06-08 10:29:12', '0000-00-00 00:00:00'),
(44, 23, 24, '2015-06-15 23:48:30', '0000-00-00 00:00:00'),
(45, 28, 24, '2015-06-15 23:49:40', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `curriculum_sections`
--
ALTER TABLE `curriculum_sections`
  ADD CONSTRAINT `curriculum_sections_ibfk_1` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `curriculum_subjects`
--
ALTER TABLE `curriculum_subjects`
  ADD CONSTRAINT `curriculum_subjects_ibfk_1` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled_students`
--
ALTER TABLE `enrolled_students`
  ADD CONSTRAINT `enrolled_students_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_students_ibfk_2` FOREIGN KEY (`curriculum_id`) REFERENCES `curriculums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_students_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `curriculum_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled_student_subjects`
--
ALTER TABLE `enrolled_student_subjects`
  ADD CONSTRAINT `enrolled_student_subjects_ibfk_1` FOREIGN KEY (`enrolled_student_id`) REFERENCES `enrolled_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolled_student_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `curriculum_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students_subjects_grades`
--
ALTER TABLE `students_subjects_grades`
  ADD CONSTRAINT `students_subjects_grades_ibfk_1` FOREIGN KEY (`enrolled_student_subject_id`) REFERENCES `enrolled_student_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers_account`
--
ALTER TABLE `teachers_account`
  ADD CONSTRAINT `teachers_account_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers_subjects`
--
ALTER TABLE `teachers_subjects`
  ADD CONSTRAINT `teachers_subjects_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `curriculum_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers_subjects_sections`
--
ALTER TABLE `teachers_subjects_sections`
  ADD CONSTRAINT `teachers_subjects_sections_ibfk_1` FOREIGN KEY (`teacher_subject_id`) REFERENCES `teachers_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_subjects_sections_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `curriculum_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
