<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
  $bobot_pengetahuan = $_POST["bobot_pengetahuan"];
  $range_penilaian_pengetahuan = $_POST["range_penilaian_pengetahuan"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE pengetahuan SET ";
  $query .= "range_penilaian_pengetahuan = '$range_penilaian_pengetahuan'";
  $query .= "WHERE bobot_pengetahuan = '$bobot_pengetahuan'";

  $row = mysqli_query($conn, $query);

  //periksa hasil query apakah ada error
  if (!$row) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) .
      " - " . mysqli_error($conn));
  }
}

//lakukan redirect ke halaman index.php
header("location:index.php");
