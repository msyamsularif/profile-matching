<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
  $bobot_karakter = $_POST["bobot_karakter"];
    $range_penilaian_karakter = $_POST["range_penilaian_karakter"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE karakter SET ";
  $query .= "range_penilaian_karakter = '$range_penilaian_karakter'";
  $query .= "WHERE bobot_karakter = '$bobot_karakter'";

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