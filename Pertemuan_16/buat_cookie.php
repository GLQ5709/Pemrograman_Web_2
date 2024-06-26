<?php
    $value = 'rahadian';
    $value2 = 'rahadiramelan';

    setcookie("username", $value);
    setcookie("namalengkap", $value2, time()+3600);

    echo"<h1>Halaman Pembuatan cookie</h1>";
    echo"<h2>Klik <a href='lihat_cookie.php'> di sini</a> untuk lihat cookie</h2>";
?>