-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Feb 25, 2023 at 03:14 PM
-- Server version: 8.0.32
-- PHP Version: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PHP_APSL`
--

-- --------------------------------------------------------

--
-- Table structure for table `_User`
--

CREATE TABLE `_User` (
  `_email` varchar(50) NOT NULL,
  `_password` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `_User`
--

INSERT INTO `_User` (`_email`, `_password`) VALUES
('amy@example.com', 'c20ad4d76fe97759aa27a0c99bff6710'),
('brad@example.com', 'e10adc3949ba59abbe56e057f20f883e'),
('chris@example.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
('jane@example.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
('jessica@example.com', 'e99a18c428cb38d5f260853678922e03'),
('john@example.com', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
('lisa@example.com', '8e6d3c6bfda3f9aebf8ea1d3163beebb'),
('michael@example.com', 'd1d1c9b7f0ecf75714e7d5d77124c2b3'),
('peter@example.com', '6d7fce9fee471194aa8b5b6e47267f03'),
('susan@example.com', '8e6d3c6bfda3f9aebf8ea1d3163beebb');

-- --------------------------------------------------------

--
-- Table structure for table `_UserHash`
--

CREATE TABLE `_UserHash` (
  `_email` varchar(50) NOT NULL,
  `_hash` char(32) NOT NULL,
  `_createdTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_User`
--
ALTER TABLE `_User`
  ADD PRIMARY KEY (`_email`);

--
-- Indexes for table `_UserHash`
--
ALTER TABLE `_UserHash`
  ADD KEY `_email` (`_email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `_UserHash`
--
ALTER TABLE `_UserHash`
  ADD CONSTRAINT `_UserHash_ibfk_1` FOREIGN KEY (`_email`) REFERENCES `_User` (`_email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
