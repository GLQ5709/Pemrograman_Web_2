<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 3 - Latihan Soal 2</title>
</head>
<body>
    <h2>Hitung Nilai Akhir dan Keterangan Grade</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br>
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim" required><br>
        <label for="matakuliah">Matakuliah:</label><br>
        <input type="text" id="matakuliah" name="matakuliah" required><br>
        <label for="kehadiran">Jumlah Kehadiran:</label><br>
        <input type="number" id="kehadiran" name="kehadiran" required><br>
        <label for="tugas">Nilai Tugas:</label><br>
        <input type="number" id="tugas" name="tugas" required><br>
        <label for="uts">Nilai UTS:</label><br>
        <input type="number" id="uts" name="uts" required><br>
        <label for="uas">Nilai UAS:</label><br>
        <input type="number" id="uas" name="uas" required><br><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST["nama"];
        $nim = $_POST["nim"];
        $matakuliah = $_POST["matakuliah"];
        $kehadiran = $_POST["kehadiran"];
        $tugas = $_POST["tugas"];
        $uts = $_POST["uts"];
        $uas = $_POST["uas"];

        // Hitung Nilai Akhir
        $nilai_akhir = ($kehadiran * 0.1) + ($tugas * 0.2) + ($uts * 0.3) + ($uas * 0.4);

        // Tentukan Grade
        if ($nilai_akhir >= 80) {
            $grade = "A";
        } elseif ($nilai_akhir >= 70) {
            $grade = "B";
        } elseif ($nilai_akhir >= 60) {
            $grade = "C";
        } elseif ($nilai_akhir >= 50) {
            $grade = "D";
        } else {
            $grade = "E";
        }

        // Tampilkan hasil
        echo "<h3>Hasil Perhitungan</h3>";
        echo "<p>Nama: $nama</p>";
        echo "<p>NIM: $nim</p>";
        echo "<p>Matakuliah: $matakuliah</p>";
        echo "<p>Nilai Akhir: $nilai_akhir</p>";
        echo "<p>Grade: $grade</p>";
    }
    ?>
</body>
</html>