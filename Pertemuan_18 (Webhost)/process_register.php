<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("location: register.php");
    } else {
        $sql = "INSERT INTO tabel_admin (username, password) VALUES ('$username', '$password')";

        if (mysqli_query($koneksi, $sql)) {
            header("location: login.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
        }
    }

    mysqli_close($koneksi);
?>
