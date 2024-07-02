<?php
    $koneksi = mysqli_connect("localhost","root","","db_uas");
    
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE data_grup (id INT AUTO_INCREMENT PRIMARY KEY, group_name VARCHAR(2), country VARCHAR(50), wins INT, draws INT, losses INT, points INT);";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table data_grup berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>