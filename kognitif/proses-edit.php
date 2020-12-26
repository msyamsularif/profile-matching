<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $id_kognitif = $_POST["id_kognitif"];
    $range_penilaian_kognitif = $_POST["range_penilaian_kognitif"];
    $bobot_kognitif = $_POST["bobot_kognitif"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE kognitif SET ";
  $query .= "range_penilaian_kognitif = '$range_penilaian_kognitif', bobot_kognitif = '$bobot_kognitif'";
  $query .= "WHERE id_kognitif = '$id_kognitif'";

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