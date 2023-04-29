-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 10:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `kd_absensi` char(11) NOT NULL,
  `kd_karyawan` char(11) NOT NULL,
  `Keterangan` varchar(255) NOT NULL,
  `waktu_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `waktu_keluar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `masuk_toko`
--

CREATE TABLE `masuk_toko` (
  `id_masuk` int(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `kd_jual` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `tanggal_masuk` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk_toko`
--

INSERT INTO `masuk_toko` (`id_masuk`, `nama_karyawan`, `kd_jual`, `id_toko`, `tanggal_masuk`) VALUES
(30, 'Agustina', 35, 33, '2023-04-27 07:23:56'),
(34, 'Mark Lee', 39, 37, '2023-04-27 20:11:46'),
(35, 'Haruto', 40, 38, '2023-04-27 20:13:02'),
(36, 'Putri', 41, 39, '2023-04-27 20:13:53'),
(37, 'Jaemin', 42, 40, '2023-04-27 20:15:00'),
(38, 'NCT', 43, 41, '2023-04-27 20:15:48'),
(39, '', 44, 42, '2023-04-28 19:25:33'),
(40, '', 45, 43, '2023-04-28 20:49:59'),
(41, '', 46, 44, '2023-04-28 20:51:09'),
(42, '', 47, 45, '2023-04-29 15:18:57');

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
  `kd_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`B12`, `B16`, `B20`, `BB12`, `BB16`, `BICE16`, `KC`, `KK`, `R12`, `R16`, `kd_jual`) VALUES
(3, 5, 7, 2, 8, 0, 0, 0, 0, 0, 35),
(0, 0, 0, 4, 0, 0, 7, 0, 0, 0, 39),
(5, 0, 0, 0, 0, 0, 0, 3, 0, 0, 40),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 41),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 42),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 43),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 44),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 45),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 46),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 47);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `distrik` varchar(100) NOT NULL,
  `routing` varchar(15) NOT NULL,
  `jenis_kunjungan` varchar(25) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `gambar_toko` varchar(255) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `distrik`, `routing`, `jenis_kunjungan`, `keterangan`, `gambar_toko`, `latitude`, `longitude`) VALUES
(33, 'Abadi', 'Magelang', '01', 'roc', '', 'Gochujang Hot Pepper Paste - Haechandle 3kg.jpg', '-7.754232', '110.4235226'),
(37, 'SM', 'Seoul', '14', 'rot', '', 'WORKSHOP GURU INFORMATIKA SMP KABUPATEN SLEMAN (2).png', '-7.749632', '110.3986688'),
(38, 'YG', 'Seoul', '12', 'r2w', '', 'Logo_Google_Org-removebg-preview.png', '-7.754187', '110.4235255'),
(39, 'Monika', 'sleman', '01', 'roc', '', '', '-7.754189', '110.423524'),
(40, 'Ruko', 'Magelang', 'sleman', 'rot', '', '', '-7.7542984', '110.423519'),
(41, 'Dream', 'Bantul', '12', 'rot', '', '', '-7.7543213', '110.423516'),
(42, '', '', '', 'io', '', '', '-7.7856768', '110.3757312'),
(43, '', '', '', 'io', '', 'WORKSHOP GURU INFORMATIKA SMP KABUPATEN SLEMAN (6).png', '-7.764381', '110.4255206'),
(44, '', '', '', 'io', '', '', '-7.7644332', '110.42553'),
(45, '', '', '', 'io', '', '', '-7.7627827', '110.4143039');

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
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD UNIQUE KEY `kd_karyawan` (`kd_karyawan`);

--
-- Indexes for table `masuk_toko`
--
ALTER TABLE `masuk_toko`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `kd_karyawan` (`nama_karyawan`),
  ADD KEY `kd_produk` (`kd_jual`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `kd_jual` (`kd_jual`),
  ADD KEY `kd_karyawan_2` (`nama_karyawan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_jual`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masuk_toko`
--
ALTER TABLE `masuk_toko`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `kd_jual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`kd_karyawan`) REFERENCES `karyawan` (`kd_karyawan`);

--
-- Constraints for table `masuk_toko`
--
ALTER TABLE `masuk_toko`
  ADD CONSTRAINT `masuk_toko_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `masuk_toko_ibfk_3` FOREIGN KEY (`kd_jual`) REFERENCES `produk` (`kd_jual`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
