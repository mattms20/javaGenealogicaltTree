-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 06:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theaterweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `seat` int(11) NOT NULL,
  `showid` int(11) DEFAULT NULL,
  `bookdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `username`, `seat`, `showid`, `bookdate`) VALUES
(56, 'bruno1', 1, 6, '2022-01-13'),
(77, 'bruno1', 1, 6, '2022-01-12'),
(80, 'kurkor', 1, 13, '2022-01-27'),
(89, 'stel', 1, 6, '2022-01-20'),
(94, 'bruno1', 1, 6, '2022-01-07'),
(111, 'bruno1', 1, 6, '2022-01-21'),
(112, 'bruno1', 2, 6, '2022-01-21'),
(113, 'bruno1', 3, 6, '2022-01-21'),
(130, 'bruno1', 2, 6, '2022-01-13'),
(131, 'bruno1', 3, 6, '2022-01-13'),
(132, 'bruno1', 4, 6, '2022-01-13'),
(133, 'bruno1', 5, 6, '2022-01-13'),
(136, 'kurkor', 4, 6, '2022-01-20'),
(140, 'bruno1', 4, 6, '2022-01-23'),
(141, 'bruno1', 1, 6, '2022-01-23'),
(142, 'bruno1', 2, 6, '2022-01-23'),
(146, 'matt123', 1, 15, '2022-01-17'),
(148, 'matt123', 2, 15, '2022-01-17'),
(152, 'kurkor', 3, 13, '2022-01-13'),
(153, 'matt123', 1, 6, '2022-01-06'),
(154, 'matt123', 2, 6, '2022-01-06'),
(155, 'matt123', 3, 6, '2022-01-06'),
(156, 'smakis3', 1, 16, '2022-02-20'),
(157, 'smakis3', 2, 16, '2022-02-20'),
(158, 'smakis3', 3, 16, '2022-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`seats`) VALUES
(20);

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `showid` int(11) NOT NULL,
  `showtime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`showid`, `showtime`) VALUES
(6, '15:00:00'),
(13, '04:00:00'),
(15, '17:00:00'),
(16, '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userpassword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `userpassword`, `surname`, `email`, `type`) VALUES
('billy123', 'billyspassword', 'Bill Gates', 'billgates@apple.com', 1),
('bruno1', 'bruno1', 'Bruno', 'bruno@skulakis.com', 1),
('kurkor', 'kurkor', 'Kurkor', 'kurkor@kurkor.gr', 1),
('matt123', 'markopoulos', 'Matt Markopoulos', 'matt@email.com', 1),
('smakis3', 'smakoulis', 'Smakis Skylakis', 'smakis@smakoulas.gr', 1),
('stel', 'stel', 'stel', 'stel@stel.gr', 1),
('user1', 'pass1', 'surname1', '', 2),
('user2', 'pass2', 'surname2', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`seats`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`showid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `showid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
