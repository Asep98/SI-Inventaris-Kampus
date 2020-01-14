-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 01:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `spesifikasi` varchar(33) NOT NULL,
  `ruang` int(20) NOT NULL,
  `jml_barang` int(5) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `jenis_barang` int(20) NOT NULL,
  `tgl_regist` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `spesifikasi`, `ruang`, `jml_barang`, `kondisi`, `jenis_barang`, `tgl_regist`, `gambar`) VALUES
(1, 'BR001', 'Mouse', '0000-00-00', 3, 5, 'Layak Pakai', 1, '2019-01-27 13:11:41', ''),
(2, 'BR002', 'Keyboard', '0000-00-00', 3, 3, 'Layak Pakai', 1, '2019-01-27 13:11:41', ''),
(3, 'BR003', 'Pensil', '0000-00-00', 1, 64, 'Layak Pakai', 2, '2019-01-27 13:11:41', ''),
(4, 'BR005', 'Laptop', '0000-00-00', 2, 5, 'Layak Pakai', 1, '2019-01-27 13:11:41', ''),
(5, 'BR006', 'Kipas', 'bagud', 2, 5, 'Layak Pakai', 1, '2019-01-27 13:11:41', ''),
(7, 'BR007', 'Printer', 'ya', 1, 5, 'Layak Pakai', 1, '2019-01-27 13:34:38', ''),
(9, 'BR008', 'PC', 'intel core i9', 3, 5, 'Layak Pakai', 1, '2019-01-27 13:41:26', ''),
(10, 'BR009', 'Penghapus', 'Penghapus kayu', 4, 98, 'Layak Pakai', 1, '2019-01-28 01:51:30', ''),
(11, 'BR010', 'Test', 'aaaaaaaaaa', 3, 2, 'Tidak Layak Pakai', 1, '2019-03-11 10:29:43', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `kode_pinjam` varchar(10) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `kode_pinjam`, `kode_barang`, `jumlah`, `keterangan`) VALUES
(5, 'PJ001', 'BR003', 5, 'Blablabla'),
(6, 'PJ002', 'BR002', 1, ''),
(7, 'PJ003', 'BR002', 1, ''),
(8, 'PJ004', 'BR002', 2, ''),
(9, 'PJ005', 'BR002', 1, ''),
(11, 'PJ006', 'BR002', 3, 'a'),
(12, 'PJ007', 'BR002', 2, ''),
(13, 'PJ008', 'BR002', 2, '1'),
(14, 'PJ009', 'BR002', 1, 'a'),
(23, 'PJ010', 'BR002', 1, 'Test'),
(24, 'PJ011', 'BR002', 1, 'maen ML'),
(26, 'PJ013', 'BR002', 1, 'dgdfgfg'),
(27, 'PJ014', 'BR007', 3, 'hhhhhh'),
(28, 'PJ015', 'BR005', 9, 'fggfj'),
(30, 'PJ017', 'BR009', 2, 'fhggfh'),
(31, 'PJ018', 'BR002', 1, 'f'),
(32, 'PJ019', 'BR002', 1, 'f'),
(33, 'PJ020', 'BR007', 1, ''),
(34, 'PJ021', 'BR009', 1, ''),
(35, 'PJ022', 'BR003', 1, 'dv'),
(36, 'PJ023', 'BR007', 2, 'saaaaaaa'),
(37, 'PJ024', 'BR002', 10, ''),
(38, 'PJ025', 'BR005', 1, ''),
(39, 'PJ026', 'BR007', 1, ''),
(41, 'PJ028', 'BR005', 7, 'ASHIAP'),
(42, 'PJ029', 'BR010', 11, ''),
(43, 'PJ030', 'BR009', 1, ''),
(44, 'PJ031', 'BR009', 1, ''),
(45, 'PJ032', 'BR008', 1, ''),
(46, 'PJ033', 'BR002', 1, ''),
(47, 'PJ034', 'BR002', 1, ''),
(48, 'PJ035', 'BR010', 1, ''),
(49, 'PJ036', 'BR010', 1, ''),
(50, 'PJ037', 'BR010', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `kode_jenis` varchar(8) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
(1, 'Elektronik', 'JN001', 'Barang Elektronik'),
(2, 'ATK', 'JN002', 'Alat Tulis Kantor');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `password` text NOT NULL,
  `ungenerate_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `alamat`, `password`, `ungenerate_pass`) VALUES
(1, 'Rendi', '1234567890', 'Jl. in aja', '36fa6d5aa0d579b2d2ff1e2deed0d9bf', 'renrendi'),
(2, 'Fadly', '690169', 'Jl.Janda', 'ac87c9eefb01eaf6842b6bfca09f7990', 'fadlyjon');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ungeneratepass` varchar(100) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `ungeneratepass`, `nama_petugas`, `id_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Administrator', 1),
(2, 'operator', '4b583376b2767b923c3e1da60d10de59', 'operator', 'Operator', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `kode_pinjam` varchar(8) NOT NULL,
  `tgl_pinjam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kode_barang` varchar(5) NOT NULL,
  `peminjam` varchar(20) NOT NULL,
  `tgl_kembali` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`kode_pinjam`, `tgl_pinjam`, `kode_barang`, `peminjam`, `tgl_kembali`) VALUES
('PJ001', '2019-01-24 17:00:00', 'BR003', '1234567890', '2019-01-26 17:00:00'),
('PJ002', '2019-01-24 17:00:00', 'BR002', '1234567890', '2019-01-27 17:00:00'),
('PJ003', '2019-01-24 17:00:00', 'BR002', '1234567890', '2019-01-27 17:00:00'),
('PJ004', '2019-01-24 17:00:00', 'BR002', '1234567890', '2019-01-27 17:00:00'),
('PJ005', '2019-01-24 17:00:00', 'BR002', '1234567890', '2019-01-27 17:00:00'),
('PJ006', '2019-01-26 17:00:00', 'BR002', '1234567890', '2019-01-26 17:00:00'),
('PJ007', '2019-01-26 17:00:00', 'BR002', '1234567890', '2019-01-26 17:00:00'),
('PJ008', '2019-01-26 17:00:00', 'BR002', '1234567890', '2019-01-26 17:00:00'),
('PJ009', '2019-01-26 17:00:00', 'BR002', '1234567890', '2019-01-26 17:00:00'),
('PJ010', '2019-01-27 17:00:00', 'BR002', '1234567890', '2019-01-27 17:00:00'),
('PJ011', '2019-01-27 17:00:00', 'BR002', '1234567890', '2019-01-27 17:00:00'),
('PJ013', '2019-01-27 17:00:00', 'BR002', '1234567890', '2019-01-27 17:00:00'),
('PJ014', '2019-01-27 17:00:00', 'BR007', '1234567890', '2019-01-27 17:00:00'),
('PJ015', '2019-01-27 17:00:00', 'BR005', '1234567890', '2019-01-27 17:00:00'),
('PJ017', '2019-01-27 17:00:00', 'BR009', '1234567890', '2019-01-27 17:00:00'),
('PJ018', '2019-01-27 17:00:00', 'BR002', '1234567890', '2019-01-27 17:00:00'),
('PJ019', '2019-01-27 17:00:00', 'BR002', '1234567890', '2019-01-27 17:00:00'),
('PJ020', '2019-01-27 17:00:00', 'BR007', '1234567890', '2019-01-27 17:00:00'),
('PJ021', '2019-01-27 17:00:00', 'BR009', '1234567890', '2019-01-27 17:00:00'),
('PJ022', '2019-01-27 17:00:00', 'BR003', '1234567890', NULL),
('PJ023', '2019-02-01 17:00:00', 'BR007', '1234567890', NULL),
('PJ024', '2019-02-01 17:00:00', 'BR002', '690169', NULL),
('PJ025', '2019-02-03 17:00:00', 'BR005', '1234567890', NULL),
('PJ026', '2019-02-03 17:00:00', 'BR007', '1234567890', NULL),
('PJ028', '2019-03-20 21:05:27', 'BR005', '1234567890', NULL),
('PJ029', '2019-03-20 21:07:08', 'BR010', '1234567890', NULL),
('PJ030', '2019-03-20 21:07:33', 'BR009', '1234567890', NULL),
('PJ031', '2019-03-20 21:07:44', 'BR009', '1234567890', NULL),
('PJ032', '2019-03-20 21:14:02', 'BR008', '1234567890', NULL),
('PJ033', '2019-03-20 21:15:31', 'BR002', '1234567890', NULL),
('PJ034', '2019-03-20 21:16:56', 'BR002', '1234567890', NULL),
('PJ035', '2019-03-20 21:18:19', 'BR010', '1234567890', NULL),
('PJ036', '2019-03-20 21:18:48', 'BR010', '1234567890', NULL),
('PJ037', '2019-03-20 21:22:52', 'BR010', '1234567890', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `kode_ruang` varchar(11) NOT NULL,
  `nama_ruang` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `kode_ruang`, `nama_ruang`, `keterangan`) VALUES
(1, 'RG001', 'Kesenian 1', 'Kesenian 1'),
(2, 'RG002', 'Kesenian 2', 'Kesenian 2'),
(3, 'RG003', 'Lab Bahasa', 'Untuk Pelajaran Bahasa Inggris'),
(4, 'RG004', 'Lab TIK', 'Untuk Pelajaran TIK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `ruang` (`ruang`),
  ADD KEY `jenis_barang` (`jenis_barang`);

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD UNIQUE KEY `kode_pinjam` (`kode_pinjam`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `KodeBarang` (`kode_barang`),
  ADD KEY `peminjam` (`peminjam`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`ruang`) REFERENCES `ruang` (`id_ruang`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_barang`) REFERENCES `jenis` (`id_jenis`);

--
-- Constraints for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `detail_pinjam_ibfk_1` FOREIGN KEY (`kode_pinjam`) REFERENCES `pinjam_barang` (`kode_pinjam`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);

--
-- Constraints for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD CONSTRAINT `pinjam_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
