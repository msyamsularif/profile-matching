<?php

// Merubah nilai rata-rata menjadi bobot
function rataRata($rataRataNilai)
{
    if ($rataRataNilai >= 90 && $rataRataNilai <= 100) {
        return 5;
    } elseif ($rataRataNilai >= 80) {
        return 4;
    } elseif ($rataRataNilai >= 75) {
        return 3;
    } elseif ($rataRataNilai >= 30) {
        return 2;
    } else {
        return 1;
    }
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

// Function menampilkan data siswa perkelas
function datatableSiswa($nilaiKelas, $nomorTableKelas)
{
    require "../koneksi.php";

    if ($_SESSION['level'] == "1") {
        $sql = "SELECT * FROM data_siswa, nilai_standar WHERE kelas = '$nilaiKelas'";
    } else {
        header('location:../error-404.php');
    }
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die('SQL Error: ' . mysqli_error($conn));
    }

    echo "<table id='$nomorTableKelas' class='table table-striped table-bordered table-responsive' style='width:100%'>
  <thead>
  <tr>
    <th>NIS</th>
    <th>Nama Siswa</th>
    <th>Kelas</th>
    <th>Tahun Angkatan</th>
    <th><b>Hasil</b></th>
  </tr>
  </thead>
  <tbody>";
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

        // Mencari nilai rata - rata
        $rataPengetahuan = ($row['nilai_pengetahuan_agama_siswa'] + $row['nilai_pengetahuan_pkn_siswa'] + $row['nilai_pengetahuan_bindo_siswa'] + $row['nilai_pengetahuan_ipa_siswa'] + $row['nilai_pengetahuan_pjok_siswa']) / 5;
        $rataKeterampilan = ($row['nilai_keterampilan_agama_siswa'] + $row['nilai_keterampilan_pkn_siswa'] + $row['nilai_keterampilan_bindo_siswa'] + $row['nilai_keterampilan_ipa_siswa'] + $row['nilai_keterampilan_pjok_siswa']) / 5;

        $valueRataPengetahuan = rataRata($rataPengetahuan);
        $valueRataKeterampilan = rataRata($rataKeterampilan);
        
        // Nilai GAP
        $resultpengetahuan = $valueRataPengetahuan - $row['nilai_standar_pengetahuan'];
        $resultKeterampilan = $valueRataKeterampilan - $row['nilai_standar_keterampilan'];
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
        <th><b>Hasil</b></th>
    </tr>
    </tfoot>
    </table>';
}
