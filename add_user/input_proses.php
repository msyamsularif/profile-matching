<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $nip_user = $_POST["nip_user"];
    $nama_user = $_POST["nama_user"];
    $username = $_POST["username"];    
    $password = $_POST["password"];
    $level = $_POST["level"];
    $jabatan_user = $_POST["jabatan_user"];

    // buat query
    $query = "INSERT INTO user VALUE ('','$nip_user', '$nama_user', '$username', '$password', '$level', '$jabatan_user')";
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