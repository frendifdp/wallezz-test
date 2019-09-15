-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 15, 2019 at 06:22 AM
-- Server version: 10.4.7-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supplier`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kd_barang` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hrg_jual` int(11) NOT NULL,
  `hrg_beli` int(11) NOT NULL,
  `satuan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kd_barang`, `nm_barang`, `hrg_jual`, `hrg_beli`, `satuan`, `kategori`) VALUES
(1, 'BRG00001', 'Gergaji', 12000, 10000, 'pcs', 'Perkakas'),
(4, 'BRG00004', 'Beras', 17000, 15000, 'kg', 'Bahan Pokok');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `tgl_faktur` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_faktur` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nm_konsumen` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_barang` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hrg_satuan` int(11) NOT NULL,
  `hrg_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tgl_faktur`, `no_faktur`, `nm_konsumen`, `kd_barang`, `jumlah`, `hrg_satuan`, `hrg_total`) VALUES
(1, '2019-09-06 02:42:40', '5d71c7a0735f2', 'frendi', 'BRG00001', 3, 10000, 30000),
(2, '2019-09-06 02:42:40', '5d71c7a078c3a', 'frendi', 'BRG00002', 2, 15000, 30000),
(3, '2019-09-06 02:45:48', '5d71c85c22dd2', 'Guest', 'BRG00001', 1, 10000, 10000),
(4, '2019-09-06 02:48:01', '5d71c8e16c60d', 'Guest', 'BRG00002', 1, 15000, 15000),
(5, '2019-09-06 06:36:03', '5d71fe53d6ad4', 'frendi', 'BRG00004', 1, 17000, 17000),
(6, '2019-09-06 06:36:03', '5d71fe53d902f', 'frendi', 'BRG00001', 1, 12000, 12000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_faktur` (`no_faktur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
