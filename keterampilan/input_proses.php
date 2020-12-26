<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $bobot_keterampilan = $_POST["bobot_keterampilan"];
    $range_penilaian_keterampilan = $_POST["range_penilaian_keterampilan"];

    // buat query
    $query = "INSERT INTO keterampilan VALUE ('$bobot_keterampilan','$range_penilaian_keterampilan')";
    $row = mysqli_query($conn, $query);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan jam=sukses
        header('Location: index.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan jam=gagal
        header('Location: index.php');
    }


} else {
    die("Akses dilarang...");
}

?>
