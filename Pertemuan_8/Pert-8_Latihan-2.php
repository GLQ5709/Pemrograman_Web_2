<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 8 - Latihan 2</title>
</head>
<body>
    <p>Soal: 2. Buatlah program aplikasi menggunakan fungsi string, tuliskan soal, algoritma(proses) dan output yang dihasilkan</p>
    <form method="post" action="">
        <label for="kalimat">Masukkan kalimat:</label><br>
        <input type="text" id="kalimat" name="kalimat" size="50"><br><br>
        <input type="submit" value="Proses">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Algoritma:
            // 1. Dapatkan input berupa kalimat.
            $kalimat = $_POST['kalimat'];

            echo "<h2>Hasil Operasi String</h2>";
            echo "Kalimat asli: '$kalimat'<br>";

            // 2. Hitung panjang kalimat menggunakan strlen().
            echo "Jumlah karakter: " . strlen($kalimat) . "<br>";

            // 3. Ubah seluruh kalimat menjadi huruf besar menggunakan strtoupper().
            echo "Huruf besar: " . strtoupper($kalimat) . "<br>";

            // 4. Ubah seluruh kalimat menjadi huruf kecil menggunakan strtolower().
            echo "Huruf kecil: " . strtolower($kalimat) . "<br>";

            // 5. Buat huruf pertama dari setiap kata menjadi huruf besar menggunakan ucwords().
            echo "Huruf pertama setiap kata besar: " . ucwords($kalimat) . "<br>";

            // 6. Pangkas spasi di awal dan akhir kalimat menggunakan trim().
            echo "Trimmed: '" . trim($kalimat) . "'<br>";
        }
    ?>
</body>
</html>
