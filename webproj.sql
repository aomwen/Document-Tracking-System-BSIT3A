-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2017 at 08:09 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproj`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ntitle` varchar(50) NOT NULL,
  `nbody` text NOT NULL,
  `nauthor` varchar(30) NOT NULL,
  `nno` int(11) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ntitle`, `nbody`, `nauthor`, `nno`, `dt`) VALUES
('bakit walang pasok?', 'ajhfbangahsavja obnaiuotyrduyxakhfivhqje quh iruheir wheiorho quroheo y u yuhuhiuqhoihqoh qh uhroqjfqj oqhoqhehw h', 'Franz Paragas', 1, '2017-09-12 06:59:07'),
('HAHAHAHA', 'ijdbciwejnoqknocnqoeboqsocqkvoqgeowmcwiugokncobqevbqoeno hwuefhowefn orwoef woehowehrowe owieo wijoijroiw owerowie oweu ro o weur owiruowierjierh oweiro weroiwefo wiwerowehr woho wheoweoj oweiurowieuo weirw eirweir we rerw  eirw ere orweiruwoeru io', 'LoL', 2, '2017-09-12 06:59:07'),
('GGWP', 'GGWP AHAHAHAH', 'Renzo Payol', 3, '2017-09-14 04:48:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ntitle`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
