-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2020 at 08:03 PM
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
-- Table structure for table `roommatesearch`
--

CREATE TABLE `roommatesearch` (
  `id` int(11) NOT NULL,
  `moveindate` date NOT NULL,
  `pricerange` enum('upto 250','upto 500','upto 750','upto 1000') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roommatesearch`
--

INSERT INTO `roommatesearch` (`id`, `moveindate`, `pricerange`) VALUES
(1, '2020-08-01', 'upto 1000'),
(5, '2020-08-01', 'upto 500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roommatesearch`
--
ALTER TABLE `roommatesearch`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roommatesearch`
--
ALTER TABLE `roommatesearch`
  ADD CONSTRAINT `id_fk` FOREIGN KEY (`id`) REFERENCES `registrationform` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
