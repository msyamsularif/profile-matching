<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
  $id_nilai_standar = $_POST["id_nilai_standar"];
  $nilai_standar_psikomotor = $_POST["nilai_standar_psikomotor"];
  $nilai_standar_kognitif = $_POST["nilai_standar_kognitif"];
  $nilai_standar_afektif = $_POST["nilai_standar_afektif"];
  $nilai_standar_keterampilan = $_POST["nilai_standar_keterampilan"];
  $nilai_standar_eskul = $_POST["nilai_standar_eskul"];
  $nilai_standar_kejujuran = $_POST["nilai_standar_kejujuran"];
  $nilai_standar_kerapihan = $_POST["nilai_standar_kerapihan"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE nilai_standar SET ";
  $query .= "nilai_standar_psikomotor = '$nilai_standar_psikomotor', nilai_standar_kognitif = '$nilai_standar_kognitif', nilai_standar_afektif = '$nilai_standar_afektif',";
  $query .= "nilai_standar_keterampilan = '$nilai_standar_keterampilan', nilai_standar_eskul = '$nilai_standar_eskul', nilai_standar_kejujuran = '$nilai_standar_kejujuran', nilai_standar_kerapihan = '$nilai_standar_kerapihan'";
  $query .= "WHERE id_nilai_standar = '$id_nilai_standar'";

  $row = mysqli_query($conn, $query);

  //periksa hasil query apakah ada error
  if(!$row) {
    die ("Query gagal dijalankan: ".mysqli_errno($conn).
       " - ".mysqli_error($conn));
  }
}

//lakukan redirect ke halaman index.php
header("location:index.php");

?>