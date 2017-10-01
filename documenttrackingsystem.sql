-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 01, 2017 at 05:01 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `documenttrackingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `college_acronym` varchar(50) NOT NULL,
  `collegefull` varchar(100) NOT NULL,
  `college_desc` varchar(200) NOT NULL,
  `college_dean` varchar(50) NOT NULL,
  `college_logopath` varchar(200) NOT NULL,
  PRIMARY KEY (`college_acronym`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`college_acronym`, `collegefull`, `college_desc`, `college_dean`, `college_logopath`) VALUES
('COS', 'College of Science', 'College of Science', 'Mark Wendell Cabuang', 'http://localhost/WebProject/assets/images/COSlogo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `receiver` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `idno` (`idno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`idno`, `receiver`, `author`, `content`, `date`) VALUES
(1, 'admin', 'Mwen', 'HELLO FAFA', '2017-09-30 11:53:03'),
(2, 'admin', 'Giane Noda', 'Umutot ako kanina', '2017-09-30 20:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `college_acronym` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `department_head` varchar(100) NOT NULL,
  PRIMARY KEY (`department`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`college_acronym`, `department`, `department_head`) VALUES
('COS', 'Math Department', 'Henry Renegado');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `trackcode` varchar(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file_desc` varchar(400) NOT NULL,
  `path` varchar(400) NOT NULL,
  `author` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_received` date NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trackcode` (`trackcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `trackcode`, `filename`, `file_desc`, `path`, `author`, `receiver`, `datecreated`, `date_received`, `status`) VALUES
(2, '592-974-39', 'activity 12', 'hehehehehehesdadsadad asd asd asd as', 'http://localhost/ci3/assets/documents/ACTIVITY_12-01.jpg', 'Mwen', 'mwen', '2017-09-23 11:03:57', '0000-00-00', 'pending'),
(3, '583-871-10', 'Activity 10', '', 'C:/wamp/www/ci3/uploads/activity 10-01.jpg', 'Mwen', '', '2017-09-23 12:08:04', '0000-00-00', 'pending'),
(4, '569-570-25', 'Activity', 'f sdg sdfg sdg sfgsd sdg sdg', 'http://localhost/ci3/uploadsactivity 10-01.jpg', 'Mwen', 'mwen', '2017-09-23 12:14:04', '0000-00-00', 'pending'),
(5, '372-367-36', 'mark', 'mwen', 'http://localhost/ci3/uploads/activity 10-01.jpg', 'mwen', 'admin', '2017-09-23 13:45:47', '0000-00-00', 'pending'),
(7, '083-127-46', 'heheh', '', 'http://localhost/ci3/uploads/activity 10-01.jpg', 'hehehehe', 'mwen', '2017-09-23 14:11:11', '0000-00-00', 'pending'),
(9, '347-026-06', 'eegeg', '', 'http://localhost/ci3/uploads/ACTIVITY_12-011.jpg', 'gegeg', '', '2017-09-23 14:26:40', '0000-00-00', 'pending'),
(12, '739-627-02', 'asdasd', '', 'http://localhost/ci3/uploads/ACTIVITY_12-012.jpg', 'sadasd', '', '2017-09-23 14:28:31', '0000-00-00', 'pending'),
(13, '072-664-65', 'asdasd', '', 'http://localhost/ci3/uploads/ACTIVITY_12-013.jpg', 'asdasd', '', '2017-09-23 14:28:41', '0000-00-00', 'pending'),
(14, '805-756-10', 'try', 'test II', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'admin', '2017-09-29 16:47:28', '0000-00-00', 'pending'),
(15, '560-806-94', 'try', 'test II', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'admin', '2017-09-29 16:48:50', '0000-00-00', 'pending'),
(16, '363-249-45', 'try', 'test II', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'admin', '2017-09-29 16:49:55', '0000-00-00', 'pending'),
(17, '381-176-50', '', 'asdfghjkl', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'giane.noda', '2017-09-29 17:50:36', '0000-00-00', 'pending'),
(18, '483-756-17', 'abbie', 'abbie', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'abbie', '2017-09-29 21:04:14', '0000-00-00', 'pending'),
(19, '200-157-29', '', '', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', '', '2017-09-29 21:04:49', '0000-00-00', 'pending'),
(20, '276-401-55', 'abbie', 'abbie', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity 11.jpg', 'abbie', 'mwen', '2017-09-29 21:15:00', '0000-00-00', 'pending'),
(21, '519-484-35', 'hello', 're:check please', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_124.jpg', 'mwen', 'giane.noda', '2017-09-30 08:23:27', '0000-00-00', 'pending'),
(22, '480-940-12', 'star.jpg', 're:write', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_127.jpg', 'mwen', 'gianenoda', '2017-09-30 08:41:10', '0000-00-00', 'pending'),
(23, '432-883-32', 'trolololo', 'Re:create', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'franzkie paragas', '2017-09-30 08:48:14', '0000-00-00', 'pending'),
(24, '407-797-41', 'trololo.docx', 'Re:create', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/wire_shark_(Autosaved)1.docx', 'mwen', 'franzkie paragas', '2017-09-30 08:48:54', '0000-00-00', 'pending'),
(25, '135-354-20', 'heh.docx', 're:create', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/wire_shark_(Autosaved)1.docx', 'mwen', 'abbieoas', '2017-09-30 09:05:06', '0000-00-00', 'pending'),
(26, '768-010-71', 'illustrator2', 're:create yany', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'yany', '2017-09-30 09:14:15', '0000-00-00', 'pending'),
(27, '583-472-02', 'lovlevoevleoveo', 'proposa;', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'admin', 'giane.noda', '2017-09-30 20:42:41', '0000-00-00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `document_status`
--

CREATE TABLE IF NOT EXISTS `document_status` (
  `idno` int(3) NOT NULL AUTO_INCREMENT,
  `trackcode` varchar(10) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `date_admitted` varchar(100) NOT NULL,
  `date_released` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  UNIQUE KEY `trackcode` (`trackcode`),
  KEY `idno` (`idno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `document_status`
--

INSERT INTO `document_status` (`idno`, `trackcode`, `file_type`, `date_admitted`, `date_released`, `status`) VALUES
(15, '461-100-99', 'Trancsript of Record', '2017-09-30', '2017-09-30', 'Received'),
(14, '918-755-09', 'Lost Reg-Form', '2017-09-30', '2017-09-30', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `path` varchar(400) NOT NULL,
  `full_name` char(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `college_acronym` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `path`, `full_name`, `email_address`, `position`, `college_acronym`, `department`) VALUES
('abbie', 'oAS', '', 'Abbie Oas', 'abbie', 'Teacher-II', 'CLA', 'English Department'),
('admin', 'admin', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mark wendell quilapio cabuang', 'mw.cabuang@gmail.com  ', 'DTS administrator', 'Registrar', 'Registrar'),
('giane.noda', '1234', '', 'giane noda', 'giane.noda@gmail.com', 'Teacher-II', 'CLA', 'English Department'),
('mwen', '1234', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'Aomwen Cabuang', 'mwen.cabuang@gmail.com                   ', 'teacher-II', 'COS', 'Math Department'),
('vince.amadeo', '1234', '', 'vince amadeo zoleta', 'vince.amadeo@gmail.com', '1234', 'CLA', 'Filipino Department');
