<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $nim = $_GET['nim'];
    $sql = "SELECT * FROM tabel_mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "<div class='alert alert-danger' role='alert'>Data Mahasiswa tidak ditemukan!</div>";
        exit;
    }
    mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Detail Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="window.print()">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Detail Data Mahasiswa</h3>
                <table class="table table-bordered">
                    <tr>
                        <th>NIM</th>
                        <td><?= $row['nim'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= $row['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td><?= $row['kelas'] ?></td>
                    </tr>
                    <tr>
                        <th>Jurusan</th>
                        <td><?= $row['jurusan'] ?></td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td><?= $row['semester'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
