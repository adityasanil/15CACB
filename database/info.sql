-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2019 at 05:19 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `pan` varchar(20) NOT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `gst` varchar(20) DEFAULT NULL,
  `ifsc` varchar(20) DEFAULT NULL,
  `swift` varchar(20) DEFAULT NULL,
  `acoount_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`fname`, `lname`, `address`, `email`, `pan`, `contact`, `company`, `gst`, `ifsc`, `swift`, `acoount_no`) VALUES
('Jigar', 'Thakkar', '502, Rose Blossom,\r\nYogi Hills, Mulund West', 'jigar.kt@somaiya.edu', '841sadasda', '9819393237', 'asjbasicnjacjnajcnanclamc', '62adsd262929292', 'adas5d22262', '28928928928', '29829298289');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`pan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
