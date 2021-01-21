-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2021 pada 16.20
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

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
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nis` int(12) NOT NULL,
  `nama_siswa` char(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `tahun_angkatan` int(4) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nilai_pengetahuan_siswa` int(12) NOT NULL,
  `nilai_keterampilan_siswa` int(12) NOT NULL,
  `nilai_karakter_siswa` int(12) NOT NULL,
  `nilai_eskul_siswa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`nis`, `nama_siswa`, `kelas`, `tahun_angkatan`, `alamat`, `nilai_pengetahuan_siswa`, `nilai_keterampilan_siswa`, `nilai_karakter_siswa`, `nilai_eskul_siswa`) VALUES
(12345, 'n1', '1', 2017, 'Bekasi', 2, 2, 4, 3),
(13578, 'n3', '1', 2017, 'Bekasi', 3, 3, 2, 4),
(24680, 'n4', '2', 2016, 'Bekasi', 4, 3, 2, 2),
(47123, 'n8', '2', 2016, 'Bekasi', 4, 5, 4, 4),
(47248, 'n5', '3', 2015, 'Bekasi', 2, 4, 3, 3),
(65478, 'n10', '3', 2015, 'Bekasi', 3, 2, 2, 2),
(65809, 'n7', '4', 2014, 'Bekasi', 5, 4, 3, 3),
(67890, 'n2', '5', 2013, 'Bekasi', 3, 2, 2, 2),
(76390, 'n9', '6', 2012, 'Bekasi', 4, 3, 3, 4),
(82903, 'n6', '6', 2012, 'Bekasi', 5, 4, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskul`
--

CREATE TABLE `eskul` (
  `bobot_eskul` int(12) NOT NULL,
  `range_penilaian_eskul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `eskul`
--

INSERT INTO `eskul` (`bobot_eskul`, `range_penilaian_eskul`) VALUES
(1, 'Perlu Bimbingan'),
(2, 'Cukup'),
(3, 'Baik'),
(4, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kriteria`
--

CREATE TABLE `jenis_kriteria` (
  `id_kriteria` int(12) NOT NULL,
  `nama_kriteria` char(50) NOT NULL,
  `nilai_kriteria` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kriteria`
--

INSERT INTO `jenis_kriteria` (`id_kriteria`, `nama_kriteria`, `nilai_kriteria`) VALUES
(1, 'Core Factor (CF)', 60),
(2, 'Secondary Factor (SF)', 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karakter`
--

CREATE TABLE `karakter` (
  `bobot_karakter` int(12) NOT NULL,
  `range_penilaian_karakter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karakter`
--

INSERT INTO `karakter` (`bobot_karakter`, `range_penilaian_karakter`) VALUES
(1, 'Perlu Bimbingan'),
(2, 'Cukup'),
(3, 'Baik'),
(4, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_penilaian`
--

CREATE TABLE `kategori_penilaian` (
  `id_kategori` int(12) NOT NULL,
  `nama_kategori` char(50) NOT NULL,
  `id_kriteria_kategori` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_penilaian`
--

INSERT INTO `kategori_penilaian` (`id_kategori`, `nama_kategori`, `id_kriteria_kategori`) VALUES
(16, 'Pengetahuan', 1),
(17, 'Keterampilan', 2),
(18, 'Karakter', 1),
(19, 'Eskul', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterampilan`
--

CREATE TABLE `keterampilan` (
  `bobot_keterampilan` int(12) NOT NULL,
  `range_penilaian_keterampilan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keterampilan`
--

INSERT INTO `keterampilan` (`bobot_keterampilan`, `range_penilaian_keterampilan`) VALUES
(1, 'Dibawah 30'),
(2, 'Antara 30 - 74'),
(3, 'Antara 75 - 79'),
(4, 'Antara 80 - 89'),
(5, 'Antara 90 - 100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_standar`
--

CREATE TABLE `nilai_standar` (
  `id_nilai_standar` int(12) NOT NULL,
  `nilai_standar_pengetahuan` int(12) NOT NULL,
  `nilai_standar_keterampilan` int(12) NOT NULL,
  `nilai_standar_karakter` int(12) NOT NULL,
  `nilai_standar_eskul` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_standar`
--

INSERT INTO `nilai_standar` (`id_nilai_standar`, `nilai_standar_pengetahuan`, `nilai_standar_keterampilan`, `nilai_standar_karakter`, `nilai_standar_eskul`) VALUES
(1, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `bobot_pengetahuan` int(12) NOT NULL,
  `range_penilaian_pengetahuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`bobot_pengetahuan`, `range_penilaian_pengetahuan`) VALUES
(1, 'Dibawah 30'),
(2, 'Antara 30 - 74'),
(3, 'Antara 75 - 79'),
(4, 'Antara 80 - 89'),
(5, 'Antara 90 - 100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nip_user`, `nama_user`, `username`, `password`, `level`, `jabatan_user`) VALUES
(1, 123, 'Admin', 'admin', 'admin', 1, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `kode_user` int(12) NOT NULL,
  `nama_usergroup` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`kode_user`, `nama_usergroup`) VALUES
(1, 'Admin'),
(2, 'Guru');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`bobot_eskul`);

--
-- Indeks untuk tabel `jenis_kriteria`
--
ALTER TABLE `jenis_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `karakter`
--
ALTER TABLE `karakter`
  ADD PRIMARY KEY (`bobot_karakter`);

--
-- Indeks untuk tabel `kategori_penilaian`
--
ALTER TABLE `kategori_penilaian`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keterampilan`
--
ALTER TABLE `keterampilan`
  ADD PRIMARY KEY (`bobot_keterampilan`);

--
-- Indeks untuk tabel `nilai_standar`
--
ALTER TABLE `nilai_standar`
  ADD PRIMARY KEY (`id_nilai_standar`);

--
-- Indeks untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`bobot_pengetahuan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `nis` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147033;

--
-- AUTO_INCREMENT untuk tabel `eskul`
--
ALTER TABLE `eskul`
  MODIFY `bobot_eskul` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_kriteria`
--
ALTER TABLE `jenis_kriteria`
  MODIFY `id_kriteria` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `karakter`
--
ALTER TABLE `karakter`
  MODIFY `bobot_karakter` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kategori_penilaian`
--
ALTER TABLE `kategori_penilaian`
  MODIFY `id_kategori` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `keterampilan`
--
ALTER TABLE `keterampilan`
  MODIFY `bobot_keterampilan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `nilai_standar`
--
ALTER TABLE `nilai_standar`
  MODIFY `id_nilai_standar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `bobot_pengetahuan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `kode_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
