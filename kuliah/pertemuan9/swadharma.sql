-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 02:03 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swadharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `kode_dosen` varchar(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `kode_dosen`, `nama_dosen`) VALUES
(1, 'AB123', 'Yadi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lkp`
--

CREATE TABLE `tb_lkp` (
  `id_lkp` int(11) NOT NULL,
  `id_sidang_kp` int(11) NOT NULL,
  `judul` mediumtext NOT NULL,
  `tahun_lkp` varchar(6) NOT NULL,
  `jml_eksemplar` varchar(6) NOT NULL,
  `jml_cd` varchar(6) NOT NULL,
  `tgl_penyerahan` date NOT NULL,
  `user` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lkp`
--

INSERT INTO `tb_lkp` (`id_lkp`, `id_sidang_kp`, `judul`, `tahun_lkp`, `jml_eksemplar`, `jml_cd`, `tgl_penyerahan`, `user`, `file`) VALUES
(1, 1, 'ANALISIS PROSES PENGIRIMAN BARANG', '2020', '1', '1', '2020-05-27', 'Diki Romadoni', 'Tanda Terima Laporan Kerja Praktik.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta_kp`
--

CREATE TABLE `tb_peserta_kp` (
  `id_peserta_kp` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `nim` char(8) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `th_masuk` date NOT NULL,
  `gg` enum('Ganjil','Genap') NOT NULL,
  `pembimbing` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peserta_kp`
--

INSERT INTO `tb_peserta_kp` (`id_peserta_kp`, `nama`, `nim`, `nik`, `email`, `prodi`, `telp`, `th_masuk`, `gg`, `pembimbing`) VALUES
(1, 'Diki Romadoni', '16201053', '33270615001970003', 'd@gmail.com', 'Teknik Informatika', '087877567142', '2020-05-27', 'Ganjil', 'Yadi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta_skripsi`
--

CREATE TABLE `tb_peserta_skripsi` (
  `id_peserta_skripsi` int(11) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `nim` char(8) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `th_masuk` date NOT NULL,
  `gg` enum('Ganjil','Genap') NOT NULL,
  `pembimbing1` varchar(50) NOT NULL,
  `pembimbing2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peserta_skripsi`
--

INSERT INTO `tb_peserta_skripsi` (`id_peserta_skripsi`, `nama`, `nim`, `nik`, `email`, `prodi`, `telp`, `th_masuk`, `gg`, `pembimbing1`, `pembimbing2`) VALUES
(1, 'Diki Romadoni', '16201010', '33270615001970003', 'dikaromadhona@gmail.com', 'Teknik Informatika', '087877567142', '2020-05-27', 'Ganjil', 'Yadi', 'Yadi'),
(2, 'Dika Romadona', '16201053', '33270615001970003', 'd@gmail.com', 'Teknik Informatika', '087877567142', '2020-12-31', 'Ganjil', 'Yadi', 'Yadi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sidang_kp`
--

CREATE TABLE `tb_sidang_kp` (
  `id_sidang_kp` int(11) NOT NULL,
  `id_peserta_kp` int(11) NOT NULL,
  `th_sidang_kp` date NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sidang_kp`
--

INSERT INTO `tb_sidang_kp` (`id_sidang_kp`, `id_peserta_kp`, `th_sidang_kp`, `waktu`) VALUES
(1, 1, '2020-05-27', '27/05/2020 06:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sidang_sk`
--

CREATE TABLE `tb_sidang_sk` (
  `id_sidang_sk` int(11) NOT NULL,
  `id_peserta_skripsi` int(11) NOT NULL,
  `th_sidang_sk` date NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sidang_sk`
--

INSERT INTO `tb_sidang_sk` (`id_sidang_sk`, `id_peserta_skripsi`, `th_sidang_sk`, `waktu`) VALUES
(1, 1, '2020-05-27', '27/05/2020 08:03:26'),
(5, 2, '2020-05-29', '28/05/2020 06:48:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_skripsi`
--

CREATE TABLE `tb_skripsi` (
  `id_skripsi` int(11) NOT NULL,
  `id_sidang_sk` int(11) NOT NULL,
  `judul` mediumtext NOT NULL,
  `tahun_skripsi` varchar(6) NOT NULL,
  `jml_eksemplar` varchar(6) NOT NULL,
  `jml_cd` varchar(6) NOT NULL,
  `jml_cd_jurnal` varchar(6) NOT NULL,
  `tgl_penyerahan` date NOT NULL,
  `user` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_skripsi`
--

INSERT INTO `tb_skripsi` (`id_skripsi`, `id_sidang_sk`, `judul`, `tahun_skripsi`, `jml_eksemplar`, `jml_cd`, `jml_cd_jurnal`, `tgl_penyerahan`, `user`, `file`) VALUES
(1, 1, 'ANALISIS PROSES PENGIRIMAN BARANG', '2020', '1', '2', '1', '2020-05-27', 'Diki Romadoni', 'swadharma.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip`, `username`, `password`, `level`, `status`, `foto`) VALUES
(4, 'Dewi Safitri', '1111', '1111', '$2y$10$tDizqz87bb7.3n2sYHcKA.ryEDNVbY7FNnqUmHzNXno4x7hthRU1O', 'admin', 'aktif', '070320201453511042438.jpg'),
(5, 'Diki Romadoni', '16201054', '16201054', '$2y$10$kDsF7Qur6RcsxlkdduHmN.zRvqsj8UY3CN4pAzJU53xnwg6hxEdFe', 'super admin', 'aktif', '29032020072115WhatsApp Image 2019-04-16 at 22.22.18.jpeg'),
(7, 'admin', 'admin', 'admin', '$2y$10$oVulo4G2CGAEpseMJM2kQOcXEITdZONqFJqLUeju7h2AaJFRQMW7K', 'admin', 'aktif', '5e60c9c37a4a8.jpg'),
(10, 'oke', 'oke', '123', '$2y$10$zXIo3CtruhX.p2dfBQhymOwsxESny0lT7yNNF72phVsBVCBOCpvwO', 'admin', 'nonaktif', '5e68c56f4e1eb.jpg'),
(12, 'Tes', '22', '22', '$2y$10$wgv87bR96/l/i2JANnZ7fuS7gvca4UsOnzWeLOaDF.1l30VzUAC96', 'admin', 'aktif', '5ecfa7bd551e9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_lkp`
--
ALTER TABLE `tb_lkp`
  ADD PRIMARY KEY (`id_lkp`),
  ADD KEY `sidangKp` (`id_sidang_kp`);

--
-- Indexes for table `tb_peserta_kp`
--
ALTER TABLE `tb_peserta_kp`
  ADD PRIMARY KEY (`id_peserta_kp`);

--
-- Indexes for table `tb_peserta_skripsi`
--
ALTER TABLE `tb_peserta_skripsi`
  ADD PRIMARY KEY (`id_peserta_skripsi`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_sidang_kp`
--
ALTER TABLE `tb_sidang_kp`
  ADD PRIMARY KEY (`id_sidang_kp`),
  ADD KEY `pesertaKp` (`id_peserta_kp`);

--
-- Indexes for table `tb_sidang_sk`
--
ALTER TABLE `tb_sidang_sk`
  ADD PRIMARY KEY (`id_sidang_sk`),
  ADD KEY `pesertaSk` (`id_peserta_skripsi`);

--
-- Indexes for table `tb_skripsi`
--
ALTER TABLE `tb_skripsi`
  ADD PRIMARY KEY (`id_skripsi`),
  ADD KEY `sidangSk` (`id_sidang_sk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_lkp`
--
ALTER TABLE `tb_lkp`
  MODIFY `id_lkp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_peserta_kp`
--
ALTER TABLE `tb_peserta_kp`
  MODIFY `id_peserta_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_peserta_skripsi`
--
ALTER TABLE `tb_peserta_skripsi`
  MODIFY `id_peserta_skripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sidang_kp`
--
ALTER TABLE `tb_sidang_kp`
  MODIFY `id_sidang_kp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_sidang_sk`
--
ALTER TABLE `tb_sidang_sk`
  MODIFY `id_sidang_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_skripsi`
--
ALTER TABLE `tb_skripsi`
  MODIFY `id_skripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_lkp`
--
ALTER TABLE `tb_lkp`
  ADD CONSTRAINT `sidangKp` FOREIGN KEY (`id_sidang_kp`) REFERENCES `tb_sidang_kp` (`id_sidang_kp`);

--
-- Constraints for table `tb_sidang_kp`
--
ALTER TABLE `tb_sidang_kp`
  ADD CONSTRAINT `pesertaKp` FOREIGN KEY (`id_peserta_kp`) REFERENCES `tb_peserta_kp` (`id_peserta_kp`);

--
-- Constraints for table `tb_sidang_sk`
--
ALTER TABLE `tb_sidang_sk`
  ADD CONSTRAINT `pesertaSk` FOREIGN KEY (`id_peserta_skripsi`) REFERENCES `tb_peserta_skripsi` (`id_peserta_skripsi`);

--
-- Constraints for table `tb_skripsi`
--
ALTER TABLE `tb_skripsi`
  ADD CONSTRAINT `sidangSk` FOREIGN KEY (`id_sidang_sk`) REFERENCES `tb_sidang_sk` (`id_sidang_sk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
