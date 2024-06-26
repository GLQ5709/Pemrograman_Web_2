<?php
    $koneksi = mysqli_connect("localhost","root","","tabel_customers");
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE tblctm (customerNumber INT NOT NULL PRIMARY KEY, customerName VARCHAR(50) NOT NULL, contactLastName VARCHAR(50) NOT NULL, contactFirstName VARCHAR(50) NOT NULL, phone VARCHAR(50) NOT NULL, addressLine1 VARCHAR(50) NOT NULL, addressLine2 VARCHAR(50) NULL, city VARCHAR(50) NOT NULL, state VARCHAR(50) NULL, postalCode VARCHAR(15) NULL, country VARCHAR(50) NOT NULL, salesRepEmployeeNumber INT NULL, creditLimit DECIMAL(10,2))";

    if (mysqli_query($koneksi, $sql)) {
        echo "Table tblctm berhasil dibuat";
    } else {
        echo "Error membuat table: " . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>