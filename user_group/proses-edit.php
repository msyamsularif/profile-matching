<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $kode_user = $_POST["kode_user"];
    $nama_usergroup = $_POST["nama_usergroup"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE user_group SET ";
  $query .= "nama_usergroup = '$nama_usergroup' ";
  $query .= "WHERE kode_user = '$kode_user'";

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