-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2020 at 05:26 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
--
CREATE DATABASE IF NOT EXISTS `rms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `rms`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `title` varchar(120) NOT NULL,
  `uname` varchar(120) NOT NULL,
  `pword` varchar(120) NOT NULL,
  `branch` int NOT NULL,
  `addedBy` int NOT NULL,
  `dateRegistered` date NOT NULL,
  `status` int NOT NULL,
  `active` int NOT NULL DEFAULT '0',
  `img` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `admin_accounts`
--

TRUNCATE TABLE `admin_accounts`;
--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `name`, `title`, `uname`, `pword`, `branch`, `addedBy`, `dateRegistered`, `status`, `active`, `img`) VALUES
(1, 'sample', 'doctor', 'admin', 'admin', 7, 1, '0000-00-00', 1, 1, 'default.png'),
(2, '', '', 'sample', 'sample', 1, 1, '2020-02-17', 0, 0, 'default.png'),
(3, '', '', 'qwert', 'qwert', 3, 1, '2020-02-17', 0, 0, 'default.png'),
(4, '', '', 'tyu', 'tyu', 5, 1, '2020-02-17', 0, 0, 'default.png'),
(5, '', '', 'qwe', 'qwe', 6, 1, '2020-02-17', 0, 0, 'default.png'),
(6, '', '', '', '', 0, 0, '2020-11-30', 1, 0, 'default.png'),
(7, 'Hashim Phillips', 'Quae reprehenderit t', 'Kimberly Perkins', 'Pa$$w0rd!', 2, 1, '2020-11-30', 1, 0, 'default.png'),
(8, 'Louis Carson', 'Velit cupidatat obc', 'Keith Walton', 'Pa$$w0rd!', 7, 1, '2020-11-30', 1, 0, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `branch_tbl`
--

DROP TABLE IF EXISTS `branch_tbl`;
CREATE TABLE IF NOT EXISTS `branch_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(120) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `branch_tbl`
--

TRUNCATE TABLE `branch_tbl`;
--
-- Dumping data for table `branch_tbl`
--

INSERT INTO `branch_tbl` (`id`, `branch_name`, `status`) VALUES
(1, 'Abucay', 1),
(2, 'Diit', 1),
(3, 'San jose', 1),
(4, 'Utap', 1),
(5, 'V&G', 1),
(6, 'Sagkahan', 1),
(7, 'Tacloban City', 1);

-- --------------------------------------------------------

--
-- Table structure for table `check_up_tbl`
--

DROP TABLE IF EXISTS `check_up_tbl`;
CREATE TABLE IF NOT EXISTS `check_up_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `patient_id` int NOT NULL,
  `referringPhysicianOrNurse` int NOT NULL,
  `treatment` varchar(120) NOT NULL,
  `check_up_type` varchar(120) NOT NULL,
  `findings` varchar(120) NOT NULL,
  `dateCheckUp` datetime NOT NULL,
  `attachment` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `check_up_tbl`
--

TRUNCATE TABLE `check_up_tbl`;
--
-- Dumping data for table `check_up_tbl`
--

INSERT INTO `check_up_tbl` (`id`, `patient_id`, `referringPhysicianOrNurse`, `treatment`, `check_up_type`, `findings`, `dateCheckUp`, `attachment`) VALUES
(1, 4, 1, 'Laudantium itaque e', 'ADULT', 'Yael Blackburn', '2020-10-29 06:30:01', NULL),
(2, 4, 1, 'Esse laudantium si', 'CHILD', 'Abbot Mathis', '2020-10-29 06:30:14', NULL),
(3, 4, 1, 'Aliquam pariatur Vo', 'CHILD', 'Halee Villarreal', '2020-10-29 06:32:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_info_tbl`
--

DROP TABLE IF EXISTS `patient_info_tbl`;
CREATE TABLE IF NOT EXISTS `patient_info_tbl` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lname` varchar(120) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `mname` varchar(120) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `bday` date NOT NULL,
  `age` int NOT NULL,
  `address` varchar(120) NOT NULL,
  `marital_status` varchar(120) NOT NULL,
  `height` varchar(120) NOT NULL,
  `weight` varchar(120) NOT NULL,
  `mothers_name` varchar(120) NOT NULL,
  `fathers_name` varchar(120) NOT NULL,
  `bplace` varchar(120) NOT NULL,
  `branch_id` int NOT NULL,
  `dateRecorded` date NOT NULL,
  `status` int NOT NULL,
  `img` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Truncate table before insert `patient_info_tbl`
--

TRUNCATE TABLE `patient_info_tbl`;
--
-- Dumping data for table `patient_info_tbl`
--

INSERT INTO `patient_info_tbl` (`id`, `lname`, `fname`, `mname`, `gender`, `bday`, `age`, `address`, `marital_status`, `height`, `weight`, `mothers_name`, `fathers_name`, `bplace`, `branch_id`, `dateRecorded`, `status`, `img`) VALUES
(2, 'Sample', 'Sample', 'C.', 'Animi rerum culpa f', '2019-09-14', 8, 'Hic animi enim iste', 'Distinctio Est est', 'Culpa quia saepe od', 'Ex quibusdam est nih', 'Consequuntur unde la', 'Fredericka Gross', 'Marvin Knox', 7, '2020-02-03', 1, 'default.jpg'),
(3, 'Solomon Navarro', 'Otto Rose', 'Astra Shields', 'Dolor consequatur c', '1981-00-05', 96, 'Maxime mollit evenie', 'Suscipit numquam min', 'Officiis cum ut unde', 'Ullamco illum fugit', 'Aut sint nesciunt u', 'Hakeem Jimenez', 'Cassandra Navarro', 7, '2020-02-19', 1, 'default.jpg'),
(4, 'Irene Donaldson', 'Blair Byers', 'Aquila Bolton', 'female', '2012-01-22', 75, 'Inventore fugit ea ', 'Animi dolor volupta', 'Perspiciatis quaera', 'Et repudiandae aliqu', 'Zorita Neal', 'Abbot Doyle', 'Commodo qui omnis om', 7, '2020-10-29', 1, 'default.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
