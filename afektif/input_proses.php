<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $range_penilaian_afektif = $_POST["range_penilaian_afektif"];
    $bobot_afektif = $_POST["bobot_afektif"];

    // buat query
    $query = "INSERT INTO afektif VALUE ('','$range_penilaian_afektif', '$bobot_afektif')";
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
