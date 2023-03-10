-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2018 at 10:20 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorsappointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `docID` varchar(40) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `mobi` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `dates` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `docID`, `name`, `address`, `mobi`, `email`, `category`, `dateTime`, `username`, `password`, `Role`, `dates`) VALUES
(4, 'AEOF101', 'Dr Junior Tawaih', 'p o box ts 672', 248512487, 'junior@yahoo.com', 'Kidney', '2018-01-17 19:26:22', 'junior', '1234', 'Doctor', '2018-11-14'),
(6, 'AEOF103', 'OTULA', 'P O BOX TS TESHIE', 541254784, 'OTUA@YAHOO.COM', 'Admin', '2018-01-17 20:17:33', 'Admin', '1234', 'Admin', '2018-11-14'),
(7, 'AEOF104', 'Dr Kelvin Anokye', 'P O BOX TS 467 TESHIE ', 2147483647, 'kelvin@yahoo.com', 'Kidney', '2018-01-20 00:19:37', 'kelvin', '1234', 'Doctor', '2018-11-14'),
(8, 'AEOF104', 'Dr John Dagadu', 'P O BOX TS 374', 2147483647, 'john@yahoo.com', 'Kidney', '2018-01-20 00:20:32', 'john', '1234', 'Doctor', '2018-11-14'),
(9, 'AEOF105', 'DR Ogua Lamere', 'P O  BOX TS 376', 242185090, 'ogua@yahoo.com', 'General Physician', '2018-01-20 00:22:17', 'ogua', '1234', 'Doctor', '2018-11-14'),
(10, 'AEOF106', 'Dr Ishmeal Amartey', 'P O BOX TS 374', 2015478451, 'zibit@yahoo.com', 'Bone', '2018-01-20 00:23:41', 'zibit', '1234', 'Doctor', '2018-11-14'),
(11, 'AEOF107', 'Dr Jenefer Quatey', 'P O BOX TS 383', 245478451, 'jen@yahoo.com', 'Heart', '2018-01-20 00:24:35', 'jen', '1234', 'Doctor', '2018-11-14'),
(12, 'AEOF108', 'Dr Akweley Ahia', 'P O  BOX TS 364', 214521548, 'ahia@yahoo.com', 'Dentist', '2018-01-20 00:25:25', 'ahia', '1234', 'Doctor', '2018-11-14'),
(13, 'AEOF109', 'Dr Charlse Uroy', 'P O  BOX TW 342', 245121547, 'uroy@yahoo.com', 'Neurologist', '2018-01-20 00:26:42', 'uroy', '1234', 'Doctor', '2018-11-14'),
(14, 'AEOF110', 'Dr Agoe Adjie', 'P O BOX TS 354', 208129151, 'agoe@yahoo.com', 'Cardiologist', '2018-01-20 00:29:26', 'ago', '1234', 'Doctor', '2018-11-14'),
(15, 'AEOF111', 'Dr Sample Admin', 'P O BOX TS 363', 245124587, 'sample@yahoo.com', 'Plastic Surgeon', '2018-01-20 00:31:17', 'sample', '1234', 'Doctor', '2018-11-14'),
(16, 'AEOF112', 'Kofi Yeboah', 'P o box ts 367', 208129151, 'ogua@yahoo.com', 'Kidney', '2018-11-10 19:04:24', 'kofi', '1234', 'Doctor', '2018-11-14'),
(21, 'AEOF116', 'ghghg', 'ghgh', 66666, 'hghg', 'Bone', '2018-11-14 14:16:07', 'ghhg', 'gggg', 'Doctor', '2018-11-14'),
(22, 'AEOF117', 'dfdf', 'dffd', 0, 'f6767676776676', 'General Physician', '2018-11-14 14:44:09', 'gg', 'ggh', 'Doctor', '2018-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userid`, `username`, `password`, `Role`) VALUES
(1, 'AEOF101', 'junior', '1234', 'Doctor'),
(3, 'USID101', 'lamere', '1234', 'Patient'),
(4, 'AEOF103', 'Admin', '1234', 'Admin'),
(5, 'AEOF104', 'kelvin', '1234', 'Doctor'),
(6, 'AEOF104', 'john', '1234', 'Doctor'),
(7, 'AEOF105', 'ogua', '1234', 'Doctor'),
(8, 'AEOF106', 'zibit', '1234', 'Doctor'),
(9, 'AEOF107', 'jen', '1234', 'Doctor'),
(10, 'AEOF108', 'ahia', '1234', 'Doctor'),
(11, 'AEOF109', 'uroy', '1234', 'Doctor'),
(12, 'AEOF110', 'ago', '1234', 'Doctor'),
(13, 'AEOF111', 'sample', '1234', 'Doctor'),
(14, 'AEOF112', 'kofi', '1234', 'Doctor'),
(15, 'USID102', 'ganyobi', '1234', 'Patient'),
(17, 'USID104', 'padmore', '1234', 'Patient'),
(18, 'USID105', 'user', 'user', 'Patient'),
(19, 'AEOF113', 'admin', '1234', 'Doctor'),
(22, 'AEOF115', '444', '44444', 'Doctor'),
(23, 'AEOF116', 'ghhg', 'gggg', 'Doctor'),
(24, 'AEOF117', 'gg', 'ggh', 'Doctor'),
(25, 'AEOF118', 'fdfd', 'dffdfdffd', 'Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `newbooking`
--

CREATE TABLE `newbooking` (
  `id` int(11) NOT NULL,
  `appntmntid` varchar(10) NOT NULL,
  `userid` varchar(11) NOT NULL,
  `patientName` varchar(40) NOT NULL,
  `Gender` varchar(40) NOT NULL,
  `Age` text NOT NULL,
  `MobileNumber` int(12) NOT NULL,
  `Address` text NOT NULL,
  `TreatmentFor` varchar(255) NOT NULL,
  `Treatment` text NOT NULL,
  `Denote` text NOT NULL,
  `category` varchar(30) NOT NULL,
  `doctor` varchar(40) NOT NULL,
  `APdate` varchar(30) NOT NULL,
  `ApTime` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dates` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newbooking`
--

INSERT INTO `newbooking` (`id`, `appntmntid`, `userid`, `patientName`, `Gender`, `Age`, `MobileNumber`, `Address`, `TreatmentFor`, `Treatment`, `Denote`, `category`, `doctor`, `APdate`, `ApTime`, `datetime`, `dates`) VALUES
(7, 'APMT104', 'USID101', 'lamere', 'Male', '24', 272185090, 'p o box ys 367', '', '', '', 'Dentist', 'Dr Akweley Ahia', '2018-11-17', '07:30-08:00', '2018-11-14 11:42:23', '2018-11-14'),
(8, 'APMT105', 'USID101', 'lamere', '', '12', 2222, 'hghgh', '', '', '', 'Kidney', 'Dr Junior Tawaih', '2018-11-14', '13:00-13:30', '2018-11-14 11:42:23', '2018-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `patiencedetails`
--

CREATE TABLE `patiencedetails` (
  `id` int(11) NOT NULL,
  `userId` varchar(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `contactno` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dates` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patiencedetails`
--

INSERT INTO `patiencedetails` (`id`, `userId`, `name`, `address`, `contactno`, `email`, `username`, `password`, `datetime`, `dates`) VALUES
(3, 'USID101', 'lamere', 'p o box ts 357 Teshie - Acc', 208129151, 'ogua.ahmed@yahoo.com', 'lamere', '1234', '2018-11-14 12:50:46', '2018-11-14'),
(4, 'USID102', 'Ganyobi', 'P O BOX TS TESHIE', 541254784, 'OTUA@YAHOO.COM', 'ganyobi', '1234', '2018-11-14 12:50:46', '2018-11-14'),
(5, 'USID103', 'Obaayaa', 'P O BOX TS 367', 272185090, 'ogua.ahmed18@gmail.com', 'yaa', '1234', '2018-11-14 12:50:46', '2018-11-14'),
(22, 'USID104', 'Padmore', 'P O Box ts 367', 272185090, 'padmore@gmail.com', 'padmore', '1234', '2018-11-14 12:50:46', '2018-11-14'),
(23, 'USID105', 'Padmore', 'P o box tx 756', 208129151, 'lamere@gmail.com', 'user', 'user', '2018-11-14 12:50:46', '2018-11-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newbooking`
--
ALTER TABLE `newbooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patiencedetails`
--
ALTER TABLE `patiencedetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `newbooking`
--
ALTER TABLE `newbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patiencedetails`
--
ALTER TABLE `patiencedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
