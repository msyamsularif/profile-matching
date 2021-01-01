<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['input'])) {

    // ambil data dari formulir
    $id_nilai_standar = $_POST["id_nilai_standar"];
    $nilai_standar_pengetahuan = $_POST["nilai_standar_pengetahuan"];
    $nilai_standar_keterampilan = $_POST["nilai_standar_keterampilan"];
    $nilai_standar_karakter = $_POST["nilai_standar_karakter"];
    $nilai_standar_eskul = $_POST["nilai_standar_eskul"];

    // buat query
    $query = "INSERT INTO nilai_standar VALUE ('','$nilai_standar_pengetahuan', '$nilai_standar_keterampilan', '$nilai_standar_karakter', '$nilai_standar_eskul')";
    $row = mysqli_query($conn, $query);

    // apakah query simpan berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman index.php dengan jam=sukses
        header('Location: index.php');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan jam=gagal
        header('Location: index.php');
    }
} else {
    die("Akses dilarang...");
}
