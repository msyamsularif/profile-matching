<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $bobot_kejujuran = $_POST["bobot_kejujuran"];
    $range_penilaian_kejujuran = $_POST["range_penilaian_kejujuran"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE kejujuran SET ";
  $query .= "range_penilaian_kejujuran = '$range_penilaian_kejujuran'";
  $query .= "WHERE bobot_kejujuran = '$bobot_kejujuran'";

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