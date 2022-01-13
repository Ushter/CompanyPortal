-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2021 at 02:57 PM
-- Server version: 10.2.40-MariaDB-log
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jansarip_phase`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

CREATE TABLE `assigned` (
  `p_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL,
  `d_location` int(11) NOT NULL,
  `d_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dependent`
--

CREATE TABLE `dependent` (
  `dep_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `relation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `b_date` date NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dependent`
--

INSERT INTO `dependent` (`dep_id`, `emp_id`, `relation`, `f_name`, `l_name`, `b_date`, `email`) VALUES
(1, 2, 'Friend', 'Prachi', 'Jansari', '1995-11-15', 'jan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `address` varchar(25) NOT NULL,
  `zip` varchar(8) NOT NULL,
  `b_date` date NOT NULL,
  `email` varchar(25) NOT NULL,
  `department` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `f_name`, `l_name`, `pass`, `address`, `zip`, `b_date`, `email`, `department`) VALUES
(1, 'Jacob     ', 'Boss     ', 'jacob123', '1121 oldcastle ave  ', 'N9g 310 ', '1992-12-03', 'jacob123@gmail.com', 'Computer Science BSC'),
(2, 'Meer', 'Ushter', 'hhh', '4221', 'N9G3B1', '2021-12-01', 'ushter@uwindsor.ca', 'Science'),
(4, 'Prachi', 'Jansari', 'phase3', '10931 Brentwood Crescent', 'N8R2H8', '1995-11-18', 'jansariprachi@gmail.com', ''),
(5, 'Alibaba', 'chor', 'chor1', '133 bat drive', 'n8r2h8', '1966-10-01', 'chor1@gmail.com', ''),
(6, 'Dazel', 'Jiva', 'jiva1', '122 mori rd', 'n9h3h9', '1975-11-01', 'jiva@gmail.com', ''),
(7, 'peter', 'jansari', 'abc', '999 hi drive', 'n9j3j9', '1997-01-03', 'jan@gmail.com', ''),
(8, 'Rachel', 'Ji', 'ji123', '100 Round crescent', 'n0h4j9', '1991-01-01', 'ji@gmail.com', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(7) NOT NULL,
  `project_name` varchar(250) NOT NULL,
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `project_name`, `start_date`) VALUES
(2, 'Quality Check on Remak Website', '2021-11-29'),
(4, 'Ravine Production Release', '2021-12-07'),
(5, 'Ravine Production Release', '2021-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `emp_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `bonus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`emp_id`, `salary`, `bonus`) VALUES
(1, 63000, 630000),
(2, 30000, 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD PRIMARY KEY (`p_id`,`emp_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `dependent`
--
ALTER TABLE `dependent`
  ADD PRIMARY KEY (`dep_id`,`emp_id`),
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dependent`
--
ALTER TABLE `dependent`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned`
--
ALTER TABLE `assigned`
  ADD CONSTRAINT `assigned_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`),
  ADD CONSTRAINT `assigned_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `project` (`p_id`);

--
-- Constraints for table `dependent`
--
ALTER TABLE `dependent`
  ADD CONSTRAINT `dependent_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
