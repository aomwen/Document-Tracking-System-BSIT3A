-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
<<<<<<< HEAD
-- Generation Time: Oct 14, 2017 at 07:56 PM
=======
-- Generation Time: Oct 01, 2017 at 10:43 AM
>>>>>>> master
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
  `collegeId` varchar(50) NOT NULL,
  `collegefull` varchar(100) NOT NULL,
  `collegeDesc` varchar(200) NOT NULL,
  `collegeDean` varchar(50) NOT NULL,
  `collegeLogo` varchar(200) NOT NULL,
  PRIMARY KEY (`collegeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`collegeId`, `collegefull`, `collegeDesc`, `collegeDean`, `collegeLogo`) VALUES
('COE', 'College of Engineering', 'eklabu eklavu chuchu', 'Mae Garcia', 'http://localhost/Document-Tracking-System-BSIT3A/assets/images/'),
('COS', 'College of Sciences', 'College of Science', 'Mark Wendell Cabuang', 'http://localhost/Document-Tracking-System-BSIT3A/assets/images/');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` varchar(300) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateseen` varchar(50) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `bookmarked` tinyint(1) NOT NULL,
  KEY `idno` (`idno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`idno`, `sender`, `email`, `content`, `datecreated`, `dateseen`, `seen`, `bookmarked`) VALUES
(1, 'Mwen', 'mw.cabuang@gmail.com', 'HELLO FAFA', '2017-09-30 11:53:03', '2017-10-01 04:25:15pm', 1, 0),
(2, 'Giane Noda', 'giane.noda@gmail.com', 'Umutot ako kanina', '2017-09-30 20:55:16', '2017-10-03 05:44:06pm', 1, 0),
(5, 'Mark Wendell Cabuang', 'aocabuang@gmail.com', 'why is it that you are not updating the functions?', '2017-10-12 18:18:07', '', 0, 0),
(6, 'Luis Felipe Lazaro', 'luisfelipelazaro@gmail.com', 'isheteyo isheteyo naninai nai nai HAHHAHA', '2017-10-12 18:42:53', '', 0, 0);

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
<<<<<<< HEAD
  `deptId` int(10) NOT NULL,
  `collegeId` varchar(50) NOT NULL,
=======
  `dept_idno` int(10) NOT NULL,
  `college_acronym` varchar(50) NOT NULL,
>>>>>>> master
  `department` varchar(100) NOT NULL,
  `departmentHead` varchar(100) NOT NULL,
  PRIMARY KEY (`deptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

<<<<<<< HEAD
INSERT INTO `departments` (`deptId`, `collegeId`, `department`, `departmentHead`) VALUES
(322, 'COE', 'Electrical Engineering Department', ''),
(365, 'COS', 'Mathematics Department', ''),
(466, 'COS', 'Physics Department', ''),
(865, 'COE', 'MechatronicsEngineering Department', '');
=======
INSERT INTO `departments` (`dept_idno`, `college_acronym`, `department`, `department_head`) VALUES
(516, 'COS', 'Math Department', '');
>>>>>>> master

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
  `date_received` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(100) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `sentDelete` tinyint(1) NOT NULL,
  `inboxDelete` tinyint(1) NOT NULL,
  `draft` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trackcode` (`trackcode`)
<<<<<<< HEAD
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;
=======
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;
>>>>>>> master

--
-- Dumping data for table `documents`
--

<<<<<<< HEAD
INSERT INTO `documents` (`id`, `trackcode`, `filename`, `file_desc`, `path`, `author`, `receiver`, `datecreated`, `date_received`, `status`, `seen`, `sentDelete`, `inboxDelete`, `draft`) VALUES
(37, '871-243-85', 'Gianeee.jpg', 'asdfghjkl', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'admin', '2017-10-06 16:13:19', '2017-10-14 07:55:20', 'received', 1, 0, 0, 0),
(38, '289-451-00', 'ehllo.jpg', 'hello', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'aomwen', 'mwen', '2017-10-09 23:51:31', '2017-10-13 11:54:12', 'received', 1, 0, 0, 0),
(39, '568-819-92', 'screenshot-for-problem.jpg', 'need help! It doesnt work sir.', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'aomwen', 'admin', '2017-10-10 00:01:05', '2017-10-11 12:35:53', 'received', 1, 0, 0, 0),
(40, '701-119-16', 'the-solution.jpg', 'What seems to be the problem?. I think I have a solution sir', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12-01.jpg', 'admin', 'aomwen', '2017-10-10 00:25:03', '2017-10-11 12:28:26', 'received', 1, 1, 1, 0),
(41, '303-365-60', 'illustrator.jpg', 're:create', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'admin', '2017-10-10 08:13:27', '2017-10-13 12:57:29', 'received', 1, 0, 0, 0),
(42, '046-606-51', 'proposal.jpg', 'Recheck: your porposal mr. cabuang', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'admin', 'aomwen', '2017-10-10 21:29:13', '2017-10-13 06:15:37', 'received', 1, 0, 0, 0),
(43, '014-558-71', 'work.jpg', 'working on it', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'aomwen', 'admin', '2017-10-10 21:47:45', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(44, '191-256-21', 'try', 'direct sent', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'aomwen', '2017-10-11 14:30:14', '2017-10-12 05:47:21', 'received', 1, 0, 0, 0),
(46, '784-463-41', 'fixed', 'fix this', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'admin', '2017-10-11 14:32:24', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(47, '863-144-30', 'proposal.jpg', 'hey', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'aomwen', '2017-10-11 14:55:50', '2017-10-12 05:55:58', 'received', 1, 0, 0, 0),
(48, '394-196-84', 'Try.jpg', 'Try 3', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12-01.jpg', 'mwen', 'admin', '2017-10-12 20:10:57', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(49, '799-967-86', 'ehllo.jpg', 'Hey', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'mwen', 'Aomwen', '2017-10-12 20:54:45', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(50, '980-684-56', 'heyhey.jpg', 'heyhey', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'admin', 'aomwen', '2017-10-12 21:54:06', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(51, '844-527-11', 'proposal.jpg', 'lololo', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'admin', 'Admin', '2017-10-12 21:54:47', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0);
=======
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
(27, '583-472-02', 'lovlevoevleoveo', 'proposa;', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'admin', 'giane.noda', '2017-09-30 20:42:41', '0000-00-00', 'pending'),
(28, '972-438-09', 'Test 1', 'Testing 1', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'Admin', '2017-10-01 00:01:30', '0000-00-00', 'pending'),
(29, '612-459-82', 'flirt', 'flirt', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'giane.noda', '2017-10-01 00:20:19', '0000-00-00', 'pending'),
(30, '853-450-19', 'flirt I.jpg', 'flirt I', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'mwen', 'giane.noda', '2017-10-01 00:25:50', '0000-00-00', 'pending'),
(31, '537-273-58', 'admin', 'admin', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mwen', 'admin', '2017-10-01 00:29:21', '0000-00-00', 'pending'),
(32, '875-492-06', 'admin.docx', 'admin', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/illustrator2.docx', 'mwen', 'admin', '2017-10-01 01:42:14', '0000-00-00', 'pending'),
(33, '841-139-03', 'admin.docx', 'admin', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/illustrator2.docx', 'mwen', 'admoin', '2017-10-01 01:42:28', '0000-00-00', 'pending');
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

<<<<<<< HEAD
CREATE TABLE IF NOT EXISTS `positions` (
  `positionId` int(3) NOT NULL,
  `collegeId` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
=======
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
>>>>>>> master

--
-- Dumping data for table `positions`
--

<<<<<<< HEAD
INSERT INTO `positions` (`positionId`, `collegeId`, `position`) VALUES
(1, 'COS', 'Teacher II'),
(1, 'COS', 'Teacher II');

-- --------------------------------------------------------

--
-- Table structure for table `registrardocuments`
--

CREATE TABLE IF NOT EXISTS `registrardocuments` (
  `idno` int(11) NOT NULL AUTO_INCREMENT,
  `regTrackcode` varchar(10) NOT NULL,
  `docType` varchar(50) NOT NULL,
  `dateAdmitted` varchar(30) NOT NULL,
  `dateReleased` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  UNIQUE KEY `regTrackcode` (`regTrackcode`),
  KEY `idno` (`idno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `registrardocuments`
--

INSERT INTO `registrardocuments` (`idno`, `regTrackcode`, `docType`, `dateAdmitted`, `dateReleased`, `status`) VALUES
(2, '549-906-80', 'Lost Reg-Form', '2017-10-13', '****-**-**', 'pending'),
(1, '627-490-81', 'Lost Reg-Form', '2017-10-13', '2017-10-13', 'Received');
=======
INSERT INTO `document_status` (`idno`, `trackcode`, `file_type`, `date_admitted`, `date_released`, `status`) VALUES
(15, '461-100-99', 'Trancsript of Record', '2017-09-30', '2017-09-30', 'Received'),
(14, '918-755-09', 'Lost Reg-Form', '2017-09-30', '2017-09-30', 'Complete');
>>>>>>> master

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `path` varchar(400) NOT NULL,
<<<<<<< HEAD
  `email` varchar(50) NOT NULL,
=======
  `full_name` char(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
>>>>>>> master
  `position` varchar(20) NOT NULL,
  `collegeId` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

<<<<<<< HEAD
INSERT INTO `users` (`username`, `password`, `path`, `email`, `position`, `collegeId`, `department`, `firstname`, `lastname`) VALUES
('admin', 'admin', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'aocabuang@gmail.com', 'Administrator', 'Admin', 'Administration', 'Mark Wendell', 'Cabuang'),
('giane.noda', '1234', '', 'giane.noda@gmail.com', 'Teacher-II', 'CLA', 'English Department', 'giane', 'noda'),
('mwen', '1234', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'mw.cabuang@gmail.com                              ', 'teacher-II', 'COS', 'Math Department', 'mwen          ', 'cabuang          '),
('vince.FapQueen', '1234', '', 'vince.amadeo@gmail.com', 'Teacher II', 'COE', 'Electrical Engineeri', 'vince', 'amadeo');
=======
INSERT INTO `users` (`username`, `password`, `path`, `full_name`, `email_address`, `position`, `college_acronym`, `department`) VALUES
('abbie', 'oAS', '', 'Abbie Oas', 'abbie', 'Teacher-II', 'CLA', 'English Department'),
('admin', 'admin', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'mark wendell quilapio cabuang', 'mw.cabuang@gmail.com  ', 'DTS administrator', 'Registrar', 'Registrar'),
('giane.noda', '1234', '', 'giane noda', 'giane.noda@gmail.com', 'Teacher-II', 'CLA', 'English Department'),
('mwen', '1234', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/17555182_1491431064221223_1228834819_n.jpg', 'Aomwen Cabuang', 'mw.cabuang@gmail.com                              ', 'teacher-II', 'COS', 'Math Department'),
('vince.amadeo', '1234', '', 'vince amadeo zoleta', 'vince.amadeo@gmail.com', '1234', 'CLA', 'Filipino Department');
>>>>>>> master
