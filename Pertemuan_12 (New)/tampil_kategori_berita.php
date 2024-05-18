<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Kategori & Berita</title>
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
                <th>Nama Kategori</th>
                <th>Judul Berita</th>
                <th>Isi Berita</th>
                <th>Penulis</th>
                <th>Tanggal Publish</th>
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

            $query = "SELECT tblkategori.nama_kategori, tblberita.idberita, tblberita.judul_berita, tblberita.isi_berita, tblberita.penulis, tblberita.tgl_dipublish FROM tblkategori INNER JOIN tblberita ON tblkategori.idkategori = tblberita.idkategori ORDER BY tblberita.tgl_dipublish DESC";
            $result = mysqli_query($koneksi, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nama_kategori'] . "</td>";
                    echo "<td>" . $row['judul_berita'] . "</td>";
                    echo "<td>" . $row['isi_berita'] . "</td>";
                    echo "<td>" . $row['penulis'] . "</td>";
                    echo "<td>" . $row['tgl_dipublish'] . "</td>";
                    echo "<td><a href='edit_kategori.php'>Update Kategori</a> | <a href='#'>Delete Kategori</a> | <a href='#'>Update Berita</a> | <a href='#'>Delete Berita</a></td>";
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
