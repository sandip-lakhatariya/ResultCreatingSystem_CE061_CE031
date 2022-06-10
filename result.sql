-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 10:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `PPS` int(11) NOT NULL,
  `PPS_GRADE` varchar(5) NOT NULL,
  `MATHS` int(11) NOT NULL,
  `MATHS_GRADE` varchar(5) NOT NULL,
  `PHYSICS` int(11) NOT NULL,
  `PHYSICS_GRADE` varchar(5) NOT NULL,
  `HW` int(11) NOT NULL,
  `HW_GRADE` varchar(5) NOT NULL,
  `ENGLISH` int(11) NOT NULL,
  `ENGLISH_GRADE` varchar(5) NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `PERCENTAGE` int(11) NOT NULL,
  `GRADE` varchar(5) NOT NULL,
  `UserId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`PPS`, `PPS_GRADE`, `MATHS`, `MATHS_GRADE`, `PHYSICS`, `PHYSICS_GRADE`, `HW`, `HW_GRADE`, `ENGLISH`, `ENGLISH_GRADE`, `TOTAL`, `PERCENTAGE`, `GRADE`, `UserId`) VALUES
(92, 'AA', 95, 'AA', 81, 'AB', 91, 'AA', 75, 'BB', 434, 86, 'AB', 1001),
(85, 'AB', 96, 'AA', 95, 'AA', 80, 'BB', 78, 'BB', 434, 86, 'AB', 1002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD KEY `UserId` (`UserId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user_info` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
