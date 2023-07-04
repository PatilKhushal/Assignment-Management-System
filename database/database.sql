-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 04:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--
CREATE DATABASE IF NOT EXISTS `final_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `final_project`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `Assignment_ID` int(11) NOT NULL,
  `Subject_Name` varchar(60) NOT NULL,
  `Subject_Abbreviation` varchar(4) NOT NULL,
  `Subject_Code` varchar(5) NOT NULL,
  `Subject_Category` varchar(20) NOT NULL,
  `Details` varchar(200) NOT NULL,
  `File` varchar(256) NOT NULL,
  `Submit_Upto` datetime NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp(),
  `Date_Modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(20) NOT NULL,
  `Category_Abbreviation` varchar(4) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp(),
  `Date_Modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `AadharNo` varchar(12) NOT NULL,
  `First_Name` varchar(15) NOT NULL,
  `Middle_Name` varchar(15) NOT NULL,
  `Last_Name` varchar(15) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `MobileNo` varchar(10) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Course` varchar(20) NOT NULL,
  `Photo` varchar(256) NOT NULL,
  `UserName` varchar(12) NOT NULL,
  `Password` varchar(22) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp(),
  `Date_Modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_ID` int(11) NOT NULL,
  `Subject_Name` varchar(60) NOT NULL,
  `Subject_Abbreviation` varchar(4) NOT NULL,
  `Subject_Code` varchar(5) NOT NULL,
  `Subject_Category` varchar(20) NOT NULL,
  `Date_Created` datetime NOT NULL DEFAULT current_timestamp(),
  `Date_Modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `File` varchar(256) NOT NULL,
  `Subject` varchar(60) NOT NULL,
  `Date_Uploaded` datetime NOT NULL DEFAULT current_timestamp(),
  `Date_Modified` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserName`(16));

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`Assignment_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`),
  ADD UNIQUE KEY `Category_Name` (`Category_Name`),
  ADD UNIQUE KEY `Category_Abbreviation` (`Category_Abbreviation`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`AadharNo`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_ID`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `Assignment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
