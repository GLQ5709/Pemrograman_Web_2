<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_uas");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
            <h2 class="card-title text-center">Registrasi</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Registrasi</button>
                <?php if (isset($error)) { echo "<p class='text-danger text-center mt-3'>$error</p>"; }?>
                <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
