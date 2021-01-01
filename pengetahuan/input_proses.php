<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $bobot_pengetahuan = $_POST["bobot_pengetahuan"];
    $range_penilaian_pengetahuan = $_POST["range_penilaian_pengetahuan"];

    // buat query
    $query = "INSERT INTO pengetahuan VALUE ('$bobot_pengetahuan','$range_penilaian_pengetahuan')";
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
