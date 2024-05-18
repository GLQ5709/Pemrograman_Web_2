<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Berita</title>
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
        <h2>Form Input Berita</h2>
        <form action="tambah_berita.php" method="POST">
            <div class="mb-3">
                <label for="idberita" class="form-label">ID Berita:</label>
                <input type="number" class="form-control" id="idberita" name="idberita" required>
                <label for="idkategori" class="form-label">ID Kategori:</label>
                <input type="number" class="form-control" id="idkategori" name="idkategori" required>
                <label for="judul_berita" class="form-label">Judul Berita:</label>
                <input type="text" class="form-control" id="judul_berita" name="judul_berita" required>
                <label for="isi_berita" class="form-label">Isi Berita:</label>
                <textarea class="form-control" id="isi_berita" name="isi_berita" rows="4" required></textarea>
                <label for="penulis" class="form-label">Penulis:</label>
                <input type="text" class="form-control" id="penulis" name="penulis" required>
                <label for="tgl_dipublish" class="form-label">Tanggal Dipublish:</label>
                <input type="date" class="form-control" id="tgl_dipublish" name="tgl_dipublish" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br><br><br>
    <div class="container1">
        <a href="tampil_kategori_berita.php" class="btn btn-primary btn-long">Ingin Menampilkan Hasil?</a>
    </div>
</body>
</html>
