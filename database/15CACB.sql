-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 19, 2019 at 07:57 PM
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
  `submitTime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `id` varchar(25) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `dateRegistered` varchar(35) NOT NULL,
  `identityUser` varchar(7) NOT NULL,
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

INSERT INTO `documentStore` (`submitTime`, `id`, `firstName`, `lastName`, `userName`, `dateRegistered`, `identityUser`, `remarks`, `partyName`, `ackNumber`, `trackingNumber`, `uidNumber`, `clientUploadedDoc`, `adminUploadedDoc`, `taskStatus`, `contact`, `process`) VALUES
('2019-07-19 17:11:19.049188', '55015d28369b9a465', 'Aditya', 'Sanil', 'aditya.sanil', 'Fri, 19th Jul 2019 22:41', 'client', 'none', 'Vaibhav', '', '19153368105', '', '../../uploads/19153368105.pdf', '', '../../images/pending.svg', '8169848105', 'Pending'),
('2019-07-19 16:34:15.452943', '55015d28369b9a465', 'Aditya', 'Sanil', 'aditya.sanil', 'Fri, 19th Jul 2019 21:57', 'client', 'none', 'Vaibhav', '12345', '19315218105', '098765', '../../uploads/19315218105.pdf', '<a href=\'../../uploadsAdmin/15CA12345.pdf\' download><i class=\'fas fa-download fa-lg\'></i></a>', '../../images/approved.svg', '8169848105', 'Completed'),
('2019-07-19 16:59:45.591962', '55015d28369b9a465', 'Aditya', 'Sanil', 'aditya.sanil', 'Fri, 19th Jul 2019 22:11', 'client', 'none', 'Vaibhav', '', '19446428105', '', '../../uploads/19446428105.pdf', '', '../../images/pending.svg', '8169848105', 'Pending');

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
  ADD UNIQUE KEY `trackingNumber` (`trackingNumber`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `userName` (`userName`);
