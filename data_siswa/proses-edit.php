<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
  $nis = $_POST["nis"];
  $nama_siswa = $_POST["nama_siswa"];
  $kelas = $_POST["kelas"];
  $tahun_angkatan = $_POST["tahun_angkatan"];
  $alamat = $_POST["alamat"];
  $nilai_pengetahuan_siswa = $_POST["nilai_pengetahuan_siswa"];
  $nilai_keterampilan_siswa = $_POST["nilai_keterampilan_siswa"];
  $nilai_karakter_siswa = $_POST["nilai_karakter_siswa"];
  $nilai_eskul_siswa = $_POST["nilai_eskul_siswa"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE data_siswa SET ";
  $query .= "nama_siswa = '$nama_siswa', kelas = '$kelas', tahun_angkatan = '$tahun_angkatan', ";
  $query .= "alamat = '$alamat', nilai_pengetahuan_siswa = '$nilai_pengetahuan_siswa',  nilai_keterampilan_siswa = '$nilai_keterampilan_siswa', ";
  $query .= "nilai_karakter_siswa = '$nilai_karakter_siswa', nilai_eskul_siswa = '$nilai_eskul_siswa' ";
  $query .= "WHERE nis = '$nis'";

  $row = mysqli_query($conn, $query);

  //periksa hasil query apakah ada error
  if (!$row) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) .
      " - " . mysqli_error($conn));
  }
}

//lakukan redirect ke halaman index.php
header("location:index.php");
