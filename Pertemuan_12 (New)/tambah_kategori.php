<?php
    $koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    if(isset($_POST['nama_kategori']) && isset($_POST['idkategori'])) {
        $nama_kategori = mysqli_real_escape_string($koneksi, $_POST['nama_kategori']);
        $idkategori = mysqli_real_escape_string($koneksi, $_POST['idkategori']);

        $query = "INSERT INTO tblkategori (idkategori, nama_kategori) VALUES ('$idkategori', '$nama_kategori')";

        if (mysqli_query($koneksi, $query)) {
            echo "Data kategori berhasil disimpan!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Data kategori tidak lengkap!";
    }

    mysqli_close($koneksi);
?>
