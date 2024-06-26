<?php
    $koneksi = mysqli_connect("localhost","root","","tabel_transaksi");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tabel_jadwal (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, kode_dosen INT, kode_matkul INT, ruang VARCHAR(10), FOREIGN KEY (kode_dosen) REFERENCES tabel_dosen(kode_dosen), FOREIGN KEY (kode_matkul) REFERENCES tabel_matkul(kode_matkul))";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tabel_jadwal berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>