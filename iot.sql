-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 11:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iot`
--

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `chart_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `chart_moisture` int(11) NOT NULL,
  `chart_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`chart_id`, `device_id`, `chart_moisture`, `chart_date`) VALUES
(1, 3, 15, '2021-02-24 04:08:14'),
(2, 3, 4, '2021-02-24 04:08:14'),
(3, 3, 3, '2021-02-24 04:08:14'),
(4, 3, 2, '2021-02-24 04:08:14'),
(5, 3, 8, '2021-02-24 04:08:14'),
(6, 3, 1, '2021-02-24 04:08:14'),
(7, 3, 8, '2021-02-24 04:08:14'),
(8, 3, 8, '2021-02-24 04:08:14'),
(9, 3, 8, '2021-02-24 04:08:14'),
(10, 3, 4, '2021-02-24 04:08:14'),
(11, 3, 3, '2021-02-24 04:08:14'),
(12, 3, 2, '2021-02-24 04:08:14'),
(13, 3, 8, '2021-02-24 04:08:14'),
(14, 3, 1, '2021-02-24 04:08:14'),
(15, 3, 8, '2021-02-24 04:08:14'),
(16, 3, 8, '2021-02-24 04:08:14'),
(17, 3, 8, '2021-02-24 04:08:14'),
(18, 3, 4, '2021-02-24 04:08:14'),
(19, 3, 3, '2021-02-24 04:08:14'),
(20, 3, 2, '2021-02-24 04:08:14'),
(21, 3, 8, '2021-02-24 04:08:14'),
(22, 3, 15, '2021-02-24 04:08:14'),
(23, 3, 8, '2021-02-24 04:08:14'),
(24, 3, 8, '2021-02-24 04:08:14'),
(25, 3, 8, '2021-02-24 04:08:14'),
(26, 3, 4, '2021-02-24 04:08:14'),
(27, 3, 3, '2021-02-24 04:08:14'),
(28, 3, 2, '2021-02-24 04:08:14'),
(29, 3, 8, '2021-02-24 04:08:14'),
(30, 3, 1, '2021-02-24 04:08:14'),
(31, 3, 8, '2021-02-24 04:08:14'),
(32, 3, 8, '2021-02-24 04:08:14'),
(33, 2, 15, '2021-02-24 06:45:02'),
(34, 2, 8, '2021-02-24 06:46:03'),
(35, 2, 7, '2021-02-24 06:46:09'),
(36, 2, 6, '2021-02-24 06:46:10'),
(37, 2, 9, '2021-02-24 06:46:10'),
(38, 2, 2, '2021-02-24 06:46:11'),
(39, 2, 15, '2021-02-24 06:45:02'),
(40, 2, 8, '2021-02-24 06:46:03'),
(41, 2, 7, '2021-02-24 06:46:09'),
(42, 2, 6, '2021-02-24 06:46:10'),
(43, 2, 9, '2021-02-24 06:46:10'),
(44, 2, 2, '2021-02-24 06:46:11'),
(45, 2, 7, '2021-02-24 06:46:09'),
(46, 2, 6, '2021-02-24 06:46:10'),
(47, 2, 9, '2021-02-24 06:46:10'),
(48, 1, 2, '2021-02-24 06:46:11'),
(49, 1, 7, '2021-02-24 06:45:02'),
(50, 1, 6, '2021-02-24 06:46:11'),
(51, 1, 3, '2021-02-24 06:45:02'),
(52, 1, 2, '2021-02-24 06:46:11'),
(53, 1, 4, '2021-02-24 06:45:02'),
(54, 1, 10, '2021-02-24 06:46:11'),
(55, 1, 6, '2021-02-24 06:45:02'),
(56, 1, 9, '2021-02-24 06:48:41'),
(57, 3, 4, '2021-02-24 06:48:49'),
(58, 3, 4, '2021-02-24 06:54:11'),
(59, 3, 4, '2021-02-24 09:36:01'),
(60, 3, 4, '2021-02-24 09:36:04'),
(61, 1, 4, '2021-02-24 09:36:27'),
(62, 1, 4, '2021-02-24 09:36:40'),
(63, 1, 5, '2021-02-24 09:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` int(11) NOT NULL,
  `device_owner` int(11) NOT NULL,
  `data_moisture` int(11) DEFAULT NULL,
  `data_battery` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `device_owner`, `data_moisture`, `data_battery`, `date`) VALUES
(16, 1, 5, 15, '2021-02-24 03:45:27'),
(17, 2, 15, 80, '2021-02-24 03:51:20'),
(18, 3, 4, 20, '2021-02-24 03:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `device_serial` text COLLATE utf8_unicode_ci NOT NULL,
  `user_owner` int(11) DEFAULT NULL,
  `device_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_status` tinyint(4) NOT NULL DEFAULT 0,
  `serial_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`device_id`, `device_serial`, `user_owner`, `device_name`, `device_status`, `serial_status`) VALUES
(1, 'ET001', 78, 'หน้าบ้าน', 0, 0),
(2, 'ET002', 78, 'ข้างบ้าน', 1, 0),
(3, 'ET003', 78, 'หลังอาคาร', 1, 0),
(12, 'ET004', NULL, NULL, 0, 1),
(22, 'ET005', NULL, NULL, 0, 0),
(23, 'ET006', NULL, NULL, 0, 0),
(24, 'ET007', NULL, NULL, 0, 0),
(25, 'ET008', NULL, NULL, 0, 0),
(26, 'ET009', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `user_status` enum('admin','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `user_allow` tinyint(4) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `user_status`, `user_allow`, `date`) VALUES
(78, 'admin', '$2y$10$Y..yChw8L7m/4PaaZrQ2deBqEs.si731GrjjPvRcW5W0LIa0Q3a3W', '1234', 'user', 1, '2021-02-24 05:42:58'),
(79, 'earth', '$2y$10$TiHKhnaI368Sjbg10s66vOn3NVzi7GtlQwQvOk.exh551PWT4w8dS', '1234', 'admin', 1, '2021-02-24 05:42:58'),
(83, 'earthza', '$2y$10$AFUF71cmGu50UJRlD1XdIOeOkbLJNLGbyxPPU1ECI/owqAWMXDuiS', 'earth', 'user', 1, '2021-02-24 05:42:58'),
(84, 'earthzap', '$2y$10$e3pzcEcQTdo3MIIjnQt82uCxZ7lC8YKEBNaMCSE8UHEMKrz9yUqp.', 'eadsd', 'user', 0, '2021-02-24 05:55:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`chart_id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `device` (`device_owner`);

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `chart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `device`
--
ALTER TABLE `device`
  MODIFY `device_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chart`
--
ALTER TABLE `chart`
  ADD CONSTRAINT `device_id` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `device` FOREIGN KEY (`device_owner`) REFERENCES `device` (`device_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
