<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $id_keterampilan = $_POST["id_keterampilan"];
    $range_penilaian_keterampilan = $_POST["range_penilaian_keterampilan"];
    $bobot_keterampilan = $_POST["bobot_keterampilan"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE keterampilan SET ";
  $query .= "range_penilaian_keterampilan = '$range_penilaian_keterampilan', bobot_keterampilan = '$bobot_keterampilan'";
  $query .= "WHERE id_keterampilan = '$id_keterampilan'";

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