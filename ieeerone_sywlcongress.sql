-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2016 at 06:48 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ieeerone_sywlcongress`
--

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE IF NOT EXISTS `Country` (
  `CID` int(11) NOT NULL,
  `Country` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`CID`, `Country`) VALUES
(6, 'Australia'),
(2, 'Bangladesh'),
(8, 'China'),
(1, 'India'),
(9, 'Indonesia'),
(7, 'Japan'),
(10, 'Malaysia'),
(5, 'New Zealand'),
(3, 'Pakistan'),
(11, 'Philippines'),
(12, 'Singapore'),
(13, 'South Korea'),
(4, 'Sri Lanka'),
(14, 'Taiwan'),
(15, 'Thailand'),
(16, 'Vietnam');

-- --------------------------------------------------------

--
-- Table structure for table `MembershipType`
--

CREATE TABLE IF NOT EXISTS `MembershipType` (
  `ID` int(11) NOT NULL,
  `Type` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MembershipType`
--

INSERT INTO `MembershipType` (`ID`, `Type`) VALUES
(4, 'Life Member'),
(1, 'Student'),
(2, 'Women In Engineering'),
(3, 'Young Professional');

-- --------------------------------------------------------

--
-- Table structure for table `Phase1Registration`
--

CREATE TABLE IF NOT EXISTS `Phase1Registration` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(150) NOT NULL,
  `Selected` int(11) DEFAULT NULL,
  `Organisation` varchar(100) NOT NULL,
  `MembershipType` int(11) NOT NULL,
  `MembershipNumber` int(11) NOT NULL,
  `MembershipAge` int(11) NOT NULL,
  `Section` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstTime` varchar(100) NOT NULL,
  `VolunteerRoles` varchar(4096) NOT NULL,
  `Expectations` varchar(4096) NOT NULL,
  `Suggestions` varchar(4096) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Phase1Registration`
--

INSERT INTO `Phase1Registration` (`ID`, `FullName`, `Selected`, `Organisation`, `MembershipType`, `MembershipNumber`, `MembershipAge`, `Section`, `Email`, `FirstTime`, `VolunteerRoles`, `Expectations`, `Suggestions`) VALUES
(3, 'LALITA PRASAD', NULL, 'df', 1, 868486, 2, 2, 'rahulcomp24@gmail.com', 'dsfsae', 'dwsfe', 'dwsfedwsfe', 'dwsfedwsfe');

-- --------------------------------------------------------

--
-- Table structure for table `phase2registration`
--

CREATE TABLE IF NOT EXISTS `phase2registration` (
  `ID` int(11) NOT NULL,
  `RegNumber` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Section`
--

CREATE TABLE IF NOT EXISTS `Section` (
  `SID` int(11) NOT NULL,
  `Section` varchar(100) NOT NULL,
  `Country` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Section`
--

INSERT INTO `Section` (`SID`, `Section`, `Country`) VALUES
(1, 'Australian Capital Territory\r\n', 6),
(2, 'Bangalore', 1),
(3, 'Bangladesh', 2),
(4, 'Beijing\r\n', 8),
(5, 'Bombay (Mumbai)', 1),
(6, 'Calcutta (Kolkata)', 1),
(7, 'Changwon\r\n', 13),
(8, 'Chengdu\r\n', 8),
(9, 'Daejeon\r\n', 13),
(10, 'Delhi', 1),
(11, 'Fukuoka\r\n', 7),
(12, 'Gujarat', 1),
(13, 'Gwangju\r\n', 13),
(14, 'Harbin\r\n', 8),
(15, 'Hiroshima\r\n', 7),
(16, 'Hong Kong\r\n', 8),
(17, 'Hyderabad', 1),
(18, 'Indonesia\r\n', 9),
(19, 'Islamabad', 3),
(20, 'Kansai\r\n', 7),
(21, 'Karachi', 3),
(22, 'Kerala', 1),
(23, 'Kharagpur', 1),
(24, 'Lahore', 3),
(25, 'Macau\r\n', 8),
(26, 'Madras (Chennai)', 1),
(27, 'Malaysia\r\n', 10),
(28, 'Nagoya\r\n', 7),
(29, 'Nanjing\r\n', 8),
(30, 'New South Wales\r\n', 6),
(31, 'New Zealand Central', 5),
(32, 'New Zealand North', 5),
(33, 'New Zealand South', 5),
(34, 'Northern Australia', 6),
(35, 'Pune', 1),
(36, 'Queensland\r\n', 6),
(37, 'Republic of Philippines\r\n', 11),
(38, 'Sapporo\r\n', 7),
(39, 'Sendai\r\n', 7),
(40, 'Seoul\r\n', 13),
(41, 'Shanghai\r\n', 8),
(42, 'Shikoku\r\n', 7),
(43, 'Shin-etsu\r\n', 7),
(44, 'Singapore\r\n', 12),
(45, 'South Australia', 6),
(46, 'Sri Lanka', 4),
(47, 'Taegu\r\n', 13),
(48, 'Tainan\r\n', 14),
(49, 'Taipei\r\n', 14),
(50, 'Thailand\r\n', 15),
(51, 'Tokyo', 7),
(52, 'Uttar Pradesh', 1),
(53, 'Victorian\r\n', 6),
(54, 'Vietnam\r\n', 16),
(55, 'Western Australia', 6),
(56, 'Wuhan\r\n', 8),
(57, 'Xian\r\n', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`CID`),
  ADD UNIQUE KEY `Country` (`Country`);

--
-- Indexes for table `MembershipType`
--
ALTER TABLE `MembershipType`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Type` (`Type`);

--
-- Indexes for table `Phase1Registration`
--
ALTER TABLE `Phase1Registration`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `MembershipNumber` (`MembershipNumber`),
  ADD UNIQUE KEY `MembershipNumber_2` (`MembershipNumber`);

--
-- Indexes for table `phase2registration`
--
ALTER TABLE `phase2registration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Section`
--
ALTER TABLE `Section`
  ADD PRIMARY KEY (`SID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Country`
--
ALTER TABLE `Country`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `MembershipType`
--
ALTER TABLE `MembershipType`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Phase1Registration`
--
ALTER TABLE `Phase1Registration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Section`
--
ALTER TABLE `Section`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
