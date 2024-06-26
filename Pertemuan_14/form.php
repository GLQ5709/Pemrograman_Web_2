<?php
    include'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Tabel 1</h2>
    <table style=>
    <tr>
        <th>kode</th>
        <th>nama barang</th>
        <th>jumlah</th>
    </tr>
    <?php
        $tabel_1 = mysqli_query($koneksi,"select * from tabel_1");
        While($dataku=mysqli_fetch_row($tabel_1))
        echo"<tr>
                <td>$dataku[0]</td>
                <td>$dataku[1]</td>
                <td>$dataku[2]</td>
            </tr>";
    ?>
    </table>
    <h2>Tabel 2</h2>
    <table style=>
    <tr>
        <th>kode</th>
        <th>nama barang</th>
        <th>jumlah</th>
    </tr>
    <?php
        $tabel_2 = mysqli_query($koneksi,"select * from tabel_2");
        While($data2=mysqli_fetch_row($tabel_2))
        echo"<tr>
                <td>$data2[0]</td>
                <td>$data2[1]</td>
                <td>$data2[2]</td>
            </tr>";
    ?>
    </table>
    <h2>kirim barang</h2>
    <form action="aksi_form.php" method="post">
        <label>kode barang :</label>
        <select name="kode">
            <?php
                $tabel_2 = mysqli_query($koneksi,"select * from tabel_1");
                While($data1=mysqli_fetch_row($tabel_1))
                echo'<option value="'.$data1[0].'">'.$data1[0].'/'.$data1[1].'</option>';
            ?>
        </select><br><br>
        <label>jumlah:</label><input type="number" name="jumlah"><br><br>
        <input type="submit" value="kirim">
    </form>
</body>
</html>