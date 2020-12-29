<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location:../index.php?pesan=belum_login");
}
require_once '../koneksi.php';

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
            [5, 10, 25, -1],
            [5, 10, 25, "All"]
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
            [5, 10, 25, -1],
            [5, 10, 25, "All"]
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
            [5, 10, 25, -1],
            [5, 10, 25, "All"]
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
            [5, 10, 25, -1],
            [5, 10, 25, "All"]
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
            [5, 10, 25, -1],
            [5, 10, 25, "All"]
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
            [5, 10, 25, -1],
            [5, 10, 25, "All"]
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
                      <p class="mb-0 text-right">Total Siswa</p>
                      <div class="fluid-container">
                        <?php
                        $sql = 'SELECT * FROM data_siswa';

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

          <!-- Datatable Siswa Kelas 1 -->
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-description">Tabel Peringkat Siswa Kelas 1</h4>
                  <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row">
                      <?php
                      datatableSiswa(1, "tabelKelasSatu");
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Datatable Siswa Kelas 2 -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-description">Tabel Peringkat Siswa Kelas 2</h4>
                  <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row">
                      <?php
                      datatableSiswa(2, "tabelKelasDua");
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Datatable Siswa Kelas 3 -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-description">Tabel Peringkat Siswa Kelas 3</h4>
                  <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row">
                      <?php
                      datatableSiswa(3, "tabelKelasTiga");
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Datatable Siswa Kelas 4 -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-description">Tabel Peringkat Siswa Kelas 4</h4>
                  <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row">
                      <?php
                      datatableSiswa(4, "tabelKelasEmpat");
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Datatable Siswa Kelas 5 -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-description">Tabel Peringkat Siswa Kelas 5</h4>
                  <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row">
                      <?php
                      datatableSiswa(5, "tabelKelasLima");
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Datatable Siswa Kelas 6 -->
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-description">Tabel Peringkat Siswa Kelas 6</h4>
                  <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row">
                      <?php
                      datatableSiswa(6, "tabelKelasEnam");
                      ?>
                    </div>
                  </div>
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

<?php
//Konversi Nilai Bobot
function nilaiStandar($nilai_kategori)
{
  if ($nilai_kategori == 0) {
    return 5;
  } elseif ($nilai_kategori == 1) {
    return  4.5;
  } elseif ($nilai_kategori == -1) {
    return 4;
  } elseif ($nilai_kategori == 2) {
    return 3.5;
  } elseif ($nilai_kategori == -2) {
    return 3;
  } elseif ($nilai_kategori == 3) {
    return 2.5;
  } elseif ($nilai_kategori == -3) {
    return 2;
  } elseif ($nilai_kategori == 4) {
    return 1.5;
  } else {
    return 1;
  }
}

// Function menampilkan data siswa perkelas
function datatableSiswa($nilaiKelas, $nomorTableKelas)
{
  require "../koneksi.php";

  if ($_SESSION['level'] == "1") {
    $sql = "SELECT * FROM data_siswa, nilai_standar WHERE kelas = '$nilaiKelas'";
  } else {
    header('location:../error-404.php');
  }
  $query = mysqli_query($conn, $sql);

  if (!$query) {
    die('SQL Error: ' . mysqli_error($conn));
  }

  echo "<table id='$nomorTableKelas' class='table table-striped table-bordered table-responsive' style='width:100%'>
        <thead>
        <tr>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Tahun Angkatan</th>
          <th><b>Hasil</b></th>
        </tr>
        </thead>
        <tbody>";
  // Mencari nilai perkategori
  $nilaiCF = 0;
  $nilaiSF = 0;

  $queryB = mysqli_query($conn, "SELECT * FROM jenis_kriteria");
  if ($queryB == false) {
    die("Terdapat Kesalahan : " . mysqli_error($conn));
  }

  while ($row1 = mysqli_fetch_array($queryB)) {
    if ($row1['nama_kriteria'] == "Core Factor (CF)") {
      $nilaiCF = $row1['nilai_kriteria'];
    } else {
      $nilaiSF = $row1['nilai_kriteria'];
    }
  }

  // menampilkan data yang sudah di hitung
  while ($row = mysqli_fetch_array($query)) {

    // Data GAP
    $resultPsikomotor = $row['nilai_psikomotor_siswa'] - $row['nilai_standar_psikomotor'];
    $resultKognitif = $row['nilai_kognitif_siswa'] - $row['nilai_standar_kognitif'];
    $resultAfektif = $row['nilai_afektif_siswa'] - $row['nilai_standar_afektif'];
    $resultKeterampilan = $row['nilai_keterampilan_siswa'] - $row['nilai_standar_keterampilan'];
    $resultEskul = $row['nilai_eskul_siswa'] - $row['nilai_standar_eskul'];
    $resultKejujuran = $row['nilai_kejujuran_siswa'] - $row['nilai_standar_kejujuran'];
    $resultKerapihan = $row['nilai_kerapihan_siswa'] - $row['nilai_standar_kerapihan'];

    // Data Perhitungan CF , SF dan Hasil

    $hasilAkademikCF = (nilaiStandar($resultPsikomotor) + nilaiStandar($resultKognitif)) / 2;
    $hasilAkademikSF = nilaiStandar($resultAfektif) / 1;
    $hasilNonAkademikCF = nilaiStandar($resultKeterampilan) / 1;
    $hasilNonAkademikSF = nilaiStandar($resultEskul) / 1;
    $hasilKarakterCF = nilaiStandar($resultKejujuran) / 1;
    $hasilKarakterSF = nilaiStandar($resultKerapihan) / 1;

    $Na = (($nilaiCF / 100) * $hasilAkademikCF) + (($nilaiSF / 100) * $hasilAkademikSF);
    $NnA = (($nilaiCF / 100) * $hasilNonAkademikCF) + (($nilaiSF / 100) * $hasilNonAkademikSF);
    $NK = (($nilaiCF / 100) * $hasilKarakterCF) + (($nilaiSF / 100) * $hasilKarakterSF);
    $HA = (0.5 * $Na) + (0.3 * $NnA) + (0.2 * $NK);

    echo "<tr>";
    echo "<td>" . $row['nis'] . "</td>";
    echo "<td>" . $row['nama_siswa'] . "</td>";
    echo "<td>" . $row['kelas'] . "</td>";
    echo "<td>" . $row['tahun_angkatan'] . "</td>";
    echo "<td><b>" . $HA . "</b></td>";
  }
  echo '
        </tbody>
        <tfoot>
        <tr>
          <th>NIS</th>
          <th>Nama Siswa</th>
          <th>Kelas</th>
          <th>Tahun Angkatan</th>
          <th><b>Hasil</b></th>
        </tr>
    </tfoot>
    </table>';
}

?>