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
                $('#tabelSatu').DataTable(

                    {
                        "aLengthMenu": [
                            [5, 10, 25, -1],
                            [5, 10, 25, "All"]
                        ],
                        "iDisplayLength": 5
                    }
                );
            });

            $(document).ready(function() {
                $('#tabelDua').DataTable(

                    {
                        "aLengthMenu": [
                            [5, 10, 25, -1],
                            [5, 10, 25, "All"]
                        ],
                        "iDisplayLength": 5
                    }
                );
            });

            $(document).ready(function() {
                $('#tabelTiga').DataTable(

                    {
                        "aLengthMenu": [
                            [5, 10, 25, -1],
                            [5, 10, 25, "All"]
                        ],
                        "iDisplayLength": 5
                    }
                );
            });

            $(document).ready(function() {
                $('#tabelEmpat').DataTable(

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
                                        <h4 class="card-description">Tabel GAP</h4>
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row">

                                                <?php
                                                if ($_SESSION['level'] == "1") {
                                                    $sql = 'SELECT * FROM data_siswa, nilai_standar';
                                                } else {
                                                    header('location:../error-404.php');
                                                }
                                                $query = mysqli_query($conn, $sql);

                                                if (!$query) {
                                                    die('SQL Error: ' . mysqli_error($conn));
                                                }

                                                echo '<table id="tabelSatu" class="table table-striped table-bordered table-responsive" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Tahun Angkatan</th>
                                                    <th>Alamat</th>
                                                    <th>Nilai Pengetahuan</th>
                                                    <th>Nilai Keterampilan</th>
                                                    <th>Nilai karakter</th>
                                                    <th>Nilai Eskul</th>
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>';
                                                $no = 1;

                                                while ($row = mysqli_fetch_array($query)) {
                                                    $resultpengetahuan = $row['nilai_pengetahuan_siswa'] - $row['nilai_standar_pengetahuan'];
                                                    $resultKeterampilan = $row['nilai_keterampilan_siswa'] - $row['nilai_standar_keterampilan'];
                                                    $resultKarakter = $row['nilai_karakter_siswa'] - $row['nilai_standar_karakter'];
                                                    $resultEskul = $row['nilai_eskul_siswa'] - $row['nilai_standar_eskul'];

                                                    echo "<tr>";
                                                    echo "<td>" . $no . "</td>";
                                                    echo "<td>" . $row['nis'] . "</td>";
                                                    echo "<td>" . $row['nama_siswa'] . "</td>";
                                                    echo "<td>" . $row['kelas'] . "</td>";
                                                    echo "<td>" . $row['tahun_angkatan'] . "</td>";
                                                    echo "<td>" . $row['alamat'] . "</td>";
                                                    echo "<td>" . $resultpengetahuan . "</td>";
                                                    echo "<td>" . $resultKeterampilan . "</td>";
                                                    echo "<td>" . $resultKarakter . "</td>";
                                                    echo "<td>" . $resultEskul . "</td>";

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
                                                    <th>Nilai Pengetahuan</th>  
                                                    <th>Nilai Keterampilan</th>
                                                    <th>Nilai karakter</th>
                                                    <th>Nilai Eskul</th>
                                                </tr>
                                            </tfoot>
                                            </table>';

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Data Table GAP-->

                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-description">Tabel Konversi Nilai Bobot</h4>
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row">

                                                <?php
                                                if ($_SESSION['level'] == "1") {
                                                    $sql = 'SELECT * FROM data_siswa, nilai_standar';
                                                } else {
                                                    header('location:../error-404.php');
                                                }
                                                $query = mysqli_query($conn, $sql);

                                                if (!$query) {
                                                    die('SQL Error: ' . mysqli_error($conn));
                                                }

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

                                                echo '<table id="tabelDua" class="table table-striped table-bordered table-responsive" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Tahun Angkatan</th>
                                                    <th>Alamat</th>
                                                    <th>Nilai Pengetahuan</th>  
                                                    <th>Nilai Keterampilan</th>
                                                    <th>Nilai karakter</th>
                                                    <th>Nilai Eskul</th>
                                                </tr>
                                                </thead>
                                                <tbody>';
                                                $no = 1;

                                                while ($row = mysqli_fetch_array($query)) {
                                                    // Nilai GAP
                                                    $resultpengetahuan = $row['nilai_pengetahuan_siswa'] - $row['nilai_standar_pengetahuan'];
                                                    $resultKeterampilan = $row['nilai_keterampilan_siswa'] - $row['nilai_standar_keterampilan'];
                                                    $resultKarakter = $row['nilai_karakter_siswa'] - $row['nilai_standar_karakter'];
                                                    $resultEskul = $row['nilai_eskul_siswa'] - $row['nilai_standar_eskul'];

                                                    echo "<tr>";
                                                    echo "<td>" . $no . "</td>";
                                                    echo "<td>" . $row['nis'] . "</td>";
                                                    echo "<td>" . $row['nama_siswa'] . "</td>";
                                                    echo "<td>" . $row['kelas'] . "</td>";
                                                    echo "<td>" . $row['tahun_angkatan'] . "</td>";
                                                    echo "<td>" . $row['alamat'] . "</td>";
                                                    echo "<td>" . nilaiStandar($resultpengetahuan) . "</td>";
                                                    echo "<td>" . nilaiStandar($resultKeterampilan) . "</td>";
                                                    echo "<td>" . nilaiStandar($resultKarakter) . "</td>";
                                                    echo "<td>" . nilaiStandar($resultEskul) . "</td>";

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
                                                    <th>Nilai Pengetahuan</th>  
                                                    <th>Nilai Keterampilan</th>
                                                    <th>Nilai karakter</th>
                                                    <th>Nilai Eskul</th>
                                                </tr>
                                            </tfoot>
                                            </table>';

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---- Data Tabel Konversi---->

                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-description">Tabel Nilai CF, SF dan Nilai Total</h4>
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row">

                                                <?php
                                                if ($_SESSION['level'] == "1") {
                                                    $sql = 'SELECT * FROM data_siswa, nilai_standar';
                                                } else {
                                                    header('location:../error-404.php');
                                                }
                                                $query = mysqli_query($conn, $sql);

                                                if (!$query) {
                                                    die('SQL Error: ' . mysqli_error($conn));
                                                }

                                                echo '<table id="tabelTiga" class="table table-striped table-bordered table-responsive" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th rowspan="2">NO</th>
                                                    <th rowspan="2">NIS</th>
                                                    <th rowspan="2">Nama Siswa</th>
                                                    <th rowspan="2">Kelas</th>
                                                    <th rowspan="2">Tahun Angkatan</th>
                                                    <th rowspan="2">Alamat</th>
                                                    <th colspan="3">Aspek Akademik</th>
                                                    <th colspan="3">Aspek Non Akademik</th>
                                                </tr>
                                                <tr>
                                                    <th>CF</th>
                                                    <th>SF</th>
                                                    <th>NA</th>
                                                    <th>CF</th>
                                                    <th>SF</th>
                                                    <th>NnA</th>
                                                </tr>
                                                </thead>
                                                <tbody>';
                                                // Mencari nilai perkategori
                                                $nilaiCF = 0;
                                                $nilaiSF = 0;
                                                $no = 1;

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
                                                    $resultpengetahuan = $row['nilai_pengetahuan_siswa'] - $row['nilai_standar_pengetahuan'];
                                                    $resultKeterampilan = $row['nilai_keterampilan_siswa'] - $row['nilai_standar_keterampilan'];
                                                    $resultKarakter = $row['nilai_karakter_siswa'] - $row['nilai_standar_karakter'];
                                                    $resultEskul = $row['nilai_eskul_siswa'] - $row['nilai_standar_eskul'];

                                                    // Data Perhitungan CF , SF dan Hasil

                                                    $hasilAkademikCF = nilaiStandar($resultpengetahuan) / 1;
                                                    $hasilAkademikSF = nilaiStandar($resultKeterampilan) / 1;
                                                    $hasilNonAkademikCF = nilaiStandar($resultKarakter) / 1;
                                                    $hasilNonAkademikSF = nilaiStandar($resultEskul) / 1;

                                                    $Na = (($nilaiCF / 100) * $hasilAkademikCF) + (($nilaiSF / 100) * $hasilAkademikSF);
                                                    $NnA = (($nilaiCF / 100) * $hasilNonAkademikCF) + (($nilaiSF / 100) * $hasilNonAkademikSF);

                                                    echo "<tr>";
                                                    echo "<td>" . $no . "</td>";
                                                    echo "<td>" . $row['nis'] . "</td>";
                                                    echo "<td>" . $row['nama_siswa'] . "</td>";
                                                    echo "<td>" . $row['kelas'] . "</td>";
                                                    echo "<td>" . $row['tahun_angkatan'] . "</td>";
                                                    echo "<td>" . $row['alamat'] . "</td>";
                                                    echo "<td>" . $hasilAkademikCF . "</td>";
                                                    echo "<td>" . $hasilAkademikSF . "</td>";
                                                    echo "<td>" . $Na . "</td>";
                                                    echo "<td>" . $hasilNonAkademikCF . "</td>";
                                                    echo "<td>" . $hasilNonAkademikSF . "</td>";
                                                    echo "<td>" . $NnA . "</td>";

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
                                                    <th>CF</th>
                                                    <th>SF</th>
                                                    <th>NA</th>
                                                    <th>CF</th>
                                                    <th>SF</th>
                                                    <th>NnA</th>
                                                </tr>
                                            </tfoot>
                                            </table>';

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---- Data Tabel Konversi---->

                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-description">Tabel Rekomendasi (Hasil Akhir)</h4>
                                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                                            <div class="row">

                                                <?php
                                                if ($_SESSION['level'] == "1") {
                                                    $sql = 'SELECT * FROM data_siswa, nilai_standar';
                                                } else {
                                                    header('location:../error-404.php');
                                                }
                                                $query = mysqli_query($conn, $sql);

                                                if (!$query) {
                                                    die('SQL Error: ' . mysqli_error($conn));
                                                }

                                                echo '<table id="tabelEmpat" class="table table-striped table-bordered table-responsive" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NIS</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Tahun Angkatan</th>
                                                    <th>Alamat</th>
                                                    <th>NA</th>
                                                    <th>NnA</th>
                                                    <th><b>Hasil</b></th>
                                                </tr>
                                                </thead>
                                                <tbody>';
                                                // Mencari nilai perkategori
                                                $nilaiCF = 0;
                                                $nilaiSF = 0;
                                                $no = 1;

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
                                                    $resultpengetahuan = $row['nilai_pengetahuan_siswa'] - $row['nilai_standar_pengetahuan'];
                                                    $resultKeterampilan = $row['nilai_keterampilan_siswa'] - $row['nilai_standar_keterampilan'];
                                                    $resultKarakter = $row['nilai_karakter_siswa'] - $row['nilai_standar_karakter'];
                                                    $resultEskul = $row['nilai_eskul_siswa'] - $row['nilai_standar_eskul'];

                                                    // Data Perhitungan CF , SF dan Hasil

                                                    $hasilAkademikCF = nilaiStandar($resultpengetahuan) / 1;
                                                    $hasilAkademikSF = nilaiStandar($resultKeterampilan) / 1;
                                                    $hasilNonAkademikCF = nilaiStandar($resultKarakter) / 1;
                                                    $hasilNonAkademikSF = nilaiStandar($resultEskul) / 1;

                                                    $Na = (($nilaiCF / 100) * $hasilAkademikCF) + (($nilaiSF / 100) * $hasilAkademikSF);
                                                    $NnA = (($nilaiCF / 100) * $hasilNonAkademikCF) + (($nilaiSF / 100) * $hasilNonAkademikSF);
                                                    $HA = (0.6 * $Na) + (0.4 * $NnA);

                                                    echo "<tr>";
                                                    echo "<td>" . $no . "</td>";
                                                    echo "<td>" . $row['nis'] . "</td>";
                                                    echo "<td>" . $row['nama_siswa'] . "</td>";
                                                    echo "<td>" . $row['kelas'] . "</td>";
                                                    echo "<td>" . $row['tahun_angkatan'] . "</td>";
                                                    echo "<td>" . $row['alamat'] . "</td>";
                                                    echo "<td>" . $Na . "</td>";
                                                    echo "<td>" . $NnA . "</td>";
                                                    echo "<td><b>" . $HA . "</b></td>";

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
                                                    <th>NA</th>
                                                    <th>NnA</th>
                                                    <th><b>Hasil</b></th>
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
                            <!---- Data Tabel Hasil Akhir---->
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

// $dataArr = [1, 3, 2, 1, 2, 4, 2, 5, 1];
// $jumlah = 0;

// for ($i = 0; $i < count($dataArr); $i++) {
//     if ($dataArr[$i] == 2) {
//         $jumlah += $dataArr[$i];
//     }
// }
// echo $jumlah;

?>

    </html>

    <!-- SELECT id_kriteria_kategori, nama_kategori,
COUNT(DISTINCT CASE WHEN id_kriteria_kategori = 1 THEN nama_kategori END) kriteria_count_a, 
COUNT(DISTINCT CASE WHEN id_kriteria_kategori = 2 THEN nama_kategori END) kriteria_count_b 
FROM kategori_penilaian -->