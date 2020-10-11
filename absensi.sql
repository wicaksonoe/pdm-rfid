-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 09:48 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `mdosen`
--

CREATE TABLE `mdosen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `programstudi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mdosen`
--

INSERT INTO `mdosen` (`id`, `nidn`, `nama`, `programstudi`) VALUES
(5, '0816077801', 'I GEDE SUJANA EKA PUTRA', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mjadwal`
--

CREATE TABLE `mjadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodemk` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `kode_hari` int(11) DEFAULT '0',
  `jam_in` varchar(10) NOT NULL,
  `jam_out` varchar(10) NOT NULL,
  `nidn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mjadwal`
--

INSERT INTO `mjadwal` (`id`, `kodemk`, `kelas`, `hari`, `kode_hari`, `jam_in`, `jam_out`, `nidn`) VALUES
(4, '1001', 'A', 'Rabu', 3, '11:00', '15:30', '0816077801'),
(5, 'MK0091', 'A', 'Selasa', 2, '19:00', '21:30', '0816077801'),
(6, '1001', 'A', 'Selasa', 2, '10:12', '11:30', '0816077801'),
(7, '1002', 'C', 'Kamis', 4, '09:00', '10:20', '0816077801'),
(8, '1003', 'C', 'Jumat', 5, '12:30', '14:00', '0930910'),
(9, '1001', 'D', 'Senin', 1, '17:20', '20:00', '0816077801'),
(10, '1002', 'A', 'Minggu', 0, '18:00', '20:00', '0816077801'),
(11, '1001', 'B', 'Selasa', 2, '15:00', '17:30', '0816077801');

-- --------------------------------------------------------

--
-- Table structure for table `m_mk`
--

CREATE TABLE `m_mk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodemk` varchar(10) NOT NULL,
  `namamk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_mk`
--

INSERT INTO `m_mk` (`id`, `kodemk`, `namamk`) VALUES
(1, '1001', 'Algoritma Pemrograman'),
(2, '1002', 'Basis Data'),
(3, '1003', 'Pengantar Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `tbabsensi`
--

CREATE TABLE `tbabsensi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodemk` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `checkin` varchar(10) NOT NULL,
  `checkout` varchar(10) NOT NULL,
  `idjadwal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbabsensi`
--

INSERT INTO `tbabsensi` (`id`, `kodemk`, `kelas`, `nidn`, `hari`, `tanggal`, `checkin`, `checkout`, `idjadwal`) VALUES
(6, '1001', 'A', '0816077801', 'Selasa', '2020-09-08', '15:48', '15:49', 6),
(7, '1002', 'C', '0816077801', 'Kamis', '2020-09-10', '09:00', '10:20', 7),
(8, '1003', 'C', '0816077801', 'Jumat', '2020-09-12', '12:30', '13:50', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mdosen`
--
ALTER TABLE `mdosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `mjadwal`
--
ALTER TABLE `mjadwal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `m_mk`
--
ALTER TABLE `m_mk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tbabsensi`
--
ALTER TABLE `tbabsensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mdosen`
--
ALTER TABLE `mdosen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mjadwal`
--
ALTER TABLE `mjadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `m_mk`
--
ALTER TABLE `m_mk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbabsensi`
--
ALTER TABLE `tbabsensi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
