<?php
// Start session
session_start();

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
    // Login berhasil, set session
    $_SESSION['username'] = $username;
    // Redirect ke halaman dashboard
    header("Location: dashboard.php");
    exit;
  } else {
    // Login gagal, tampilkan pesan error
    $error = "Username atau password salah";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        </form>
                        <?php if (isset($error)) { echo "<p class='text-danger mt-2'>$error</p>"; }?>
                        <p class="mt-3">Belum punya akun? <a href="registrasi.php">Registrasi</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
