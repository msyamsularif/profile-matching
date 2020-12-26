<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $range_penilaian_kognitif = $_POST["range_penilaian_kognitif"];
    $bobot_kognitif = $_POST["bobot_kognitif"];

    // buat query
    $query = "INSERT INTO kognitif VALUE ('','$range_penilaian_kognitif', '$bobot_kognitif')";
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
