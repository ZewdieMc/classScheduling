-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2020 at 06:08 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scheduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `block_id` int(11) NOT NULL AUTO_INCREMENT,
  `block_number` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`block_id`, `block_number`, `dept_id`) VALUES
(1, '42', 2),
(2, '36', 1),
(3, '44', 3),
(4, '41', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cys`
--

CREATE TABLE IF NOT EXISTS `cys` (
  `cys_id` int(11) NOT NULL AUTO_INCREMENT,
  `cys` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  PRIMARY KEY (`cys_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cys`
--

INSERT INTO `cys` (`cys_id`, `cys`, `dept_id`) VALUES
(1, 'yr1 Sec1', 1),
(2, 'yr1 Sec2', 1),
(3, 'yr1 Sec1', 2),
(4, 'yr2 Sec1', 1),
(5, 'yr2 sec2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE IF NOT EXISTS `dept` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_code` varchar(50) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `dept_code`, `dept_name`) VALUES
(1, 'CS', 'Computer Science'),
(2, 'IT', 'Information Technology'),
(3, 'CivEng', 'Civil Engineering'),
(5, 'Maths', 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE IF NOT EXISTS `designation` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(100) NOT NULL,
  PRIMARY KEY (`designation_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`designation_id`, `designation_name`) VALUES
(67, 'chairperson'),
(66, 'Department Head'),
(68, 'Faculty Dean'),
(69, 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `exam_sched`
--

CREATE TABLE IF NOT EXISTS `exam_sched` (
  `sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_id` int(1) NOT NULL,
  `day` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `cys` varchar(15) NOT NULL,
  `room` varchar(15) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `settings_id` int(11) NOT NULL,
  `cys1` varchar(10) NOT NULL,
  `term` varchar(10) NOT NULL,
  `encoded_by` int(11) NOT NULL,
  PRIMARY KEY (`sched_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_last` varchar(50) NOT NULL,
  `member_first` varchar(50) NOT NULL,
  `member_rank` varchar(50) NOT NULL,
  `member_salut` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`member_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_last`, `member_first`, `member_rank`, `member_salut`, `dept_id`, `designation_id`, `username`, `password`, `status`) VALUES
(1, 'Demissie', 'Abeje', 'Lecturer', 'Mr', 3, 68, 'abejeciveng', 'zemene', 'faculty'),
(2, 'Nibret', 'Getasew', 'Lecturer', 'Mr', 1, 66, 'getasew1', 'nibret', 'head'),
(3, 'Kaymo', 'Senbeto', 'Lecturer', 'Mr', 2, 66, 'senbeto2', 'kaymo', 'head'),
(4, 'Mengstie', 'Lingerew', 'Assistant Lecturer', 'Mr', 2, 69, 'lingerew2', 'mengstie', 'teacher'),
(5, 'Belay', 'Adane', 'Lecturer', 'Mr', 1, 69, 'adane1', 'belay', 'teacher'),
(6, 'Desalegn', 'Gizatie', 'Lecturer', 'Mr', 1, 69, 'gizatie1', 'desalegn', 'teacher'),
(7, 'Yenealem', 'Adane', 'Student', 'Mr', 1, 69, 'adane1', 'yenealem', 'stu'),
(8, 'Alemu', 'Smachew', 'Lecturer', 'Mr', 2, 69, 'smachew2', 'alemu', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `prog_id` int(11) NOT NULL AUTO_INCREMENT,
  `prog_code` varchar(10) NOT NULL,
  `prog_title` varchar(50) NOT NULL,
  PRIMARY KEY (`prog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`prog_id`, `prog_code`, `prog_title`) VALUES
(6, 'BSIT', 'Bachelor of Science in Information Technology'),
(13, 'MCS', 'Masters of Science in Computer Science'),
(14, 'BCS', 'Bachelor of Science in Computer Science'),
(15, 'MSIT', 'Masters of Science in Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE IF NOT EXISTS `rank` (
  `rank_id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` varchar(30) NOT NULL,
  PRIMARY KEY (`rank_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`rank_id`, `rank`) VALUES
(4, 'Assistant Lecturer'),
(14, 'Professor '),
(24, 'Associate Professor'),
(23, 'Student'),
(25, 'Lecturer');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room` varchar(50) NOT NULL,
  `block_id` int(11) NOT NULL,
  PRIMARY KEY (`room_id`),
  KEY `block_id` (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room`, `block_id`) VALUES
(1, '5', 1),
(3, '7', 1),
(4, '6', 1),
(5, '8', 2),
(6, '5', 3),
(7, '1', 2),
(8, '09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salut`
--

CREATE TABLE IF NOT EXISTS `salut` (
  `salut_id` int(11) NOT NULL AUTO_INCREMENT,
  `salut` varchar(10) NOT NULL,
  PRIMARY KEY (`salut_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `salut`
--

INSERT INTO `salut` (`salut_id`, `salut`) VALUES
(1, 'Ms'),
(2, 'Mrs'),
(3, 'Mr'),
(5, 'Dr'),
(6, 'Prof'),
(7, 'Engr');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_id` int(1) NOT NULL,
  `day` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `cys` varchar(15) NOT NULL,
  `room` varchar(15) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `settings_id` int(11) NOT NULL,
  `encoded_by` varchar(10) NOT NULL,
  `dept_id` int(11) NOT NULL,
  PRIMARY KEY (`sched_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sched_id`, `time_id`, `day`, `member_id`, `subject_code`, `cys`, `room`, `remarks`, `settings_id`, `encoded_by`, `dept_id`) VALUES
(156, 64, 'w', 6, 'Distributed Systems', 'yr1 Sec1', '8', 'Lec.', 15, '2', 1),
(164, 62, 'w', 6, 'System Analysis and Design', 'yr1 Sec2', '8', 'Lec.', 15, '2', 1),
(151, 61, 'w', 5, 'Distributed Systems', 'yr1 Sec1', '1', 'Lec.', 15, '2', 1),
(152, 64, 't', 5, 'Distributed Systems', 'yr1 Sec1', '1', 'Lab.G-1', 15, '2', 1),
(155, 62, 'sa', 5, 'Distributed Systems', 'yr1 Sec1', '1', 'Lec.', 15, '2', 1),
(150, 64, 'su', 5, 'Distributed Systems', 'yr1 Sec1', '1', 'Lec.', 15, '2', 1),
(157, 65, 'su', 6, 'Distributed Systems', 'yr1 Sec1', '8', 'Lab.G-1', 15, '2', 1),
(158, 61, 'sa', 6, 'Distributed Systems', 'yr1 Sec1', '8', 'Lab.G-2', 15, '2', 1),
(159, 65, 'sa', 6, 'Distributed Systems', 'yr1 Sec1', '8', 'Lab.G-2', 15, '2', 1),
(165, 64, 'sa', 6, 'System Analysis and Design', 'yr1 Sec2', '8', 'Lab.G-1', 15, '2', 1),
(161, 64, 'th', 5, 'System Analysis and Design', 'yr1 Sec1', '8', 'Lab.G-1', 15, '2', 1),
(162, 62, 'th', 8, 'Dabatase Management System', 'yr1 Sec1', '5', 'Lec.', 15, '3', 2),
(163, 65, 't', 8, 'Dabatase Management System', 'yr1 Sec1', '5', 'Lab.G-1', 15, '3', 2),
(166, 64, 't', 6, 'System Analysis and Design', 'yr1 Sec2', '8', 'Lab.G-2', 15, '2', 1),
(167, 62, 'w', 4, 'Web Design', 'yr1 Sec1', '5', 'Lec.', 15, '3', 2),
(168, 62, 't', 4, 'Web Design', 'yr1 Sec1', '5', 'Lec.', 15, '3', 2),
(169, 64, 'sa', 4, 'Web Design', 'yr1 Sec1', '5', 'Lab.G-2', 15, '3', 2),
(170, 61, 't', 4, 'Web Design', 'yr1 Sec1', '5', 'Tut.', 15, '3', 2),
(171, 61, 'su', 4, 'Web Design', 'yr1 Sec1', '5', 'Tut.', 15, '3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `term` varchar(10) NOT NULL,
  `sem` varchar(15) NOT NULL,
  `sy` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`settings_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `term`, `sem`, `sy`, `status`) VALUES
(12, 'Endterm', '1st', '2017-2018', 'inactive'),
(20, 'Midterm', '1st', '2020-2021', 'inactive'),
(15, 'Endterm', 'Summer', '2019-2020', 'active'),
(19, 'Midterm', '2nd', '2020-2021', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `signatories`
--

CREATE TABLE IF NOT EXISTS `signatories` (
  `sign_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `seq` int(2) NOT NULL,
  `set_by` int(11) NOT NULL,
  PRIMARY KEY (`sign_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `signatories`
--

INSERT INTO `signatories` (`sign_id`, `member_id`, `seq`, `set_by`) VALUES
(1, 27, 1, 27),
(3, 178, 2, 27),
(7, 179, 4, 27),
(12, 1, 3, 2),
(9, 2, 1, 2),
(11, 3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_code` varchar(50) NOT NULL,
  `subject_title` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`),
  KEY `dept_id` (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `dept_id`) VALUES
(1, 'DBMS', 'Dabatase Management System', 2),
(2, 'WD', 'Web Design', 2),
(3, 'OOP', 'Object Oriented Programming', 1),
(4, 'DS', 'Distributed Systems', 1),
(5, 'SAD', 'System Analysis and Design', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sy`
--

CREATE TABLE IF NOT EXISTS `sy` (
  `sy_id` int(11) NOT NULL AUTO_INCREMENT,
  `sy` varchar(10) NOT NULL,
  PRIMARY KEY (`sy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sy`
--

INSERT INTO `sy` (`sy_id`, `sy`) VALUES
(1, '2017-2018'),
(7, '2018-2019'),
(8, '2019-2020'),
(9, '2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `days` varchar(15) NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `time_start`, `time_end`, `days`) VALUES
(65, '18:10:00', '19:10:00', 'mwf'),
(64, '20:10:00', '23:30:00', 'mwf'),
(63, '18:10:00', '08:10:00', 'mwf'),
(62, '04:10:00', '18:10:00', 'mwf'),
(61, '02:10:00', '04:10:00', 'mwf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `program` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `status`, `program`) VALUES
(1, 'admin', 'a1Bz20ydqelm8m1wql3fefa44509901fc42790757c7a77d3c9', 'Admin', 'active', 'all');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `dept` (`dept_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
