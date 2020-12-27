<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=belum_login");
}
// memanggil file koneksi.php untuk membuat koneksi
include '../koneksi.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['nis'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $nis
    $nis = ($_GET["nis"]);

    // menampilkan data siswa dari database yang mempunyai nis=$nis
    $query = "SELECT * FROM data_siswa WHERE nis='$nis'";
    $row = mysqli_query($conn, $query);
    // mengecek apakah query gagal
    if (!$row) {
        die("Query Error: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $row = mysqli_fetch_assoc($row);
    $nis = $row["nis"];
    $nama_siswa = $row["nama_siswa"];
    $kelas = $row["kelas"];
    $tahun_angkatan = $row["tahun_angkatan"];
    $alamat = $row["alamat"];
    $nilai_psikomotor_siswa = $row["nilai_psikomotor_siswa"];
    $nilai_kognitif_siswa = $row["nilai_kognitif_siswa"];
    $nilai_afektif_siswa = $row["nilai_afektif_siswa"];
    $nilai_keterampilan_siswa = $row["nilai_keterampilan_siswa"];
    $nilai_eskul_siswa = $row["nilai_eskul_siswa"];
    $nilai_kejujuran_siswa = $row["nilai_kejujuran_siswa"];
    $nilai_kerapihan_siswa = $row["nilai_kerapihan_siswa"];
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php require "../partials/_head.php"; ?>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.addons.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="../public/css/style.css">

    <!-- Plugin Data Tables -->
    <script src="../public/datatables/jquery.min.js"></script>
    <script src="../public/datatables/jquery.dataTables.min.js"></script>
    <script src="../public/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Plugin Data Tables -->
    <style>
        table {
            width: 100%;
        }

        #example_filter {
            float: right;
        }

        #example_paginate {
            float: right;
        }

        label {
            display: inline-flex;
            margin-bottom: .5rem;
            margin-top: .5rem;

        }
    </style>
    <script>
        $(document).ready(function() {
            $('#example').DataTable(

                {

                    "aLengthMenu": [
                        [5, 10, 25, -1],
                        [5, 10, 25, "All"]
                    ],
                    "iDisplayLength": 5
                }
            );
        });
    </script>
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php require "../partials/_navbar.php"; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php require "../partials/_sidebar.php"; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 grid-margin">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Edit Data Siswa</h4>
                                                <br />
                                                <form class="form-sample" action="proses-edit.php" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NIS</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nis" class="form-control" value="<?php echo $nis; ?>" readonly />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NAMA SISWA</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nama_siswa" class="form-control" value="<?php echo $nama_siswa; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">KELAS</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="kelas" class="form-control" value="<?php echo $kelas; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">TAHUN ANGKATAN</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="tahun_angkatan" class="form-control" value="<?php echo $tahun_angkatan; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">ALAMAT</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="alamat" class="form-control" value="<?php echo $alamat; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="container-fluid" style="margin-top: 50px;">
                                                        <div class="row">
                                                            <h6>Edit Nilai Siswa</h6>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row" style="margin-top: 20px;">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI PSIKOMOTOR</label>
                                                                <div class="col-sm-9">
                                                                    <select name="nilai_psikomotor_siswa" class="form-control">
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT bobot_psikomotor, nilai_psikomotor_siswa, range_penilaian_psikomotor FROM data_siswa INNER JOIN psikomotor ON nilai_psikomotor_siswa=bobot_psikomotor WHERE nis='$nis'");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($rows = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$rows[nilai_psikomotor_siswa]' selected>$rows[range_penilaian_psikomotor]</option>";
                                                                        }

                                                                        $query = mysqli_query($conn, "SELECT * FROM psikomotor ORDER BY bobot_psikomotor DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row1 = mysqli_fetch_array($query)) {
                                                                            if ($row1["bobot_psikomotor"] != $row["nilai_psikomotor_siswa"]) {
                                                                                echo "<option value='$row1[bobot_psikomotor]'>$row1[range_penilaian_psikomotor]</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI KOGNITIF</label>
                                                                <div class="col-sm-9">
                                                                    <select name="nilai_kognitif_siswa" class="form-control">
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM data_siswa INNER JOIN kognitif ON nilai_kognitif_siswa=bobot_kognitif WHERE nis='$nis'");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($rows = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$rows[nilai_kognitif_siswa]' selected>$rows[range_penilaian_kognitif]</option>";
                                                                        }

                                                                        $query = mysqli_query($conn, "SELECT * FROM kognitif ORDER BY bobot_kognitif DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row1 = mysqli_fetch_array($query)) {
                                                                            if ($row1["bobot_kognitif"] != $row["nilai_kognitif_siswa"]) {
                                                                                echo "<option value='$row1[bobot_kognitif]'>$row1[range_penilaian_kognitif]</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI AFEKTIF</label>
                                                                <div class="col-sm-9">
                                                                    <select name="nilai_afektif_siswa" class="form-control">
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM data_siswa INNER JOIN afektif ON nilai_afektif_siswa=bobot_afektif WHERE nis='$nis'");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($rows = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$rows[nilai_afektif_siswa]' selected>$rows[range_penilaian_afektif]</option>";
                                                                        }

                                                                        $query = mysqli_query($conn, "SELECT * FROM afektif ORDER BY bobot_afektif DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row1 = mysqli_fetch_array($query)) {
                                                                            if ($row1["bobot_afektif"] != $row["nilai_afektif_siswa"]) {
                                                                                echo "<option value='$row1[bobot_afektif]'>$row1[range_penilaian_afektif]</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI KETERAMPILAN</label>
                                                                <div class="col-sm-9">
                                                                    <select name="nilai_keterampilan_siswa" class="form-control">
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM data_siswa INNER JOIN keterampilan ON nilai_keterampilan_siswa=bobot_keterampilan WHERE nis='$nis'");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($rows = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$rows[nilai_keterampilan_siswa]' selected>$rows[range_penilaian_keterampilan]</option>";
                                                                        }

                                                                        $query = mysqli_query($conn, "SELECT * FROM keterampilan ORDER BY bobot_keterampilan DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row1 = mysqli_fetch_array($query)) {
                                                                            if ($row1["bobot_keterampilan"] != $row["nilai_keterampilan_siswa"]) {
                                                                                echo "<option value='$row1[bobot_keterampilan]'>$row1[range_penilaian_keterampilan]</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI ESKUL</label>
                                                                <div class="col-sm-9">
                                                                    <select name="nilai_eskul_siswa" class="form-control">
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM data_siswa INNER JOIN eskul ON nilai_eskul_siswa=bobot_eskul WHERE nis='$nis'");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($rows = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$rows[nilai_eskul_siswa]' selected>$rows[range_penilaian_eskul]</option>";
                                                                        }

                                                                        $query = mysqli_query($conn, "SELECT * FROM eskul ORDER BY bobot_eskul DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row1 = mysqli_fetch_array($query)) {
                                                                            if ($row1["bobot_eskul"] != $row["nilai_eskul_siswa"]) {
                                                                                echo "<option value='$row1[bobot_eskul]'>$row1[range_penilaian_eskul]</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI KEJUJURAN</label>
                                                                <div class="col-sm-9">
                                                                    <select name="nilai_kejujuran_siswa" class="form-control">
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM data_siswa INNER JOIN kejujuran ON nilai_kejujuran_siswa=bobot_kejujuran WHERE nis='$nis'");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($rows = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$rows[nilai_kejujuran_siswa]' selected>$rows[range_penilaian_kejujuran]</option>";
                                                                        }

                                                                        $query = mysqli_query($conn, "SELECT * FROM kejujuran ORDER BY bobot_kejujuran DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row1 = mysqli_fetch_array($query)) {
                                                                            if ($row1["bobot_kejujuran"] != $row["nilai_kejujuran_siswa"]) {
                                                                                echo "<option value='$row1[bobot_kejujuran]'>$row1[range_penilaian_kejujuran]</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI KERAPIHAN</label>
                                                                <div class="col-sm-9">
                                                                    <select name="nilai_kerapihan_siswa" class="form-control">
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM data_siswa INNER JOIN kerapihan ON nilai_kerapihan_siswa=bobot_kerapihan WHERE nis='$nis'");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($rows = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$rows[nilai_kerapihan_siswa]' selected>$rows[range_penilaian_kerapihan]</option>";
                                                                        }

                                                                        $query = mysqli_query($conn, "SELECT * FROM kerapihan ORDER BY bobot_kerapihan DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row1 = mysqli_fetch_array($query)) {
                                                                            if ($row1["bobot_kerapihan"] != $row["nilai_kerapihan_siswa"]) {
                                                                                echo "<option value='$row1[bobot_kerapihan]'>$row1[range_penilaian_kerapihan]</option>";
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <input type="submit" class="btn btn-success btn-rounded btn-fw" name="edit" value="Update">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <a href="index.php" class="btn btn-danger btn-rounded btn-fw">
                                                                    <span>
                                                                        Batal
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Data Table -->
                        </div>

                        <!-- Widget End -->
                        <div class="row">

                        </div>
                        <div class="row">
                            <!--Visitor Begin-->
                            <!--Visitor End-->
                        </div>
                        <div class="row">
                            <!-- Row -->
                        </div>
                        <div class="row">

                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <?php require "../partials/_fotter.php"; ?>
                    <!-- partial -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        <!-- plugins:js -->
        <script src="../vendors/js/vendor.bundle.base.js"></script>
        <script src="../vendors/js/vendor.bundle.addons.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page-->
        <!-- End plugin js for this page-->
        <!-- inject:js -->
        <script src="../public/js/off-canvas.js"></script>
        <script src="../public/js/misc.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page-->
        <script src="../public/js/dashboard.js"></script>
        <!-- End custom js for this page-->
</body>

</html>