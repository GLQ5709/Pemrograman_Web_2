<?php
session_start();

    if (isset($_SESSION['login'])) {
        echo "<h1>Selamat Jumpa Kembali, " . $_SESSION['login'] . "</h1>";
        echo "<h2>Jika sudah login, Anda dapat mengakses halaman ini</h2>";
        echo "<h2>Klik <a href='session3.php'>disini (session3.php)</a> untuk LOGOUT</h2>";
    } else {
        die("Anda belum login! Anda tidak berhak masuk ke halaman ini. Silahkan login <a href='session1.php'>disini</a>");
    }
?>