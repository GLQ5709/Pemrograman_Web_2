<?php
    $koneksi = mysqli_connect("localhost","root","","db_mahasiswa");
    
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tabel_mahasiswa (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nama VARCHAR(50) NOT NULL, nim VARCHAR(20) NOT NULL, kelas VARCHAR(20) NOT NULL, jurusan VARCHAR(50) NOT NULL, semester VARCHAR(2) NOT NULL)";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tabel_mahasiswa berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>