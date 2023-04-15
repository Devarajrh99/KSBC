-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 12:40 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladvocates`
--

CREATE TABLE `tbladvocates` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Qualification` varchar(50) NOT NULL,
  `AdvocateType` varchar(100) NOT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `Taluk` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladvocates`
--

INSERT INTO `tbladvocates` (`ID`, `Name`, `Qualification`, `AdvocateType`, `AddressLine1`, `AddressLine2`, `Taluk`, `District`, `Mobile`, `EmailID`, `Status`) VALUES
(4, 'Jyothi M K', 'BALLB', 'Criminal', 'Third Cross', 'Vidya Nagar', 'Davanagere', 'Davanagere', '8722864794', 'jyothi@gmail.com', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbladvocatetypes`
--

CREATE TABLE `tbladvocatetypes` (
  `ID` int(11) NOT NULL,
  `AdvocateType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladvocatetypes`
--

INSERT INTO `tbladvocatetypes` (`ID`, `AdvocateType`) VALUES
(2, 'Criminal');

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `ID` int(11) NOT NULL,
  `District` varchar(100) NOT NULL,
  `Taluk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`ID`, `District`, `Taluk`) VALUES
(1, 'Davanagere', 'Davanagere'),
(2, 'Davanagere', 'Harihar'),
(3, 'Davanagere', 'Honnali'),
(4, 'Davanagere', 'Channagiri'),
(5, 'Davanagere', 'Jagalur'),
(6, 'Chitradurga', 'Chitradurga'),
(7, 'Chitradurga', 'Hiriyur');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `ID` int(11) NOT NULL,
  `Advocate` varchar(20) NOT NULL,
  `Users` varchar(20) NOT NULL,
  `Complaint` varchar(500) NOT NULL,
  `AdminReply` varchar(500) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`ID`, `Advocate`, `Users`, `Complaint`, `AdminReply`, `Status`) VALUES
(1, '8722864794', '9741726679', 'He is taking more money', 'We take action on him.', 'Replied');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourttypes`
--

CREATE TABLE `tblcourttypes` (
  `ID` int(11) NOT NULL,
  `CourtType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcourttypes`
--

INSERT INTO `tblcourttypes` (`ID`, `CourtType`) VALUES
(2, 'High Court');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `ID` int(11) NOT NULL,
  `Advocate` varchar(20) NOT NULL,
  `Users` varchar(20) NOT NULL,
  `FeedBack` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`ID`, `Advocate`, `Users`, `FeedBack`) VALUES
(1, '8722864794', '9741726679', 'He is a good advocate');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `ID` int(11) NOT NULL,
  `UserID` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `UserType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`ID`, `UserID`, `Password`, `UserType`) VALUES
(1, 'admin', 'admin', 'Admin'),
(4, '8722864794', '123456', 'Advocate'),
(6, '9741726679', '123456', 'Users');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE `tblnotification` (
  `ID` int(11) NOT NULL,
  `Notification` varchar(500) NOT NULL,
  `NotificationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblnotification`
--

INSERT INTO `tblnotification` (`ID`, `Notification`, `NotificationDate`) VALUES
(3, 'Tomorrow there is a meeting', '2020-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `tblqualification`
--

CREATE TABLE `tblqualification` (
  `ID` int(11) NOT NULL,
  `Qualification` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblqualification`
--

INSERT INTO `tblqualification` (`ID`, `Qualification`) VALUES
(1, 'LLB'),
(2, 'LLM'),
(3, 'BALLB');

-- --------------------------------------------------------

--
-- Table structure for table `tblqueries`
--

CREATE TABLE `tblqueries` (
  `ID` int(11) NOT NULL,
  `Advocate` varchar(20) NOT NULL,
  `Users` varchar(20) NOT NULL,
  `Query` varchar(500) NOT NULL,
  `AdvocateReply` varchar(500) NOT NULL,
  `Status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblqueries`
--

INSERT INTO `tblqueries` (`ID`, `Advocate`, `Users`, `Query`, `AdvocateReply`, `Status`) VALUES
(2, '8722864794', '9741726679', 'Need legal help for business.', 'Ok meet me in my office tomorrow at 10AM', 'Replied');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `Taluk` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `Mobile` varchar(20) NOT NULL,
  `EmailID` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `Name`, `AddressLine1`, `AddressLine2`, `Taluk`, `District`, `Mobile`, `EmailID`) VALUES
(3, 'Praveen K', 'Third Cross', 'Vidya Nagar', 'Davanagere', 'Davanagere', '9741726679', 'praveen@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladvocates`
--
ALTER TABLE `tbladvocates`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbladvocatetypes`
--
ALTER TABLE `tbladvocatetypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcourttypes`
--
ALTER TABLE `tblcourttypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblqualification`
--
ALTER TABLE `tblqualification`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblqueries`
--
ALTER TABLE `tblqueries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladvocates`
--
ALTER TABLE `tbladvocates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbladvocatetypes`
--
ALTER TABLE `tbladvocatetypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcourttypes`
--
ALTER TABLE `tblcourttypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblnotification`
--
ALTER TABLE `tblnotification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblqualification`
--
ALTER TABLE `tblqualification`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblqueries`
--
ALTER TABLE `tblqueries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
