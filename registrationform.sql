-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2020 at 10:07 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Student_Activity_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `registrationform`
--

CREATE TABLE `registrationform` (
  `id` int(100) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `Address` varchar(150) NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Zipcode` decimal(10,0) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Phonenumber` decimal(10,0) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `confirm_Password` varchar(20) NOT NULL,
  `votedfor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrationform`
--

INSERT INTO `registrationform` (`id`, `Firstname`, `Lastname`, `gender`, `Address`, `City`, `State`, `Zipcode`, `EmailID`, `Department`, `Phonenumber`, `Username`, `Password`, `confirm_Password`, `votedfor`) VALUES
(1, 'Satish', 'Padaganur', 'Male', '12370 Alameda Trace Circle', 'Dallas', 'Texas', '12345', 'satish.pdonur@gmail.com', 'Data science', '1234567890', 'satish_p', 'Pass1234', 'Pass1234', NULL),
(2, 'Mark', 'Zuk', 'Male', '123 Facebook Road', 'SFO', 'California', '12345', 'john@xyz.com', 'Computer Science', '1212121212', 'john_z', 'Pass1234', 'Pass1234', NULL),
(3, 'Bill', 'Gates', 'Male', '12345 MS road', 'Seattle', 'Washington', '11111', 'bill@xyz.com', 'Computer Science', '1111122222', 'bill_g', 'Pass1234', 'Pass1234', 1),
(4, 'Barak', 'Obama', 'Male', '11111 Whitehouse Road', 'WashingtonDC', 'WashingtonDC', '11111', 'barak_obama@xyz.com', 'Computer Science', '1111111111', 'barak_o', 'Barak123', 'Pass1234', NULL),
(5, 'Kai', 'Qi', 'Male', '12121 University Blvd', 'Austin', 'Texas', '78701', 'kai.qi@xyz.com', 'Computer Science', '1234123456', 'kai_q', 'Pass1234', 'Pass1234', 1),
(6, 'Shubhangi', 'Mahajan', 'Female', '12345 BobCat Lane', 'San Marcos', 'Texas', '77777', 'shubhangi.m@xyz.com', 'Data science', '1234561234', 'shubhangi_m', 'Pass1234', 'Pass1234', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrationform`
--
ALTER TABLE `registrationform`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EmailAddress` (`EmailID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrationform`
--
ALTER TABLE `registrationform`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
