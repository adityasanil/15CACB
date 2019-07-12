-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 12, 2019 at 07:30 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `15CACB`
--

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
('55015d28369b9a465', 'Aditya', 'Sanil', 'aditya.sanil', '$2y$10$KqY6v7dqtROz4PA9yyWdruV2JNW9t0w/pSunDV6HpicBD5qB4GfnC', 'client', 'aditya.sanil@somaiya.edu', '8169848105');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `userName` (`userName`);
