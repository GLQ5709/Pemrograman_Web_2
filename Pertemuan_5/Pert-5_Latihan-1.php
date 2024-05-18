<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 5 - Soal Latihan 1</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: 20px;">
    Nama    : <input type="text" name="Nama" required><br><br>
    Email   : <input type="text" name="Email" required><br><br>
    <label for="komentar">Komentar  :</label>
    <textarea id="komentar" name="Komentar" rows="4" cols="50"></textarea><br><br>
    <input type="submit" value="Simpan">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['Nama'] ?? '';
    $email = $_POST['Email'] ?? '';
    $komentar = $_POST['Komentar'] ?? '';
    $data = "Nama: $nama\nEmail: $email\nKomentar: $komentar\n";
    $file = fopen('Pert-5_Bukutamu.dat', 'a');

    fwrite($file, $data);
    fclose($file);
}
?>
</body>
</html>