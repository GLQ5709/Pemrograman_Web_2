<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_pw2_pert11");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "ALTER TABLE tblnilai ADD COLUMN nilaiakhir FLOAT(5,2), ADD COLUMN grade VARCHAR(2)";

    if (mysqli_query($koneksi, $sql)) {
        echo "Tabel tblnilai berhasil diubah";
    } else {
        echo "Error mengubah tabel: " . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
?>
