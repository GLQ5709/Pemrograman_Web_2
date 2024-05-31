<?php
    $koneksi = mysqli_connect("localhost","root","","db_pw2_pert15");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tabel_user (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username VARCHAR(20) NOT NULL, password VARCHAR(100) NOT NULL)";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tabel_user berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>