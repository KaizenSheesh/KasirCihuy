-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2024 at 01:02 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasirvanila`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailID` int NOT NULL,
  `PenjualanID` int NOT NULL,
  `ProdukID` int NOT NULL,
  `JumlahProduk` int NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `Alamat`, `NomorTelepon`) VALUES
(8, 'Dapa said', 'Jl. Sambas Timur', '545453545354');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int NOT NULL,
  `ProdukID` int NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TotalHarga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_petugas` varchar(25) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin', 'admin', 'Dimas', 'admin'),
(2, 'admin@gmail.com', 'password', 'Sipaa', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(40,2) NOT NULL,
  `Stok` int NOT NULL,
  `kode_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `Harga`, `Stok`, `kode_produk`) VALUES
(26, 'Asus Predator Helios Neo 16', 24000000.00, 15, 1),
(27, 'Asus Nitro 5 ', 21000000.00, 5, 2),
(28, 'Macbook pro M1', 32000000.00, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `total` int NOT NULL,
  `bayar` int NOT NULL,
  `kembali` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_waktu`, `nomor`, `total`, `bayar`, `kembali`) VALUES
(1, '2024-02-23 16:20:28', '291209', 4, 500000, 499996),
(2, '2024-02-23 16:21:34', '506429', 4, 500000, 499996),
(3, '2024-02-23 16:21:49', '877302', 4, 500000, 499996),
(4, '2024-02-23 16:22:13', '482023', 4, 500000, 499996),
(5, '2024-02-23 16:23:02', '218496', 4, 10000, 9996),
(6, '2024-02-23 16:24:16', '661887', 4, 10000, 9996),
(7, '2024-02-23 16:24:39', '294480', 4, 10000, 9996),
(8, '2024-02-23 16:25:52', '997373', 4, 10000, 9996),
(9, '2024-02-23 16:39:02', '692079', 2, 10000, 9998),
(10, '2024-02-23 16:39:32', '457102', 4, 10000, 9996),
(11, '2024-02-23 16:42:45', '254149', 4, 10000, 9996),
(12, '2024-02-23 16:45:10', '699172', 4, 10000, 9996),
(13, '2024-02-23 16:46:09', '901625', 4, 10000, 9996),
(14, '2024-02-23 16:46:40', '932600', 0, 10000, 10000),
(15, '2024-02-23 16:48:14', '201554', 2, 10000, 9998),
(16, '2024-02-23 16:49:07', '329163', 2, 500000, 499998),
(17, '2024-02-23 16:50:26', '947716', 2, 10000, 9998),
(18, '2024-02-23 16:53:13', '442953', 2, 10000, 9998),
(19, '2024-02-24 00:06:05', '133122', 120000000, 130000000, 10000000),
(20, '2024-02-24 00:14:26', '134800', 24000000, 70000000, 46000000),
(21, '2024-02-24 00:15:14', '429609', 24000000, 70000000, 46000000),
(22, '2024-02-24 00:38:34', '613130', 48000000, 50000000, 2000000),
(23, '2024-02-24 00:46:29', '612081', 48000000, 70000000, 22000000),
(24, '2024-02-24 01:55:24', '264830', 64000000, 70000000, 6000000),
(25, '2024-02-26 03:05:34', '648875', 96000000, 100000000, 4000000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_transaksi_detail` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `ProdukID` int NOT NULL,
  `Harga` int NOT NULL,
  `Stok` int NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `ProdukID`, `Harga`, `Stok`, `total`) VALUES
(1, 8, 0, 2, 2, 4),
(2, 13, 26, 2, 1, 2),
(3, 13, 26, 2, 1, 2),
(4, 15, 26, 2, 1, 2),
(5, 16, 26, 2, 1, 2),
(6, 17, 26, 2, 1, 2),
(7, 18, 26, 2, 1, 2),
(8, 19, 26, 24000000, 5, 120000000),
(9, 20, 26, 24000000, 1, 24000000),
(10, 21, 26, 24000000, 1, 24000000),
(11, 22, 26, 24000000, 1, 24000000),
(12, 22, 26, 24000000, 1, 24000000),
(13, 23, 26, 24000000, 2, 48000000),
(14, 24, 28, 32000000, 2, 64000000),
(15, 25, 28, 32000000, 3, 96000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`DetailID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_transaksi_detail` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
