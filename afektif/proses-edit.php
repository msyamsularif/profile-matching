<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $bobot_afektif = $_POST["bobot_afektif"];
    $range_penilaian_afektif = $_POST["range_penilaian_afektif"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE afektif SET ";
  $query .= "range_penilaian_afektif = '$range_penilaian_afektif'";
  $query .= "WHERE bobot_afektif = '$bobot_afektif'";

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