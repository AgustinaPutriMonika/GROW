-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 01:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_rokok2`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `kd_absensi` int(11) NOT NULL,
  `kd_karyawan` char(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `waktu_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `waktu_keluar` datetime DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`kd_absensi`, `kd_karyawan`, `keterangan`, `waktu_masuk`, `waktu_keluar`, `foto`, `latitude`, `longitude`) VALUES
(1, 'sls001', 'testing', '2023-05-03 18:05:18', NULL, '64523fee78c46.png', '-7.7545162', '110.421626');

-- --------------------------------------------------------

--
-- Table structure for table `distrik`
--

CREATE TABLE `distrik` (
  `kd_distrik` varchar(10) NOT NULL,
  `nama_distrik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distrik`
--

INSERT INTO `distrik` (`kd_distrik`, `nama_distrik`) VALUES
('BTL', 'Bantul'),
('JOG', 'Jogja'),
('KLT', 'Klaten'),
('KTS', 'Kartasura'),
('SRG', 'Sragen');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `kd_karyawan` char(11) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`kd_karyawan`, `nama_karyawan`, `level`, `jabatan`, `no_telp`) VALUES
('adm001', 'Putri', 'admin', '', ''),
('sls001', 'Agustina', 'sales', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `masuk_spo`
--

CREATE TABLE `masuk_spo` (
  `kd_masuk_spo` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `kd_jual` int(11) NOT NULL,
  `kd_toko` int(11) NOT NULL,
  `kd_distrik` varchar(10) NOT NULL,
  `routing` varchar(5) NOT NULL,
  `tanggal_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_keluar` datetime NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(255) NOT NULL,
  `gambar_toko` varchar(255) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk_spo`
--

INSERT INTO `masuk_spo` (`kd_masuk_spo`, `nama_karyawan`, `kd_jual`, `kd_toko`, `kd_distrik`, `routing`, `tanggal_masuk`, `tanggal_keluar`, `keterangan`, `gambar_toko`, `latitude`, `longitude`) VALUES
(3, '', 56, 52, 'SRG', '8', '2023-05-01 16:16:34', '2023-05-31 16:16:34', '', '', '-7.7543187', '110.4235213'),
(4, '', 57, 48, 'KLT', '5', '2023-05-01 16:55:15', '2023-05-31 16:55:15', '', '', '-7.7529088', '110.2381056'),
(5, '', 58, 50, 'KTS', '7', '2023-05-01 16:56:51', '2023-05-26 16:56:51', '', '', '-7.7529088', '110.2381056'),
(6, '', 59, 54, 'BTL', '9', '2023-05-01 16:59:22', '2023-05-16 16:59:22', '', '', '', ''),
(7, 'Agustina', 60, 48, 'KLT', '10', '2023-05-03 01:38:38', '2023-05-18 01:38:38', 'apayaaa', '', '', ''),
(8, '', 64, 51, 'SRG', '4', '2023-05-03 01:50:52', '2023-05-03 01:54:52', '', '', '-7.7543142', '110.4235181');

-- --------------------------------------------------------

--
-- Table structure for table `masuk_toko`
--

CREATE TABLE `masuk_toko` (
  `id_masuk` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `kd_jual` int(11) NOT NULL,
  `kd_toko` int(11) NOT NULL,
  `kd_distrik` varchar(10) NOT NULL,
  `routing` varchar(2) NOT NULL,
  `tanggal_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `jenis_kunjungan` varchar(25) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar_toko` varchar(255) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk_toko`
--

INSERT INTO `masuk_toko` (`id_masuk`, `nama_karyawan`, `kd_jual`, `kd_toko`, `kd_distrik`, `routing`, `tanggal_masuk`, `jenis_kunjungan`, `keterangan`, `gambar_toko`, `latitude`, `longitude`) VALUES
(48, '', 53, 56, 'JOG', '1', '2023-05-01 12:02:04', 'io', '', '', '-7.7529088', '110.2381056');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `B12` int(11) NOT NULL,
  `B16` int(11) NOT NULL,
  `B20` int(11) NOT NULL,
  `BB12` int(11) NOT NULL,
  `BB16` int(11) NOT NULL,
  `BICE16` int(11) NOT NULL,
  `KC` int(11) NOT NULL,
  `KK` int(11) NOT NULL,
  `R12` int(11) NOT NULL,
  `R16` int(11) NOT NULL,
  `kd_jual` int(11) NOT NULL,
  `kd_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`B12`, `B16`, `B20`, `BB12`, `BB16`, `BICE16`, `KC`, `KK`, `R12`, `R16`, `kd_jual`, `kd_stok`) VALUES
(0, 0, 5, 0, 6, 0, 0, 0, 0, 0, 53, 0),
(23, 0, 0, 15, 0, 0, 0, 0, 0, 0, 54, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 55, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 56, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 57, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 58, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 59, 0),
(0, 0, 0, 50, 0, 0, 0, 0, 0, 0, 60, 0),
(0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 61, 0),
(0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 62, 0),
(0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 63, 0),
(0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 64, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stok_gudang_kecil`
--

CREATE TABLE `stok_gudang_kecil` (
  `kd_stok` int(11) NOT NULL,
  `B12` int(11) NOT NULL,
  `B16` int(11) NOT NULL,
  `B20` int(11) NOT NULL,
  `BB12` int(11) NOT NULL,
  `BB16` int(11) NOT NULL,
  `BICE16` int(11) NOT NULL,
  `KC` int(11) NOT NULL,
  `KK` int(11) NOT NULL,
  `R12` int(11) NOT NULL,
  `R16` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_gudang_kecil`
--

INSERT INTO `stok_gudang_kecil` (`kd_stok`, `B12`, `B16`, `B20`, `BB12`, `BB16`, `BICE16`, `KC`, `KK`, `R12`, `R16`) VALUES
(1, 95, 150, 277, 200, 96, 100, 160, 100, 94, 60);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `kd_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `kd_distrik` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`kd_toko`, `nama_toko`, `kd_distrik`) VALUES
(48, 'Sinar Sakti', 'KLT'),
(49, 'Ali Jaya', 'KLT'),
(50, 'Jodo', 'KTS'),
(51, 'Sumber Rejeki', 'SRG'),
(52, 'Wijaya Tani', 'SRG'),
(53, 'Azqza', 'BTL'),
(54, 'Bpk Gatot', 'BTL'),
(55, 'Enggal Jaya', 'JOG'),
(56, 'Ana', 'JOG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`kd_absensi`),
  ADD KEY `kd_karyawan` (`kd_karyawan`);

--
-- Indexes for table `distrik`
--
ALTER TABLE `distrik`
  ADD PRIMARY KEY (`kd_distrik`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD UNIQUE KEY `kd_karyawan` (`kd_karyawan`);

--
-- Indexes for table `masuk_spo`
--
ALTER TABLE `masuk_spo`
  ADD PRIMARY KEY (`kd_masuk_spo`),
  ADD KEY `nama_karyawan` (`nama_karyawan`),
  ADD KEY `kd_jual` (`kd_jual`),
  ADD KEY `kd_toko` (`kd_toko`),
  ADD KEY `kd_distrik` (`kd_distrik`);

--
-- Indexes for table `masuk_toko`
--
ALTER TABLE `masuk_toko`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `kd_karyawan` (`nama_karyawan`),
  ADD KEY `kd_produk` (`kd_jual`),
  ADD KEY `id_toko` (`kd_toko`),
  ADD KEY `kd_jual` (`kd_jual`),
  ADD KEY `kd_karyawan_2` (`nama_karyawan`),
  ADD KEY `kd_toko` (`kd_toko`),
  ADD KEY `kd_distrik` (`kd_distrik`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_jual`),
  ADD KEY `kd_stok` (`kd_stok`);

--
-- Indexes for table `stok_gudang_kecil`
--
ALTER TABLE `stok_gudang_kecil`
  ADD PRIMARY KEY (`kd_stok`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`kd_toko`),
  ADD KEY `kd_distrik` (`kd_distrik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `kd_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masuk_spo`
--
ALTER TABLE `masuk_spo`
  MODIFY `kd_masuk_spo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `masuk_toko`
--
ALTER TABLE `masuk_toko`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kd_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `kd_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`kd_karyawan`) REFERENCES `karyawan` (`kd_karyawan`);

--
-- Constraints for table `masuk_spo`
--
ALTER TABLE `masuk_spo`
  ADD CONSTRAINT `masuk_spo_ibfk_1` FOREIGN KEY (`kd_toko`) REFERENCES `toko` (`kd_toko`),
  ADD CONSTRAINT `masuk_spo_ibfk_2` FOREIGN KEY (`kd_jual`) REFERENCES `produk` (`kd_jual`),
  ADD CONSTRAINT `masuk_spo_ibfk_3` FOREIGN KEY (`kd_distrik`) REFERENCES `distrik` (`kd_distrik`);

--
-- Constraints for table `masuk_toko`
--
ALTER TABLE `masuk_toko`
  ADD CONSTRAINT `masuk_toko_ibfk_1` FOREIGN KEY (`kd_toko`) REFERENCES `toko` (`kd_toko`),
  ADD CONSTRAINT `masuk_toko_ibfk_3` FOREIGN KEY (`kd_jual`) REFERENCES `produk` (`kd_jual`),
  ADD CONSTRAINT `masuk_toko_ibfk_4` FOREIGN KEY (`kd_distrik`) REFERENCES `distrik` (`kd_distrik`);

--
-- Constraints for table `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `toko_ibfk_1` FOREIGN KEY (`kd_distrik`) REFERENCES `distrik` (`kd_distrik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
