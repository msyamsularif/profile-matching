<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
    header("location:../index.php?pesan=belum_login");
}
// memanggil file koneksi.php untuk membuat koneksi
include '../koneksi.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id_nilai_standar'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id_nilai_standar = ($_GET["id_nilai_standar"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT * FROM nilai_standar WHERE id_nilai_standar='$id_nilai_standar'";
    $row = mysqli_query($conn, $query);
    // mengecek apakah query gagal
    if (!$row) {
        die("Query Error: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $row = mysqli_fetch_assoc($row);
    $id_nilai_standar = $row["id_nilai_standar"];
    $nilai_standar_pengetahuan = $row["nilai_standar_pengetahuan"];
    $nilai_standar_keterampilan = $row["nilai_standar_keterampilan"];
    $nilai_standar_karakter = $row["nilai_standar_karakter"];
    $nilai_standar_eskul = $row["nilai_standar_eskul"];
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
                                                <h4 class="card-title">Edit Data Nilai Standar</h4>
                                                <br />
                                                <form class="form-sample" action="proses-edit.php" method="post">
                                                    <div class="row">
                                                        <input type="text" name="id_nilai_standar" class="form-control" value="<?php echo $id_nilai_standar; ?>" hidden />
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI STANDAR PENGETAHUAN</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nilai_standar_pengetahuan" class="form-control" value="<?php echo $nilai_standar_pengetahuan; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI STANDAR KETERAMPILAN</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nilai_standar_keterampilan" class="form-control" value="<?php echo $nilai_standar_keterampilan; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI STANDAR KARAKTER</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nilai_standar_karakter" class="form-control" value="<?php echo $nilai_standar_karakter; ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">NILAI STANDAR ESKUL</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nilai_standar_eskul" class="form-control" value="<?php echo $nilai_standar_eskul; ?>" />
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