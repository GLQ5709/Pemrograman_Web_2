<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilkan Hasil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .container1 {
            max-width: 1100px;
            margin: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Hasil</h2>
        <table class="table">
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
                $koneksi = mysqli_connect("localhost", "root", "", "dbberita");

                if (mysqli_connect_errno()) {
                    echo "Koneksi database gagal: " . mysqli_connect_error();
                    exit();
                }

                $query = "SELECT tblKategori.nama_kategori, tblBerita.idBerita, tblBerita.judul_berita, tblBerita.isi_berita, tblBerita.penulis, tblBerita.tgl_dipublish FROM tblKategori INNER JOIN tblBerita ON tblKategori.idKategori = tblBerita.idKategori ORDER BY tblBerita.tgl_dipublish DESC";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['nama_kategori'] . "</td>";
                        echo "<td>" . $row['judul_berita'] . "</td>";
                        echo "<td>" . $row['isi_berita'] . "</td>";
                        echo "<td>" . $row['penulis'] . "</td>";
                        echo "<td>" . $row['tgl_dipublish'] . "</td>";
                        echo "<td>";
                        echo "<button onclick='deleteBerita(" . $row['idBerita'] . ")' class='btn btn-danger btn-sm'>Hapus</button>";
                        echo "<button onclick='updateBerita(" . $row['idBerita'] . ")' class='btn btn-warning btn-sm'>Edit</button>";
                        echo "</td>";
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
    <div class="container1">
        <a href="index.php" class="btn btn-primary btn-long">Kembali?</a>
    </div>

    <script>
        function deleteBerita(idBerita) {
            if (confirm('Apakah Anda yakin ingin menghapus berita ini?')) {
                window.location.href = 'delete_hasil.php?idBerita=' + idBerita;
            }
        }

        function updateBerita(idBerita) {
            window.location.href = 'update_hasil.php?idBerita=' + idBerita;
        }
    </script>
</body>
</html>