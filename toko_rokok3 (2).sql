-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 04:57 PM
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
-- Database: `toko_rokok3`
--

-- --------------------------------------------------------

--
-- Table structure for table `carry_produk`
--

CREATE TABLE `carry_produk` (
  `id_user` char(11) NOT NULL,
  `id_produk` char(11) NOT NULL,
  `tanggal_carry` date NOT NULL DEFAULT current_timestamp(),
  `stok_dibawa` int(11) NOT NULL,
  `stok_kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carry_produk`
--

INSERT INTO `carry_produk` (`id_user`, `id_produk`, `tanggal_carry`, `stok_dibawa`, `stok_kembali`) VALUES
('sls001', 'B20', '2023-05-07', 0, 0),
('sls001', 'B12', '2023-05-07', 0, 0),
('adm001', 'BB12', '2023-05-07', 30, 0),
('adm001', 'BICE16', '2023-05-07', 38, 0),
('sls001', 'KK', '2023-05-08', 12, 0),
('sls001', 'KC', '2023-05-08', 40, 0),
('sls001', 'B16', '2023-05-08', 0, 0);

--
-- Triggers `carry_produk`
--
DELIMITER $$
CREATE TRIGGER `lock_barang` AFTER INSERT ON `carry_produk` FOR EACH ROW BEGIN
  SELECT COUNT(*) INTO @total
  FROM carry_produk
  WHERE id_produk = NEW.id_produk AND id_user = NEW.id_user;

  IF @total > 1 THEN
    DELETE FROM carry_produk
    WHERE id_produk = NEW.id_produk AND id_user = NEW.id_user;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `distrik`
--

CREATE TABLE `distrik` (
  `nama_distrik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distrik`
--

INSERT INTO `distrik` (`nama_distrik`) VALUES
('magelang1'),
('magelang2'),
('sleman1'),
('sleman2'),
('sleman3');

-- --------------------------------------------------------

--
-- Table structure for table `gudang_besar`
--

CREATE TABLE `gudang_besar` (
  `id_produk` char(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gudang_besar`
--

INSERT INTO `gudang_besar` (`id_produk`, `stok`) VALUES
('B12', 42),
('B16', 105),
('B20', 367),
('BB12', 160),
('BB16', 240),
('BICE16', 240),
('KC', 230),
('KK', 0),
('R12', -60),
('R16', -20);

-- --------------------------------------------------------

--
-- Table structure for table `gudang_kecil`
--

CREATE TABLE `gudang_kecil` (
  `id_produk` char(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gudang_kecil`
--

INSERT INTO `gudang_kecil` (`id_produk`, `stok`) VALUES
('B12', 158),
('B16', 215),
('B20', 567),
('BB12', 140),
('BB16', 140),
('BICE16', 140),
('KC', 140),
('KK', 140),
('R12', 60),
('R16', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_produk`
--

CREATE TABLE `pengajuan_produk` (
  `id_pengajuan` int(11) NOT NULL,
  `waktu_masuk` datetime NOT NULL DEFAULT current_timestamp(),
  `waktu_terima` datetime DEFAULT current_timestamp(),
  `id_produk` char(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `dikirim` int(11) DEFAULT NULL,
  `nama_pengirim` varchar(50) NOT NULL,
  `nama_penerima` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajuan_produk`
--

INSERT INTO `pengajuan_produk` (`id_pengajuan`, `waktu_masuk`, `waktu_terima`, `id_produk`, `jumlah`, `dikirim`, `nama_pengirim`, `nama_penerima`) VALUES
(1, '2023-05-08 00:24:39', '2023-05-09 21:27:36', 'B16', 220, 10, '', ''),
(8, '2023-05-09 15:16:42', '2023-05-09 17:03:42', 'B20', 25, 25, 'coba2', ''),
(9, '2023-05-09 17:04:11', '2023-05-09 17:08:36', 'B20', 50, 50, 'Saya', ''),
(10, '2023-05-09 17:11:41', '2023-05-09 17:14:46', 'B20', 30, 30, 'Ya Saya', ''),
(21, '2023-05-09 17:37:56', NULL, 'B20', 15, NULL, '', NULL),
(22, '2023-05-09 17:37:56', NULL, 'KK', 20, NULL, '', NULL),
(23, '2023-05-09 18:24:58', NULL, 'B20', 10, NULL, '', NULL),
(24, '2023-05-09 18:24:58', NULL, 'B16', 20, NULL, '', NULL),
(25, '2023-05-09 18:24:58', NULL, 'B12', 30, NULL, '', NULL),
(26, '2023-05-09 18:24:58', NULL, 'BB12', 90, NULL, '', NULL),
(27, '2023-05-09 18:24:58', NULL, 'BB16', 80, NULL, '', NULL),
(28, '2023-05-09 18:24:58', NULL, 'BICE16', 100, NULL, '', NULL),
(29, '2023-05-09 18:24:58', NULL, 'KC', 70, NULL, '', NULL),
(30, '2023-05-09 18:24:58', NULL, 'KK', 60, NULL, '', NULL),
(31, '2023-05-09 18:24:58', NULL, 'R16', 40, NULL, '', NULL),
(32, '2023-05-09 18:24:58', '2023-05-09 19:01:49', 'R12', 50, 20, '', ''),
(33, '2023-05-09 19:06:17', NULL, 'B20', 15, NULL, 'Putri', NULL),
(34, '2023-05-09 19:06:17', NULL, 'B16', 15, NULL, 'Putri', NULL),
(35, '2023-05-09 19:06:59', NULL, 'B20', 15, NULL, 'Agustina', NULL),
(36, '2023-05-09 19:06:59', '2023-05-09 21:45:03', 'B12', 15, 13, 'Agustina', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` char(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_toko` int(11) NOT NULL,
  `harga_grosir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_toko`, `harga_grosir`) VALUES
('B12', 'GROW BOLD 12', 13500, 13300),
('B16', 'GROW BOLD 16', 17500, 17300),
('B20', 'GROW BOLD 20', 21200, 21000),
('BB12', 'GROW BERY BOLD 12', 15500, 15300),
('BB16', 'GROW BERY BOLD 16', 19800, 19600),
('BICE16', 'GROW BLACK ICE 16', 17700, 17500),
('KC', 'GROW KRETEK COKLAT 12', 6800, 6600),
('KK', 'GROW KRETEK KUNING 12', 6800, 6600),
('R12', 'GROW REG 12', 13500, 13300),
('R16', 'GROW REG 16', 17500, 17300);

-- --------------------------------------------------------

--
-- Table structure for table `routing`
--

CREATE TABLE `routing` (
  `id_routing` int(11) NOT NULL,
  `nama_routing` int(11) NOT NULL,
  `nama_distrik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `routing`
--

INSERT INTO `routing` (`id_routing`, `nama_routing`, `nama_distrik`) VALUES
(1, 1, 'magelang1'),
(2, 1, 'sleman1');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `id_routing` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `id_routing`, `nama_toko`, `latitude`, `longitude`) VALUES
(1, 1, '', '', ''),
(2, 2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `level` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `level`, `no_telp`) VALUES
('adm001', 'Putri', 'admin', ''),
('ho001', 'Kevin', 'ho', ''),
('sls001', 'Agustina', 'sales', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carry_produk`
--
ALTER TABLE `carry_produk`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `distrik`
--
ALTER TABLE `distrik`
  ADD PRIMARY KEY (`nama_distrik`);

--
-- Indexes for table `gudang_besar`
--
ALTER TABLE `gudang_besar`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `gudang_kecil`
--
ALTER TABLE `gudang_kecil`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pengajuan_produk`
--
ALTER TABLE `pengajuan_produk`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `routing`
--
ALTER TABLE `routing`
  ADD PRIMARY KEY (`id_routing`),
  ADD KEY `nama_distrik` (`nama_distrik`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_routing` (`id_routing`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan_produk`
--
ALTER TABLE `pengajuan_produk`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carry_produk`
--
ALTER TABLE `carry_produk`
  ADD CONSTRAINT `carry_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carry_produk_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gudang_besar`
--
ALTER TABLE `gudang_besar`
  ADD CONSTRAINT `gudang_besar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gudang_kecil`
--
ALTER TABLE `gudang_kecil`
  ADD CONSTRAINT `gudang_kecil_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan_produk`
--
ALTER TABLE `pengajuan_produk`
  ADD CONSTRAINT `pengajuan_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `routing`
--
ALTER TABLE `routing`
  ADD CONSTRAINT `routing_ibfk_1` FOREIGN KEY (`nama_distrik`) REFERENCES `distrik` (`nama_distrik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `toko_ibfk_1` FOREIGN KEY (`id_routing`) REFERENCES `routing` (`id_routing`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
