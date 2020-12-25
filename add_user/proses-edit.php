<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['edit'])) {
  // buat koneksi dengan database
  include("../koneksi.php");

  // membuat variabel untuk menampung data dari form edit
    $id_user = $_POST["id_user"];
    $nip_user = $_POST["nip_user"];
    $nama_user = $_POST["nama_user"];
    $username = $_POST["username"];    
    $password = $_POST["password"];
    $level = $_POST["level"];
    $prodi_user = $_POST["prodi_user"];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE users SET ";
  $query .= "nip_user = '$nip_user', nama_user = '$nama_user', ";
  $query .= "username='$username', ";
  $query .= "password = '$password', level= '$level', prodi_user= '$prodi_user' ";
  $query .= "WHERE id_user = '$id_user'";

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