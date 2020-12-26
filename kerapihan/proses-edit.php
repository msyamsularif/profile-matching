<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $id_kerapihan = $_POST["id_kerapihan"];
    $range_penilaian_kerapihan = $_POST["range_penilaian_kerapihan"];
    $bobot_kerapihan = $_POST["bobot_kerapihan"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE kerapihan SET ";
  $query .= "range_penilaian_kerapihan = '$range_penilaian_kerapihan', bobot_kerapihan = '$bobot_kerapihan'";
  $query .= "WHERE id_kerapihan = '$id_kerapihan'";

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