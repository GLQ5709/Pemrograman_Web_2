<?php
session_start();

if (isset($_POST['Login'])) {
    $user1 = $_POST['user'];
    $pass1 = $_POST['pass'];

    if ($user1 == "rahadian" && $pass1 == "123") {
        $_SESSION['login'] = $user1;

        echo "<h1>Anda berhasil LOGIN</h1>";
        echo "<h2>Klik <a href='session2.php'>disini (session2.php)</a> untuk menuju ke halaman pemeriksaan session</h2>";
    } else {
        echo "<h1>Username atau password salah!</h1>";
    }
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Here</title>
    </head>
    <body>
    <form action="" method="post">
        <h2>Login Here...</h2>
        Username: <input type="text" name="user"><br>
        Password: <input type="password" name="pass"><br>
        <input type="submit" name="Login" value="Log In">
    </form>
    </body>
    </html>
    <?php
}
?>