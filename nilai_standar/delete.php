<?php
// include database connection file
//include_once("../koneksi.php");
include '../koneksi.php';
// Get id from URL to delete that user
//$id_user = $_GET['id_user'];

// Delete user row from table based on given id
//$query = mysqli_query($conn, "DELETE FROM data_prodi WHERE id_user=$id_user");

// After delete redirect to Home, so that latest user list will be displayed.
//header("Location:index.php");

if( isset($_GET['id_nilai_standar']) ){

    // ambil id dari query string
    $id_nilai_standar = $_GET['id_nilai_standar'];

    // buat query hapus
    $query = "DELETE FROM nilai_standar WHERE id_nilai_standar='$id_nilai_standar'";
    $row = mysqli_query($conn, $query);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location:index.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>