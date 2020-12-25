<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <?php require "partials/_head.php"; ?>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="public/css/style.css">
  <!-- endinject -->
  <style>
    .logo img{
      width: 100%;
      height: 100%;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
            <div class="container">
              <a class="logo">
                <img src="public/images/logo_teknik.png">
              </a>
            </div>
              <div>
                <!-- BEGIN::Menampilkan Keterangan Gagal Jika Username dan Password Gagal -->
                <?php 
                if(isset($_GET['pesan'])){
                  if($_GET['pesan']=="gagal"){
                    //echo "<script> alert('Username atau Password salah!');document.location.href='index.php'</script>";
                    echo "<div class='alert alert-danger'>
                            <strong>Warning! </strong> Username Atau Password Salah!
                          </div>";
                  }
                  else if($_GET['pesan']=="belum_login"){
                    //echo "<script> alert('Anda Harus Login!');document.location.href='index.php'</script>";
                    echo "<div class='alert alert-danger'>
                            <strong>Warning! </strong> Anda Harus Login!
                          </div>";
                  }
                }
              ?>
                <!-- END::Menampilkan Keterangan Gagal Jika Username dan Password Gagal -->
              </div>
              <form action="login_proses.php" method="post">
                <div class="form-group">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="username">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="*********">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" name="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                </div>
              </form>
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2019 <a href="https://localhost/siaunkris">SIA Unkris</a>. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="public/js/off-canvas.js"></script>
  <script src="public/js/misc.js"></script>
  <!-- endinject -->
</body>

</html>