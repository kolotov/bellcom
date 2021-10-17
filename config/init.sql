-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Oct 17, 2021 at 04:11 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS bellcom;
USE bellcom;

--
-- Database: `bellcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `meetings_res`
--

CREATE TABLE `meetings_res` (
  `file_id` int(11) NOT NULL,
  `file_path` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetings_res`
--

INSERT INTO `meetings_res` (`file_id`, `file_path`) VALUES
(1580, 'data_xml/XML_1580.xml'),
(1582, 'data_xml/XML_1582.xml');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meetings_res`
--
ALTER TABLE `meetings_res`
  ADD PRIMARY KEY (`file_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
