<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $kode_user = $_POST["kode_user"];
    $nama_usergroup = $_POST["nama_usergroup"];

    // buat query
    $query = "INSERT INTO user_group VALUE ('$kode_user', '$nama_usergroup')";
    $row = mysqli_query($conn, $query);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan kode_prodi_user=sukses
        header('Location: index.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan kode_prodi_user=gagal
        header('Location: index.php');
    }


} else {
    die("Akses dilarang...");
}

?>