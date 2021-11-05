-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 03:36 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_e_reporting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_tani`
--

CREATE TABLE `kelompok_tani` (
  `id` int(100) NOT NULL,
  `no_sk_poktan` varchar(100) NOT NULL,
  `nama_poktan` varchar(100) NOT NULL,
  `tanggal_berdiri` date NOT NULL,
  `jumlah_anggota` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok_tani`
--

INSERT INTO `kelompok_tani` (`id`, `no_sk_poktan`, `nama_poktan`, `tanggal_berdiri`, `jumlah_anggota`, `status`) VALUES
(2, '12345', 'Suka Tanam', '2020-07-12', 10, 'Aktif'),
(3, '123', 'Suka Maju', '2020-08-29', 10, 'Aktif'),
(5, '0394817387', 'Gemar Tanam', '2017-09-02', 12, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `lahan`
--

CREATE TABLE `lahan` (
  `id` int(100) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `luas` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL DEFAULT 'Hektar'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lahan`
--

INSERT INTO `lahan` (`id`, `nama_pemilik`, `luas`, `satuan`) VALUES
(4, 'Berto ', '0,7', 'M\"'),
(6, 'Tina', '0,8', 'Hektar'),
(7, 'Andre', '0,4', 'Hektar'),
(8, 'Aenggi', '0,2', 'Hektar'),
(9, 'Xkkxnxjxjx', '588', 'Are'),
(10, 'Anton', '120', 'M\"');

-- --------------------------------------------------------

--
-- Table structure for table `penanaman`
--

CREATE TABLE `penanaman` (
  `id` int(100) NOT NULL,
  `id_kelompok_tani` int(100) DEFAULT NULL,
  `id_lahan` int(100) NOT NULL,
  `jenis_tanaman` varchar(100) NOT NULL,
  `nama_tanaman` varchar(100) NOT NULL,
  `tgl_tanam` date NOT NULL,
  `perkiraan_tgl_panen` date NOT NULL,
  `jumlah_tanam` varchar(100) NOT NULL,
  `jumlah_panen` varchar(100) NOT NULL,
  `status_penanaman` varchar(10) NOT NULL,
  `realisasi_panen` varchar(10) NOT NULL,
  `kebutuhan` varchar(255) NOT NULL,
  `estimasi_biaya` varchar(255) NOT NULL,
  `realisasi_kebutuhan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png',
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penanaman`
--

INSERT INTO `penanaman` (`id`, `id_kelompok_tani`, `id_lahan`, `jenis_tanaman`, `nama_tanaman`, `tgl_tanam`, `perkiraan_tgl_panen`, `jumlah_tanam`, `jumlah_panen`, `status_penanaman`, `realisasi_panen`, `kebutuhan`, `estimasi_biaya`, `realisasi_kebutuhan`, `foto`, `lokasi`) VALUES
(26, 2, 4, 'Buah', 'Pepaya', '2020-09-30', '2021-01-20', '1000 Kg', '', 'Proses', '', 'Beniih Pepaya,\r\nPupuk, \r\nkskd', '600000', '', 'default.png', '-10.1471821,123.6663498'),
(27, 5, 6, 'Pangan', 'Padi', '2020-07-06', '2020-09-17', '2000 Gr', '', 'Proses', '', 'Benih Padi \r\nPupuk\r\nMakan', '1000000', '', 'default.png', '-10.1902878,123.6065603'),
(28, 2, 4, 'Tanaman Umbi-umbian', 'Wortel', '2020-08-10', '2020-09-26', '200 Kg', '', 'Proses', '', 'Obat Hama', '2000000', '', 'IMG_20200627_174726.jpg', '0,0'),
(29, 5, 7, 'Tanaman Sayuran', 'Kangkung', '2020-09-15', '2020-12-26', '120 Kg', '', 'Proses', '', 'Heueh', '1200000', '', 'IMG_20200914_132904.jpg', '-10.1822156,123.668447');

-- --------------------------------------------------------

--
-- Table structure for table `penyuluh`
--

CREATE TABLE `penyuluh` (
  `id` int(100) NOT NULL,
  `nama_penyuluh` varchar(100) NOT NULL,
  `golongan` varchar(5) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `lainya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyuluh`
--

INSERT INTO `penyuluh` (`id`, `nama_penyuluh`, `golongan`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `keterangan`, `status`, `alasan`, `lainya`) VALUES
(3, 'johana benny', 'III C', 'Sumba Timur', '1998-01-16', 'Wanita', 'Kristen', 'PNS', 'Aktif', 'Meninggal Dunia', ''),
(11, 'Bry J', 'II A', 'Ende', '1998-10-26', 'Pria', 'Katolik', 'PNS', 'Tidak Aktif', 'Pensiunan', ''),
(12, 'Sendry Tefa', 'III B', 'Kupang', '1998-09-25', 'Pria', 'Kristen', 'Penyuluh Swadaya', 'Aktif', '', '-'),
(13, 'Bonavenetura', 'III A', 'Ende', '2020-08-10', 'Pria', 'Katolik', 'PNS', 'Aktif', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `golongan` varchar(11) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `golongan`, `tempat_lahir`, `tgl_lahir`, `agama`, `jenis_kelamin`, `password`) VALUES
(1, 'Andri', 'III A', 'Ende', '1998-09-30', 'Kristen', 'Pria', '1234'),
(2, 'Dimas', 'IV A', 'Kupang', '2020-09-15', 'Katolik', 'Pria', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_tani`
--
ALTER TABLE `kelompok_tani`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_sk_poktan` (`no_sk_poktan`);

--
-- Indexes for table `lahan`
--
ALTER TABLE `lahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penanaman`
--
ALTER TABLE `penanaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelompok_tani` (`id_kelompok_tani`),
  ADD KEY `id_lahan` (`id_lahan`);

--
-- Indexes for table `penyuluh`
--
ALTER TABLE `penyuluh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelompok_tani`
--
ALTER TABLE `kelompok_tani`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lahan`
--
ALTER TABLE `lahan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penanaman`
--
ALTER TABLE `penanaman`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `penyuluh`
--
ALTER TABLE `penyuluh`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penanaman`
--
ALTER TABLE `penanaman`
  ADD CONSTRAINT `penanaman_ibfk_1` FOREIGN KEY (`id_lahan`) REFERENCES `lahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penanaman_ibfk_2` FOREIGN KEY (`id_kelompok_tani`) REFERENCES `kelompok_tani` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
