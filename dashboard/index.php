<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location:../index.php?pesan=belum_login");
}
require_once '../koneksi.php';
include "../controller/controller_siswa.php";

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
  <!-- endinject -->

  <!-- Plugin Data Tables -->
  <script src="../public/datatables/jquery.min.js"></script>
  <script src="../public/datatables/jquery.dataTables.min.js"></script>
  <script src="../public/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Plugin Data Tables -->

  <style>
    .jumbotron {
      background-color: #1E90FF;
    }

    table {
      width: 100%;
      text-align: center;
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
      $('#tabelKelasSatu').DataTable(

        {
          "aLengthMenu": [
            [3, 5, 10, 25, -1],
            [3, 5, 10, 25, "All"]
          ],
          "iDisplayLength": 3,
          "order": [
            [4, "desc"]
          ]
        }
      );
    });

    $(document).ready(function() {
      $('#tabelKelasDua').DataTable(

        {
          "aLengthMenu": [
            [3, 5, 10, 25, -1],
            [3, 5, 10, 25, "All"]
          ],
          "iDisplayLength": 3,
          "order": [
            [4, "desc"]
          ]
        }
      );
    });

    $(document).ready(function() {
      $('#tabelKelasTiga').DataTable(

        {
          "aLengthMenu": [
            [3, 5, 10, 25, -1],
            [3, 5, 10, 25, "All"]
          ],
          "iDisplayLength": 3,
          "order": [
            [4, "desc"]
          ]
        }
      );
    });

    $(document).ready(function() {
      $('#tabelKelasEmpat').DataTable(

        {
          "aLengthMenu": [
            [3, 5, 10, 25, -1],
            [3, 5, 10, 25, "All"]
          ],
          "iDisplayLength": 3,
          "order": [
            [4, "desc"]
          ]
        }
      );
    });

    $(document).ready(function() {
      $('#tabelKelasLima').DataTable(

        {
          "aLengthMenu": [
            [3, 5, 10, 25, -1],
            [3, 5, 10, 25, "All"]
          ],
          "iDisplayLength": 3,
          "order": [
            [4, "desc"]
          ]
        }
      );
    });

    $(document).ready(function() {
      $('#tabelKelasEnam').DataTable(

        {
          "aLengthMenu": [
            [3, 5, 10, 25, -1],
            [3, 5, 10, 25, "All"]
          ],
          "iDisplayLength": 3,
          "order": [
            [4, "desc"]
          ]
        }
      );
    });
  </script>

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
          <!-- jumbutron -->
          <div class="jumbotron" style="color: white;">
            <h1>Helloo...</h1>
            <h3>Selamat Datang di Sistem Informasi Siswa Berprestasi</h3>
          </div>

          <!-- Card -->
          <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-school text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Siswa Kelas 1</p>
                      <div class="fluid-container">
                        <?php
                        $sql = 'SELECT * FROM data_siswa WHERE kelas="1"';

                        // menghitung nilai rata-rata
                        // $sql = 'SELECT AVG(no_telp) FROM data_mahasiswa';

                        $query = mysqli_query($conn, $sql);

                        if (!$query) {
                          die('SQL Error: ' . mysqli_error($conn));
                        }
                        ?>
                        <h3 class="font-weight-medium text-right mb-0">
                          <?php
                          // Untuk menampilkan hasil nilai rata-rata 
                          // while ($row = mysqli_fetch_array($query)){    
                          //   echo $row['AVG(no_telp)'];
                          // } 

                          echo mysqli_num_rows($query)
                          ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Siswa
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-school text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Siswa Kelas 2</p>
                      <div class="fluid-container">
                        <?php
                        $sql = 'SELECT * FROM data_siswa WHERE kelas="2"';

                        // menghitung nilai rata-rata
                        // $sql = 'SELECT AVG(no_telp) FROM data_mahasiswa';

                        $query = mysqli_query($conn, $sql);

                        if (!$query) {
                          die('SQL Error: ' . mysqli_error($conn));
                        }
                        ?>
                        <h3 class="font-weight-medium text-right mb-0">
                          <?php
                          // Untuk menampilkan hasil nilai rata-rata 
                          // while ($row = mysqli_fetch_array($query)){    
                          //   echo $row['AVG(no_telp)'];
                          // } 

                          echo mysqli_num_rows($query)
                          ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Siswa
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-school text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Siswa Kelas 3</p>
                      <div class="fluid-container">
                        <?php
                        $sql = 'SELECT * FROM data_siswa WHERE kelas="3"';

                        // menghitung nilai rata-rata
                        // $sql = 'SELECT AVG(no_telp) FROM data_mahasiswa';

                        $query = mysqli_query($conn, $sql);

                        if (!$query) {
                          die('SQL Error: ' . mysqli_error($conn));
                        }
                        ?>
                        <h3 class="font-weight-medium text-right mb-0">
                          <?php
                          // Untuk menampilkan hasil nilai rata-rata 
                          // while ($row = mysqli_fetch_array($query)){    
                          //   echo $row['AVG(no_telp)'];
                          // } 

                          echo mysqli_num_rows($query)
                          ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Siswa
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-school icon-lg" style="color: pink;"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Siswa Kelas 4</p>
                      <div class="fluid-container">
                        <?php
                        $sql = 'SELECT * FROM data_siswa WHERE kelas="4"';

                        // menghitung nilai rata-rata
                        // $sql = 'SELECT AVG(no_telp) FROM data_mahasiswa';

                        $query = mysqli_query($conn, $sql);

                        if (!$query) {
                          die('SQL Error: ' . mysqli_error($conn));
                        }
                        ?>
                        <h3 class="font-weight-medium text-right mb-0">
                          <?php
                          // Untuk menampilkan hasil nilai rata-rata 
                          // while ($row = mysqli_fetch_array($query)){    
                          //   echo $row['AVG(no_telp)'];
                          // } 

                          echo mysqli_num_rows($query)
                          ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Siswa
                  </p>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-school text-primary icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Siswa Kelas 5</p>
                      <div class="fluid-container">
                        <?php
                        $sql = 'SELECT * FROM data_siswa WHERE kelas="5"';

                        // menghitung nilai rata-rata
                        // $sql = 'SELECT AVG(no_telp) FROM data_mahasiswa';

                        $query = mysqli_query($conn, $sql);

                        if (!$query) {
                          die('SQL Error: ' . mysqli_error($conn));
                        }
                        ?>
                        <h3 class="font-weight-medium text-right mb-0">
                          <?php
                          // Untuk menampilkan hasil nilai rata-rata 
                          // while ($row = mysqli_fetch_array($query)){    
                          //   echo $row['AVG(no_telp)'];
                          // } 

                          echo mysqli_num_rows($query)
                          ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Siswa
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-school text-dark icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Siswa Kelas 6</p>
                      <div class="fluid-container">
                        <?php
                        $sql = 'SELECT * FROM data_siswa WHERE kelas="6"';

                        // menghitung nilai rata-rata
                        // $sql = 'SELECT AVG(no_telp) FROM data_mahasiswa';

                        $query = mysqli_query($conn, $sql);

                        if (!$query) {
                          die('SQL Error: ' . mysqli_error($conn));
                        }
                        ?>
                        <h3 class="font-weight-medium text-right mb-0">
                          <?php
                          // Untuk menampilkan hasil nilai rata-rata 
                          // while ($row = mysqli_fetch_array($query)){    
                          //   echo $row['AVG(no_telp)'];
                          // } 

                          echo mysqli_num_rows($query)
                          ?>
                        </h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Siswa
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "../partials/_fotter.php"; ?>
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