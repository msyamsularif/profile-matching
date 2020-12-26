<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $bobot_eskul = $_POST["bobot_eskul"];
    $range_penilaian_eskul = $_POST["range_penilaian_eskul"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE eskul SET ";
  $query .= "range_penilaian_eskul = '$range_penilaian_eskul'";
  $query .= "WHERE bobot_eskul = '$bobot_eskul'";

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