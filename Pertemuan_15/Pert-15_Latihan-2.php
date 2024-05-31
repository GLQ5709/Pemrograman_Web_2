<?php
include "koneksi.php";

// Inisialisasi variabel pesan kesalahan
$login_err = false;
$empty_fields = false;

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi bidang-bidang form
    if (empty($_POST['uname']) || empty($_POST['pass'])) {
        $empty_fields = true;
    } else {
        // Lakukan proses login
        $username = $_POST['uname'];
        $password = $_POST['pass'];

        // Lakukan query ke database untuk memeriksa kecocokan username dan password
        $query = "SELECT * FROM tabel_user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($koneksi, $query);

        // Jika ada baris yang cocok, maka login berhasil
        if (mysqli_num_rows($result) == 1) {
            // Mulai sesi
            session_start();

            // Simpan username dalam sesi
            $_SESSION['username'] = $username;

            // Redirect ke halaman dashboard
            header("location: dashboard.php");
        } else {
            // Tampilkan pesan kesalahan jika username atau password salah
            $login_err = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">
        body {
            margin:0px;
            padding:0px;
            font-family: sans-serif;
            font-size:.9em;
        }
        div {
            top:50%;
            left:50%;
            transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            -moz-transform: translate(-50%,-50%);
            -webkit-transform: translate(-50%,-50%);
            position:absolute;
            width:350px;
            background:#eee;
            padding:10px 20px;
            border-radius: 2px;
            box-shadow:0px 0px 10px #aaa;
            box-sizing:border-box;
        }
        input {
            display: inline-block;
            border: none;
            width:100%;
            border-radius:2px;
            margin:5px 0px;
            padding:7px;
            box-sizing: border-box;
            box-shadow: 0px 0px 2px #ccc;
        }
        #submit {
            border:none;
            background-color: blue;
            color:white;
            font-size:1em;
            box-shadow: 0px 0px 3px #777;
            padding:10px 0px;
        }
        span {
            color:red;
            font-size: 0.75em;
        }
        p {
            text-align: center;
            font-size: 1.75em;
        }
        a {
            text-decoration: none;
            color:blue;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <p>Login</p>
    <br>
    <!-- Input Username -->
    <label for="uname">Username</label><br>
    <input type="text" id="uname" name="uname" value="<?php echo isset($_POST['uname']) ? $_POST['uname'] : ''; ?>" placeholder="Username" required><br><br>

    <!-- Input Password -->
    <label for="pass">Password</label><br>
    <input type="password" id="pass" name="pass" value="<?php echo isset($_POST['pass']) ? $_POST['pass'] : ''; ?>" placeholder="Password" required><br><br>

    <!-- Pesan Kesalahan -->
    <?php if ($login_err) echo "<span>Username atau Password Salah!</span><br>"; ?>
    <?php if ($empty_fields) echo "<span>Masukkan Username dan Password</span><br>"; ?>

    <!-- Tombol Login -->
    <input type="submit" id="submit" value="Login"><br><br>
</form>
</div>
</body>
</html>
