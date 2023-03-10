-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 08:24 PM
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
-- Database: `pharmacy_mngmnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `bilids_t`
--

CREATE TABLE `bilids_t` (
  `id` int(11) NOT NULL,
  `BillId` varchar(255) NOT NULL,
  `DateandTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bilids_t`
--

INSERT INTO `bilids_t` (`id`, `BillId`, `DateandTime`) VALUES
(1, '1', '2019-03-13 16:30:41'),
(2, '2', '2019-03-13 16:59:11'),
(3, '3', '2019-03-15 17:27:00'),
(4, '4', '2019-03-16 19:17:26'),
(5, '5', '2019-03-16 19:18:51'),
(6, '6', '2019-03-16 19:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `bill_t`
--

CREATE TABLE `bill_t` (
  `id` int(11) NOT NULL,
  `pharmacist` varchar(50) NOT NULL,
  `BillId` varchar(50) NOT NULL,
  `total` varchar(255) NOT NULL,
  `dates` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_t`
--

INSERT INTO `bill_t` (`id`, `pharmacist`, `BillId`, `total`, `dates`, `datetime`) VALUES
(1, 'Ogua Ahmed', '1', '4.56', '2019-03-13', '2019-03-13 16:30:41'),
(2, 'Ogua Ahmed', '2', '33.64', '2019-03-13', '2019-03-13 16:59:11'),
(3, 'Ogua Ahmed', '3', '7.609999999999999', '2019-03-15', '2019-03-15 17:27:00'),
(4, 'Ogua Ahmed', '4', '10.989999999999998', '2019-03-16', '2019-03-16 19:17:25'),
(5, 'Ogua Ahmed', '5', '0.58', '2019-03-16', '2019-03-16 19:18:51'),
(6, 'Ogua Ahmed', '6', '0.08', '2019-03-16', '2019-03-16 19:20:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `ManufacDate` varchar(40) NOT NULL,
  `ExpirinDate` varchar(40) NOT NULL,
  `dosage` varchar(50) NOT NULL,
  `unitpx` varchar(50) NOT NULL,
  `price` varchar(40) NOT NULL,
  `Quantity` varchar(50) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `ManufacDate`, `ExpirinDate`, `dosage`, `unitpx`, `price`, `Quantity`, `dates`, `datetime`) VALUES
(1, 'Paracetamol Suppository1', '2019-03-15', '2021-03-15', '125 mg ', 'Supp ', '0.40', '272', '2019-03-13', '2019-03-13 11:51:14'),
(2, 'Paracetamol Suppository2', '2019-03-15', '2017-03-15', '250 mg ', 'Supp ', '0.49', '297', '2019-03-13', '2019-03-13 11:52:16'),
(3, 'Paracetamol Suppository3', '2019-03-15', '2021-03-15', '500 mg ', 'Supp ', '0.58', '159', '2019-03-13', '2019-03-13 11:52:54'),
(4, 'Paracetamol Syrup', '2019-03-15', '2025-03-15', '120 mg/5 mL ', '125 mL ', '3.36', '298', '2019-03-13', '2019-03-13 11:53:59'),
(5, 'Zinc Tablet1', '2019-03-15', '2019-10-15', '10 mg ', 'Tablet', '0.04', '250', '2019-03-13', '2019-03-13 11:55:09'),
(6, 'Zinc Tablet	', '2019-03-15', '2024-06-15', ' 20 mg ', 'Tablet', '0.06', '3000', '2019-03-13', '2019-03-13 11:55:43'),
(7, 'Amino Acid Solution Injection', '2019-03-15', '2019-07-15', '10%', '200 mL ', '17.33', '300', '2019-03-14', '2019-03-14 13:03:41'),
(8, 'Amoxicillin Capsule', '2019-03-15', '2019-04-15', '250 mg ', 'Capsule', '0.08', '699', '2019-03-14', '2019-03-14 13:04:38'),
(9, 'Ampicillin Injection', '2019-03-15', '2019-06-15', '500 mg ', 'vial', '0.70', '350', '2019-03-14', '2019-03-14 13:05:30'),
(10, 'Atenolol Tablet', '2019-03-15', '2020-03-15', '25 mg', 'Tablet', '0.09', '400', '2019-03-14', '2019-03-14 13:06:36'),
(11, 'Chlorhexidine Solution', '2019-03-15', '2021-03-15', '2.5%', '100 ml', '3.50', '200', '2019-03-14', '2019-03-14 13:08:24'),
(12, 'Cloxacillin Injection', '2019-03-15', '2019-12-01', '500 mg ', 'vial', '1.75', '320', '2019-03-14', '2019-03-14 13:09:17'),
(13, 'Codeine Tablet', '2019-03-15', '2020-03-15', '30 mg ', 'Tablet', '0.35', '400', '2019-03-14', '2019-03-14 13:10:09'),
(14, 'Fluticasone MDI', '2019-03-15', '2018-03-15', '125 microgram (120 Dose) ', 'Inhaler', '38.46', '500', '2019-03-14', '2019-03-14 13:12:07');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int(11) NOT NULL,
  `Productid` varchar(50) NOT NULL,
  `BillId` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Quantity` varchar(40) NOT NULL,
  `Total` varchar(40) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `Productid`, `BillId`, `name`, `Price`, `Quantity`, `Total`, `dates`, `datetime`) VALUES
(2, '1', '1', 'Paracetamol Suppository1', '0.40', '3', '1.2', '2019-03-13', '2019-03-13 15:30:17'),
(5, '4', '1', 'Paracetamol Syrup', '3.36', '1', '3.36', '2019-03-13', '2019-03-13 16:11:02'),
(6, '5', '2', 'Zinc Tablet', '0.04', '1', '0.04', '2019-03-13', '2019-03-13 16:54:01'),
(7, '4', '2', 'Paracetamol Syrup', '3.36', '10', '33.6', '2019-03-13', '2019-03-13 16:59:09'),
(11, '1', '3', 'Paracetamol Suppository1', '0.40', '1', '0.4', '2019-03-13', '2019-03-13 19:19:34'),
(12, '2', '3', 'Paracetamol Suppository2', '0.49', '1', '0.49', '2019-03-13', '2019-03-13 19:19:53'),
(13, '4', '3', 'Paracetamol Syrup', '3.36', '2', '6.72', '2019-03-15', '2019-03-15 17:26:38'),
(19, '2', '4', 'Paracetamol Suppository2', '0.49', '1', '0.49', '2019-03-16', '2019-03-16 19:14:51'),
(20, '2', '4', 'Paracetamol Suppository2', '0.49', '1', '0.49', '2019-03-16', '2019-03-16 19:14:59'),
(21, '2', '4', 'Paracetamol Suppository2', '0.49', '1', '0.49', '2019-03-16', '2019-03-16 19:15:04'),
(22, '4', '4', 'Paracetamol Syrup', '3.36', '1', '3.36', '2019-03-16', '2019-03-16 19:15:38'),
(23, '4', '4', 'Paracetamol Syrup', '3.36', '1', '3.36', '2019-03-16', '2019-03-16 19:16:15'),
(24, '1', '4', 'Paracetamol Suppository1', '0.40', '7', '2.8', '2019-03-16', '2019-03-16 19:17:09'),
(25, '3', '5', 'Paracetamol Suppository3', '0.58', '1', '0.58', '2019-03-16', '2019-03-16 19:18:48'),
(26, '8', '6', 'Amoxicillin Capsule', '0.08', '1', '0.08', '2019-03-16', '2019-03-16 19:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `role` varchar(40) NOT NULL,
  `dates` varchar(40) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `role`, `dates`, `datetime`) VALUES
(1, 'Ogua Ahmed', 'admin@admin.com', '$2y$10$vnFqknKkVlnQIpXe9XWa4OsRB4np75WDdAx6cfETd/YqtBvNmtKqq', '0272185090', 'PHARMACIST', '2019-03-13', '2019-03-13 12:26:47'),
(2, 'admin', 'admin@admin.com', '$2y$10$vnFqknKkVlnQIpXe9XWa4OsRB4np75WDdAx6cfETd/YqtBvNmtKqq', '0272185090', 'ADMIN', '2019-03-13', '2019-03-13 12:27:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bilids_t`
--
ALTER TABLE `bilids_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_t`
--
ALTER TABLE `bill_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
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
-- AUTO_INCREMENT for table `bilids_t`
--
ALTER TABLE `bilids_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bill_t`
--
ALTER TABLE `bill_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
