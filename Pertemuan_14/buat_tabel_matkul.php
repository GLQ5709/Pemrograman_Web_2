<?php
    $koneksi = mysqli_connect("localhost","root","","tabel_transaksi");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tabel_matkul (kode_matkul INT NOT NULL PRIMARY KEY, nama_matkul VARCHAR(20), sks VARCHAR(50))";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tabel_dosen berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>