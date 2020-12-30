-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Des 2020 pada 12.29
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
-- Struktur dari tabel `afektif`
--

CREATE TABLE `afektif` (
  `bobot_afektif` int(12) NOT NULL,
  `range_penilaian_afektif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `afektif`
--

INSERT INTO `afektif` (`bobot_afektif`, `range_penilaian_afektif`) VALUES
(1, 'Dibawah 40'),
(2, 'Antara 40 - 50'),
(3, 'Antara 50 - 60 '),
(4, 'Antara 60 - 80'),
(5, 'Antara 80 - 100');

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
  `nilai_psikomotor_siswa` int(12) NOT NULL,
  `nilai_kognitif_siswa` int(12) NOT NULL,
  `nilai_afektif_siswa` int(12) NOT NULL,
  `nilai_keterampilan_siswa` int(12) NOT NULL,
  `nilai_eskul_siswa` int(12) NOT NULL,
  `nilai_kejujuran_siswa` int(12) NOT NULL,
  `nilai_kerapihan_siswa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`nis`, `nama_siswa`, `kelas`, `tahun_angkatan`, `alamat`, `nilai_psikomotor_siswa`, `nilai_kognitif_siswa`, `nilai_afektif_siswa`, `nilai_keterampilan_siswa`, `nilai_eskul_siswa`, `nilai_kejujuran_siswa`, `nilai_kerapihan_siswa`) VALUES
(12345, 'n1', '1', 2017, 'Bekasi', 2, 2, 3, 5, 3, 2, 2),
(13578, 'n3', '1', 2017, 'Bekasi', 3, 3, 2, 2, 4, 2, 2),
(24680, 'n4', '2', 2016, 'Bekasi', 4, 3, 4, 2, 2, 3, 3),
(47123, 'n8', '2', 2016, 'Bekasi', 4, 5, 2, 4, 4, 2, 4),
(47248, 'n5', '3', 2015, 'Bekasi', 2, 4, 3, 3, 3, 4, 4),
(65478, 'n10', '3', 2015, 'Bekasi', 3, 2, 3, 2, 2, 3, 4),
(65809, 'n7', '4', 2014, 'Bekasi', 5, 4, 3, 3, 3, 4, 5),
(67890, 'n2', '5', 2013, 'Bekasi', 3, 2, 5, 2, 2, 2, 3),
(76390, 'n9', '6', 2012, 'Bekasi', 4, 3, 2, 3, 5, 5, 4),
(82903, 'n6', '6', 2012, 'Bekasi', 5, 4, 3, 5, 1, 3, 4);

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
(1, 'E'),
(2, 'D'),
(3, 'C'),
(4, 'B'),
(5, 'A');

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
(8, 'Psikomotor', 1),
(9, 'Kognitif', 1),
(10, 'Afektif', 2),
(11, 'Keterampilan', 1),
(12, 'Eskul', 2),
(13, 'Kejujuran', 1),
(14, 'Kerapihan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kejujuran`
--

CREATE TABLE `kejujuran` (
  `bobot_kejujuran` int(12) NOT NULL,
  `range_penilaian_kejujuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kejujuran`
--

INSERT INTO `kejujuran` (`bobot_kejujuran`, `range_penilaian_kejujuran`) VALUES
(1, 'SANGAT KURANG'),
(2, 'KURANG'),
(3, 'CUKUP'),
(4, 'BAIK'),
(5, 'SANGAT BAIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerapihan`
--

CREATE TABLE `kerapihan` (
  `bobot_kerapihan` int(12) NOT NULL,
  `range_penilaian_kerapihan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kerapihan`
--

INSERT INTO `kerapihan` (`bobot_kerapihan`, `range_penilaian_kerapihan`) VALUES
(1, 'SANGAT KURANG'),
(2, 'KURANG'),
(3, 'CUKUP'),
(4, 'BAIK'),
(5, 'SANGAT BAIK');

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
(1, 'E'),
(2, 'D'),
(3, 'C'),
(4, 'B'),
(5, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kognitif`
--

CREATE TABLE `kognitif` (
  `bobot_kognitif` int(12) NOT NULL,
  `range_penilaian_kognitif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kognitif`
--

INSERT INTO `kognitif` (`bobot_kognitif`, `range_penilaian_kognitif`) VALUES
(1, 'Dibawah 40'),
(2, 'Antara 40 - 50'),
(3, 'Antara 50 - 60 '),
(4, 'Antara 60 - 80'),
(5, 'Antara 80 - 100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_standar`
--

CREATE TABLE `nilai_standar` (
  `id_nilai_standar` int(12) NOT NULL,
  `nilai_standar_psikomotor` int(12) NOT NULL,
  `nilai_standar_kognitif` int(12) NOT NULL,
  `nilai_standar_afektif` int(12) NOT NULL,
  `nilai_standar_keterampilan` int(12) NOT NULL,
  `nilai_standar_eskul` int(12) NOT NULL,
  `nilai_standar_kejujuran` int(12) NOT NULL,
  `nilai_standar_kerapihan` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_standar`
--

INSERT INTO `nilai_standar` (`id_nilai_standar`, `nilai_standar_psikomotor`, `nilai_standar_kognitif`, `nilai_standar_afektif`, `nilai_standar_keterampilan`, `nilai_standar_eskul`, `nilai_standar_kejujuran`, `nilai_standar_kerapihan`) VALUES
(1, 3, 3, 3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `psikomotor`
--

CREATE TABLE `psikomotor` (
  `bobot_psikomotor` int(12) NOT NULL,
  `range_penilaian_psikomotor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `psikomotor`
--

INSERT INTO `psikomotor` (`bobot_psikomotor`, `range_penilaian_psikomotor`) VALUES
(1, 'Dibawah 40'),
(2, 'Antara 40 - 50'),
(3, 'Antara 50 - 60'),
(4, 'Antara 60 - 80'),
(5, 'Antara 80 - 100');

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
(1, 123, 'admin', 'admin', 'admin', 1, 'admin');

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
-- Indeks untuk tabel `afektif`
--
ALTER TABLE `afektif`
  ADD PRIMARY KEY (`bobot_afektif`);

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
-- Indeks untuk tabel `kategori_penilaian`
--
ALTER TABLE `kategori_penilaian`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kejujuran`
--
ALTER TABLE `kejujuran`
  ADD PRIMARY KEY (`bobot_kejujuran`);

--
-- Indeks untuk tabel `kerapihan`
--
ALTER TABLE `kerapihan`
  ADD PRIMARY KEY (`bobot_kerapihan`);

--
-- Indeks untuk tabel `keterampilan`
--
ALTER TABLE `keterampilan`
  ADD PRIMARY KEY (`bobot_keterampilan`);

--
-- Indeks untuk tabel `kognitif`
--
ALTER TABLE `kognitif`
  ADD PRIMARY KEY (`bobot_kognitif`);

--
-- Indeks untuk tabel `nilai_standar`
--
ALTER TABLE `nilai_standar`
  ADD PRIMARY KEY (`id_nilai_standar`);

--
-- Indeks untuk tabel `psikomotor`
--
ALTER TABLE `psikomotor`
  ADD PRIMARY KEY (`bobot_psikomotor`);

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
-- AUTO_INCREMENT untuk tabel `afektif`
--
ALTER TABLE `afektif`
  MODIFY `bobot_afektif` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT untuk tabel `kategori_penilaian`
--
ALTER TABLE `kategori_penilaian`
  MODIFY `id_kategori` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kejujuran`
--
ALTER TABLE `kejujuran`
  MODIFY `bobot_kejujuran` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kerapihan`
--
ALTER TABLE `kerapihan`
  MODIFY `bobot_kerapihan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `keterampilan`
--
ALTER TABLE `keterampilan`
  MODIFY `bobot_keterampilan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kognitif`
--
ALTER TABLE `kognitif`
  MODIFY `bobot_kognitif` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `nilai_standar`
--
ALTER TABLE `nilai_standar`
  MODIFY `id_nilai_standar` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `psikomotor`
--
ALTER TABLE `psikomotor`
  MODIFY `bobot_psikomotor` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
