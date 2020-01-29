-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2020 at 09:04 AM
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
  `branch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `uname`, `pword`, `branch`) VALUES
(1, 'admin', 'admin', 7);

-- --------------------------------------------------------

--
-- Table structure for table `branch_tbl`
--

CREATE TABLE `branch_tbl` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_tbl`
--

INSERT INTO `branch_tbl` (`id`, `branch_name`) VALUES
(1, 'Abucay'),
(2, 'Diit'),
(3, 'San jose'),
(4, 'Utap'),
(5, 'V&G'),
(6, 'Sagkahan'),
(7, 'Tacloban City');

-- --------------------------------------------------------

--
-- Table structure for table `check_up_tbl`
--

CREATE TABLE `check_up_tbl` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `treatment` varchar(120) NOT NULL,
  `check_up_type` varchar(120) NOT NULL,
  `findings` varchar(120) NOT NULL,
  `dateCheckUp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patient_info_tbl`
--

CREATE TABLE `patient_info_tbl` (
  `id` int(11) NOT NULL,
  `referring_physician_or_nurse` varchar(120) NOT NULL,
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
  `dateRecorded` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_info_tbl`
--

INSERT INTO `patient_info_tbl` (`id`, `referring_physician_or_nurse`, `lname`, `fname`, `mname`, `gender`, `bday`, `age`, `address`, `marital_status`, `height`, `weight`, `mothers_name`, `fathers_name`, `bplace`, `branch_id`, `dateRecorded`) VALUES
(1, 'Error omnis aut exce', 'Thaddeus Herman', 'Kyra Mcmillan', 'Prescott Burton', 'In cumque in repelle', '1985-02-16', 60, 'Veniam porro adipis', 'In officia consequun', 'Quia sed eaque labor', 'Eius vitae quia volu', 'Et voluptatem dicta', 'Dolan Roth', 'Chanda Chandler', 7, '2020-01-29 07:46:47');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
