<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $id_kategori = $_POST["id_kategori"];
    $nama_kategori = $_POST["nama_kategori"];
    $id_kriteria_kategori = $_POST["id_kriteria_kategori"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE kategori_penilaian SET ";
  $query .= "nama_kategori = '$nama_kategori', id_kriteria_kategori = '$id_kriteria_kategori'";
  $query .= "WHERE id_kategori = '$id_kategori'";

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