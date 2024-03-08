<!DOCTYPE html>
<html lang="en">
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Nama Barang: <input type="text" name="nmbrg"><br>
    Harga Satuan: <input type="text" name="hsbrg"><br>
    Jumlah Barang: <input type="text" name="jmlbrg"><br>
    <input type="submit" value="kirim">
    <input type="reset" value="hapus">
</form>
<br>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari formulir
    $nmbrg = $_POST['nmbrg'];
    $hsbrg = $_POST['hsbrg'];
    $jmlbrg = $_POST['jmlbrg'];
    $harga = $hsbrg * $jmlbrg;

    // Menampilkan hasil perhitungan
    echo "Nama Barang: $nmbrg<br>";
    echo "Harga Satuan: Rp. $hsbrg<br>";
    echo "Jumlah Barang: $jmlbrg<br>"; 
    echo "Total Harga Barang: Rp. $harga<br>";
    }
?>
</body>
</html>