<?php
    setcookie("username", "", time()-3600);
    setcookie("namalengkap", "", time()-3600);

    echo"<h1>Cookie Berhasil dihapus.</h1>";
    echo"<h2>Klik <a href='buat_cookie.php'> disini</a> untuk buat cookies</h2>";
    echo"<h2>Klik <a href='lihat_cookie.php'>disini</a> untuk melihat isi cookie</h2>";
?>