<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $bobot_psikomotor = $_POST["bobot_psikomotor"];
    $range_penilaian_psikomotor = $_POST["range_penilaian_psikomotor"];

    // buat query
    $query = "INSERT INTO psikomotor VALUE ('$bobot_psikomotor','$range_penilaian_psikomotor')";
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
