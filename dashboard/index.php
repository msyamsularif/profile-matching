<?php
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level'] == ""){
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
	<style>
		.jumbotron{
			background-color: #1E90FF;
		}
	</style>
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
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-school text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Mahasiswa</p>
                      <div class="fluid-container">
												<?php
                        $sql = 'SELECT * FROM data_mahasiswa';
                        
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
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Mahasiswa
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi  mdi-account-location text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jumlah Dosen</p>
                      <div class="fluid-container">
												<?php
												$sql = 'SELECT * FROM data_dosen';

												$query = mysqli_query($conn, $sql);
							
												if (!$query) {
													die('SQL Error: ' . mysqli_error($conn));
												}
												?>
                        <h3 class="font-weight-medium text-right mb-0"><?php echo mysqli_num_rows($query) ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Dosen
                  </p>
                </div>
              </div>
            </div>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-library-books text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Jumlah Matakuliah</p>
                      <div class="fluid-container">
												<?php
												$sql = 'SELECT * FROM mata_kuliah';

												$query = mysqli_query($conn, $sql);
							
												if (!$query) {
													die('SQL Error: ' . mysqli_error($conn));
												}
												?>
                        <h3 class="font-weight-medium text-right mb-0"><?php echo mysqli_num_rows($query) ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Matkul
                  </p>
                </div>
              </div>
            </div>
						<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <i class="mdi mdi-book text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Total Ruangan</p>
                      <div class="fluid-container">
												<?php
												$sql = 'SELECT * FROM ruangan';

												$query = mysqli_query($conn, $sql);
							
												if (!$query) {
													die('SQL Error: ' . mysqli_error($conn));
												}
												?>
                        <h3 class="font-weight-medium text-right mb-0"><?php echo mysqli_num_rows($query) ?></h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark mr-1" aria-hidden="true"></i> Data Ruangan
                  </p>
                </div>
              </div>
            </div>				
          </div>
					
					<div class="jumbotron">
						<h1>Helloo....</h1>
						<h3>Selamat Datang di Sistem Informasi Akademik Fakultas Teknik Unkris</h3>
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