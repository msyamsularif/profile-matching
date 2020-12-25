<?php
	session_start();
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level'] == ""){
		header("location:../index.php?pesan=belum_login");
	}
	else if ($_SESSION['level'] == "3" || $_SESSION['level'] == "1" || $_SESSION['level'] == "4") {
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
  table{
    width:100%;
}
#example_filter{
    float:right;
}
#example_paginate{
    float:right;
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

      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
        "iDisplayLength": 5
       } 
        );
} );
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
              <h4 class="card-title">Table Data Mahasiswa</h4>
							<div class="alert alert-danger container">
                <strong>Catetan! </strong><p>penambahan data hanya bisa dilakukan satu kali saat pengisian nilai, pastikan data yang di input sudah benar</p> 
              </div>
							<h5 class="card-description">
								<a style="color:white" href="input.php"><button type="button" class="btn btn-primary">Input Nilai</button></a>
              </h5>
				  <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
          <div class="row">

          <?php
					if ($_SESSION['level'] == "3"){
						$sql = "SELECT id_jadwal, kode_matkul_jadwal, nip_jadwal, kode_ruangan_jadwal, kode_prodi, hari, jam, kode_matkul_krs, id, sks,
															kode_matkul, nama_matkul,nip, nama, kode_ruangan, nama_ruangan, kode, nama_prodi, nama_krs FROM jadwal
															INNER JOIN mata_kuliah ON kode_matkul_jadwal=kode_matkul
															INNER JOIN krs ON kode_matkul_jadwal=kode_matkul_krs
															INNER JOIN data_dosen ON nip_jadwal=nip
															INNER JOIN ruangan ON kode_ruangan_jadwal=kode_ruangan
															INNER JOIN data_prodi ON kode_prodi=kode
															INNER JOIN users ON nip_jadwal=nip_user
															WHERE nip_jadwal='$_SESSION[nip_user]'";	
					}
					else if ($_SESSION['level'] == "1"){
						$sql = "SELECT id_jadwal, kode_matkul_jadwal, nip_jadwal, kode_ruangan_jadwal, kode_prodi, hari, jam, kode_matkul_krs, id, sks,
															kode_matkul, nama_matkul,nip, nama, kode_ruangan, nama_ruangan, kode, nama_prodi, nama_krs FROM jadwal
															INNER JOIN mata_kuliah ON kode_matkul_jadwal=kode_matkul
															INNER JOIN krs ON kode_matkul_jadwal=kode_matkul_krs
															INNER JOIN data_dosen ON nip_jadwal=nip
															INNER JOIN ruangan ON kode_ruangan_jadwal=kode_ruangan
															INNER JOIN data_prodi ON kode_prodi=kode
															INNER JOIN users ON nip_jadwal=nip_user";
					}
					$query = mysqli_query($conn, $sql);
						if (!$query) {
							die('SQL Error: ' . mysqli_error($conn));
						}
					while ($rows = mysqli_fetch_array($query)){
						$sql = "SELECT id_jadwal, kode_matkul_jadwal, nip_jadwal, kode_ruangan_jadwal, kode_prodi, hari, jam, kode_matkul_krs, id, sks,
														kode_matkul, nama_matkul,nip, nama, kode_ruangan, nama_ruangan, kode, nama_prodi, nama_krs, uts, uas, tugas, kode_matkul_nilai, id_nilai FROM jadwal
														INNER JOIN mata_kuliah ON kode_matkul_jadwal=kode_matkul
														INNER JOIN krs ON kode_matkul_jadwal=kode_matkul_krs
														INNER JOIN data_dosen ON nip_jadwal=nip
														INNER JOIN ruangan ON kode_ruangan_jadwal=kode_ruangan
														INNER JOIN data_prodi ON kode_prodi=kode
														INNER JOIN users ON nip_jadwal=nip_user
														INNER JOIN nilai ON kode_matkul_jadwal=kode_matkul_nilai
														WHERE kode_matkul_jadwal='$rows[kode_matkul_krs]'";
						$query_jadwal = mysqli_query($conn, $sql);
						if (!$query_jadwal) {
							die('SQL Error: ' . mysqli_error($conn));
						}

          echo '<table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
            <thead>
            <tr>
                <th rowspan="2">NO</th>
								<th rowspan="2">Kode Matkul</th>
								<th rowspan="2">Nama Mahasiswa</th>
								<th rowspan="2">Nama Matkul</th>
								<th rowspan="2">SKS</th>
								<th colspan="3" class="text-center">Nilai</th>
            </tr>
						<tr>
							<th>UTS</th>
							<th>UAS</th>
							<th>TUGAS</th>
						</tr>
            </thead>
                <tbody>';
									 $no=1;
											 while ($row = mysqli_fetch_array($query_jadwal)) {
													echo "<tr>";
													echo "<td>".$no."</td>";
													echo "<td>".$row['kode_matkul_krs']."</td>";
													echo "<td>".$row['nama_krs']."</td>";
													echo "<td>".$row['nama_matkul']."</td>";
													echo "<td>".$row['sks']."</td>";
													echo "<td>".$row['uts']."</td>";
													echo "<td>".$row['uas']."</td>";
													echo "<td>".$row['tugas']."</td>";
												$no++;
												}
												}
              echo '
              </tbody>
              <tfoot>
                <tr>
									<th>NO</th>
									<th>Kode Matkul</th>
									<th>Nama Mahasiswa</th>
									<th>Nama Matkul</th>
									<th>SKS</th>
									<th colspan="3" class="text-center">Nilai</th>
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
	}
	else{
		header("location:../error-404.php");
	}
?>
</html>