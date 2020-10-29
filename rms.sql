-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 29, 2020 at 02:06 AM
-- Server version: 5.7.31
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

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

DROP TABLE IF EXISTS `admin_accounts`;
CREATE TABLE IF NOT EXISTS `admin_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(120) NOT NULL,
  `pword` varchar(120) NOT NULL,
  `branch` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `dateRegistered` date NOT NULL,
  `status` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `uname`, `pword`, `branch`, `addedBy`, `dateRegistered`, `status`, `active`) VALUES
(1, 'admin', 'admin', 7, 1, '0000-00-00', 1, 1),
(2, 'sample', 'sample', 1, 1, '2020-02-17', 0, 0),
(3, 'qwert', 'qwert', 3, 1, '2020-02-17', 0, 0),
(4, 'tyu', 'tyu', 5, 1, '2020-02-17', 0, 0),
(5, 'qwe', 'qwe', 6, 1, '2020-02-17', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch_tbl`
--

DROP TABLE IF EXISTS `branch_tbl`;
CREATE TABLE IF NOT EXISTS `branch_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(120) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `referringPhysicianOrNurse` int(11) NOT NULL,
  `treatment` varchar(120) NOT NULL,
  `check_up_type` varchar(120) NOT NULL,
  `findings` varchar(120) NOT NULL,
  `dateCheckUp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_info_tbl`
--

DROP TABLE IF EXISTS `patient_info_tbl`;
CREATE TABLE IF NOT EXISTS `patient_info_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(120) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `mname` varchar(120) NOT NULL,
  `gender` varchar(120) NOT NULL,
  `bday` date NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(120) NOT NULL,
  `marital_status` varchar(120) NOT NULL,
  `height` varchar(120) NOT NULL,
  `weight` varchar(120) NOT NULL,
  `mothers_name` varchar(120) NOT NULL,
  `fathers_name` varchar(120) NOT NULL,
  `bplace` varchar(120) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `dateRecorded` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_info_tbl`
--

INSERT INTO `patient_info_tbl` (`id`, `lname`, `fname`, `mname`, `gender`, `bday`, `age`, `address`, `marital_status`, `height`, `weight`, `mothers_name`, `fathers_name`, `bplace`, `branch_id`, `dateRecorded`, `status`) VALUES
(2, 'Sample', 'Sample', 'C.', 'Animi rerum culpa f', '2019-09-14', 8, 'Hic animi enim iste', 'Distinctio Est est', 'Culpa quia saepe od', 'Ex quibusdam est nih', 'Consequuntur unde la', 'Fredericka Gross', 'Marvin Knox', 7, '2020-02-03', 1),
(3, 'Solomon Navarro', 'Otto Rose', 'Astra Shields', 'Dolor consequatur c', '1981-00-05', 96, 'Maxime mollit evenie', 'Suscipit numquam min', 'Officiis cum ut unde', 'Ullamco illum fugit', 'Aut sint nesciunt u', 'Hakeem Jimenez', 'Cassandra Navarro', 7, '2020-02-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `physicianornurse_tbl`
--

DROP TABLE IF EXISTS `physicianornurse_tbl`;
CREATE TABLE IF NOT EXISTS `physicianornurse_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(120) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `mname` varchar(120) NOT NULL,
  `title` varchar(120) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physicianornurse_tbl`
--

INSERT INTO `physicianornurse_tbl` (`id`, `lname`, `fname`, `mname`, `title`, `status`) VALUES
(1, 'sample', 'sample', 'sample', 'sample', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
