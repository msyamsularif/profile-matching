<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['input'])){

    // ambil data dari formulir
    $nis = $_POST["nis"];
    $nama_siswa = $_POST["nama_siswa"];
    $kelas = $_POST["kelas"];
    $tahun_angkatan = $_POST["tahun_angkatan"];
    $alamat = $_POST["alamat"];
    $nilai_pengetahuan_siswa = $_POST["nilai_pengetahuan_siswa"];
    $nilai_keterampilan_siswa = $_POST["nilai_keterampilan_siswa"];
    $nilai_karakter_siswa = $_POST["nilai_karakter_siswa"];
    $nilai_eskul_siswa = $_POST["nilai_eskul_siswa"];
    

    // buat query
    $query = "INSERT INTO data_siswa VALUE ('$nis', '$nama_siswa', '$kelas', '$tahun_angkatan', '$alamat', '$nilai_pengetahuan_siswa', '$nilai_keterampilan_siswa', '$nilai_karakter_siswa','$nilai_eskul_siswa')";
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
