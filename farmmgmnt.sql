-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 05:01 AM
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
-- Database: `farmmgmnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `images` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `images`, `password`, `datetime`) VALUES
(1, 'Ahmed', 'Ahia', 'admin@admin.com', '1556089620737832290.jpg', '$2y$10$3LNnpiN9ICpGzuTH8fxpZOxmUGRLZPx4mbzKZxj6hToBj1oDoUv8i', '2019-04-27 20:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `crop`
--

CREATE TABLE `crop` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `qauntity` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `Fetilizer` varchar(50) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crop`
--

INSERT INTO `crop` (`id`, `type`, `qauntity`, `location`, `Fetilizer`, `dates`, `datetime`) VALUES
(1, 'Maize', '20', 'Teshie Tsuibleoo', 'No Fertilizer Applied', '2019-04-28', '2019-04-28 13:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `datebought` varchar(40) NOT NULL,
  `price` varchar(40) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `image`, `name`, `supplier`, `purpose`, `datebought`, `price`, `dates`, `datetime`) VALUES
(1, '1556404933463132821.jpg', 'Kubata M7 - 11', 'Golden Stool Suppliers', 'To deliver a high tractive effort at slow speeds', '2019-04-27', '2200', '2019-04-27', '2019-04-27 22:42:13'),
(2, '1556405045910695571.jpg', 'Tranva TZ - 411', 'Golden Stool Suppliers', 'To deliver a high tractive effort at slow speeds', '2019-04-25', '3000', '2019-04-27', '2019-04-27 22:44:04'),
(3, '15564052441750715492.jpg', 'Hoe', 'Ogua Supplies', 'For Weeding', '2019-04-16', '150', '2019-04-27', '2019-04-27 22:47:23'),
(4, '1556405480350464188.png', 'Rake', 'Ogua Supplies', 'Collecting Leaves and Grasses', '2019-04-03', '60', '2019-04-27', '2019-04-27 22:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(11) NOT NULL,
  `fisrtname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `image` varchar(40) NOT NULL,
  `Contact` varchar(30) NOT NULL,
  `country` varchar(80) NOT NULL,
  `Gender` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `fisrtname`, `lastname`, `image`, `Contact`, `country`, `Gender`, `email`, `password`, `dates`, `datetime`) VALUES
(3, 'Sarah', 'Ahia', '15564628331039318191.png', '0208129151', '', 'Male', 'admin@admin.com', '$2y$10$GumOCPrR0Q/NqMy5BiNPReC/UJP6FFLMYI0rZ6ki4Qg00Yg6k79xW', '2019-04-28', '2019-04-28 14:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `fertilizer`
--

CREATE TABLE `fertilizer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `supply` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fertilizer`
--

INSERT INTO `fertilizer` (`id`, `name`, `supply`, `company`, `purpose`, `Description`, `dates`, `datetime`) VALUES
(1, 'Agyenkra', '', 'Cocoa Board', 'Plantation', 'This fertilizer is used on the plantation to boost up the growth of new Plants planted', '2019-04-27', '2019-04-27 21:08:48'),
(2, 'Pufcorn', '', 'Ogua Supplies Company', 'Top Dressing', 'To dress the soil before plantation', '2019-04-27', '2019-04-27 21:16:49'),
(3, 'Susubribi', '', 'Cocoa Board', 'Top Dressing', 'To kill soil insects to enrich the soil', '2019-04-27', '2019-04-27 21:17:35');

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE `land` (
  `id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `size` varchar(50) NOT NULL,
  `purpose` varchar(40) NOT NULL,
  `datebought` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`id`, `location`, `size`, `purpose`, `datebought`, `price`, `dates`, `datetime`) VALUES
(1, 'Teshie Tsuibleoo', '20 ', 'To plant Corn Maize', '2019-04-10', '100000', '2019-04-27', '2019-04-27 23:24:56'),
(2, 'Labasi Beach', '60', 'To plant Cassave', '2019-04-19', '300000', '2019-04-27', '2019-04-27 23:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `spray`
--

CREATE TABLE `spray` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `dates` varchar(30) NOT NULL,
  `tag` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spray`
--

INSERT INTO `spray` (`id`, `name`, `purpose`, `price`, `dates`, `tag`, `datetime`) VALUES
(1, 'Ogyam Spray', 'To Kill Pests', '100', '2019-04-27', 'pesticide', '2019-04-27 23:43:51'),
(3, 'Black Magic Spray', 'Kill Insects', '100', '2019-04-27', 'insecticide', '2019-04-27 23:48:54');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `place` varchar(50) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `datefrm` varchar(30) NOT NULL,
  `dateto` varchar(40) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `name`, `place`, `reason`, `datefrm`, `dateto`, `dates`, `datetime`) VALUES
(1, '', 'Nyankpollo', 'To Know the use of Tractors and harvesters ', '2019-05-01', '2019-05-04', '2019-04-27', '2019-04-27 22:07:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crop`
--
ALTER TABLE `crop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fertilizer`
--
ALTER TABLE `fertilizer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spray`
--
ALTER TABLE `spray`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crop`
--
ALTER TABLE `crop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fertilizer`
--
ALTER TABLE `fertilizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `land`
--
ALTER TABLE `land`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spray`
--
ALTER TABLE `spray`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
