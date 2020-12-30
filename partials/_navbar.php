<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex align-items-top justify-content-center">
    <a class="navbar-brand" href="../dashboard/index.php">
      <!-- <img src="../public/images/logo-nav.png" alt="logo"/> -->
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">

    <!--tanggal-->
    <script language="JavaScript">
      var tanggallengkap = new String();
      var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
      namahari = namahari.split(" ");
      var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
      namabulan = namabulan.split(" ");
      var tgl = new Date();
      var hari = tgl.getDay();
      var tanggal = tgl.getDate();
      var bulan = tgl.getMonth();
      var tahun = tgl.getFullYear();
      tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
    </script>

    <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

      <?php
      if ($_SESSION['level'] == "1") {
      ?>
        <li class='nav-item active'>
          <span class="nav-link">
            <h6>
              <script language='JavaScript'>
                document.write(tanggallengkap);
              </script>
            </h6>
          </span>
        </li>
        <li class="nav-item">
          <a href="../add_user" class="nav-link">
            <i class="mdi mdi-bookmark-plus-outline"></i>Add_User</a>
        </li>
        <li class="nav-item">
          <a href="../user_group" class="nav-link">
            <i class="mdi mdi-elevation-rise"></i>User_Group</a>
        </li>

      <?php
      } else {
      ?>
        <li class='nav-item active'>
          <span class="nav-link">
            <h6>
              <script language='JavaScript'>
                document.write(tanggallengkap);
              </script> |
            </h6>
            <h6 id="jam"></h6>
          </span>
        </li>
      <?php
      }
      ?>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown d-none d-xl-inline-block">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
          <span class="profile-text">Hello, <?php echo $_SESSION['nama_user']; ?> !</span>
          <img class="img-xs rounded-circle" src="../public/images/faces-clipart/pic-3.png" alt="Profile image">
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <a class="dropdown-item p-0">
            <div class="d-flex border-bottom">
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                <i class="mdi mdi-account-outline mr-0 text-gray"></i>
              </div>
              <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
              </div>
            </div>
          </a>
          <a href="../logout.php" class="dropdown-item">
            Sign Out
          </a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-menu"></span>
    </button>
  </div>
</nav>