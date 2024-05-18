<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_pw2_pert11");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

$select_sql = "SELECT nim, namamhs, matakuliah, jmlhadir, tugas, uts, uas, nilaiakhir, grade FROM tblnilai ORDER BY nilaiakhir DESC";
$result = mysqli_query($koneksi, $select_sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h2>Record yang diurutkan berdasarkan Nilai Akhir Tertinggi:</h2>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "NIM: " . $row['nim'] . "<br>";
        echo "Nama: " . $row['namamhs'] . "<br>";
        echo "Matakuliah: " . $row['matakuliah'] . "<br>";
        echo "Nilai Kehadiran: " . $row['jmlhadir'] . "<br>";
        echo "Tugas: " . $row['tugas'] . "<br>";
        echo "UTS: " . $row['uts'] . "<br>";
        echo "UAS: " . $row['uas'] . "<br>";
        echo "Nilai Akhir: " . $row['nilaiakhir'] . "<br>";
        echo "Grade: " . $row['grade'] . "<br><br>";
    }
} else {
    echo "Tidak ada record yang ditemukan";
}

mysqli_close($koneksi);
?>