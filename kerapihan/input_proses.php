<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $range_penilaian_kerapihan = $_POST["range_penilaian_kerapihan"];
    $bobot_kerapihan = $_POST["bobot_kerapihan"];

    // buat query
    $query = "INSERT INTO kerapihan VALUE ('','$range_penilaian_kerapihan', '$bobot_kerapihan')";
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
