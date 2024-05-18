<?php
    $koneksi = mysqli_connect("localhost","root","","db_pw2_pert11");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tblnilai (nim varchar(12) NOT NULL, namamhs varchar(30), matakuliah varchar(20), uts float(5,2), uas float(5,2), tugas float(5,2), jmlhadir int(2), PRIMARY KEY(nim))";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tblnilai berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>