<?php
    session_start();

    if(!isset($_SESSION['login'])){
        header('location:./Pert-16_Latihan-3.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Remember Me</title>
</head>
<body>
    <?php
        if(isset($_COOKIE['login'])){
            $username = $_COOKIE['login'];
            echo "<h5>Selamat datang $username di halaman utama website</h5>";
        } else {
            echo "<h5>Selamat datang di halaman utama website</h5>";
        }
    ?>
    <p><a href="./Pert-16_Latihan-3_logout.php">Logout</a></p>
</body>
</html>