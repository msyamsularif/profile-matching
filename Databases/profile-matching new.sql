-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2020 pada 11.18
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
(4567, 'Loream Ipsum', '2', 2015, 'Jakarta', 3, 5, 5, 5, 5, 5, 5),
(12345, 'Loream', '5', 2017, 'Bekasi', 5, 1, 4, 2, 3, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `eskul`
--

CREATE TABLE `eskul` (
  `bobot_eskul` int(12) NOT NULL,
  `range_penilaian_eskul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Eskul', 2),
(6, 'Afektif', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kejujuran`
--

CREATE TABLE `kejujuran` (
  `bobot_kejujuran` int(12) NOT NULL,
  `range_penilaian_kejujuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerapihan`
--

CREATE TABLE `kerapihan` (
  `bobot_kerapihan` int(12) NOT NULL,
  `range_penilaian_kerapihan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterampilan`
--

CREATE TABLE `keterampilan` (
  `bobot_keterampilan` int(12) NOT NULL,
  `range_penilaian_keterampilan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kognitif`
--

CREATE TABLE `kognitif` (
  `bobot_kognitif` int(12) NOT NULL,
  `range_penilaian_kognitif` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `nis` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT untuk tabel `eskul`
--
ALTER TABLE `eskul`
  MODIFY `bobot_eskul` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jenis_kriteria`
--
ALTER TABLE `jenis_kriteria`
  MODIFY `id_kriteria` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_penilaian`
--
ALTER TABLE `kategori_penilaian`
  MODIFY `id_kategori` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `bobot_keterampilan` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kognitif`
--
ALTER TABLE `kognitif`
  MODIFY `bobot_kognitif` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `psikomotor`
--
ALTER TABLE `psikomotor`
  MODIFY `bobot_psikomotor` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
