-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2023 at 12:54 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysql`
--

-- --------------------------------------------------------

--
-- Table structure for table `upgrades`
--

DROP TABLE IF EXISTS `upgrades`;
CREATE TABLE IF NOT EXISTS `upgrades` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `start` date NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(30) NOT NULL,
  `buildLocation` varchar(30) NOT NULL,
  `computer` varchar(30) NOT NULL,
  `windows` varchar(2) NOT NULL,
  `status` varchar(30) NOT NULL,
  `serial` varchar(20) NOT NULL,
  `asset` varchar(10) NOT NULL,
  `tech` varchar(2) NOT NULL,
  `qc` varchar(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `upgrades`
--

INSERT INTO `upgrades` (`ID`, `start`, `name`, `location`, `buildLocation`, `computer`, `windows`, `status`, `serial`, `asset`, `tech`, `qc`) VALUES
(1, '0000-00-00', 'a', 'BOS', 'RB', 'a', '10', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
