<?php
    $koneksi = mysqli_connect("localhost","root","","tabel_taruhan");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tbltrh (no_taruhan INT NOT NULL PRIMARY KEY, nama varchar(20) NOT NULL, total_pasang decimal(10,2) NOT NULL, bertaruh_No INT NOT NULL)";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tbltrh berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>