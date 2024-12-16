-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 09:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hastane`
--

-- --------------------------------------------------------

--
-- Table structure for table `doktor`
--

CREATE TABLE `doktor` (
  `did` int(15) NOT NULL,
  `dad` varchar(35) NOT NULL,
  `dsoy` varchar(35) NOT NULL,
  `dkimlik` int(35) NOT NULL,
  `dmail` varchar(35) NOT NULL,
  `dsifre` varchar(35) NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `token_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doktor`
--

INSERT INTO `doktor` (`did`, `dad`, `dsoy`, `dkimlik`, `dmail`, `dsifre`, `reset_token`, `token_expiry`) VALUES
(1, 'admin', 'admin', 101, '', 'admin', NULL, NULL),
(2, 'Alp', 'Tekin', 123123, 'alptekin656@gmail.com', 'test', '0a147ce2be8d8ca8090f2c1455b885039ea1c0d6fa7dd99b0b61b9823ac36635790c5502c893d111eec1337e1b165b48d7fb', '2024-12-09 19:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `hasta`
--

CREATE TABLE `hasta` (
  `hid` int(11) NOT NULL,
  `hisim` varchar(50) NOT NULL,
  `hsoyisim` varchar(50) NOT NULL,
  `hkimlik` int(15) NOT NULL,
  `htel` int(15) NOT NULL,
  `hgecmis` varchar(100) DEFAULT NULL,
  `hsonuc` varchar(100) DEFAULT NULL,
  `hilac` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasta`
--

INSERT INTO `hasta` (`hid`, `hisim`, `hsoyisim`, `hkimlik`, `htel`, `hgecmis`, `hsonuc`, `hilac`) VALUES
(1, 'Hasta isim', 'Hasta soyisim', 242536, 555000000, 'Goz bolumu, kulak burun bogaz bolumu.', 'Sorun yok.', 'Yok.');

-- --------------------------------------------------------

--
-- Table structure for table `randevu`
--

CREATE TABLE `randevu` (
  `rid` int(8) NOT NULL,
  `rad` varchar(50) NOT NULL,
  `rsoy` varchar(50) NOT NULL,
  `rtel` int(12) NOT NULL,
  `rtar` date NOT NULL,
  `rdok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `randevu`
--

INSERT INTO `randevu` (`rid`, `rad`, `rsoy`, `rtel`, `rtar`, `rdok`) VALUES
(1, 'Hasta ad', 'Hasta soyad', 55555555, '2024-12-14', 'Doktor1');

-- --------------------------------------------------------

--
-- Table structure for table `sekreter`
--

CREATE TABLE `sekreter` (
  `sid` int(11) NOT NULL,
  `sisim` varchar(50) NOT NULL,
  `ssoyisim` varchar(50) NOT NULL,
  `skno` int(20) NOT NULL,
  `smail` varchar(20) NOT NULL,
  `ssifre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sekreter`
--

INSERT INTO `sekreter` (`sid`, `sisim`, `ssoyisim`, `skno`, `smail`, `ssifre`) VALUES
(1, 'admin', 'admin', 101, 'admin@admin.admin', 'admin'),
(2, 'Sekreter ad', 'Sekreter soyad', 3535, 'sekreter@test.mail', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doktor`
--
ALTER TABLE `doktor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `hasta`
--
ALTER TABLE `hasta`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `randevu`
--
ALTER TABLE `randevu`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `sekreter`
--
ALTER TABLE `sekreter`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doktor`
--
ALTER TABLE `doktor`
  MODIFY `did` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hasta`
--
ALTER TABLE `hasta`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `randevu`
--
ALTER TABLE `randevu`
  MODIFY `rid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sekreter`
--
ALTER TABLE `sekreter`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
