<?php
    $koneksi = mysqli_connect("localhost","root","","tabel_transaksi");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tabel_dosen (kode_dosen INT NOT NULL PRIMARY KEY, nama_dosen VARCHAR(20), tlp VARCHAR(20))";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tabel_dosen berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>