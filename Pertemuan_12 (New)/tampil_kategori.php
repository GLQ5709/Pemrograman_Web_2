<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .container1 {
            max-width: 1100px;
            margin: auto;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Hasil</h2>
    <table>
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $koneksi = mysqli_connect("localhost", "root", "", "dbBerita");
            if (mysqli_connect_errno()) {
                echo "Koneksi database gagal: " . mysqli_connect_error();
                exit();
            }

            $query = "SELECT idkategori, nama_kategori FROM tblkategori";
            $result = mysqli_query($koneksi, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['idkategori'] . "</td>";
                    echo "<td>" . $row['nama_kategori'] . "</td>";
                    echo "<td><a href='form_edit_kategori.php?idkategori=".$row['idkategori']."'>Update Kategori</a> | <a href='#'>Delete Kategori</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
            }
            mysqli_close($koneksi);
            ?>
        </tbody>
    </table>
</div>
<br>
<div class="container1">
    <a href="form_tambah_kategori.php" class="btn btn-primary btn-long">Kembali Ke Form Input Kategori?</a>
</div>
</body>
</html>
