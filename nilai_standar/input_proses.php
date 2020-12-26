<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $nilai_standar_psikomotor = $_POST["nilai_standar_psikomotor"];
    $nilai_standar_kognitif = $_POST["nilai_standar_kognitif"];
    $nilai_standar_afektif = $_POST["nilai_standar_afektif"];
    $nilai_standar_keterampilan = $_POST["nilai_standar_keterampilan"];
    $nilai_standar_eskul = $_POST["nilai_standar_eskul"];
    $nilai_standar_kejujuran = $_POST["nilai_standar_kejujuran"];
    $nilai_standar_kerapihan = $_POST["nilai_standar_kerapihan"];

    // buat query
    $query = "INSERT INTO nilai_standar VALUE ('','$nilai_standar_psikomotor','$nilai_standar_kognitif', '$nilai_standar_afektif', '$nilai_standar_keterampilan', '$nilai_standar_eskul', '$nilai_standar_kejujuran', '$nilai_standar_kerapihan')";
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
