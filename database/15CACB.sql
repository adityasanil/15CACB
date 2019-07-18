-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 18, 2019 at 01:24 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `15CACB`
--

-- --------------------------------------------------------

--
-- Table structure for table `documentStore`
--

CREATE TABLE `documentStore` (
  `serialNumber` int(11) NOT NULL,
  `id` varchar(25) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `dateRegistered` varchar(35) NOT NULL,
  `identity` varchar(7) NOT NULL,
  `remarks` text,
  `partyName` varchar(15) NOT NULL,
  `ackNumber` varchar(30) NOT NULL,
  `trackingNumber` varchar(50) NOT NULL,
  `uidNumber` varchar(30) NOT NULL,
  `clientUploadedDoc` varchar(100) NOT NULL,
  `adminUploadedDoc` varchar(200) DEFAULT NULL,
  `taskStatus` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `process` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentStore`
--

INSERT INTO `documentStore` (`serialNumber`, `id`, `firstName`, `lastName`, `userName`, `dateRegistered`, `identity`, `remarks`, `partyName`, `ackNumber`, `trackingNumber`, `uidNumber`, `clientUploadedDoc`, `adminUploadedDoc`, `taskStatus`, `contact`, `process`) VALUES
(14, '55015d28369b9a465', 'Aditya', 'Sanil', 'aditya.sanil', 'Thu, 18th Jul 2019 17:04', 'client', 'None', 'Vaibhav', '', '19518318105', '', '../../uploads/19518318105.docx', '', '../../images/pending.svg', '8169848105', 'Pending'),
(13, '55015d28369b9a465', 'Aditya', 'Sanil', 'aditya.sanil', 'Thu, 18th Jul 2019 16:32', 'client', 'None', 'Vaibhav', '123456789', '19758578105', '0987654321', '../../uploads/19758578105.docx', '<a href=\'../../uploadsAdmin/15CA123456789.docx\' download><i class=\'fas fa-download fa-lg\'></i></a>', '../../images/approved.svg', '8169848105', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` varchar(20) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `identity` varchar(7) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `firstName`, `lastName`, `userName`, `password`, `identity`, `email`, `contact`) VALUES
('55015d28369b9a465', 'Aditya', 'Sanil', 'aditya.sanil', '$2y$10$KqY6v7dqtROz4PA9yyWdruV2JNW9t0w/pSunDV6HpicBD5qB4GfnC', 'client', 'aditya.sanil@somaiya.edu', '8169848105'),
('68305d283e31e4d68', 'Jigar', 'Thakkar', 'jigar.kt', '$2y$10$xvcLol8yf43oheedlJmb3ONJaxlWhYNTDOVPKFEnCvyu0rqSnYhXu', 'admin', 'jigar.kt@somaiya.edu', '7666003731');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `documentStore`
--
ALTER TABLE `documentStore`
  ADD UNIQUE KEY `trackingNumber` (`trackingNumber`),
  ADD UNIQUE KEY `serialNumber` (`serialNumber`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `userName` (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documentStore`
--
ALTER TABLE `documentStore`
  MODIFY `serialNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
