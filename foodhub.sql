-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 01:32 PM
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
-- Database: `foodhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `club_house`
--

CREATE TABLE `club_house` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `type_food` varchar(50) NOT NULL,
  `packaging` varchar(50) NOT NULL,
  `quantity` int(3) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0',
  `message` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `club_house`
--

INSERT INTO `club_house` (`id`, `title`, `name`, `phone`, `type_food`, `packaging`, `quantity`, `status`, `message`, `date_time`) VALUES
(2, 'Student', 'Ben amoaku', 2147483647, 'Waakye', 'In a take away', 3, '1', 'no', '2019-02-28 18:59:50'),
(3, 'Student', 'Ben amoaku', 2147483647, 'Waakye', 'In a take away', 3, '0', 'no', '2019-02-28 19:02:09'),
(4, 'Student', 'Ben amoaku', 2147483647, 'Waakye', 'In a take away', 3, '2', 'no', '2019-02-28 19:04:15'),
(5, 'Student', 'kwaku menu', 542586626, 'Red Red Beans stew with fried plantains', 'None', 1, '0', 'ok', '2019-02-28 19:04:41'),
(6, 'Staff', 'kojo', 542586626, 'Fufu and goat light soup', 'In a take away', 1, '0', 'ok', '2019-02-28 19:06:09'),
(7, 'Student', 'kwaku menu', 542586626, 'Red Red Beans stew with fried plantains', 'None', 1, '0', 'ok', '2019-02-28 19:07:16'),
(8, 'Student', 'kojo', 2147483647, 'Red Red Beans stew with fried plantains', 'In a take away', 1, '0', 'ok', '2019-03-01 11:04:19'),
(9, 'Student', 'Ahmed Ogua', 208129151, 'Red Red Beans stew with fried plantains', 'In a platee', 1, '0', 'no please', '2019-03-14 12:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usname` varchar(11) NOT NULL,
  `pass` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `usname`, `pass`) VALUES
(2, 'Admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `mamalit_special`
--

CREATE TABLE `mamalit_special` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `type_food` varchar(100) NOT NULL,
  `packaging` varchar(50) NOT NULL,
  `quantity` int(3) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `message` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mamalit_special`
--

INSERT INTO `mamalit_special` (`id`, `title`, `name`, `phone`, `type_food`, `packaging`, `quantity`, `status`, `message`, `date_time`) VALUES
(1, 'Staff', 'Isaac Amuaben', 542565356, 'Banku and Okro Stew', 'In a take away', 1, '2', 'just bring my food', '2019-03-03 14:32:02'),
(2, 'Student', 'Kojo Nkansa', 275659514, 'Fried Rice and Chicken', 'In a take away', 1, '1', 'no', '2019-03-03 21:31:14'),
(3, 'Staff', 'Bismark Attakyea', 558546956, 'Plain Rice and Stew', 'In a platee', 2, '2', 'am hungry', '2019-03-03 21:32:15'),
(4, 'Staff', 'Bismark Attakyea', 558546956, 'Plain Rice and Stew', 'In a platee', 2, '2', 'am hungry', '2019-03-04 10:30:13'),
(5, 'Student', 'Ahmed Ogua', 272185090, 'Rice and Stew', 'In a platee', 1, '0', 'no please', '2019-03-13 10:17:18'),
(6, 'Student', 'Ahmed Ogua', 272185090, 'Fried Rice and Chicken', 'In a take away', 1, '0', 'no please', '2019-03-14 12:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `mary_dee`
--

CREATE TABLE `mary_dee` (
  `id` int(11) NOT NULL,
  `title` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `type_food` varchar(255) NOT NULL,
  `packaging` varchar(50) NOT NULL,
  `quantity` int(3) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT '0',
  `message` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mary_dee`
--

INSERT INTO `mary_dee` (`id`, `title`, `name`, `phone`, `type_food`, `packaging`, `quantity`, `status`, `message`, `date_time`) VALUES
(1, 0, 'Ben amoaku', 245665666, 'Fufu and goat light soup', 'In a take away', 1, '2', 'am ok for now', '2019-03-01 22:25:54'),
(2, 0, 'James Amaliba', 275698214, 'Rice and Stew', 'In a take away', 1, '1', 'am hungry', '2019-03-03 14:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `tanee`
--

CREATE TABLE `tanee` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `type_food` varchar(50) NOT NULL,
  `packaging` varchar(50) NOT NULL,
  `quantity` int(3) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT '0',
  `message` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanee`
--

INSERT INTO `tanee` (`id`, `title`, `name`, `phone`, `type_food`, `packaging`, `quantity`, `status`, `message`, `date_time`) VALUES
(1, 'Student', 'kojo', 245665666, 'Fufu and goat light soup', 'Decide for me', 3, '1', 'no', '2019-03-01 22:14:21'),
(2, 'Student', 'kofi Amoaben', 245665666, 'Tuo Zaafi with Ayoyo soup', 'Decide for me', 1, '0', 'am hungry', '2019-03-03 14:44:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club_house`
--
ALTER TABLE `club_house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mamalit_special`
--
ALTER TABLE `mamalit_special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mary_dee`
--
ALTER TABLE `mary_dee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanee`
--
ALTER TABLE `tanee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club_house`
--
ALTER TABLE `club_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mamalit_special`
--
ALTER TABLE `mamalit_special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mary_dee`
--
ALTER TABLE `mary_dee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tanee`
--
ALTER TABLE `tanee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
