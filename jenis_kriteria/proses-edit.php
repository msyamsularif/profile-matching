<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $id_kriteria = $_POST["id_kriteria"];
    $nama_kriteria = $_POST["nama_kriteria"];
    $nilai_kriteria = $_POST["nilai_kriteria"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE jenis_kriteria SET ";
  $query .= "nama_kriteria = '$nama_kriteria', nilai_kriteria = '$nilai_kriteria'";
  $query .= "WHERE id_kriteria = '$id_kriteria'";

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