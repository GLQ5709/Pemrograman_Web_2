<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 8 - Latihan 1</title>
</head>
<body>
    <p>Soal: 1. Buatlah program aplikasi menggunakan fungsi tanggal, tuliskan soal, algoritma(proses) dan output yang dihasilkan
</p>
    <center>
        <h1>
            <?php
                // Algoritma:
                // 1. Dapatkan tanggal dan waktu saat ini menggunakan fungsi getdate().
                $skrg = getdate();
                $bulan1 = $skrg['month'];
                $hari1 = $skrg['mday'];
                $tahun1 = $skrg['year'];
                $jam1 = $skrg['hours'];
                $menit1 = $skrg['minutes'];
                $detik1 = $skrg['seconds'];

                // 2. Tentukan ucapan selamat berdasarkan jam saat ini.
                if ($jam1 <= 11) {
                    echo "Selamat Pagi";
                } elseif ($jam1 > 11 && $jam1 <= 15) {
                    echo "Selamat Siang";
                } elseif ($jam1 > 15 && $jam1 <= 18) {
                    echo "Selamat Sore";
                } else {
                    echo "Selamat Malam";
                }
            ?>
        </h1>
        <h2>Selamat jumpa</h2>
        <h3>Saat ini tanggal 
            <?php 
                // 3. Tampilkan pesan ucapan selamat dan waktu dalam format yang diinginkan.
                echo "$hari1 $bulan1 $tahun1, jam $jam1:$menit1:$detik1";
            ?>
        </h3>
    </center>
</body>
</html>
