<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Inisialisasi variabel untuk menyimpan ID kategori dan nama kategori
$id_kategori = "";
$namaKategori = "";

// Jika ID kategori tersedia dalam parameter GET
if (isset($_GET['idkategori'])) {
    $id_kategori = $_GET['idkategori'];

    // Query untuk mendapatkan data kategori berdasarkan ID
    $query = "SELECT * FROM tblkategori WHERE idkategori='$id_kategori'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah data kategori ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $namaKategori = $row['nama_kategori'];
    } else {
        echo "Data kategori tidak ditemukan.";
    }
}

// Jika tombol Edit ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_kategori = $_POST['nama_kategori'];

    // Query untuk mengupdate data kategori
    $query = "UPDATE tblkategori SET nama_kategori='$nama_kategori' WHERE idkategori='$id_kategori'";
    if (mysqli_query($koneksi, $query)) {
        echo "Data kategori berhasil diupdate.";
        $namaKategori = $nama_kategori; // Perbarui nama kategori yang telah diubah
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

// Tutup koneksi
mysqli_close($koneksi);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Kategori</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label><br>
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?php echo $namaKategori; ?>" required>
            </div>
            <input type="hidden" name="idkategori" value="<?php echo $id_kategori; ?>"> <!-- Tambahkan hidden input untuk menyimpan ID kategori -->
            <button type="submit" class="btn btn-primary">Selesai</button>
        </form>
    </div>
</body>
</html>
