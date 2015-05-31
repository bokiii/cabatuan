-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2015 at 03:36 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

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
(25, 'Math 101', 5, '2015-05-28 10:17:24', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `sur_name`, `first_name`, `middle_name`, `lrn`, `sex`, `date_of_birth`, `place_of_birth`, `age`, `present_address`, `school_last_attended`, `school_address`, `grade_or_year_level`, `school_year`, `tve_specialization`, `father`, `mother`, `person_to_notify`, `address`, `contact_number`, `user_type`, `created`, `updated`) VALUES
(1, 'dfgdgfs', 'gfdgfdgf', 'dgfdgfdgf', 'reerewrew', 'ewrewr', '2015-05-21', 'dfgdfgdfgfdg', 25, 'dfgdfgdfgdfgdf', 'fdgdfgdfdfgdf', 'gfgdfgdfdfgfgdfgdf', 'dgfdgfdgf', 'dgfdgfdgfdgfdgf', 'dgfdgfdgfdgf', 'dgfdgfdgfdgf', 'dgfdgfdgfdgf', 'fddgfdgfdfg', 'dfdgfdgfdgfdgf', 'dgfdfdgdfgdfg', 'student', '2015-05-29 09:04:08', '0000-00-00 00:00:00'),
(3, 'asdhnsadjabsdbasd', 'akskdfbsdfbdasf', 'ajwodbeasdbabsdasd', 'dsdnfnsdndsf', 'asfndnfsdnfs', '2015-05-12', 'asdbasdbbasdbasd', 24, 'asfdndnsandnasdnasdsad', 'nsadnasdnnasd', 'sandnasdnasdasdasdasdsa', 'sdsdbsjdbsdb', 'dsfdsfnsdfsdf', 'dsfnsdnfsndfsdf', 'fsdfsadgasgfagsd', 'asdbasdbsabdbasd', 'ansfdnasnasdsad', 'nsadfnsdfnsdf', 'ansdnasdnasd', 'student', '2015-05-29 15:13:04', '0000-00-00 00:00:00'),
(4, 'jzdsfhadsgfsdf', 'sd nnsdsd', 'sfdgdgfd', 'sdfsdfdsff', 'dfsdfsdfdsf', '2015-05-13', 'adsfsdfsdfsdfdsf', 45, 'safsdfdsfsdfsdf', 'zdfsdfsdfsdfdsfdsf', 'sddssadsadsadsad', 'zdfxdfsdfsd', 'sdgfsdfsdf', 'sdfsdfdsf nadsfn df', 'sm dmsdmsmdmsd', 'asdfdsfsdsdfsdf', 'sdfgdfsdfsdf', 'zsdfsdfsdffsd', 'fdgdfgfdg', 'student', '2015-05-29 15:21:16', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `middle_name`, `address`, `civilstatus`, `religion`, `birth_date`, `user_type`, `created`, `updated`) VALUES
(10, 'Ariel', 'Judilla', 'Reyes', 'Janiuay, Iloilo', 'Single', 'Roman Catholic', '1980-03-20', 'teacher', '2015-05-26 15:33:16', '0000-00-00 00:00:00'),
(11, 'Edwin', 'Herminado', 'Ranchodas', 'Janiuay, Iloilo', 'Single', 'Roman Catholic', '1995-11-01', 'teacher', '2015-05-28 10:18:51', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `teachers_subjects`
--

INSERT INTO `teachers_subjects` (`id`, `teacher_id`, `subject_id`, `created`, `updated`) VALUES
(19, 10, 25, '2015-05-28 10:19:10', '0000-00-00 00:00:00'),
(20, 11, 17, '2015-05-28 10:20:22', '0000-00-00 00:00:00'),
(21, 11, 19, '2015-05-28 10:20:44', '0000-00-00 00:00:00'),
(22, 10, 15, '2015-05-30 09:31:35', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `teachers_subjects_sections`
--

INSERT INTO `teachers_subjects_sections` (`id`, `teacher_subject_id`, `section_id`, `created`, `updated`) VALUES
(34, 21, 32, '2015-05-28 10:20:51', '0000-00-00 00:00:00'),
(38, 19, 26, '2015-05-30 16:45:56', '0000-00-00 00:00:00');

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
-- Constraints for table `teachers_subjects`
--
ALTER TABLE `teachers_subjects`
  ADD CONSTRAINT `teachers_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `curriculum_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_subjects_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers_subjects_sections`
--
ALTER TABLE `teachers_subjects_sections`
  ADD CONSTRAINT `teachers_subjects_sections_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `curriculum_sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_subjects_sections_ibfk_1` FOREIGN KEY (`teacher_subject_id`) REFERENCES `teachers_subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
