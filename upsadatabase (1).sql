-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 01:49 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upsadatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `Lastname` varchar(40) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Gender` varchar(12) NOT NULL,
  `Age` varchar(40) NOT NULL,
  `Dateofbirth` varchar(40) NOT NULL,
  `Department` varchar(59) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dates` varchar(30) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstname`, `Lastname`, `Username`, `Gender`, `Age`, `Dateofbirth`, `Department`, `Status`, `password`, `dates`, `datetime`) VALUES
(1, 'Ahmed', 'Ahia', 'ahmed', 'Male', '20', '2019-01-21', 'Nurse', 'Female', '123456', '', '2019-01-28 04:37:58'),
(2, 'Ahmed', 'ogua', 'doctor', 'Male', '17', '2019-01-10', 'Doctor', 'Female', '123456', '', '2019-01-28 04:59:24'),
(3, 'kelvim', 'Anokye', 'kelvin', 'Male', '24', '2019-01-08', 'Lab', 'Female', '12345', '', '2019-01-28 23:52:19'),
(4, 'ogua', 'lamere', 'ogua', 'Male', '27', '2019-01-29', 'Lab', 'Male', '12345', '', '2019-01-29 00:15:03'),
(5, 'ogua', 'lamere', 'ogua', 'Male', '21', '2019-01-08', 'Pharmacist', 'Male', '12345', '', '2019-01-29 02:55:25'),
(6, 'admin', 'admin', 'admin', 'Male', '21', '2018-12-31', 'Admin', 'Male', '12345', '', '2019-01-29 03:01:36'),
(7, 'ogua', 'ogua', 'ogua', 'Female', '23', '2019-01-11', 'Cashier', 'Male', '12345', '', '2019-01-29 03:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `role`, `datetime`) VALUES
(1, 'ogua', '12345', 'Nurse', '2019-01-28 04:37:59'),
(2, 'ogua', '12345', 'Doctor', '2019-01-28 04:59:24'),
(3, 'ogua', '12345', 'Lab', '2019-01-28 23:52:19'),
(4, 'ogua', '12345', 'Lab', '2019-01-29 00:15:03'),
(5, 'ogua', '12345', 'Pharmacist', '2019-01-29 02:55:25'),
(6, 'admin', '12345', 'Admin', '2019-01-29 03:01:37'),
(7, 'ogua', '12345', 'Cashier', '2019-01-29 03:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `Ref` varchar(30) NOT NULL,
  `cardid` varchar(50) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `othernames` varchar(40) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `temperature` varchar(40) NOT NULL,
  `height` varchar(30) NOT NULL,
  `PWeight` varchar(30) NOT NULL,
  `Bp` varchar(30) NOT NULL,
  `Age` varchar(30) NOT NULL,
  `dateofBirth` varchar(30) NOT NULL,
  `room` varchar(30) NOT NULL,
  `Reason` text NOT NULL,
  `Prescibe` varchar(50) NOT NULL,
  `DoctorsName` varchar(40) NOT NULL,
  `dateofReg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bloodgrp` varchar(50) NOT NULL,
  `sicking` varchar(50) NOT NULL,
  `hbgenotype` varchar(50) NOT NULL,
  `Hivst` varchar(50) NOT NULL,
  `hypertS` varchar(50) NOT NULL,
  `Ucolor` varchar(40) NOT NULL,
  `Uappera` varchar(40) NOT NULL,
  `Ph` varchar(40) NOT NULL,
  `Uprote` varchar(40) NOT NULL,
  `Ugluc` varchar(40) NOT NULL,
  `UcliniT` varchar(40) NOT NULL,
  `UKet` varchar(40) NOT NULL,
  `Ubili` varchar(40) NOT NULL,
  `Ublod` varchar(50) NOT NULL,
  `Unitri` varchar(50) NOT NULL,
  `Urbc` varchar(40) NOT NULL,
  `Uwbc` varchar(40) NOT NULL,
  `Pharmacist` varchar(40) NOT NULL,
  `Btc` varchar(40) NOT NULL,
  `Utc` varchar(50) NOT NULL,
  `Dc` varchar(40) NOT NULL,
  `Grndtotal` varchar(40) NOT NULL,
  `Cashier` varchar(50) NOT NULL,
  `dates` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `Ref`, `cardid`, `firstname`, `othernames`, `contact`, `temperature`, `height`, `PWeight`, `Bp`, `Age`, `dateofBirth`, `room`, `Reason`, `Prescibe`, `DoctorsName`, `dateofReg`, `bloodgrp`, `sicking`, `hbgenotype`, `Hivst`, `hypertS`, `Ucolor`, `Uappera`, `Ph`, `Uprote`, `Ugluc`, `UcliniT`, `UKet`, `Ubili`, `Ublod`, `Unitri`, `Urbc`, `Uwbc`, `Pharmacist`, `Btc`, `Utc`, `Dc`, `Grndtotal`, `Cashier`, `dates`) VALUES
(2, 'REF002', 'REG203', 'Eric', 'Bonnah', '0272185090', '209', '24.4', '65.9', '25', '25', '2019-01-28', 'ROOM 1', 'Headchea, noshea', 'Ogua Lamere', 'Dr. Ogua Lamere', '2019-02-12 18:12:48', 'A', 'NEGATIVE', 'NEGATIVE', 'NEGATIVE', 'NEGATIVE', 'YELLOW', 'CLEAR', '4.0', 'NEGATIVE', 'NEGATIVE', '2', '', 'NEGATIVE', 'NEGATIVE', 'NEGATIVE', '4', '3', 'pharmacist Ogua', '40', '30', '800', '.870.', 'Ogua Cashier', '2019-03-17'),
(3, 'REF003', 'REG203', 'Eric', 'Bonnah', '0272185090', '209', '24.4', '65.9', '25', '25', '2019-01-28', 'ROOM 1', 'Headchea, noshea', '', '', '2019-02-13 05:49:02', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-03-17'),
(4, 'REF004', 'REG408', 'Ahmed ', 'Ogua', '0272185090', '31', '55', '45.89', '25', '27', '1992-03-06', 'ROOM 2', 'Complaining of Headache', '', '', '2019-03-17 23:20:48', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2019-03-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
