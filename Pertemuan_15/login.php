<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "Login gagal! Username dan password salah!";
    } elseif ($_GET['pesan'] == "logout") {
        echo "Anda telah berhasil logout.";
    } elseif ($_GET['pesan'] == "belum_login") {
        echo "Anda harus login untuk mengakses halaman admin.";
    } else {
        echo "Anda berhasil logout, silakan login kembali.";
    }
}
?>
<form method="post" action="cek_login.php">
    <table>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input type="text" name="username" placeholder="Masukkan username" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="password" name="password" placeholder="Masukkan password" required></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="LOGIN"></td>
        </tr>
    </table>
</form>
</body>
</html>