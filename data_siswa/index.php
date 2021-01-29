<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location:../index.php?pesan=belum_login");
} else if ($_SESSION['level'] == "1") {


?>
  <!DOCTYPE html>
  <html lang="en">
  <?php require "../koneksi.php"; ?>

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
                    <h4 class="card-title">Table Data Siswa</h4>
                    <h5 class="card-description">
                      <a href="input.php">Tambah data</a>
                    </h5>
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                      <div class="row">

                        <?php
                        if ($_SESSION['level'] == "1") {
                          $sql = 'SELECT * FROM data_siswa';
                        } else {
                          header('location:../error-404.php');
                        }
                        $query = mysqli_query($conn, $sql);

                        if (!$query) {
                          die('SQL Error: ' . mysqli_error($conn));
                        }

                        echo '<table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                        <tr>
                          <th rowspan="2">NO</th>
                          <th rowspan="2">NIS</th>
                          <th rowspan="2">Nama Siswa</th>
                          <th rowspan="2">Kelas</th>
                          <th rowspan="2">Tahun Angkatan</th>
                          <th rowspan="2">Alamat</th>
                          <th colspan="5">Pengetahuan</th>
                          <th colspan="5">Keterampilan</th>
                          <th rowspan="2">Nilai Karakter</th>
                          <th rowspan="2">Nilai Eskul</th>
                          <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Nilai Agama</th>
                            <th>Nilai PKN</th>
                            <th>Nilai B.Indonesia</th>
                            <th>Nilai IPA</th>
                            <th>Nilai PJOK</th>
                            <th>Nilai Agama</th>
                            <th>Nilai PKN</th>
                            <th>Nilai B.Indonesia</th>
                            <th>Nilai IPA</th>
                            <th>Nilai PJOK</th>
                        </tr>
                        </thead>
                        <tbody>';
                        $no = 1;

                        while ($row = mysqli_fetch_array($query)) {
                          echo "<tr>";
                          echo "<td>" . $no . "</td>";
                          echo "<td>" . $row['nis'] . "</td>";
                          echo "<td>" . $row['nama_siswa'] . "</td>";
                          echo "<td>" . $row['kelas'] . "</td>";
                          echo "<td>" . $row['tahun_angkatan'] . "</td>";
                          echo "<td>" . $row['alamat'] . "</td>";
                          echo "<td>" . $row['nilai_pengetahuan_agama_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_pengetahuan_pkn_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_pengetahuan_bindo_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_pengetahuan_ipa_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_pengetahuan_pjok_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_keterampilan_agama_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_keterampilan_pkn_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_keterampilan_bindo_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_keterampilan_ipa_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_keterampilan_pjok_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_karakter_siswa'] . "</td>";
                          echo "<td>" . $row['nilai_eskul_siswa'] . "</td>";

                          echo "<td align='center'><a href='form-edit.php?nis=$row[nis]'>Edit</a> | <a href='delete.php?nis=$row[nis]'>Delete</a></td></tr>";
                          $no++;
                        }
                        echo '
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>NO</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tahun Angkatan</th>
                            <th>Alamat</th>
                            <th>Nilai Agama</th>
                            <th>Nilai PKN</th>
                            <th>Nilai B.Indonesia</th>
                            <th>Nilai IPA</th>
                            <th>Nilai PJOK</th>
                            <th>Nilai Agama</th>
                            <th>Nilai PKN</th>
                            <th>Nilai B.Indonesia</th>
                            <th>Nilai IPA</th>
                            <th>Nilai PJOK</th>
                            <th>Nilai Karakter</th>
                            <th>Nilai Eskul</th>
                            <th>Action</th>
                          </tr>
                      </tfoot>
                      </table>';

                        // Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
                        mysqli_free_result($query);

                        // Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
                        mysqli_close($conn);
                        ?>
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
<?php
} else {
  header("location:../error-404.php");
}
?>

  </html>