<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 2 - Latihan Soal 2</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>===== NILAI 1 =====</label>
        <label style="margin-left: 33.5px;">===== NILAI 2 =====</label><br>
        <input type="number" name="nilai1">
        <select id="operator" name="operator">
            <option value="tambah">+</option>
            <option value="kurang">-</option>
            <option value="kali">x</option>
            <option value="bagi">/</option>
        </select>
        <input type="number" name="nilai2">
        <input type="submit" value="Submit">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nilai1 = $_POST["nilai1"];
        $nilai2 = $_POST["nilai2"];
        $operator = $_POST["operator"];
        $hasil = 0;

        switch ($operator) {
            case "tambah":
                $hasil = $nilai1 + $nilai2;
                break;
            case "kurang":
                $hasil = $nilai1 - $nilai2;
                break;
            case "kali":
                $hasil = $nilai1 * $nilai2;
                break;
            case "bagi":
                if ($nilai2 != 0) {
                    $hasil = $nilai1 / $nilai2;
                } else {
                    echo "Error: Pembagian dengan nilai 0 tidak diperbolehkan.";
                }
                break;
            default:
                echo "Error: Operator tidak valid.";
                break;
        }

        echo "<h2>Hasil Perhitungan:</h2>";
        echo "<p>$nilai1 $operator $nilai2 = $hasil</p>";
    }
    ?>
</body>
</html>