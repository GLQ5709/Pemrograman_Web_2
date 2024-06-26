<?php
    $koneksi = mysqli_connect("localhost","root","","tabel_transaksi");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tabel_2 (kode INT NOT NULL PRIMARY KEY, nama_barang VARCHAR(20) NOT NULL, jumlah INT NOT NULL)";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tabel_2 berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>