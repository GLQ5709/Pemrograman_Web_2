<?php
    $value = 'joko';
    $value2 = 'jokosusilo';

    setcookie("username", $value);
    setcookie("namalengkap", $value2, time()+3600);

    echo"<h1>Halaman Ubah cookie</h1>";
    echo"<h2>Klik <a href='lihat_cookie.php'> disini</a> untuk lihat cookie</h2>";
?>