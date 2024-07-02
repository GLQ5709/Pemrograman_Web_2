<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_uas");

// Check connection
if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}

// Form login
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query untuk memeriksa username dan password
  $query = "SELECT * FROM tabel_login WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $query);

  // Check jika username dan password benar
  if (mysqli_num_rows($result) > 0) {
    // Login berhasil, redirect ke halaman dashboard
    header("Location: dashboard.php");
    exit;
  } else {
    // Login gagal, tampilkan pesan error
    $error = "Username atau password salah";
  }
}

?>

<!-- Form login -->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" name="submit" value="Login">
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; }?>
    <p>Belum punya akun? <a href="registrasi.php">Registrasi</a></p>
</form>