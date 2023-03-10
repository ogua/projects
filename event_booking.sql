-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 06:21 PM
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
-- Database: `event_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'Admin', '1234'),
(2, 'Admin2', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Phone` varchar(13) NOT NULL,
  `price` int(10) NOT NULL,
  `Qty` varchar(255) NOT NULL,
  `Total` varchar(255) NOT NULL,
  `nameofEvent` varchar(30) NOT NULL,
  `TypeofEvent` varchar(30) NOT NULL,
  `Edate` varchar(29) NOT NULL,
  `Etime` varchar(10) NOT NULL,
  `Evenue` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Userid` int(12) NOT NULL,
  `Refid` varchar(255) NOT NULL,
  `dates` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `Name`, `Phone`, `price`, `Qty`, `Total`, `nameofEvent`, `TypeofEvent`, `Edate`, `Etime`, `Evenue`, `datetime`, `Userid`, `Refid`, `dates`) VALUES
(1, 'Ahmed Ahia', '0272185090', 40, '12', '400', 'Crucify hour', 'Movies & Cinema', '2018-04-24', '15:07', 'Sllverbird cenima', '2018-04-24 18:49:24', 2, 'REF87', '2018-04-23'),
(2, 'Ahmed Ahia', '0272185090', 30, '1', '30', 'Crucify hour', 'Movies & Cinema', '2018-04-24', '15:07', 'Sllverbird cenima', '2018-04-24 18:55:27', 2, 'REF287', '2018-04-22'),
(3, 'Ogua Lamere', '0272185090', 40, '1', '40', 'Developers Meetup ', 'Educational', '2018-04-27', '13:30', 'Lascalla', '2018-04-25 08:48:05', 1, 'REF131', '2018-04-22'),
(4, 'Ogua Ahmed', '0272185090', 100, '1', '100', 'Last ship Movie Premiere', 'Movies & Cinema', '2018-04-23', '13:22', ' Movie', '2018-04-25 09:30:25', 0, 'REF140', '2018-04-21'),
(5, 'Lamere Ogua', '0272888822', 40, '1', '40', 'Movie Premiere', 'Technology', '2018-04-23', '03:03', 'LASCALLA', '2018-04-25 09:30:50', 1, 'REF252', '2018-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `bookusers`
--

CREATE TABLE `bookusers` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookusers`
--

INSERT INTO `bookusers` (`id`, `username`, `password`, `phone`, `dates`) VALUES
(1, 'Lamere', 'senior', '0272185090', '2018-04-24 16:44:40'),
(2, 'Ogua', 'senior', '0209129151', '2018-04-25 09:29:28'),
(3, 'ogua12', '123456', '0272185090', '2019-04-20 10:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `eventid` varchar(50) NOT NULL,
  `name` varchar(40) NOT NULL,
  `comment` text NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `eventid`, `name`, `comment`, `dates`, `datetime`) VALUES
(1, '7', 'Ahmed Ahia', 'Please is the Programme Free', '2019-04-20', '2019-04-20 11:30:46'),
(2, '4', 'Ahmed Ahia', 'A must Watch Movie', '2019-04-20', '2019-04-20 11:46:14');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `uName` varchar(255) NOT NULL,
  `nameofevent` varchar(255) NOT NULL,
  `typeofevnt` varchar(255) NOT NULL,
  `dates` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `artwork` varchar(255) NOT NULL,
  `describEvnt` varchar(255) NOT NULL,
  `EventLoc` varchar(255) NOT NULL,
  `EvebtVenue` varchar(255) NOT NULL,
  `EventAddr` varchar(255) NOT NULL,
  `EventCity` varchar(255) NOT NULL,
  `EventConrty` varchar(255) NOT NULL,
  `NameofOrg` varchar(255) NOT NULL,
  `NameofOEmail` varchar(255) NOT NULL,
  `NameofOrgphone` varchar(255) NOT NULL,
  `NamofOrgLogo` varchar(255) NOT NULL,
  `TicketName` varchar(255) NOT NULL,
  `Qty` varchar(255) NOT NULL,
  `Px` varchar(255) NOT NULL,
  `TicketDesc` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `datess` varchar(255) NOT NULL,
  `publish` int(40) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `uid`, `uName`, `nameofevent`, `typeofevnt`, `dates`, `time`, `artwork`, `describEvnt`, `EventLoc`, `EvebtVenue`, `EventAddr`, `EventCity`, `EventConrty`, `NameofOrg`, `NameofOEmail`, `NameofOrgphone`, `NamofOrgLogo`, `TicketName`, `Qty`, `Px`, `TicketDesc`, `datetime`, `datess`, `publish`) VALUES
(3, '', '', 'Last ship Movie Premiere', 'Movies & Cinema', '2018-04-23', '13:22', '2 - Copy.jpg', 'Cinema Movie', 'P o box ts 367 Accra Ghana', ' Movie', 'Lascalla Cinnema', 'Accra', 'GH', 'Shatamovement For life', 'ogua.ahmed@yahoo.com', '0272185090', '1.jpg', '', '0', '', '', '', '2018-04-23', 1),
(5, '2', 'Charles', 'Crucify hour', 'Movies & Cinema', '2018-04-24', '15:07', 'n3 - Copy.jpg', 'Jesus Film. ', 'Accra', 'Sllverbird cenima', 'MD2/100', 'Accra', 'GH', 'Modus Blvcka ', 'mb@yahoo.com', '02617282882', '', 'Passion of Christ', '137', '30', 'black blue greeen yellow colors', '', '2018-04-24', 1),
(6, '1', 'Ogua', 'Developers Meetup ', 'Educational', '2018-04-27', '13:30', 'promoted_ddd740b348230a86 - Copy.jpg', 'Developers meetup is a programme organised for developers to help hem to know the reason why they need to take coding very seriously, teach them about security and also how to build a website from scratch', 'P O BOX TS 367', 'Lascalla', 'hn/F6g', 'Accra', 'GH', 'Ogua Entertainment', 'ogua.ahmed@yahoo.com', '0272185090', '', 'Developers Meetup', '500', '0', 'its a free Programme', '', '2018-04-25', 1),
(7, '2', 'Charles', 'Comedy Fiester', 'Music & Concert', '2018-04-28', '20:00', 'commedy.jpg', 'Comedy Fiester is a oneweek comedy programme organised for commedians to show case their talents to he world . come one , come all', 'Kaneshi Mall', 'Commedy Night', 'P O BOX TS 367', 'Kaneshie', 'GH', 'Ogua Entertainment', 'ogua.ahmed@yahoo.com', '0208129151', '', 'Comedy Night', '200', '30', '', '', '2018-04-25', 1),
(8, '1', '', 'Movie Show', 'Sports', '2019-04-18', '04:00', '15557680791970142204.jpg', 'Movie Hub Ogua', 'Teshie', 'Guest Inn', 'Tershie - tsuiblee', 'accra', 'AM', 'Ogua', 'admi@yahoo.com', '0272185090', 'c4.jpg', 'Ogua Ticket', '20', '30', '', '', '2019-04-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `number` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `number`, `dates`) VALUES
(1, 'Ogua', '12345', 'ogua.amed@yahoo.com', '272185090', '2018-04-23 20:01:18'),
(2, 'Charles', 'senior', 'ogua.amed12@yahoo.com', '0272185090', '2018-04-24 13:07:04'),
(3, 'Junior', '12345', 'ogua.ahmed@yahoo.com', '0272185090', '2018-04-25 09:56:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookusers`
--
ALTER TABLE `bookusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookusers`
--
ALTER TABLE `bookusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
