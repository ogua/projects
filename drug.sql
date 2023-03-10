-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 03:34 PM
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
-- Database: `drug`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `datetime`) VALUES
(1, 'Adim', 'admin@admin.com', '$2y$10$5sdJ9wIvBG5sGA2rFDhTy.odoF1G.aTQ7pKpLn0YqxNFk6Sdadh1G', '2019-03-03 03:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `druginfo`
--

CREATE TABLE `druginfo` (
  `id` int(11) NOT NULL,
  `userid` varchar(40) NOT NULL,
  `images` varchar(50) NOT NULL,
  `manufacturername` varchar(60) NOT NULL,
  `drugname` varchar(50) NOT NULL,
  `brand` varchar(60) NOT NULL,
  `manufacdate` varchar(50) NOT NULL,
  `Expdate` varchar(50) NOT NULL,
  `manNumber` varchar(40) NOT NULL,
  `Distributor` text NOT NULL,
  `serialNumber` varchar(100) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `druginfo`
--

INSERT INTO `druginfo` (`id`, `userid`, `images`, `manufacturername`, `drugname`, `brand`, `manufacdate`, `Expdate`, `manNumber`, `Distributor`, `serialNumber`, `dates`, `datetime`, `status`) VALUES
(4, '1', '1552820419343310712.jpg', 'Australian Drug Foundation', 'Paracetamol', 'DymadonÂ®, LemsipÂ®, PanadolÂ®, PanamaxÂ®, ', '2019-03-17', '2023-03-26', '0272186090', 'Ogua Distributions', '11168170', '2019-03-17', '2019-03-17 11:00:18', 0),
(5, '1', '15528213281193715965.jpg', 'Australian Drug Foundation', 'Paracetamol Syrup', 'DymadonÂ®', '2019-03-17', '3030-03-30', '0272186090', 'Ogua Distributions', '94777855', '2019-03-17', '2019-03-17 11:15:28', 0),
(6, '1', '1552822019109890831.jpg', 'Australian Drug Foundation', 'Amoxicillin Capsule', 'DymadonÂ®', '2019-02-26', '3030-04-01', '0272186090', 'Ogua Distributions', '80711586', '2019-03-17', '2019-03-17 11:26:58', 0),
(13, '1', '15528331311848771921.jpg', 'Bonna Manufacturing Center', 'Artemether 20mg', 'Pranta', '2019-03-18', '3333-03-22', '0272185090', 'A&C, Lipton Campany Limited', '05838454', '2019-03-17', '2019-03-17 14:32:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dates`, `datetime`) VALUES
(1, 'Ogua Solutins', 'ogua@yahoo.com', '$2y$10$ROAziLVhpJkwGOX6KTFOM.VWPni03g03.dozmOVgtJOp3A3hmi/qK', '2019-03-03', '2019-03-03 00:33:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `druginfo`
--
ALTER TABLE `druginfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `druginfo`
--
ALTER TABLE `druginfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
