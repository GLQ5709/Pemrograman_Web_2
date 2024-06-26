<?php
    $koneksi = mysqli_connect("localhost","root","","tabel_mahasiswa");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tblmhs (nim INT NOT NULL PRIMARY KEY, nama varchar(20) NOT NULL, alamat text NOT NULL, jurusan VARCHAR(20) NOT NULL)";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tblmhs berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>