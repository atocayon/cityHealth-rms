-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2020 at 02:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `uname` varchar(120) NOT NULL,
  `pword` varchar(120) NOT NULL,
  `branch` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `dateRegistered` date NOT NULL,
  `status` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `uname`, `pword`, `branch`, `addedBy`, `dateRegistered`, `status`, `active`) VALUES
(1, 'admin', 'admin', 7, 1, '0000-00-00', 1, 0),
(2, 'sample', 'sample', 1, 1, '2020-02-17', 0, 0),
(3, 'qwert', 'qwert', 3, 1, '2020-02-17', 0, 0),
(4, 'tyu', 'tyu', 5, 1, '2020-02-17', 0, 0),
(5, 'qwe', 'qwe', 6, 1, '2020-02-17', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch_tbl`
--

CREATE TABLE `branch_tbl` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(120) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `check_up_tbl` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `referringPhysicianOrNurse` int(11) NOT NULL,
  `treatment` varchar(120) NOT NULL,
  `check_up_type` varchar(120) NOT NULL,
  `findings` varchar(120) NOT NULL,
  `dateCheckUp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_info_tbl`
--

CREATE TABLE `patient_info_tbl` (
  `id` int(11) NOT NULL,
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
  `dateRecorded` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_info_tbl`
--

INSERT INTO `patient_info_tbl` (`id`, `lname`, `fname`, `mname`, `gender`, `bday`, `age`, `address`, `marital_status`, `height`, `weight`, `mothers_name`, `fathers_name`, `bplace`, `branch_id`, `dateRecorded`, `status`) VALUES
(2, 'Sample', 'Sample', 'C.', 'Animi rerum culpa f', '2019-09-14', 8, 'Hic animi enim iste', 'Distinctio Est est', 'Culpa quia saepe od', 'Ex quibusdam est nih', 'Consequuntur unde la', 'Fredericka Gross', 'Marvin Knox', 7, '2020-02-03', 1),
(3, 'Solomon Navarro', 'Otto Rose', 'Astra Shields', 'Dolor consequatur c', '1981-00-05', 96, 'Maxime mollit evenie', 'Suscipit numquam min', 'Officiis cum ut unde', 'Ullamco illum fugit', 'Aut sint nesciunt u', 'Hakeem Jimenez', 'Cassandra Navarro', 7, '2020-02-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `physicianOrNurse_tbl`
--

CREATE TABLE `physicianOrNurse_tbl` (
  `id` int(11) NOT NULL,
  `lname` varchar(120) NOT NULL,
  `fname` varchar(120) NOT NULL,
  `mname` varchar(120) NOT NULL,
  `title` varchar(120) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `physicianOrNurse_tbl`
--

INSERT INTO `physicianOrNurse_tbl` (`id`, `lname`, `fname`, `mname`, `title`, `status`) VALUES
(1, 'sample', 'sample', 'sample', 'sample', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_up_tbl`
--
ALTER TABLE `check_up_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_info_tbl`
--
ALTER TABLE `patient_info_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physicianOrNurse_tbl`
--
ALTER TABLE `physicianOrNurse_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `branch_tbl`
--
ALTER TABLE `branch_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `check_up_tbl`
--
ALTER TABLE `check_up_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_info_tbl`
--
ALTER TABLE `patient_info_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `physicianOrNurse_tbl`
--
ALTER TABLE `physicianOrNurse_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
