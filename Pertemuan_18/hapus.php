<?php
    session_start();

    if (!isset($_SESSION['login'])) {
        header('location:login.php');
        exit;
    }

    require 'function.php';

    $nim = $_GET['nim'];

    if (hapus($nim) > 0) {
        echo "<script>
                    alert('Data Mahasiswa berhasil dihapus!');
                    document.location.href = 'index.php';
                </script>";
    } else {
        echo "<script>
                alert('Data siswa gagal dihapus!');
            </script>";
    }
?>