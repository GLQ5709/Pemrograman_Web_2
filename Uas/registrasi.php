<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_uas");

// Check connection
if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}

// Form registrasi
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Query untuk menambahkan user baru
  $query = "INSERT INTO tabel_login (username, password) VALUES ('$username', '$password')";
  $result = mysqli_query($conn, $query);

  // Check jika registrasi berhasil
  if ($result) {
    // Registrasi berhasil, redirect ke halaman login
    header("Location: login.php");
    exit;
  } else {
    // Registrasi gagal, tampilkan pesan error
    $error = "Registrasi gagal, silakan coba lagi";
  }
}

?>

<!-- Form registrasi -->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" name="submit" value="Registrasi">
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; }?>
</form>