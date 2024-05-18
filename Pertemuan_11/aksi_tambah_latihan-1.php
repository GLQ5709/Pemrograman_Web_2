<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_pw2_pert11");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $namamhs = mysqli_real_escape_string($koneksi, $_POST['namamhs']);
    $matakuliah = mysqli_real_escape_string($koneksi, $_POST['matakuliah']);
    $uts = (float)$_POST['uts'];
    $uas = (float)$_POST['uas'];
    $tugas = (float)$_POST['tugas'];
    $jmlhadir = (int)$_POST['jmlhadir'];

    $sql = "INSERT INTO tblnilai (nim, namamhs, matakuliah, uts, uas, tugas, jmlhadir) 
            VALUES ('$nim', '$namamhs', '$matakuliah', $uts, $uas, $tugas, $jmlhadir)";

    if (mysqli_query($koneksi, $sql)) {
        include 'tampil_data_latihan-1.php';
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "No data received";
}

mysqli_close($koneksi);
?>
