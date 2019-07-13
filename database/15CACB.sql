-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 13, 2019 at 11:29 AM
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
  `id` varchar(20) NOT NULL,
  `userName` varchar(15) NOT NULL,
  `dateRegistered` date NOT NULL,
  `identity` varchar(7) NOT NULL,
  `remarks` text,
  `partyName` varchar(15) NOT NULL,
  `ackNumber` varchar(30) NOT NULL,
  `trackingNumber` varchar(50) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `clientUploadedDoc` varchar(100) NOT NULL,
  `adminUploadedDoc` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` varchar(20) NOT NULL,
  `firstName` varchar(10) NOT NULL,
  `lastName` varchar(10) NOT NULL,
  `userName` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `identity` varchar(7) NOT NULL,
  `email` varchar(32) NOT NULL,
  `contact` varchar(12) NOT NULL
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `userName` (`userName`);
