<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 4 - Latihan Soal 2</title>
    <style>
        p {
            margin: 0;
            margin-left: 35px;
        }
    </style>
</head>
<body>
    <h2>Tabel Perkalian 12</h2>
    <h2>==============</h2>
    <?php
    $i = 12;
    for ($j = 15; $j <= 45; $j += 2) {
        echo "<p>$i * $j = " . ($i * $j) . "</p>";
    }
    ?>
</body>
</html>
