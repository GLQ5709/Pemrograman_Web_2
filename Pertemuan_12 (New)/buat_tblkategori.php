<?php
    $koneksi = mysqli_connect("localhost","root","","dbBerita");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tblkategori (idKategori INT NOT NULL, nama_kategori VARCHAR(100) NOT NULL, PRIMARY KEY(idkategori))";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tblkategori berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>