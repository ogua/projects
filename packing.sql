-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 11:27 PM
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
-- Database: `packing`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `feedback` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dates` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fullname`, `feedback`, `datetime`, `dates`) VALUES
(1, 'Ahmed  Ahia', 'please why can i locate the airport', '2018-11-02 13:08:13', '2018-11-04'),
(3, 'Ogua Lamere', 'test the feedback boss', '2018-11-02 14:36:01', '2018-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `packingspace`
--

CREATE TABLE `packingspace` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(15) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packingspace`
--

INSERT INTO `packingspace` (`id`, `name`, `capacity`, `datetime`) VALUES
(1, 'First Floor Packing', 100, '2018-10-30 09:39:04'),
(2, 'Basement Parking Space', 80, '2018-10-30 09:39:04'),
(3, 'Second Floor Packing', 100, '2018-10-30 09:39:53'),
(4, 'Outer Parking Space', 50, '2018-10-30 09:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `parkslot`
--

CREATE TABLE `parkslot` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `slotname` varchar(255) NOT NULL,
  `slodid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Available',
  `model` varchar(40) NOT NULL,
  `vehicle` varchar(40) NOT NULL,
  `platenumber` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `startdate` varchar(30) NOT NULL,
  `endstart` varchar(30) NOT NULL,
  `image` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dates` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkslot`
--

INSERT INTO `parkslot` (`id`, `username`, `slotname`, `slodid`, `status`, `model`, `vehicle`, `platenumber`, `email`, `phonenumber`, `startdate`, `endstart`, `image`, `datetime`, `dates`) VALUES
(1, 'Ahmed', 'Second Floor Packing', 1, 'Occupied', '', 'ABOBOYAA', 'GH 122- 18', 'ogua.ahmed18@gmail.com', '0272185090', '2018-11-01', '2018-11-16', '15409088211553679482.jpg', '2018-11-01 12:26:28', ''),
(2, 'Ahmed', 'First Floor Packing', 2, 'Occupied', '', 'COROLA S', 'GH-3884 V', 'ogua.ahmed18@gmail.com', '0272185090', '2018-11-01', '2018-11-01', '15409088211553679482.jpg', '2018-11-01 14:45:01', ''),
(3, 'Ahmed', 'First Floor Packing', 2, 'Occupied', '', 'COROLA S', 'GH-3884 V', 'ogua.ahmed18@gmail.com', '0272185090', '2018-11-01', '2018-11-01', '15409088211553679482.jpg', '2018-11-01 14:48:18', ''),
(4, 'Ahmed', 'First Floor Packing', 6, 'Occupied', '', 'TOYOTA', '1414 - 18', 'ogua.ahmed18@gmail.com', '0272185090', '2018-11-01', '2018-11-02', '15409088211553679482.jpg', '2018-11-01 14:50:48', ''),
(5, 'Ahmed', 'First Floor Packing', 1, 'Occupied', '', 'Camry', 'ADVICE 1 - 18', 'ogua.ahmed18@gmail.com', '0272185090', '2018-11-02', '2018-11-02', '15409088211553679482.jpg', '2018-11-02 10:43:38', ''),
(6, 'Ahmed', 'Second Floor Packing', 2, 'Occupied', '', 'Ferrari', 'advise 1- 18', 'ogua.ahmed18@gmail.com', '0272185090', '2018-11-02', '2018-11-03', '15409088211553679482.jpg', '2018-11-02 22:49:40', ''),
(7, 'Ahmed', 'Outer Parking Space', 1, 'Occupied', '', 'Madjoa', '14-14', 'ogua.ahmed18@gmail.com', '0272185090', '2018-11-03', '2018-11-03', '15409088211553679482.jpg', '2018-11-03 22:35:25', ''),
(8, 'Ahmed', 'Basement Parking Space', 1, 'Occupied', '', 'Ferrari', 'advise 1- 18', 'ogua.ahmed18@gmail.com', '0272185090', '2018-11-05', '2018-11-07', '15409088211553679482.jpg', '2018-11-03 23:09:06', ''),
(9, 'Ahmed', 'First Floor Packing', 17, 'Occupied', '', 'Mercedes', '1414', 'ogua.ahmed18@gmail.com', '0272185090', '2018-11-04', '2018-11-06', '15409088211553679482.jpg', '2018-11-04 18:40:15', '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phonenume` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `amountpaid` varchar(10) NOT NULL,
  `vehicle` varchar(40) NOT NULL,
  `platenumber` varchar(40) NOT NULL,
  `assignslot` varchar(10) NOT NULL,
  `slotename` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `parkdays` varchar(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  `payupdate` varchar(20) NOT NULL DEFAULT 'NO PAYMENT YET',
  `dates` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `username`, `phonenume`, `email`, `amountpaid`, `vehicle`, `platenumber`, `assignslot`, `slotename`, `status`, `parkdays`, `image`, `datetime`, `payupdate`, `dates`) VALUES
(1, 'Ahmed', '0272185090', 'ogua.ahmed18@gmail.com', '20', 'TOYOTA', '1414 - 18', '6', 'First Floor Packing', 'Pay On Arrival', '2', '15409088211553679482.jpg', '2018-11-01 15:36:26', 'Payment Received', '2018-11-03'),
(2, 'Ahmed', '0272185090', 'ogua.ahmed18@gmail.com', '10', 'Camry', 'ADVICE 1 - 18', '1', 'First Floor Packing', 'Pay On Arrival', '1', '15409088211553679482.jpg', '2018-11-02 11:01:51', 'No Payment Received', '2018-11-02'),
(3, 'Ahmed', '0272185090', 'ogua.ahmed18@gmail.com', '20', 'Ferrari', 'advise 1- 18', '2', 'Second Floor Packing', 'Pay On Arrival', '2', '15409088211553679482.jpg', '2018-11-02 23:50:32', 'NO PAYMENT YET', '2018-11-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(40) NOT NULL,
  `dates` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `role`, `password`, `email`, `phone`, `datetime`, `image`, `dates`) VALUES
(1, 'Ahmed', 'Lamere', 'Customer', '$2y$10$2BAGYJynZjIZJ0jbjlW81ey0eYo0AQRhA/Pqu.zzyQVYMcoLvFC6a', 'ogua.ahmed18@gmail.com', '0272185090', '2018-10-30 14:13:41', '15409088211553679482.jpg', '2018-11-04'),
(8, 'Samuel', 'Admin', 'Admin', '$2y$10$ISi2V3oJylGJ.bIhHk.AROs6d/nSbOHdI/EgoJywXCkMyq4pH1NI6', 'samuel@yahoo.com', '0208129151', '2018-11-01 16:17:29', 'co.png', '2018-11-04'),
(11, 'Samuel', 'Reuben12', 'Admin', '$2y$10$iZyX37t4pCan1sf8/lU4J.Xo0K7arf3ZFyWgh7VQkbJeRiJPaZ93W', 'samuel@yahoo.com', '0208129151', '2018-11-01 16:50:32', 'co.png', '2018-11-04'),
(12, '', '', 'Customer', '$2y$10$T8vNDaGG4u3YEnb860Ro/uMWX.PP.Gz6oA5.pIpf6vewQ8yLsax9G', '', '', '2018-11-04 19:15:40', 'co.png', '2018-11-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packingspace`
--
ALTER TABLE `packingspace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkslot`
--
ALTER TABLE `parkslot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packingspace`
--
ALTER TABLE `packingspace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parkslot`
--
ALTER TABLE `parkslot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
