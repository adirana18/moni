-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2024 at 06:25 PM
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
-- Database: `moni`
--

-- --------------------------------------------------------

--
-- Table structure for table `ceklist_perangkat_it_store`
--

CREATE TABLE `ceklist_perangkat_it_store` (
  `ID` int(11) NOT NULL,
  `KD_BRANCH` varchar(10) DEFAULT NULL,
  `NAMA_BRANCH` varchar(100) DEFAULT NULL,
  `KD_STORE` varchar(10) DEFAULT NULL,
  `NIK_IT_STORE` varchar(20) DEFAULT NULL,
  `NAMA_IT_STORE` varchar(100) DEFAULT NULL,
  `NAMA_STORE` varchar(100) DEFAULT NULL,
  `TYPE_TOKO` varchar(50) DEFAULT NULL,
  `PDT` varchar(50) DEFAULT NULL,
  `KONEKSI` varchar(50) DEFAULT NULL,
  `TYPE_KONEKSI` varchar(50) DEFAULT NULL,
  `VENDOR_KONEKSI` varchar(50) DEFAULT NULL,
  `S_MERK` varchar(50) DEFAULT NULL,
  `S_PROCESSOR` varchar(50) DEFAULT NULL,
  `S_MEMORI` varchar(50) DEFAULT NULL,
  `S_KAPASITAS_STORAGE` varchar(50) DEFAULT NULL,
  `S_TYPE_STORAGE` varchar(50) DEFAULT NULL,
  `K1_MERK` varchar(50) DEFAULT NULL,
  `K1_PROCESSOR` varchar(50) DEFAULT NULL,
  `K1_MEMORI` varchar(50) DEFAULT NULL,
  `K1_KAPASITAS_STORAGE` varchar(50) DEFAULT NULL,
  `K1_TYPE_STORAGE` varchar(50) DEFAULT NULL,
  `K2_MERK` varchar(50) DEFAULT NULL,
  `K2_PROCESSOR` varchar(50) DEFAULT NULL,
  `K2_MEMORI` varchar(50) DEFAULT NULL,
  `K2_KAPASITAS_STORAGE` varchar(50) DEFAULT NULL,
  `K2_TYPE_STORAGE` varchar(50) DEFAULT NULL,
  `K3_MERK` varchar(50) DEFAULT NULL,
  `K3_PROCESSOR` varchar(50) DEFAULT NULL,
  `K3_MEMORI` varchar(50) DEFAULT NULL,
  `K3_KAPASITAS_STORAGE` varchar(50) DEFAULT NULL,
  `K3_TYPE_STORAGE` varchar(50) DEFAULT NULL,
  `K4_MERK` varchar(50) DEFAULT NULL,
  `K4_PROCESSOR` varchar(50) DEFAULT NULL,
  `K4_MEMORI` varchar(50) DEFAULT NULL,
  `K4_KAPASITAS_STORAGE` varchar(50) DEFAULT NULL,
  `K4_TYPE_STORAGE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ceklist_perangkat_it_store`
--

INSERT INTO `ceklist_perangkat_it_store` (`ID`, `KD_BRANCH`, `NAMA_BRANCH`, `KD_STORE`, `NIK_IT_STORE`, `NAMA_IT_STORE`, `NAMA_STORE`, `TYPE_TOKO`, `PDT`, `KONEKSI`, `TYPE_KONEKSI`, `VENDOR_KONEKSI`, `S_MERK`, `S_PROCESSOR`, `S_MEMORI`, `S_KAPASITAS_STORAGE`, `S_TYPE_STORAGE`, `K1_MERK`, `K1_PROCESSOR`, `K1_MEMORI`, `K1_KAPASITAS_STORAGE`, `K1_TYPE_STORAGE`, `K2_MERK`, `K2_PROCESSOR`, `K2_MEMORI`, `K2_KAPASITAS_STORAGE`, `K2_TYPE_STORAGE`, `K3_MERK`, `K3_PROCESSOR`, `K3_MEMORI`, `K3_KAPASITAS_STORAGE`, `K3_TYPE_STORAGE`, `K4_MERK`, `K4_PROCESSOR`, `K4_MEMORI`, `K4_KAPASITAS_STORAGE`, `K4_TYPE_STORAGE`) VALUES
(9, '1', '6', 'u', 'u', 'u', 'hy', 'h', 'u', 'h', 'u', 'h', 'u', '', 'u', 'j', 'uj', 'u', 'k', 'u', 'j', 'ju', 'u', 'u', 'u', 'u', 'h', 'k', '', 'i', 'i', 'i', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ceklist_perangkat_it_store`
--
ALTER TABLE `ceklist_perangkat_it_store`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ceklist_perangkat_it_store`
--
ALTER TABLE `ceklist_perangkat_it_store`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
