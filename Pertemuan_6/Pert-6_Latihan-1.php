<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 6 - Soal Latihan 1</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<?php
    // Mendefinisikan data alas dan tinggi segitiga dalam array secara langsung
    $data_segitiga = array(
        array("alas" => 5, "tinggi" => 6),
        array("alas" => 7, "tinggi" => 8),
        array("alas" => 9, "tinggi" => 10),
        array("alas" => 11, "tinggi" => 12),
        array("alas" => 13, "tinggi" => 14)
    );

    // Menghitung luas segitiga untuk setiap data dalam array
    foreach ($data_segitiga as $data) {
        $luas = 0.5 * $data["alas"] * $data["tinggi"];
        echo "Luas segitiga dengan alas " . $data["alas"] . " dan tinggi " . $data["tinggi"] . " adalah: " . $luas . "<br>";
    }
?>
<body>
    <h2>Input Data Segitiga</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Data Segitiga ke-1:</label><br>
        <label>Alas:</label>
        <input type='text' name='alas[]' required><br>
        <label>Tinggi:</label>
        <input type='text' name='tinggi[]' required><br><br>
        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    // Memulai session
    session_start();

    // Jika session data tidak ada, inisialisasikan sebagai array kosong
    if (!isset($_SESSION['data_segitiga'])) {
        $_SESSION['data_segitiga'] = array();
    }

    // Jika tombol "Hitung" ditekan
    if (isset($_POST["submit"])) {
        // Tambahkan data segitiga baru ke dalam session
        $_SESSION['data_segitiga'][] = array(
            "alas" => $_POST['alas'][0],
            "tinggi" => $_POST['tinggi'][0]
        );
    }

    // Menampilkan tabel untuk hasil perhitungan
    if (!empty($_SESSION['data_segitiga'])) {
        echo "<br><br><table>";
        echo "<tr><th>No</th><th>Alas</th><th>Tinggi</th><th>Luas</th></tr>";

        // Menghitung luas segitiga dan menampilkan dalam bentuk tabel
        foreach ($_SESSION['data_segitiga'] as $index => $data) {
            $luas = 0.5 * $data['alas'] * $data['tinggi'];
            echo "<tr><td>" . ($index + 1) . "</td><td>" . $data['alas'] . "</td><td>" . $data['tinggi'] . "</td><td>" . $luas . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "Belum ada data segitiga yang dimasukkan.";
    }
    ?>
</body>
</html>
