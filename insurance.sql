-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 11:03 PM
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
-- Database: `insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` varchar(40) NOT NULL,
  `sex` varchar(40) NOT NULL,
  `voltersid` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regby` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`id`, `name`, `age`, `sex`, `voltersid`, `contact`, `email`, `password`, `regby`, `image`, `dates`, `datetime`) VALUES
(1, 'Ogua Ahmed', '27', 'Male', '3762985712', '0272185090', 'admin@admin.com', '$2y$10$JHIJSt4hjeYql9nKCKVkjeaLcWrWXrGbDzA7B2zxu1FVA4XJL8Jp6', 'Admin', '1551982722420972041.png', '2019-03-07', '2019-03-07 10:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `location`, `phone`, `state`, `dates`, `datetime`) VALUES
(2, 'Kasoa Branch', 'Kasoa', '0208129151', 'Accra', '2019-03-05', '2019-03-05 15:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `id` int(11) NOT NULL,
  `customerid` varchar(50) NOT NULL,
  `name` varchar(90) NOT NULL,
  `policy` varchar(100) NOT NULL,
  `entitled` varchar(100) NOT NULL,
  `descrbclaim` text NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `accountname` varchar(100) NOT NULL,
  `accountnumber` varchar(50) NOT NULL,
  `dates` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`id`, `customerid`, `name`, `policy`, `entitled`, `descrbclaim`, `bankname`, `accountname`, `accountnumber`, `dates`, `datetime`, `status`) VALUES
(1, '1', 'Ogua Ahmed', 'VEHICLE INSURANCE', '60000', 'Had An Accident', 'Access Bank', 'Ahmed Ogua', '964867433553', '2019-03-07', '2019-03-07 21:57:24', '1'),
(2, '1', 'Ogua Ahmed', 'VEHICLE INSURANCE', '60000', 'Had An Accident', 'Access Bank', 'Ahmed Ogua', '964867433553', '2019-03-07', '2019-03-07 21:58:00', '0'),
(3, '1', 'Ogua Ahmed', 'VEHICLE INSURANCE', '60000', 'Had An Accident with my Insured Car.', 'Access Bank', 'Ahmed Ogua', '964867433553', '2019-03-07', '2019-03-07 22:06:50', '1'),
(4, '1', 'Ogua Ahmed', 'VEHICLE INSURANCE', '60000', 'Had an Accident', 'Access Bank', 'Ahmed Ogua', '964867433553', '2019-03-11', '2019-03-11 11:53:03', '0');

-- --------------------------------------------------------

--
-- Table structure for table `customerpolicy`
--

CREATE TABLE `customerpolicy` (
  `id` int(11) NOT NULL,
  `customerid` varchar(100) NOT NULL,
  `Customername` varchar(200) NOT NULL,
  `policy` varchar(100) NOT NULL,
  `policyAmount` varchar(50) NOT NULL,
  `premium` varchar(200) NOT NULL,
  `premiumType` varchar(100) NOT NULL,
  `dates` varchar(80) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerpolicy`
--

INSERT INTO `customerpolicy` (`id`, `customerid`, `Customername`, `policy`, `policyAmount`, `premium`, `premiumType`, `dates`, `datetime`) VALUES
(1, '1', 'Ogua Ahmed', 'VEHICLE INSURANCE', '40000', '200', 'Monthly', '2019-03-07', '2019-03-07 17:27:19'),
(2, '1', 'Ogua Ahmed', 'TRAVEL INSURANCE', '500000', '300', 'Monthly', '2019-03-11', '2019-03-11 21:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `age` varchar(20) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `voltersid` varchar(20) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `registerdBy` varchar(50) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `images` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `age`, `gender`, `voltersid`, `contact`, `email`, `registerdBy`, `username`, `password`, `dates`, `datetime`, `images`) VALUES
(1, 'Ogua Ahmed', '27', 'Male', '2837483928', '0272198991', 'admin@admin.com', 'Admin', 'admin@admin.com', '$2y$10$6ao/c6Sp6ZeNTfPTc6qaQ.TdlBeN8Fr/Wv0su6lPDOxpmHpSBOVkC', '2019-03-07', '2019-03-07 20:51:18', '1551991878720084813.png');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(60) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `name`, `age`, `sex`, `branch`, `contact`, `email`, `password`, `dates`, `datetime`) VALUES
(2, 'Ogua Ahmed', '27', 'Male', 'Kasoa Branch', '0272185090', 'admin@admin.com', '$2y$10$944/gs6csvW4d5kYC/gybeaUIOG2/DeYEVDGwBuxFOwoHvms/ySya', '2019-03-05', '2019-03-05 15:31:22');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `term` varchar(30) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `premium` varchar(80) NOT NULL,
  `interest` varchar(50) NOT NULL,
  `bonus` varchar(100) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `name`, `term`, `amount`, `premium`, `interest`, `bonus`, `dates`, `datetime`) VALUES
(1, 'HOUSE INSURANCE', '48', '30000', '200', '10', '4 YEARS', '2019-03-07', '2019-03-07 12:00:04'),
(2, 'VEHICLE INSURANCE', '48', '40000', '200', '10', '4 YEARS', '2019-03-07', '2019-03-07 12:00:44'),
(3, 'TRAVEL INSURANCE', '60', '500000', '300', '20', '5 YEARS', '2019-03-07', '2019-03-07 12:01:27'),
(4, 'HEALTH INSURANCE', '48', '30000', '200', '20', '4 YEARS', '2019-03-07', '2019-03-07 12:01:58'),
(5, 'PROPERTY INSURANCE', '60', '30000', '200', '10', '4 YEARS', '2019-03-07', '2019-03-07 12:02:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `claims`
--
ALTER TABLE `claims`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerpolicy`
--
ALTER TABLE `customerpolicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `claims`
--
ALTER TABLE `claims`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerpolicy`
--
ALTER TABLE `customerpolicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
