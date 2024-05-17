<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 2 - Latihan Soal 1</title>
    <style>
        table {
            border-collapse: collapse;
            width: 35%;
        }

        th, td {
            border: 2px solid black;
            padding: 5px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
    <pre>
    Nama        : <input type="text" name="nama"><br>
    Jurusan     : <input type="text" name="jurusan"><br>
    Nilai Tugas : <input type="text" name="tugas"><br>
    Nilai UTS   : <input type="text" name="uts"><br>
    Nilai UAS   : <input type="text" name="uas"><br>
    <input type="submit" value="HITUNG">
    </pre>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari input
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    // Menghitung rata-rata nilai
    $rata_rata = ($tugas + $uts + $uas) / 3;

    // Menampilkan hasil
    echo "<h2>Hasil Perhitungan:</h2>";
    echo "<table>";
    echo "<tr><th>Nama</th><td>$nama</td></tr>";
    echo "<tr><th>Jurusan</th><td>$jurusan</td></tr>";
    echo "<tr><th>Nilai Tugas</th><td>$tugas</td></tr>";
    echo "<tr><th>Nilai UTS</th><td>$uts</td></tr>";
    echo "<tr><th>Nilai UAS</th><td>$uas</td></tr>";
    echo "<tr><th>Rata-rata</th><td>$rata_rata</td></tr>";
    echo "</table>";
}
?>
</body>
</html>
