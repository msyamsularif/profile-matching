<?php
	session_start();
	include("../koneksi.php");
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level'] == ""){
		header("location:../index.php?pesan=belum_login");
	}
	$daftarnilai[] = "A";
	$daftarnilai[] = "B";
	$daftarnilai[] = "C";
	$daftarnilai[] = "D";
	$daftarnilai[] = "E";
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
                <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Input Data Nilai</h4>
									<br/>
                  <form class="form-sample" action="input_proses.php" method="post">
                    <div class="row">
											 <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">NAMA</label>
                          <div class="col-sm-9">
                            <select name="nim_nilai" class="form-control">
															<?php
																
																$query = mysqli_query ($conn, "SELECT id_jadwal, kode_matkul_jadwal, nip_jadwal, kode_ruangan_jadwal, kode_prodi, hari, jam, kode_matkul_krs, id, sks,
																											kode_matkul, nama_matkul,nip, nama, kode_ruangan, nama_ruangan, kode, nama_prodi, nama_krs, nim_krs FROM jadwal
																											INNER JOIN mata_kuliah ON kode_matkul_jadwal=kode_matkul
																											INNER JOIN krs ON kode_matkul_jadwal=kode_matkul_krs
																											INNER JOIN data_dosen ON nip_jadwal=nip
																											INNER JOIN ruangan ON kode_ruangan_jadwal=kode_ruangan
																											INNER JOIN data_prodi ON kode_prodi=kode
																											INNER JOIN users ON nip_jadwal=nip_user
																											WHERE nip_jadwal='$_SESSION[nip_user]'");
																if ($query == false){
																	die ("Terdapat Kesalahan : ". mysqli_error($conn));
																}
																while ($row = mysqli_fetch_array($query)){
																	echo "<option value='$row[nim_krs]'>$row[nama_krs]</option>";
																}
															?>
														</select>
                          </div>
                        </div>
                      </div>
											<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">MATAKULIAH</label>
                          <div class="col-sm-9">
                            <select name="kode_matkul_nilai" class="form-control">
															<?php

																$query = mysqli_query ($conn, "SELECT id_jadwal, kode_matkul_jadwal, nip_jadwal, kode_ruangan_jadwal, kode_prodi, hari, jam, kode_matkul_krs, id, sks,
																											kode_matkul, nama_matkul,nip, nama, kode_ruangan, nama_ruangan, kode, nama_prodi, nama_krs FROM jadwal
																											INNER JOIN mata_kuliah ON kode_matkul_jadwal=kode_matkul
																											INNER JOIN krs ON kode_matkul_jadwal=kode_matkul_krs
																											INNER JOIN data_dosen ON nip_jadwal=nip
																											INNER JOIN ruangan ON kode_ruangan_jadwal=kode_ruangan
																											INNER JOIN data_prodi ON kode_prodi=kode
																											INNER JOIN users ON nip_jadwal=nip_user
																											WHERE nip_jadwal='$_SESSION[nip_user]'");
																if ($query == false){
																	die ("Terdapat Kesalahan : ". mysqli_error($conn));
																}
																while ($row = mysqli_fetch_array($query)){
																	echo "<option value='$row[kode_matkul]'>$row[nama_matkul]</option>";
																}
															?>
														</select>
                          </div>
                        </div>
                      </div>
											<div class="container-fluid" style="margin: 2px 0 10px 0">
												<center>
													<h4>-- Keterangan Nilai --</h4>
												</center>
											</div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">UTS</label>
                          <div class="col-sm-9">
                           <select name="uts" class="form-control">
														<option value="" selected="selected">Grade Nilai</option>
														<?php
															for($nilai=0; $nilai<count($daftarnilai); $nilai++)
															{
																echo "<option value='$daftarnilai[$nilai]'>$daftarnilai[$nilai]</option>";
															}
														?>
														</select>
                          </div>
                        </div>
                      </div>
											<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">UAS</label>
                          <div class="col-sm-9">
                           <select name="uas" class="form-control">
														<option value="" selected="selected">Grade Nilai</option>
														<?php
															for($nilai=0; $nilai<count($daftarnilai); $nilai++)
															{
																echo "<option value='$daftarnilai[$nilai]'>$daftarnilai[$nilai]</option>";
															}
														?>
														</select>
                          </div>
                        </div>
                      </div>
											<div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">TUGAS</label>
                          <div class="col-sm-9">
                           <select name="tugas" class="form-control">
														<option value="" selected="selected">Grade Nilai</option>
														<?php
															for($nilai=0; $nilai<count($daftarnilai); $nilai++)
															{
																echo "<option value='$daftarnilai[$nilai]'>$daftarnilai[$nilai]</option>";
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
													<span>
														Batal
													</span>
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