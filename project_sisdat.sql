-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 02:56 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_sisdat`
--

-- --------------------------------------------------------

--
-- Table structure for table `maskapai`
--

CREATE TABLE `maskapai` (
  `kode_maskapai` varchar(10) NOT NULL,
  `nama_maskapai` varchar(20) NOT NULL,
  `jenis_pesawat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maskapai`
--

INSERT INTO `maskapai` (`kode_maskapai`, `nama_maskapai`, `jenis_pesawat`) VALUES
('BA-1', 'Batik Air', 'VIP'),
('BA-2', 'Batik Air', 'Business'),
('BA-3', 'Batik Air', 'Economy'),
('CI-1', 'Citilink', 'VIP'),
('CI-2', 'Citilink', 'Business'),
('CI-3', 'Citilink', 'Economy'),
('GA-1', 'Garuda Indonesia', 'VIP'),
('GA-2', 'Garuda Indonesia', 'Business'),
('GA-3', 'Garuda Indonesia', 'Economy'),
('LI-1', 'Lion Air', 'VIP'),
('LI-2', 'Lion Air', 'Business'),
('LI-3', 'Lion Air', 'Economy');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `nomor_id` varchar(20) NOT NULL,
  `nama_penumpang` varchar(30) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `nomor_rute` varchar(10) NOT NULL,
  `asal` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`nomor_rute`, `asal`, `tujuan`) VALUES
('621', 'Bandung', 'Bandar Lampung'),
('622', 'Bandung', 'Tangerang'),
('623', 'Bandar Lampung', 'Tangerang'),
('624', 'Bandar Lampung', 'Bandung'),
('625', 'Tangerang', 'Bandung'),
('626', 'Tangerang', 'Bandar Lampung');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `nomor_tiket` int(11) NOT NULL,
  `nomor_kursi` varchar(5) NOT NULL,
  `jamterbang` varchar(10) NOT NULL,
  `nomor_rute` varchar(10) NOT NULL,
  `nomor_id` varchar(20) NOT NULL,
  `kode_maskapai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maskapai`
--
ALTER TABLE `maskapai`
  ADD PRIMARY KEY (`kode_maskapai`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`nomor_id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`nomor_rute`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`nomor_tiket`),
  ADD KEY `kode_maskapai` (`kode_maskapai`),
  ADD KEY `nomor_id` (`nomor_id`),
  ADD KEY `nomor_rute` (`nomor_rute`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `nomor_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`kode_maskapai`) REFERENCES `maskapai` (`kode_maskapai`),
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`nomor_id`) REFERENCES `penumpang` (`nomor_id`),
  ADD CONSTRAINT `tiket_ibfk_3` FOREIGN KEY (`nomor_rute`) REFERENCES `rute` (`nomor_rute`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
