<?php
    // Session dihapus dan logout
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();

    // kembali ke index.php
    header('location: index.php');
?>