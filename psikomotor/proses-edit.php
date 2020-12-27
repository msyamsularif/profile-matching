<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
  $bobot_psikomotor = $_POST["bobot_psikomotor"];
  $range_penilaian_psikomotor = $_POST["range_penilaian_psikomotor"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE psikomotor SET ";
  $query .= "range_penilaian_psikomotor = '$range_penilaian_psikomotor'";
  $query .= "WHERE bobot_psikomotor = '$bobot_psikomotor'";

  $row = mysqli_query($conn, $query);

  //periksa hasil query apakah ada error
  if (!$row) {
    die("Query gagal dijalankan: " . mysqli_errno($conn) .
      " - " . mysqli_error($conn));
  }
}

//lakukan redirect ke halaman index.php
header("location:index.php");
