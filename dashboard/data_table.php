<?php
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

function datatableSiswa($nilaiKelas){
    require "../koneksi.php";

    echo '
    <div class="col-lg-12">
    <div class="col-lg-6 col-lg-6 col-md-6 col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-description">Tabel Daftar Siswa Kelas 1</h4>
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row">';

                       
                        if ($_SESSION['level'] == "1") {
                            $sql = "SELECT * FROM data_siswa, nilai_standar WHERE kelas = '$nilaiKelas'";
                        } else {
                            header('location:../error-404.php');
                        }
                        $query = mysqli_query($conn, $sql);

                        if (!$query) {
                            die('SQL Error: ' . mysqli_error($conn));
                        }

                    echo '<table id="tabelKelasSatu" class="table table-striped table-bordered table-responsive" style="width:100%">
                    <thead>
                    <tr>
                      <th>NIS</th>
                      <th>Nama Siswa</th>
                      <th>Kelas</th>
                      <th>Tahun Angkatan</th>
                      <th><b>Hasil</b></th>
                    </tr>
                    </thead>
                    <tbody>';
                        // Mencari nilai perkategori
                        $nilaiCF = 0;
                        $nilaiSF = 0;

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
                            $resultPsikomotor = $row['nilai_psikomotor_siswa'] - $row['nilai_standar_psikomotor'];
                            $resultKognitif = $row['nilai_kognitif_siswa'] - $row['nilai_standar_kognitif'];
                            $resultAfektif = $row['nilai_afektif_siswa'] - $row['nilai_standar_afektif'];
                            $resultKeterampilan = $row['nilai_keterampilan_siswa'] - $row['nilai_standar_keterampilan'];
                            $resultEskul = $row['nilai_eskul_siswa'] - $row['nilai_standar_eskul'];
                            $resultKejujuran = $row['nilai_kejujuran_siswa'] - $row['nilai_standar_kejujuran'];
                            $resultKerapihan = $row['nilai_kerapihan_siswa'] - $row['nilai_standar_kerapihan'];

                            // Data Perhitungan CF , SF dan Hasil

                            $hasilAkademikCF = (nilaiStandar($resultPsikomotor) + nilaiStandar($resultKognitif)) / 2;
                            $hasilAkademikSF = nilaiStandar($resultAfektif) / 1;
                            $hasilNonAkademikCF = nilaiStandar($resultKeterampilan) / 1;
                            $hasilNonAkademikSF = nilaiStandar($resultEskul) / 1;
                            $hasilKarakterCF = nilaiStandar($resultKejujuran) / 1;
                            $hasilKarakterSF = nilaiStandar($resultKerapihan) / 1;

                            $Na = (($nilaiCF / 100) * $hasilAkademikCF) + (($nilaiSF / 100) * $hasilAkademikSF);
                            $NnA = (($nilaiCF / 100) * $hasilNonAkademikCF) + (($nilaiSF / 100) * $hasilNonAkademikSF);
                            $NK = (($nilaiCF / 100) * $hasilKarakterCF) + (($nilaiSF / 100) * $hasilKarakterSF);
                            $HA = (0.5 * $Na) + (0.3 * $NnA) + (0.2 * $NK);

                            echo "<tr>";
                            echo "<td>" . $row['nis'] . "</td>";
                            echo "<td>" . $row['nama_siswa'] . "</td>";
                            echo "<td>" . $row['kelas'] . "</td>";
                            echo "<td>" . $row['tahun_angkatan'] . "</td>";
                            echo "<td><b>" . $HA . "</b></td>";
                        }

                        echo '
                      </tbody>
                      <tfoot>
                      <tr>
                          <th>NIS</th>
                          <th>Nama Siswa</th>
                          <th>Kelas</th>
                          <th>Tahun Angkatan</th>
                          <th>Hasil</th>
                      </tr>
                  </tfoot>
                  </table>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}

?>


