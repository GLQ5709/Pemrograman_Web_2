<?php
    $koneksi = mysqli_connect("localhost","root","","db_mahasiswa");
    
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tabel_admin (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(30) NOT NULL, password VARCHAR(255) NOT NULL)";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tabel_admin berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>