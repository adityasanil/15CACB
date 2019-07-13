-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 13, 2019 at 09:37 PM
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
  `id` varchar(25) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `dateRegistered` varchar(30) NOT NULL,
  `identity` varchar(7) NOT NULL,
  `remarks` text,
  `partyName` varchar(15) NOT NULL,
  `ackNumber` varchar(30) NOT NULL,
  `trackingNumber` varchar(50) NOT NULL,
  `uidNumber` varchar(30) NOT NULL,
  `clientUploadedDoc` varchar(100) NOT NULL,
  `adminUploadedDoc` varchar(100) DEFAULT NULL,
  `taskStatus` varchar(15) NOT NULL,
  `contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documentStore`
--

INSERT INTO `documentStore` (`id`, `userName`, `dateRegistered`, `identity`, `remarks`, `partyName`, `ackNumber`, `trackingNumber`, `uidNumber`, `clientUploadedDoc`, `adminUploadedDoc`, `taskStatus`, `contact`) VALUES
('55015d28369b9a465', 'aditya.sanil', 'Sat 13th July 2019', 'client', 'In the previous chapter we created an empty table named &quot;MyGuests&quot; with five columns: &quot;id&quot;, &quot;firstname&quot;, &quot;lastname&quot;, &quot;email&quot; and &quot;reg_date&quot;. Now, let us fill the table with data.', 'Vaibhav', '#20197828105', '#81052962019', '#55015d28369b9a465', '../uploads/Fixed Deposit Certificate_Parents-compressed.pdf', '', 'Pending', '8169848105'),
('55015d28369b9a465', 'aditya.sanil', 'Sat 13th July 2019', 'client', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.', 'Vaibhav', '#20198118105', '#81059552019', '#55015d28369b9a465', '../uploads/Reco Letter comm.docx', '', 'Pending', '8169848105'),
('55015d28369b9a465', 'aditya.sanil', 'Sat 13th July 2019', 'client', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Vaibhav', '#20196068105', '#81059542019', '#55015d28369b9a465', '../uploads/eng reco letter.pdf', '', 'Pending', '8169848105'),
('55015d28369b9a465', 'aditya.sanil', 'Sat 13th July 2019', 'client', 'With XML Schema, your XML files can carry a description of its own format. with XML Schema, independent groups of people can agree on a standard for interchanging data.\r\nWith XML Schema, you can verify data.', 'Vaibhav', '#20191338105', '#81057092019', '#55015d28369b9a465', '../uploads/Arvind IT 2.pdf', '', 'Pending', '8169848105'),
('55015d28369b9a465', 'aditya.sanil', 'Sun 14th July 2019', 'client', 'Due to the widespread use of tables across third-party widgets like calendars and date pickers, we’ve designed our tables to be opt-in. Just add the base class .table to any &lt;table&gt;, then extend with custom styles or our various included modifier classes.', 'Vaibhav', '#20193168105', '#81053902019', '#55015d28369b9a465', '../uploads/LETTER OF RECOMMENDATION hritik prashant sir.docx', '', 'Pending', '8169848105');

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
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`),
  ADD UNIQUE KEY `userName` (`userName`);
