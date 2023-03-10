-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2019 at 02:21 PM
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
-- Database: `hotelmngmnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `apponitments`
--

CREATE TABLE `apponitments` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `msg` text NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apponitments`
--

INSERT INTO `apponitments` (`id`, `name`, `email`, `phone`, `msg`, `dates`, `datetime`) VALUES
(1, 'Ahmed Ogua', 'kofi@yahoo.com', '0272185090', 'I have a business i would love to talk about', '02/21/2019', '2019-02-21 09:00:29');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `Hostelid` varchar(30) NOT NULL,
  `userid` varchar(40) NOT NULL,
  `CustomerName` varchar(40) NOT NULL,
  `Customeremail` varchar(40) NOT NULL,
  `Customergender` varchar(30) NOT NULL,
  `CustomerPhone` varchar(20) NOT NULL,
  `Hostelname` varchar(40) NOT NULL,
  `hostelFloor` varchar(40) NOT NULL,
  `hostelRoomType` varchar(40) NOT NULL,
  `HostelroomNum` varchar(30) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT '0',
  `dates` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PaymentStatus` varchar(40) NOT NULL DEFAULT '0',
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `Hostelid`, `userid`, `CustomerName`, `Customeremail`, `Customergender`, `CustomerPhone`, `Hostelname`, `hostelFloor`, `hostelRoomType`, `HostelroomNum`, `price`, `status`, `dates`, `datetime`, `PaymentStatus`, `image`) VALUES
(1, '1', '1', 'Ahmed Ahia', 'oguayahoo.com@yahoo.com', 'Male', '0272185090', 'Ogua connect', 'First Floor', 'Joint Double Beds, Toliet + Bath', 'Room 15', '1500', '0', '2019-02-22', '2019-02-22 09:27:51', '0', '1550827672245345804.jpg'),
(2, '1', '2', 'Kofi Kwame', 'kofi@yahoo.com', 'Male', '0208129151', 'Rich Hostel', 'First Floor', 'Joint Double Beds, Toliet + Bath', 'Room 14', '1500', '0', '2019-02-24', '2019-02-24 13:39:35', '0', '15510155761851153807.jpg'),
(3, '1', '2', 'Kofi Kwame', 'kofi@yahoo.com', 'Male', '0208129151', 'Kaisu Hostel', 'Second Floor', 'Joint Double Beds, Toliet + Bath', 'Room 15', '1500', '0', '2019-02-28', '2019-02-28 19:36:19', '0', '155138258039176007.jpg'),
(4, '1', '2', 'Kofi Kwame', 'kofi@yahoo.com', 'Male', '0208129151', 'Lamere Hostel', 'First Floor', 'Joint Double Beds, Toliet + Bath', 'Room 16', '1500', '0', '2019-02-28', '2019-02-28 20:22:36', '0', '15513853561989107148.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(110) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telep` varchar(50) NOT NULL,
  `subj` varchar(200) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `telep`, `subj`, `msg`, `dates`, `datetime`) VALUES
(1, 'wewe', 'ouh@yahoo.com', '0000000000', '00000', '000', '2019-03-01', '2019-03-01 12:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(11) NOT NULL,
  `userid` varchar(40) NOT NULL,
  `name` varchar(40) NOT NULL,
  `location` varchar(40) NOT NULL,
  `urlofHostel` text NOT NULL,
  `typeifHostel` varchar(40) NOT NULL,
  `numofrooms` varchar(40) NOT NULL,
  `roomsize` text NOT NULL,
  `pplPerroom` text NOT NULL,
  `price` varchar(40) NOT NULL,
  `Approval` int(11) NOT NULL DEFAULT '0',
  `dates` varchar(30) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `images` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostels`
--

INSERT INTO `hostels` (`id`, `userid`, `name`, `location`, `urlofHostel`, `typeifHostel`, `numofrooms`, `roomsize`, `pplPerroom`, `price`, `Approval`, `dates`, `datetime`, `images`) VALUES
(3, '1', 'Green Hostel', 'Asanka Opposite Yellow Hostel', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9609885873433!2d-0.1518126851788587!3d5.5727863350298525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzQnMjIuMCJOIDDCsDA4JzU4LjciVw!5e0!3m2!1sen!2sgh!4v1551140371797\" width=\"270\" height=\"220\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe> ', 'Two Story Building', '200 ', '2', '<p>we have one in a room, two in a room, three in a room and four in a room</p>', '1500', 1, '2019-02-20', '2019-02-21 06:29:42', 'g1.jpg'),
(4, '1', 'Asanka Hostel', 'Yellow Hostel', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9609885873433!2d-0.1518126851788587!3d5.5727863350298525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzQnMjIuMCJOIDDCsDA4JzU4LjciVw!5e0!3m2!1sen!2sgh!4v1551140371797\" width=\"270\" height=\"220\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Two Story Building', '200 ', '2', '<p>we have one in a room, two in a room, three in a room and four in a room</p>', '1500', 0, '2019-02-19', '2019-02-20 06:29:42', '1550730583622872053.png'),
(5, '1', 'Yellow Hostel', 'Green Hostel', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9609885873433!2d-0.1518126851788587!3d5.5727863350298525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzQnMjIuMCJOIDDCsDA4JzU4LjciVw!5e0!3m2!1sen!2sgh!4v1551140371797\" width=\"270\" height=\"220\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Two Story Building', '200 ', '2', '<p>we have one in a room, two in a room, three in a room and four in a room</p>', '1500', 0, '2019-02-19', '2019-02-19 06:29:42', '1550730583622872053.png'),
(6, '1', 'Yellow Hostel', 'Upsa Hostel', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9609885873433!2d-0.1518126851788587!3d5.5727863350298525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzQnMjIuMCJOIDDCsDA4JzU4LjciVw!5e0!3m2!1sen!2sgh!4v1551140371797\" width=\"270\" height=\"220\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Two Story Building', '200 ', '2', '<p>we have one in a room, two in a room, three in a room and four in a room</p>', '1500', 0, '2019-02-20', '2019-02-21 06:29:42', '1550730583622872053.png'),
(8, '1', 'Lamere Hostel', 'Ogua Hostel', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9609885873433!2d-0.1518126851788587!3d5.5727863350298525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzQnMjIuMCJOIDDCsDA4JzU4LjciVw!5e0!3m2!1sen!2sgh!4v1551140371797\" width=\"270\" height=\"220\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Two Story Building', '200 ', '2', '<p>we have one in a room, two in a room, three in a room and four in a room</p>', '1500', 1, '2019-02-18', '2019-02-21 06:29:42', 'img2.jpg'),
(9, '1', 'Rich Hostel', 'Asanka Opposite Yellow Hostel', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9609885873433!2d-0.1518126851788587!3d5.5727863350298525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzQnMjIuMCJOIDDCsDA4JzU4LjciVw!5e0!3m2!1sen!2sgh!4v1551140371797\" width=\"270\" height=\"220\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Two Story Building', '200 ', '2', '<p>we have one in a room, two in a room, three in a room and four in a room</p>', '1500', 1, '2019-02-20', '2019-02-21 06:29:42', 'img4.jpg'),
(10, '1', 'Kaisu Hostel', 'Asanka Opposite Yellow Hostel', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9609885873433!2d-0.1518126851788587!3d5.5727863350298525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzQnMjIuMCJOIDDCsDA4JzU4LjciVw!5e0!3m2!1sen!2sgh!4v1551140371797\" width=\"270\" height=\"220\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Two Story Building', '200 ', '2', '<p>we have one in a room, two in a room, three in a room and four in a room</p>', '1500', 1, '2019-02-16', '2019-02-21 06:29:42', 'hostel3.jpg'),
(11, '1', 'Obeng Hostel', 'Asanka Opposite Yellow Hostel', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9609885873433!2d-0.1518126851788587!3d5.5727863350298525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzQnMjIuMCJOIDDCsDA4JzU4LjciVw!5e0!3m2!1sen!2sgh!4v1551140371797\" width=\"270\" height=\"220\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'Two Story Building', '200 ', '2', '<p>we have one in a room, two in a room, three in a room and four in a room</p>', '1500', 1, '2019-02-20', '2019-02-21 06:29:42', 'g2.jpg'),
(13, '1', 'Bonnah Eric', 'Teshie', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.9609885873433!2d-0.1518126851788587!3d5.5727863350298525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNcKwMzQnMjIuMCJOIDDCsDA4JzU4LjciVw!5e0!3m2!1sen!2sgh!4v1551140371797\" width=\"270\" height=\"220\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe> ', 'Two Story Building', '300 ', '1', '', '1500', 0, '2019-02-25', '2019-02-26 06:54:01', '15511640421272549483.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `hostleid` varchar(40) NOT NULL,
  `Amonnt` varchar(40) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Unpaid',
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `userid`, `hostleid`, `Amonnt`, `dates`, `status`, `datetime`) VALUES
(1, '1', '1', '1500', '2019-02-22', 'Pay On Arrival', '2019-02-22 09:30:24'),
(2, '2', '1', '1500', '2019-02-24', 'Pay On Arrival', '2019-02-24 13:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `dates`) VALUES
(1, 'Ahmed Ahia', 'oguayahoo.com@yahoo.com', '$2y$10$dv0Sdsyr8HD/930tMbkng.hKXB43XtLM6ETyHnxLJP4fii0t0WnLK', '0272185090', 'Hostel', '2019-02-20 17:26:29'),
(2, 'Kofi Kwame', 'kofi@yahoo.com', '$2y$10$B1jFisfypTVBHSSesh0eJuH7SuG2hXnvmX.CJMH7FylWiaJ37e5a6', '0208129151', 'Customer', '2019-02-20 17:29:40'),
(3, 'Ogua Lamere', 'ogua@yahoo.com', '$2y$10$3JBOnBA33S5IouMrrcsEJu8jbpWGATKKnFYtEv8pK6uRRQAbiXmhK', '0272185090', 'Admin', '2019-02-21 09:16:39'),
(8, 'Kofi Kwame', 'ogua@yahoo.com', '$2y$10$3JBOnBA33S5IouMrrcsEJu8jbpWGATKKnFYtEv8pK6uRRQAbiXmhK', '0272185090', 'Admin', '2019-02-23 05:49:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apponitments`
--
ALTER TABLE `apponitments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
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
-- AUTO_INCREMENT for table `apponitments`
--
ALTER TABLE `apponitments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
