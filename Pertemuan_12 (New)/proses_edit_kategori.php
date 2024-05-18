<?php
    include "koneksi.php";

    if(isset($_POST['nama_kategori']) && isset($_POST['idkategori'])) {
        $nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
        $idkategori = mysqli_real_escape_string($koneksi, $_POST['idkategori']);

        $query = "UPDATE tblkategori SET nama_kategori='$nama_kategori' WHERE idkategori='$idkategori'";

        if (mysqli_query($koneksi, $query)) {
            echo "Data kategori berhasil diperbarui!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Data kategori tidak lengkap!";
    }

    mysqli_close($koneksi);
?>
