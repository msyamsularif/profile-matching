<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location:../index.php?pesan=belum_login");
}
// memanggil file koneksi.php untuk membuat koneksi
include '../koneksi.php';

// mengecek apakah di url ada nilai GET id
// ambil nilai id dari url dan disimpan dalam variabel $id
$id_user = ($_GET["id_user"]);

// menampilkan data mahasiswa dari database yang mempunyai id=$id
$query = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
if ($query == false) {
  die("Terjadi Kesalahan : " . mysqli_error($conn));
}
while ($row = mysqli_fetch_array($query)) {
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
                          <h4 class="card-title">Edit Data User</h4>
                          <br />
                          <form class="form-sample" action="proses-edit.php" enctype="multipart/form-data" method="post">
                            <input name="id_user" type="hidden" value="<?php echo $id_user; ?>" />
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">NIP USER</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="nip_user" class="form-control" value="<?php echo $row['nip_user']; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">NAMA USER</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="nama_user" class="form-control" value="<?php echo $row['nama_user']; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">USERNAME</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">PASSWORD</label>
                                  <div class="col-sm-9">
                                    <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">LEVEL</label>
                                  <div class="col-sm-9">
                                    <select name="level" class="form-control">
                                      <?php
                                      $query = mysqli_query($conn, "SELECT kode_user, nama_usergroup, level FROM user INNER JOIN user_group ON kode_user=level WHERE id_user='$id_user'");
                                      if ($query == false) {
                                        die("Terdapat Kesalahan : " . mysqli_error($conn));
                                      }
                                      while ($rows = mysqli_fetch_array($query)) {
                                        echo "<option value='$rows[level]' selected>$rows[nama_usergroup]</option>";
                                      }

                                      $query = mysqli_query($conn, "SELECT * FROM user_group");
                                      if ($query == false) {
                                        die("Terdapat Kesalahan : " . mysqli_error($conn));
                                      }
                                      while ($row1 = mysqli_fetch_array($query)) {
                                        if ($row1["kode_user"] != $row["level"]) {
                                          echo "<option value='$row1[kode_user]'>$row1[nama_usergroup]</option>";
                                        }
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group row">
                                  <label class="col-sm-3 col-form-label">JABATAN</label>
                                  <div class="col-sm-9">
                                    <select name="jabatan_user" class="form-control">
                                      <?php
                                      echo "<option value='$row[jabatan_user]' selected hidden>$row[jabatan_user]</option>";
                                      ?>
                                      <option value='Admin'>Admin</option>
                                      <option value='Guru'>Guru</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
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
          <?php } ?>
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