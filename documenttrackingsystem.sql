-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2017 at 12:06 AM
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
('COS', 'College of Sciences', 'Caters technological courses', 'Renegado', 'http://localhost/Document-Tracking-System-BSIT3A/assets/images/');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`idno`, `sender`, `email`, `content`, `datecreated`, `dateseen`, `seen`, `bookmarked`) VALUES
(1, 'Mwen', 'mw.cabuang@gmail.com', 'HELLO FAFA', '2017-09-30 11:53:03', '2017-10-01 04:25:15pm', 1, 0),
(2, 'Giane Noda', 'giane.noda@gmail.com', 'Umutot ako kanina', '2017-09-30 20:55:16', '2017-10-03 05:44:06pm', 1, 0),
(5, 'Mark Wendell Cabuang', 'aocabuang@gmail.com', 'why is it that you are not updating the functions?', '2017-10-12 18:18:07', '', 0, 0),
(6, 'Luis Felipe Lazaro', 'luisfelipelazaro@gmail.com', 'isheteyo isheteyo naninai nai nai HAHHAHA', '2017-10-12 18:42:53', '', 0, 0),
(7, 'mwen', 'mwen@gmail.com', '13man', '2017-10-14 13:51:19', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `deptId` int(10) NOT NULL,
  `collegeId` varchar(50) NOT NULL,
  `department` varchar(100) NOT NULL,
  `departmentHead` varchar(100) NOT NULL,
  PRIMARY KEY (`deptId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`deptId`, `collegeId`, `department`, `departmentHead`) VALUES
(225, 'COE', 'Mechanical Department', ''),
(322, 'COE', 'Electrical Engineering Department', ''),
(865, 'COE', 'MechatronicsEngineering Department', '');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `trackcode` varchar(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `fileDesc` varchar(400) NOT NULL,
  `path` varchar(400) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateReceived` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(100) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `sentDelete` tinyint(1) NOT NULL,
  `inboxDelete` tinyint(1) NOT NULL,
  `draft` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trackcode` (`trackcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `trackcode`, `filename`, `fileDesc`, `path`, `sender`, `receiver`, `datecreated`, `dateReceived`, `status`, `seen`, `sentDelete`, `inboxDelete`, `draft`) VALUES
(37, '871-243-85', 'Gianeee.jpg', 'asdfghjkl', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'admin', '2017-10-06 16:13:19', '2017-10-14 07:55:20', 'received', 1, 0, 0, 0),
(38, '289-451-00', 'ehllo.jpg', 'hello', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'aomwen', 'mwen', '2017-10-09 23:51:31', '2017-10-15 07:46:30', 'received', 1, 0, 0, 0),
(39, '568-819-92', 'screenshot-for-problem.jpg', 'need help! It doesnt work sir.', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'aomwen', 'admin', '2017-10-10 00:01:05', '2017-10-15 06:57:55', 'received', 1, 0, 1, 0),
(40, '701-119-16', 'the-solution.jpg', 'What seems to be the problem?. I think I have a solution sir', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12-01.jpg', 'admin', 'aomwen', '2017-10-10 00:25:03', '2017-10-11 12:28:26', 'received', 1, 1, 1, 0),
(41, '303-365-60', 'illustrator.jpg', 're:create', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'admin', '2017-10-10 08:13:27', '2017-10-15 06:58:07', 'received', 1, 0, 1, 0),
(42, '046-606-51', 'proposal.jpg', 'Recheck: your porposal mr. cabuang', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'admin', 'aomwen', '2017-10-10 21:29:13', '2017-10-13 06:15:37', 'received', 1, 0, 1, 0),
(43, '014-558-71', 'work.jpg', 'working on it', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'aomwen', 'admin', '2017-10-10 21:47:45', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(44, '191-256-21', 'try', 'direct sent', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'aomwen', '2017-10-11 14:30:14', '2017-10-12 05:47:21', 'received', 1, 0, 0, 0),
(46, '784-463-41', 'fixed', 'fix this', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'admin', '2017-10-11 14:32:24', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(47, '863-144-30', 'proposal.jpg', 'hey', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'aomwen', 'aomwen', '2017-10-11 14:55:50', '2017-10-12 05:55:58', 'received', 1, 0, 0, 0),
(48, '394-196-84', 'Try.jpg', 'Try 3', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12-01.jpg', 'mwen', 'admin', '2017-10-12 20:10:57', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(49, '799-967-86', 'ehllo.jpg', 'Hey', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'mwen', 'Aomwen', '2017-10-12 20:54:45', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(50, '980-684-56', 'heyhey.jpg', 'heyhey', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'admin', 'aomwen', '2017-10-12 21:54:06', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(51, '844-527-11', 'proposal.jpg', 'lololo', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/activity_11.jpg', 'admin', 'Admin', '2017-10-12 21:54:47', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(52, '977-981-99', 'masdn.jpg', 'mwen', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/bg4.jpg', 'mwen', 'admin', '2017-10-14 13:52:48', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(53, '088-538-28', 'mwen.jpg', '1', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/bg4.jpg', 'mwen', 'admin', '2017-10-14 14:24:22', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(54, '282-735-68', 'mwen.jpg', '2', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/bg4.jpg', 'mwen', 'mwen', '2017-10-14 14:26:13', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0),
(55, '056-181-86', 'mwen.jpg', 'mwen', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/bg4.jpg', 'admin', 'mwen', '2017-10-14 15:55:37', '0000-00-00 00:00:00', 'pending', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `positionId` int(3) NOT NULL,
  `collegeId` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `registrardocuments`
--

INSERT INTO `registrardocuments` (`idno`, `regTrackcode`, `docType`, `dateAdmitted`, `dateReleased`, `status`) VALUES
(3, '202-814-79', 'Lost Id', '2017-10-14', '2017-10-14', 'On going'),
(2, '549-906-80', 'Lost Reg-Form', '2017-10-13', '****-**-**', 'pending'),
(1, '627-490-81', 'Lost Reg-Form', '2017-10-13', '2017-10-13', 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `path` varchar(400) NOT NULL,
  `email` varchar(50) NOT NULL,
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

INSERT INTO `users` (`username`, `password`, `path`, `email`, `position`, `collegeId`, `department`, `firstname`, `lastname`) VALUES
('admin', 'admin', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/', 'aocabuang@gmail.com', 'Administrator', 'Admin', 'Administration', 'Mark Wendell', 'Cabuang'),
('mwen', '1234', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/ACTIVITY_12.jpg', 'mw.cabuang@gmail.com                              ', 'teacher-II', 'COS', 'Math Department', 'mwen          ', 'cabuang          '),
('omgiane', '1234', '', 'giane.noda@gmail.com', 'Teacher II', 'COS', 'Mechanical Departmen', 'giane', 'noda'),
('vince.FapQueen', '1234', '', 'vince.amadeo@gmail.com', 'Teacher II', 'COE', 'Electrical Engineeri', 'vince', 'amadeo');
