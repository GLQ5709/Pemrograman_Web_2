<?php
    $koneksi = mysqli_connect("localhost","root","","dbBerita");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tblberita (idberita INT NOT NULL PRIMARY KEY, idkategori INT NOT NULL, judul_berita VARCHAR(255) NOT NULL, isi_berita VARCHAR(255) NOT NULL, penulis VARCHAR(100) NOT NULL, tgl_dipublish DATE NOT NULL, FOREIGN KEY (idkategori) REFERENCES tblkategori(idkategori))";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tblberita berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>