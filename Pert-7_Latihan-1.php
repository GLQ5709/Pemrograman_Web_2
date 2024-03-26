<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 7 - Soal Latihan 1</title>
</head>
<body>
    <h2>Pilih Materi yang Ingin Anda Pelajari</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="materi">Pilih Materi:</label><br>
        <input type="text" id="materi" name="materi" placeholder="Masukkan angka 1-4" required><br>
        <label for="detail">Detail:</label><br>
        <label for="1">[1] Hitung Nilai Akhir dan Grade</label><br>
        <label for="2">[2] Kalkulator</label><br>
        <label for="3">[3] Bilangan Genap Habis Dibagi 3</label><br>
        <label for="4">[4] Perkalian Matriks</label><br><br>
        <input type="submit" name="submit" value="Kirim">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $materi = $_POST["materi"];

        if ($materi >= 1 && $materi <= 4) {
            switch ($materi) {
                case '1':
                    // Jalankan program menentukan nilai akhir dan grade seperti file Pert-3_Latihan-2.php menggunakan IF.....ELSE
                    include "Pert-3_Latihan-2.php";
                    break;
                case '2':
                    // Jalankan program membuat kalkulator seperti file Pert-2_Latihan-2.php menggunakan SWITCH....CASE
                    include "Pert-2_Latihan-2.php";
                    break;
                case '3':
                    // Buatlah tampilan untuk menampilkan bilangan genap yang habis dibagi 3 dan hitung jumlah bilangan tersebut seperti file Pert-4_Latihan-3.php
                    include "Pert-4_Latihan-3.php";
                    break;
                case '4':
                    // Buatlah tampilan perkalian Matriks yang telah dikerjakan seperti file Pert-4_Latihan-2.php
                    include "Pert-4_Latihan-2.php";
                    break;
            }
        } else {
            echo "Pilih materi dengan memasukkan angka 1-4.";
        }
    }
    ?>
</body>
</html>