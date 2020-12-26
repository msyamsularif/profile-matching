<?php
session_start();
include("../koneksi.php");
// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=belum_login");
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
                                                <h4 class="card-title">Input Data Siswa</h4>
                                                <br />
                                                <form class="form-sample" action="input_proses.php" method="post">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NIS</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nis" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NAMA SISWA</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nama_siswa" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">KELAS</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="kelas" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">TAHUN ANGKATAN</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="tahun_angkatan" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">ALAMAT</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="alamat" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="container-fluid" style="margin-top: 50px;">
                                                        <div class="row">
                                                            <h6>Input Nilai Siswa</h6>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top: 20px;">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI PSIKOMOTOR</label>
                                                                <div class="col-sm-9">
                                                                    <select name="nilai_psikomotor_siswa" class="form-control">
                                                                        <?php
                                                                        $query = mysqli_query($conn, "SELECT * FROM psikomotor ORDER BY bobot_psikomotor DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$row[bobot_psikomotor]'>$row[range_penilaian_psikomotor]</option>";
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
                                                                        $query = mysqli_query($conn, "SELECT * FROM kognitif ORDER BY bobot_kognitif DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$row[bobot_kognitif]'>$row[range_penilaian_kognitif]</option>";
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
                                                                        $query = mysqli_query($conn, "SELECT * FROM afektif ORDER BY bobot_afektif DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$row[bobot_afektif]'>$row[range_penilaian_afektif]</option>";
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
                                                                        $query = mysqli_query($conn, "SELECT * FROM keterampilan ORDER BY bobot_keterampilan DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$row[bobot_keterampilan]'>$row[range_penilaian_keterampilan]</option>";
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
                                                                        $query = mysqli_query($conn, "SELECT * FROM eskul ORDER BY bobot_eskul DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$row[bobot_eskul]'>$row[range_penilaian_eskul]</option>";
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
                                                                        $query = mysqli_query($conn, "SELECT * FROM kejujuran ORDER BY bobot_kejujuran DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$row[bobot_kejujuran]'>$row[range_penilaian_kejujuran]</option>";
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
                                                                        $query = mysqli_query($conn, "SELECT * FROM kerapihan ORDER BY bobot_kerapihan DESC");
                                                                        if ($query == false) {
                                                                            die("Terdapat Kesalahan : " . mysqli_error($conn));
                                                                        }
                                                                        while ($row = mysqli_fetch_array($query)) {
                                                                            echo "<option value='$row[bobot_kerapihan]'>$row[range_penilaian_kerapihan]</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <input type="submit" class="btn btn-success btn-rounded btn-fw" name="input" value="Input">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <a href="index.php" class="btn btn-danger btn-rounded btn-fw">
                                                                    <span>Batal</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--- end form input --->
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