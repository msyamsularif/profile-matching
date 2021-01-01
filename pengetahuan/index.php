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
                    <h4 class="card-title">Table Pengetahuan</h4>
                    <h5 class="card-description">
                      <a href="input.php">Tambah data</a>
                    </h5>
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                      <div class="row">

                        <?php
                        if ($_SESSION['level'] == "1") {
                          $sql = 'SELECT * FROM pengetahuan';
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
                            <th>NO</th>
                            <th>Range Penilaian</th>
                            <th>Bobot</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>';
                        $no = 1;
                        while ($row = mysqli_fetch_array($query)) {
                          echo "<tr>";
                          echo "<td>" . $no . "</td>";
                          echo "<td>" . $row['range_penilaian_pengetahuan'] . "</td>";
                          echo "<td>" . $row['bobot_pengetahuan'] . "</td>";
                          echo "<td align='center'><a href='form-edit.php?bobot_pengetahuan=$row[bobot_pengetahuan]'>Edit</a> | <a href='delete.php?bobot_pengetahuan=$row[bobot_pengetahuan]'>Delete</a></td></tr>";
                          $no++;
                        }
                        echo '
                        </tbody>
                        <tfoot>
                          <tr>
                              <th>NO</th>
                              <th>Range Penilaian</th>
                              <th>Bobot</th>
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