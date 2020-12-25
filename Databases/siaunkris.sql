-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2019 at 04:08 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siaunkris`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dosen`
--

CREATE TABLE `data_dosen` (
  `nip` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email_dosen` varchar(50) NOT NULL,
  `no_telp` int(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `status_dosen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_dosen`
--

INSERT INTO `data_dosen` (`nip`, `nama`, `email_dosen`, `no_telp`, `gender`, `prodi`, `status_dosen`) VALUES
('12345677', 'Yanto', 'example@email.com', 8777, 'Laki-laki', 'KP-TIF', 'Aktif'),
('275875664', 'Arif', 'example@email.com', 812555788, 'Pria', 'KP-TP', 'Aktif'),
('275875665', 'Jono Sumito', 'example@email.com', 81265654, 'Pria', 'KP-TIF', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `nim` int(50) NOT NULL,
  `nama` char(50) NOT NULL,
  `email_mahasiswa` varchar(50) NOT NULL,
  `no_telp` int(50) NOT NULL,
  `prodi_mahasiswa` varchar(255) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `status_mahasiswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nim`, `nama`, `email_mahasiswa`, `no_telp`, `prodi_mahasiswa`, `shift`, `status_mahasiswa`) VALUES
(5555, 'Nani', 'example@gmail.com', 8777, 'KP-TS', 'Reguler', 'Aktif'),
(5638, 'Joko Minto', 'example@gmail.com', 8888, 'KP-TE', 'Reguler', 'Aktif'),
(7896, 'Yaya', 'example@gmail.com', 8777, 'KP-TP', 'Reguler', 'Aktif'),
(23456, 'Arah langkah', 'example@gmail.com', 899, 'KP-TM', 'Reguler', 'Aktif'),
(67890, 'Ari', 'example@gmail.com', 8888, 'KP-TI', 'Reguler', 'Aktif'),
(123456, 'Yanto', 'example@gmail.com', 8888, 'KP-TIF', 'Reguler', 'Non Active'),
(1770231015, 'Jono embrem', 'example@gmail.com', 8777, 'KP-TA', 'Reguler', 'Aktif'),
(1770231019, 'M Syamsul Arif', 'example@gmail.com', 76665547, 'KP-TIF', 'Reguler', 'Aktif'),
(1770231020, 'Rommy Andiansyah', 'example@gmail.com', 667546545, 'KP-TIF', 'Reguler', 'Aktif'),
(1770231050, 'willy Adinata Saragih', 'example@gmail.com', 628165744, 'KP-TIF', 'Reguler', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `data_prodi`
--

CREATE TABLE `data_prodi` (
  `kode` varchar(255) NOT NULL,
  `no_ijin` varchar(100) NOT NULL,
  `nama_prodi` char(255) NOT NULL,
  `ketua_prodi` char(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_prodi`
--

INSERT INTO `data_prodi` (`kode`, `no_ijin`, `nama_prodi`, `ketua_prodi`, `email`, `status`) VALUES
('KP-TA', 'NO.PE/03/05/2015', 'Arsitek', 'Tatang', 'example@email.com', 'Aktif'),
('KP-TE', 'NO.PE/03/05/2016', 'Elektro', 'Sugiono', 'example@email.com', 'Aktif'),
('KP-TI', 'NO.PE/05/07/2018', 'Industri', 'Jono', 'example@email.com', 'Aktif'),
('KP-TIF', 'NO.PE/27/07/2003', 'Informatika', 'Surmanto Sitio', 'informatika@unkris.ac.id', 'Aktif'),
('KP-TM', 'NO.PE/02/01/2018', 'Mesin', 'Mawar', 'example@email.com', 'Aktif'),
('KP-TP', 'NO.PE/25/12/2014', 'Perencanaan Wilayah & Kota', 'Jajang', 'example@email.com', 'Aktif'),
('KP-TS', 'NO.PE/30/01/2017', 'Sipil', 'Martono', 'example@email.com', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kode_matkul_jadwal` varchar(255) NOT NULL,
  `nip_jadwal` varchar(255) NOT NULL,
  `kode_ruangan_jadwal` varchar(255) NOT NULL,
  `kode_prodi` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kode_matkul_jadwal`, `nip_jadwal`, `kode_ruangan_jadwal`, `kode_prodi`, `hari`, `jam`) VALUES
(29, 'MK005', '275875664', 'R001', 'KP-TP', 'Sabtu', '12.30 - 12.40'),
(30, 'MK002', '12345677', 'R003', 'KP-TIF', 'Kamis', '12.30 - 12.40'),
(32, 'MK006', '275875665', 'R001', 'KP-TA', 'Senin', '12.30  - 12.41');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id_jadwal_ujian` int(12) NOT NULL,
  `kode_matkul_ujian` varchar(12) NOT NULL,
  `nip_ujian` varchar(255) NOT NULL,
  `kode_ruangan_ujian` varchar(255) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `jam_ujian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id_jadwal_ujian`, `kode_matkul_ujian`, `nip_ujian`, `kode_ruangan_ujian`, `tanggal_ujian`, `jam_ujian`) VALUES
(17, 'MK002', '12345677', 'R001', '2019-01-28', '10.00 - 12.00'),
(18, 'MK005', '275875664', 'R002', '2019-01-29', '10.00-11.00'),
(19, 'MK006', '275875665', 'R003', '2019-01-30', '10.00-12.00');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id` int(11) NOT NULL,
  `kode_matkul_krs` varchar(255) NOT NULL,
  `nim_krs` varchar(100) NOT NULL,
  `nama_krs` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode_matkul` varchar(255) NOT NULL,
  `nama_matkul` char(255) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode_matkul`, `nama_matkul`, `sks`) VALUES
('MK001', 'Sistem Basis Data', 3),
('MK002', 'Bahasa Inggris', 2),
('MK003', 'Pemrograman WEB', 4),
('MK004', 'Aljabar & Linear', 3),
('MK005', 'Komputer Grafik', 3),
('MK006', 'Matematika Diskrit', 4),
('MK007', 'Bahasa Indonesia', 2),
('MK008', 'Sistem Operasi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nim_nilai` varchar(255) NOT NULL,
  `kode_matkul_nilai` varchar(255) NOT NULL,
  `uts` int(12) DEFAULT NULL,
  `uas` int(12) DEFAULT NULL,
  `tugas` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kode_ruangan` varchar(255) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kode_ruangan`, `nama_ruangan`) VALUES
('R001', 'Ruangan 302'),
('R002', 'Ruangan 203'),
('R003', 'Ruangan 306');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nip_user` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(12) NOT NULL COMMENT '1=Admin, 2=Prodi, 3=Dosen, 4=Mahasiswa',
  `prodi_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nip_user`, `nama_user`, `username`, `password`, `level`, `prodi_user`) VALUES
(27, '1', 'Administrator', 'admin', 'admin', 1, 'KP-TIF'),
(28, '1770231019', 'M Syamsul Arif', '1770231019', 'mahasiswa', 4, 'KP-TIF'),
(29, '12345677', 'Yanto', 'dosen', 'dosen', 3, 'KP-TIF'),
(30, 'KP-TIF', 'Prodi Informatika', 'prodi_informatika', 'prodi', 2, 'KP-TIF'),
(31, '275875664', 'Arif', 'syamsul', 'syamsul', 3, 'KP-TP'),
(44, '1770231020', 'Romi', '1770231020', 'mahasiswa', 4, 'KP-TIF');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `kode_user` int(12) NOT NULL,
  `nama_usergroup` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`kode_user`, `nama_usergroup`) VALUES
(1, 'Admin'),
(2, 'Prodi'),
(3, 'Dosen'),
(4, 'Mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `data_prodi`
--
ALTER TABLE `data_prodi`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `FK_jadwal_dosen` (`nip_jadwal`),
  ADD KEY `FK_jadwal_ruangan` (`kode_ruangan_jadwal`),
  ADD KEY `FK_jadwal_matakuliah` (`kode_matkul_jadwal`),
  ADD KEY `FK_jadwal_jurusan` (`kode_prodi`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal_ujian`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `nip_user` (`nip_user`),
  ADD KEY `nama_user` (`nama_user`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`),
  ADD KEY `kode_prodi_user` (`prodi_user`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id_jadwal_ujian` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `kode_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_jadwal_dosen` FOREIGN KEY (`nip_jadwal`) REFERENCES `data_dosen` (`nip`),
  ADD CONSTRAINT `FK_jadwal_jurusan` FOREIGN KEY (`kode_prodi`) REFERENCES `data_prodi` (`kode`),
  ADD CONSTRAINT `FK_jadwal_matakuliah` FOREIGN KEY (`kode_matkul_jadwal`) REFERENCES `mata_kuliah` (`kode_matkul`),
  ADD CONSTRAINT `FK_jadwal_ruangan` FOREIGN KEY (`kode_ruangan_jadwal`) REFERENCES `ruangan` (`kode_ruangan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
