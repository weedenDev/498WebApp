-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 19, 2017 at 02:26 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Cisc_498_MPH`
--

-- --------------------------------------------------------

--
-- Table structure for table `Organization`
--

CREATE TABLE `Organization` (
  `OrganizationName` varchar(60) NOT NULL,
  `OrganizationID` int(11) NOT NULL,
  `StreetNameNumber` varchar(50) NOT NULL,
  `City` varchar(60) NOT NULL,
  `Province` varchar(80) NOT NULL,
  `Country` varchar(85) NOT NULL,
  `ZipPostalCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Practicum`
--

CREATE TABLE `Practicum` (
  `ProjectTitle` varchar(100) NOT NULL,
  `OrganizationID` int(11) NOT NULL,
  `Paid` tinyint(1) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `PreceptorsName` varchar(100) NOT NULL,
  `Contact` varchar(1000) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `DominantCompetencyCategory` varchar(80) NOT NULL,
  `AppliedProgramArea1` varchar(40) NOT NULL,
  `AppliedProgramArea2` varchar(40) NOT NULL,
  `AppliedProgramArea3` varchar(40) NOT NULL,
  `Population` varchar(100) NOT NULL,
  `Task1` varchar(80) NOT NULL,
  `Task2` varchar(80) NOT NULL,
  `Task3` varchar(80) NOT NULL,
  `Role` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `Student` (
  `StudentID` int(11) NOT NULL,
  `FName` varchar(40) NOT NULL,
  `LName` varchar(40) NOT NULL,
  `GraduatingYear` int(11) NOT NULL,
  `CurrentEmployer` varchar(50) NOT NULL,
  `CurrentJobTitle` varchar(100) NOT NULL,
  `QueensEmail` varchar(50) NOT NULL,
  `OtherEmail` varchar(50) NOT NULL,
  `OpenComments` varchar(140) NOT NULL,
  `Program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Practicum`
--
ALTER TABLE `Practicum`
  ADD PRIMARY KEY (`OrganizationID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`StudentID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
