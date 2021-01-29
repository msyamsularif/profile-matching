-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 07:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profile-matching`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nis` int(12) NOT NULL,
  `nama_siswa` char(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `tahun_angkatan` int(4) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nilai_pengetahuan_agama_siswa` int(12) NOT NULL,
  `nilai_pengetahuan_pkn_siswa` int(12) NOT NULL,
  `nilai_pengetahuan_bindo_siswa` int(12) NOT NULL,
  `nilai_pengetahuan_ipa_siswa` int(12) NOT NULL,
  `nilai_pengetahuan_pjok_siswa` int(12) NOT NULL,
  `nilai_keterampilan_agama_siswa` int(12) NOT NULL,
  `nilai_keterampilan_pkn_siswa` int(12) NOT NULL,
  `nilai_keterampilan_bindo_siswa` int(12) NOT NULL,
  `nilai_keterampilan_ipa_siswa` int(12) NOT NULL,
  `nilai_keterampilan_pjok_siswa` int(12) NOT NULL,
  `nilai_karakter_siswa` int(12) NOT NULL,
  `nilai_eskul_siswa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`nis`, `nama_siswa`, `kelas`, `tahun_angkatan`, `alamat`, `nilai_pengetahuan_agama_siswa`, `nilai_pengetahuan_pkn_siswa`, `nilai_pengetahuan_bindo_siswa`, `nilai_pengetahuan_ipa_siswa`, `nilai_pengetahuan_pjok_siswa`, `nilai_keterampilan_agama_siswa`, `nilai_keterampilan_pkn_siswa`, `nilai_keterampilan_bindo_siswa`, `nilai_keterampilan_ipa_siswa`, `nilai_keterampilan_pjok_siswa`, `nilai_karakter_siswa`, `nilai_eskul_siswa`) VALUES
(12345, 'n1', '1', 2017, 'Bekasi', 90, 100, 70, 65, 45, 80, 85, 88, 90, 95, 4, 3),
(13578, 'n3', '1', 2017, 'Bekasi', 80, 60, 65, 70, 75, 78, 98, 50, 55, 68, 2, 4),
(24680, 'n4', '2', 2016, 'Bekasi', 80, 65, 60, 66, 78, 62, 66, 80, 96, 80, 2, 2),
(47123, 'n8', '2', 2016, 'Bekasi', 88, 76, 80, 95, 68, 78, 90, 95, 92, 78, 4, 4),
(47248, 'n5', '3', 2015, 'Bekasi', 76, 75, 70, 80, 90, 100, 99, 87, 60, 60, 3, 3),
(65478, 'n10', '3', 2015, 'Bekasi', 98, 76, 79, 80, 60, 66, 90, 80, 86, 78, 2, 2),
(65809, 'n7', '4', 2014, 'Bekasi', 70, 78, 60, 66, 65, 79, 90, 100, 70, 80, 3, 3),
(67890, 'n2', '5', 2013, 'Bekasi', 80, 86, 87, 85, 90, 100, 88, 70, 92, 90, 2, 2),
(76390, 'n9', '6', 2012, 'Bekasi', 90, 99, 70, 80, 90, 100, 70, 80, 90, 80, 3, 4),
(82903, 'n6', '6', 2012, 'Bekasi', 70, 80, 90, 95, 70, 88, 95, 92, 60, 80, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `eskul`
--

CREATE TABLE `eskul` (
  `bobot_eskul` int(12) NOT NULL,
  `range_penilaian_eskul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eskul`
--

INSERT INTO `eskul` (`bobot_eskul`, `range_penilaian_eskul`) VALUES
(1, 'Perlu Bimbingan'),
(2, 'Cukup'),
(3, 'Baik'),
(4, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kriteria`
--

CREATE TABLE `jenis_kriteria` (
  `id_kriteria` int(12) NOT NULL,
  `nama_kriteria` char(50) NOT NULL,
  `nilai_kriteria` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kriteria`
--

INSERT INTO `jenis_kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_kriteria`) VALUES
(1, 'Core Factor (CF)', 60),
(2, 'Secondary Factor (SF)', 40);

-- --------------------------------------------------------

--
-- Table structure for table `karakter`
--

CREATE TABLE `karakter` (
  `bobot_karakter` int(12) NOT NULL,
  `range_penilaian_karakter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karakter`
--

INSERT INTO `karakter` (`bobot_karakter`, `range_penilaian_karakter`) VALUES
(1, 'Perlu Bimbingan'),
(2, 'Cukup'),
(3, 'Baik'),
(4, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_penilaian`
--

CREATE TABLE `kategori_penilaian` (
  `id_kategori` int(12) NOT NULL,
  `nama_kategori` char(50) NOT NULL,
  `id_kriteria_kategori` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_penilaian`
--

INSERT INTO `kategori_penilaian` (`id_kategori`, `nama_kategori`, `id_kriteria_kategori`) VALUES
(16, 'Pengetahuan', 1),
(17, 'Keterampilan', 2),
(18, 'Karakter', 1),
(19, 'Eskul', 2);

-- --------------------------------------------------------

--
-- Table structure for table `keterampilan`
--

CREATE TABLE `keterampilan` (
  `bobot_keterampilan` int(12) NOT NULL,
  `range_penilaian_keterampilan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keterampilan`
--

INSERT INTO `keterampilan` (`bobot_keterampilan`, `range_penilaian_keterampilan`) VALUES
(1, 'Dibawah 30'),
(2, 'Antara 30 - 74'),
(3, 'Antara 75 - 79'),
(4, 'Antara 80 - 89'),
(5, 'Antara 90 - 100');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_standar`
--

CREATE TABLE `nilai_standar` (
  `id_nilai_standar` int(12) NOT NULL,
  `nilai_standar_pengetahuan` int(12) NOT NULL,
  `nilai_standar_keterampilan` int(12) NOT NULL,
  `nilai_standar_karakter` int(12) NOT NULL,
  `nilai_standar_eskul` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_standar`
--

INSERT INTO `nilai_standar` (`id_nilai_standar`, `nilai_standar_pengetahuan`, `nilai_standar_keterampilan`, `nilai_standar_karakter`, `nilai_standar_eskul`) VALUES
(1, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `bobot_pengetahuan` int(12) NOT NULL,
  `range_penilaian_pengetahuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengetahuan`
--

INSERT INTO `pengetahuan` (`bobot_pengetahuan`, `range_penilaian_pengetahuan`) VALUES
(1, 'Dibawah 30'),
(2, 'Antara 30 - 74'),
(3, 'Antara 75 - 79'),
(4, 'Antara 80 - 89'),
(5, 'Antara 90 - 100');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(12) NOT NULL,
  `nip_user` int(12) NOT NULL,
  `nama_user` char(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(12) NOT NULL,
  `jabatan_user` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nip_user`, `nama_user`, `username`, `password`, `level`, `jabatan_user`) VALUES
(1, 123, 'Admin', 'admin', 'admin', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `kode_user` int(12) NOT NULL,
  `nama_usergroup` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`kode_user`, `nama_usergroup`) VALUES
(1, 'Admin'),
(2, 'Guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`bobot_eskul`);

--
-- Indexes for table `jenis_kriteria`
--
ALTER TABLE `jenis_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `karakter`
--
ALTER TABLE `karakter`
  ADD PRIMARY KEY (`bobot_karakter`);

--
-- Indexes for table `kategori_penilaian`
--
ALTER TABLE `kategori_penilaian`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keterampilan`
--
ALTER TABLE `keterampilan`
  ADD PRIMARY KEY (`bobot_keterampilan`);

--
-- Indexes for table `nilai_standar`
--
ALTER TABLE `nilai_standar`
  ADD PRIMARY KEY (`id_nilai_standar`);

--
-- Indexes for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`bobot_pengetahuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `nis` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6789880;

--
-- AUTO_INCREMENT for table `eskul`
--
ALTER TABLE `eskul`
  MODIFY `bobot_eskul` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_kriteria`
--
ALTER TABLE `jenis_kriteria`
  MODIFY `id_kriteria` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `bobot_karakter` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kategori_penilaian`
--
ALTER TABLE `kategori_penilaian`
  MODIFY `id_kategori` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `keterampilan`
--
ALTER TABLE `keterampilan`
  MODIFY `bobot_keterampilan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_standar`
--
ALTER TABLE `nilai_standar`
  MODIFY `id_nilai_standar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `bobot_pengetahuan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `kode_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
