-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2020 at 07:13 PM
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
-- Table structure for table `afektif`
--

CREATE TABLE `afektif` (
  `id_afektif` int(12) NOT NULL,
  `range_penilaian_afektif` varchar(50) NOT NULL,
  `bobot_afektif` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `afektif`
--

INSERT INTO `afektif` (`id_afektif`, `range_penilaian_afektif`, `bobot_afektif`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `NIS` int(12) NOT NULL,
  `nama_siswa` char(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `tahun_angkatan` int(4) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_psikomotor` int(12) NOT NULL,
  `id_kognitif` int(12) NOT NULL,
  `id_afektif` int(12) NOT NULL,
  `id_keterampilan` int(12) NOT NULL,
  `id_eskul` int(12) NOT NULL,
  `id_kejujuran` int(12) NOT NULL,
  `id_kerapihan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eskul`
--

CREATE TABLE `eskul` (
  `id_eskul` int(12) NOT NULL,
  `range_penilaian_eskul` varchar(50) NOT NULL,
  `bobot_eskul` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eskul`
--

INSERT INTO `eskul` (`id_eskul`, `range_penilaian_eskul`, `bobot_eskul`) VALUES
(1, '1', 1);

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
(2, 'Eskul', 2),
(6, 'Afektif', 1),
(7, 'Kejujuran', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kejujuran`
--

CREATE TABLE `kejujuran` (
  `id_kejujuran` int(12) NOT NULL,
  `range_penilaian_kejujuran` varchar(50) NOT NULL,
  `bobot_kejujuran` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kejujuran`
--

INSERT INTO `kejujuran` (`id_kejujuran`, `range_penilaian_kejujuran`, `bobot_kejujuran`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kerapihan`
--

CREATE TABLE `kerapihan` (
  `id_kerapihan` int(12) NOT NULL,
  `range_penilaian_kerapihan` varchar(50) NOT NULL,
  `bobot_kerapihan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerapihan`
--

INSERT INTO `kerapihan` (`id_kerapihan`, `range_penilaian_kerapihan`, `bobot_kerapihan`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ketepatan_jawaban`
--

CREATE TABLE `ketepatan_jawaban` (
  `id_ketepatan` int(12) NOT NULL,
  `range_penilaian_ketepatan` varchar(50) NOT NULL,
  `bobot_ketepatan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ketepatan_jawaban`
--

INSERT INTO `ketepatan_jawaban` (`id_ketepatan`, `range_penilaian_ketepatan`, `bobot_ketepatan`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keterampilan`
--

CREATE TABLE `keterampilan` (
  `id_keterampilan` int(12) NOT NULL,
  `range_penilaian_keterampilan` varchar(50) NOT NULL,
  `bobot_keterampilan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keterampilan`
--

INSERT INTO `keterampilan` (`id_keterampilan`, `range_penilaian_keterampilan`, `bobot_keterampilan`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kognitif`
--

CREATE TABLE `kognitif` (
  `id_kognitif` int(12) NOT NULL,
  `range_penilaian_kognitif` varchar(50) NOT NULL,
  `bobot_kognitif` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kognitif`
--

INSERT INTO `kognitif` (`id_kognitif`, `range_penilaian_kognitif`, `bobot_kognitif`) VALUES
(1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `psikomotor`
--

CREATE TABLE `psikomotor` (
  `id_psikomotor` int(12) NOT NULL,
  `range_penilaian_psikomotor` varchar(50) NOT NULL,
  `bobot_psikomotor` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psikomotor`
--

INSERT INTO `psikomotor` (`id_psikomotor`, `range_penilaian_psikomotor`, `bobot_psikomotor`) VALUES
(1, '1', 1);

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
(1, 123, 'admin', 'admin', 'admin', 1, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afektif`
--
ALTER TABLE `afektif`
  ADD PRIMARY KEY (`id_afektif`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`NIS`);

--
-- Indexes for table `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`id_eskul`);

--
-- Indexes for table `jenis_kriteria`
--
ALTER TABLE `jenis_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kategori_penilaian`
--
ALTER TABLE `kategori_penilaian`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kejujuran`
--
ALTER TABLE `kejujuran`
  ADD PRIMARY KEY (`id_kejujuran`);

--
-- Indexes for table `kerapihan`
--
ALTER TABLE `kerapihan`
  ADD PRIMARY KEY (`id_kerapihan`);

--
-- Indexes for table `ketepatan_jawaban`
--
ALTER TABLE `ketepatan_jawaban`
  ADD PRIMARY KEY (`id_ketepatan`);

--
-- Indexes for table `keterampilan`
--
ALTER TABLE `keterampilan`
  ADD PRIMARY KEY (`id_keterampilan`);

--
-- Indexes for table `kognitif`
--
ALTER TABLE `kognitif`
  ADD PRIMARY KEY (`id_kognitif`);

--
-- Indexes for table `psikomotor`
--
ALTER TABLE `psikomotor`
  ADD PRIMARY KEY (`id_psikomotor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afektif`
--
ALTER TABLE `afektif`
  MODIFY `id_afektif` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `NIS` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eskul`
--
ALTER TABLE `eskul`
  MODIFY `id_eskul` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis_kriteria`
--
ALTER TABLE `jenis_kriteria`
  MODIFY `id_kriteria` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_penilaian`
--
ALTER TABLE `kategori_penilaian`
  MODIFY `id_kategori` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kejujuran`
--
ALTER TABLE `kejujuran`
  MODIFY `id_kejujuran` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kerapihan`
--
ALTER TABLE `kerapihan`
  MODIFY `id_kerapihan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ketepatan_jawaban`
--
ALTER TABLE `ketepatan_jawaban`
  MODIFY `id_ketepatan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keterampilan`
--
ALTER TABLE `keterampilan`
  MODIFY `id_keterampilan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kognitif`
--
ALTER TABLE `kognitif`
  MODIFY `id_kognitif` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `psikomotor`
--
ALTER TABLE `psikomotor`
  MODIFY `id_psikomotor` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
