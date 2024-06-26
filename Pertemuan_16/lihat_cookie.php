<?php
    if(isset($_COOKIE['username'])) {
        echo"<h1>Cookie 'username' ada isinya :". $_COOKIE['username'];
    }else{
        echo"<h1>Cookie 'username' tidak ada.</h1>";
    }
    if(isset($_COOKIE['namalengkap'])){
        echo"<h1>Cookie 'namalengkap' ada isinya :". $_COOKIE['namalengkap'];
    }else{
        echo"<h1>Cookie 'namalengkap' tidak ada.</h1>";
    }
    echo"<h2>Klik <a href='buat_cookie.php'> disini</a> untuk penciptaan cookies</h2>";
    echo"<h2>Klik <a href='ubah_cookie.php'> disini</a> untuk ubah cookies</h2>";
    echo"<h2>Klik <a href='hapus_cookie.php'> di sini</a> untuk penghapusan cookies</h2>";
?>