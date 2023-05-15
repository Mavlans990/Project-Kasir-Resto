-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 03:11 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kasir_restoran2`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `nomor_meja` varchar(30) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_hrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `kode_transaksi`, `nomor_meja`, `id_menu`, `jumlah_pesanan`, `total_hrg`) VALUES
(64, 'TRS0001', '1', 25, 2, 70000),
(65, 'TRS0001', '1', 25, 2, 70000),
(66, 'TRS0002', '1', 27, 2, 30000),
(67, 'TRS0003', '2', 25, 2, 70000),
(68, 'TRS0004', '2', 27, 2, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id_meja` int(11) NOT NULL,
  `nomor_meja` varchar(45) NOT NULL,
  `status` enum('Kosong','Terisi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `nomor_meja`, `status`) VALUES
(5, '001', 'Kosong'),
(6, '002', 'Kosong'),
(7, '003', 'Kosong');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama_menu` varchar(45) NOT NULL,
  `harga` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `foto`, `nama_menu`, `harga`, `kategori`) VALUES
(25, '620d0c19ee8cd.jpg', 'Kentang Goreng', 35000, 'Makanan'),
(27, '620d1a6d96e48.jfif', 'Nasi Goreng Pedas', 15000, 'Makanan'),
(31, '6228cb2722939.jpg', 'PIZZA', 35000, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(45) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jenkel`, `alamat`, `no_hp`) VALUES
(1, 'Maulana Arridho', 'Laki-Laki', 'Liprak Wetan', '0000000000'),
(2, 'Hafiz', 'Perempuan', 'qq', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nomor_meja` varchar(30) NOT NULL,
  `tgl_transaksi` varchar(20) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `jumlah_total` int(11) NOT NULL,
  `jml_harga` int(11) NOT NULL,
  `total_hrg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `nama_user`, `id_menu`, `nomor_meja`, `tgl_transaksi`, `bayar`, `kembali`, `jumlah_pesanan`, `jumlah_total`, `jml_harga`, `total_hrg`) VALUES
('TRS0001', 'Maulana Arridho', 25, '1', '2022-03-21', 200000, 60000, 2, 140000, 35000, 70000),
('TRS0002', 'Maulana Arridho', 27, '1', '2022-03-21', 50000, 20000, 2, 30000, 15000, 30000),
('TRS0003', 'Maulana', 25, '2', '2022-03-21', 100000, 30000, 2, 70000, 35000, 70000),
('TRS0004', 'Maulana', 27, '2', '2022-03-21', 50000, 20000, 2, 30000, 15000, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(45) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `level` enum('Admin','Kasir','Manajer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jenkel`, `alamat`, `no_hp`, `username`, `password`, `level`) VALUES
(3, 'Maulana', 'Laki-Laki', 'Liprak', '0852917495928', 'admin', 'admin', 'Admin'),
(4, 'Maulana Arridho', 'Laki-Laki', 'SOLO', '0022', 'kasir', '123', 'Kasir'),
(5, 'Orang Lain', '', 'LOL', '11', 'manajer', '123', 'Manajer'),
(6, 'Maulana', '', 'Liprak', '0022', 'kasi2', '123', 'Kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id_meja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
