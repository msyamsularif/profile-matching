<?php
include("../koneksi.php");
?>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper">
          <div class="profile-image">
            <img src="../public/images/faces-clipart/pic-3.png" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?php echo $_SESSION['nama_user']; ?></p>
            <div>
              <?php
              $leveluser = $_SESSION["level"];
              $level = array(
                '1' => 'Admin',
                '2' => 'Guru',
              );
              ?>
              <small class="designation text-muted"><?php echo $level[$leveluser]; ?></small>
              <span class="status-indicator online"></span>
            </div>

          </div>
        </div>
      </div>
    </li>
    <?php
    if ($_SESSION['level'] == "1") {
      echo '       
            <li class="nav-item" >
              <a class="nav-link" href="../dashboard/index.php">
                <i class="menu-icon mdi mdi-monitor-multiple"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../jenis_kriteria">
                <i class="menu-icon mdi mdi-note-multiple"></i>
                <span class="menu-title">Jenis Kriteria</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../kategori_penilaian">
                <i class="menu-icon mdi mdi-tooltip-edit"></i>
                <span class="menu-title">Kategori Penilaian</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../data_siswa">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">Data Siswa</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-kategori" aria-expanded="false" aria-controls="ui-kategori">
                <i class="menu-icon mdi mdi-book-multiple-variant"></i>
                <span class="menu-title">Data Kriteria</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-kategori">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../psikomotor">Psikomotor</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../kognitif">Kognitif</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../afektif">Afektif</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../keterampilan">Keterampilan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../eskul">Eskul</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../kejujuran">Kejujuran</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../kerapihan">Kerapihan</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../nilai_standar">
                <i class="menu-icon mdi mdi-clipboard-text"></i>
                <span class="menu-title">Data Nilai Standar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../penilaian">
                <i class="menu-icon mdi mdi-approval"></i>
                <span class="menu-title">Penilaian</span>
              </a>
            </li>';
    } else {
      header("location:../error-404.php");
    }
    ?>
  </ul>
</nav>