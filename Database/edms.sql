-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2021 at 06:17 PM
-- Server version: 10.5.10-MariaDB-2
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `full_name` longtext NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `review` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `full_name`, `approved`, `review`) VALUES
(1, 'Capacity Development', 'Capacity Development Files', 0, 0),
(2, 'Office Transaction', 'General office transaction files', 0, 0),
(3, 'Staff Resource Files', 'General Staff Resource Files', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deleted`
--

CREATE TABLE `deleted` (
  `del_id` int(11) NOT NULL,
  `code` varchar(254) NOT NULL,
  `title` varchar(254) NOT NULL,
  `category` varchar(254) NOT NULL,
  `authors` varchar(254) NOT NULL,
  `deleter` varchar(254) NOT NULL,
  `size` float NOT NULL,
  `version` int(11) NOT NULL,
  `effective_per` datetime NOT NULL,
  `evaluate_before` datetime NOT NULL,
  `distributed_to` varchar(254) NOT NULL,
  `verifiers` mediumtext NOT NULL,
  `authorizers` mediumtext NOT NULL,
  `continued_per` mediumtext NOT NULL,
  `reason` mediumtext NOT NULL,
  `del_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int(254) NOT NULL,
  `category` varchar(254) NOT NULL,
  `title` mediumtext NOT NULL,
  `version` int(254) NOT NULL DEFAULT 1,
  `evaluate_before` date NOT NULL,
  `authors` mediumtext NOT NULL,
  `size` float NOT NULL,
  `uploaded_by` varchar(254) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `review` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `downloads` int(11) NOT NULL,
  `date_uploaded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `down_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `fname` varchar(254) NOT NULL,
  `sname` varchar(254) NOT NULL,
  `full_name` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `position` varchar(254) NOT NULL,
  `class` varchar(254) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `category` varchar(254) NOT NULL,
  `title` varchar(254) NOT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mess_id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `message` longtext NOT NULL,
  `isread` tinyint(4) NOT NULL DEFAULT 0,
  `date_sent` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(254) NOT NULL,
  `fname` varchar(254) NOT NULL,
  `sname` varchar(254) NOT NULL,
  `full_name` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(254) NOT NULL,
  `position` mediumtext NOT NULL,
  `class` varchar(254) NOT NULL,
  `Reg_Date` timestamp NOT NULL DEFAULT current_timestamp(),
  `confirmed` int(11) DEFAULT 0,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `sname`, `full_name`, `email`, `password`, `position`, `class`, `Reg_Date`, `confirmed`, `last_login`) VALUES
(301385698, 'Admin', 'Admin', 'Admin Admin', 'admin@admin.com', '28124bb1738f86556fe21f8a35a0f0a6', 'Staff', 'Administrator', '2021-06-21 15:39:47', 1, '2021-06-21 19:11:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `deleted`
--
ALTER TABLE `deleted`
  ADD PRIMARY KEY (`del_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`down_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mess_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deleted`
--
ALTER TABLE `deleted`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int(254) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `down_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
