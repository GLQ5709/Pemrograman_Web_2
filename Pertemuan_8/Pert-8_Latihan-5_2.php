<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getdate</title>
</head>
<body>
    <center>
    <h1>
        <?php
            $skrg = getdate();
            $bulan1 = $skrg['month'];
            $hari1 = $skrg['mday'];
            $tahun1 = $skrg['year'];
            $jam1 = $skrg['hours'];

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
            echo "$hari1 $bulan1 $tahun1";
        ?>
    </h3>
    </center>
</body>
</html>
