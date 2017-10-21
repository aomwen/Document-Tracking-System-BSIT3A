-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2017 at 08:17 PM
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
('COE', 'College of Engineering', 'cater engineering stuffs', 'hitler', 'http://localhost/Document-Tracking-System-BSIT3A/assets/images/COElogo1.jpg'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`idno`, `sender`, `email`, `content`, `datecreated`, `dateseen`, `seen`, `bookmarked`) VALUES
(1, 'Mwen', 'mw.cabuang@gmail.com', 'HELLO FAFA', '2017-09-30 11:53:03', '2017-10-01 04:25:15pm', 1, 1),
(2, 'Giane Noda', 'giane.noda@gmail.com', 'Umutot ako kanina', '2017-09-30 20:55:16', '2017-10-03 05:44:06pm', 1, 0),
(5, 'Mark Wendell Cabuang', 'aocabuang@gmail.com', 'why is it that you are not updating the functions?', '2017-10-12 18:18:07', '2017-10-21 04:01:16 pm', 1, 0),
(6, 'Luis Felipe Lazaro', 'luisfelipelazaro@gmail.com', 'isheteyo isheteyo naninai nai nai HAHHAHA', '2017-10-12 18:42:53', '', 0, 0),
(7, 'mwen', 'mwen@gmail.com', '13man', '2017-10-14 13:51:19', '', 0, 0),
(8, 'Mark Wendell Cabuang', 'AoCabuang@gmail.com', '', '2017-10-15 07:47:19', '', 0, 0);

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
(206, 'COS', 'Physics Department', ''),
(225, 'COE', 'Mechanical Department', ''),
(322, 'COE', 'Electrical Engineering Department', ''),
(865, 'COE', 'MechatronicsEngineering Department', ''),
(880, 'COS', 'Mathematics Department', '');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `fileId` int(11) NOT NULL AUTO_INCREMENT,
  `fileName` varchar(100) NOT NULL,
  `fileAuthor` varchar(100) NOT NULL,
  `fileCode` varchar(4) NOT NULL,
  `fileCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fileComment` varchar(100) NOT NULL,
  `filePath` varchar(300) NOT NULL,
  PRIMARY KEY (`fileId`),
  UNIQUE KEY `fileCode` (`fileCode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileId`, `fileName`, `fileAuthor`, `fileCode`, `fileCreated`, `fileComment`, `filePath`) VALUES
(1, 'auditory of salary', 'aomwen', '4567', '2017-10-17 14:23:34', 'Recheck: all of the record properly', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/bg4.jpg'),
(2, 'Manual', 'admin', '6069', '2017-10-17 15:20:30', 'How to use the system', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/bg4.jpg'),
(3, 'books', 'admin', '5569', '2017-10-20 12:13:49', 'hehehe', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/if_book_461367.png'),
(6, 'Networking', 'aomwen', '7106', '2017-10-20 22:35:34', 'Laboratory Activiy', 'http://localhost/BEFOREABBIE/Document-Tracking-System-BSIT3A/uploads/lab-2_6_2.pdf'),
(7, 'mga ating nakaw', 'aomwen', '6565', '2017-10-20 23:11:45', 'nakaw namin tong budget', 'http://localhost/BEFOREABBIE/Document-Tracking-System-BSIT3A/uploads/lab-2_6_2.pdf'),
(8, 'compose test 1', 'aomwen', '9568', '2017-10-20 23:31:27', 'testing compose', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/lab-2_6_2.pdf'),
(9, 'auditory of salary (Mathematics Dept)', 'aomwen', '8371', '2017-10-20 23:33:41', 'year 2017', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/lab-2_6_2.pdf'),
(10, 'download test', 'aomwen', '1136', '2017-10-21 12:28:14', 'testing download', 'http://localhost/BEFOREABBIE/Document-Tracking-System-BSIT3A/uploads/lab-2_6_2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `forwardroute`
--

CREATE TABLE IF NOT EXISTS `forwardroute` (
  `routeId` int(4) NOT NULL,
  `fileCode` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `forwardComment` varchar(200) NOT NULL,
  `forwardDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `allowLog` tinyint(1) NOT NULL,
  `allowForward` tinyint(1) NOT NULL,
  PRIMARY KEY (`routeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forwardroute`
--

INSERT INTO `forwardroute` (`routeId`, `fileCode`, `fileName`, `forwardComment`, `forwardDate`, `sender`, `receiver`, `allowLog`, `allowForward`) VALUES
(1425, '4567', 'auditory of salary', 'Rechech: files properly', '2017-10-17 14:24:06', 'aomwen', 'giane.noda', 1, 1),
(8600, '6069', 'Manual', 'read this', '2017-10-17 15:21:56', 'admin', 'aomwen', 1, 1);

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
-- Table structure for table `registrardoctype`
--

CREATE TABLE IF NOT EXISTS `registrardoctype` (
  `typeId` int(11) NOT NULL AUTO_INCREMENT,
  `docType` varchar(100) NOT NULL,
  PRIMARY KEY (`typeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `registrardoctype`
--

INSERT INTO `registrardoctype` (`typeId`, `docType`) VALUES
(1, 'Certificate of Scholarship'),
(2, 'Lost Registration Form'),
(3, 'Transcript of Record'),
(4, 'mmm');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `registrardocuments`
--

INSERT INTO `registrardocuments` (`idno`, `regTrackcode`, `docType`, `dateAdmitted`, `dateReleased`, `status`) VALUES
(1, '614-363-54', 'Certificate of Scholarship', '2017-10-20', '2017-10-20', 'For Pickup');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `path` varchar(400) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `collegeId` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`userId`),
  KEY `userid` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `path`, `email`, `position`, `collegeId`, `department`, `firstname`, `lastname`) VALUES
(1, 'admin', 'admin', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/user/lashes2.jpg', 'aocabuang@gmail.com', 'Administrator', 'Admin', 'Administration', 'Mark Wendell', 'Cabuang'),
(7896, 'aomwen', '123456', 'http://localhost/Document-Tracking-System-BSIT3A/uploads/user/house1.jpg', 'AoCabuang@gmail.com', 'Teacher II', 'COS', 'Mathematics Department', 'Mark Wendell', 'Cabuang');
