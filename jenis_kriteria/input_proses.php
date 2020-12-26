<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $nama_kriteria = $_POST["nama_kriteria"];
    $nilai_kriteria = $_POST["nilai_kriteria"];

    // buat query
    $query = "INSERT INTO jenis_kriteria VALUE ('','$nama_kriteria', '$nilai_kriteria')";
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
