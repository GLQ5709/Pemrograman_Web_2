<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        p {
            text-align: right;
            font-size: xx-small;
            color: gray;
        }
        .container1 {
            max-width: 800px; /* Adjusted max-width */
            margin: auto;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        .btn-long {
            width: 100%;
        }
        h2 {
            margin-top: 2rem;
        }
    </style>
</head>
<body>
<p>RYO AKBAR - 211011400877 - 06TPLM004</p>
    <div class="container">
        <h2>Form Input Kategori</h2>
        <form action="tambah_kategori.php" method="POST">
            <div class="mb-3">
                <label for="idkategori" class="form-label">ID Kategori:</label>
                <input type="text" class="form-control" id="idkategori" name="idkategori" required>
                <label for="nama_kategori" class="form-label">Nama Kategori:</label>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br><br><br>
    <div class="container1">
        <a href="tampil_kategori.php" class="btn btn-primary btn-long">Menampilkan Table Kategori?</a>
    </div>
    <h3><center>Atau</center></h3>
    <div class="container1">
        <a href="form_tambah_berita.php" class="btn btn-primary btn-long">Lanjut Ke Form Input Berita?</a>
    </div>
</body>
</html>