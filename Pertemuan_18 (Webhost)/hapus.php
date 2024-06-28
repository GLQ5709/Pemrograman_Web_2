<?php
    session_start();
    
    if (!isset($_SESSION['login'])) {
        header('location:login.php');
        exit;
    }

    $koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $nim = $_GET['nim'];

    $query = "DELETE FROM tabel_mahasiswa WHERE nim = '$nim'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo"<script>
                alert('Data Mahasiswa berhasil dihapus!');
                window.location.href = 'index.php';
            </script>";
    } else {
        echo"<script>
                alert('Data Mahasiswa gagal dihapus!');
                window.history.back();
            </script>";
    }

    mysqli_close($koneksi);
?>
