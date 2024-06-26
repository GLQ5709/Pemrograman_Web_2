<?php
    $nama = 'ryo';
    $nim = md5('211011400877');

    session_start();

    if(isset($_COOKIE['login'])){
        if($_COOKIE['login']==$nama){
            $_SESSION['login']=TRUE;
            header('location: ./Pert-16_Latihan-3_home.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - Mahasiswa</title>
</head>
<body>
<form action="Pert-16_Latihan-3_aksi.php" method="post">
    <p><label for="nama">Nama:</label><br><br><input type="text" name="nama"/></p>
    <p><label for="nim">NIM:</label><br><br><input type="password" name="nim"/></p>
    <p><label for="remember"><input type="checkbox" name="remember" value="true"/>Remember Me</label></p>
    <p>
    <button type="submit" name="login">Login</button>
    <button type="reset" name="reset">Reset</button>
    </p>
</form>
</body>
</html>