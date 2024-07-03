<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_uas";

// Start session
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details
$username = $_SESSION['username'];
$query = "SELECT * FROM tabel_login WHERE username='$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

$groups = array(
    'B' => 'Group B'
);

$countries = array(
    'Spain' => 'Spain',
    'Croatia' => 'Croatia',
    'Italy' => 'Italy',
    'Albania' => 'Albania',
);

$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group = $_POST['group'];
    $country = $_POST['country'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    $stmt = $conn->prepare("INSERT INTO data_grup (group_name, country, wins, draws, losses, points) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiii", $group, $country, $wins, $draws, $losses, $points);

    if ($stmt->execute()) {
        $message = "<div class='alert alert-success'>Data submitted successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Selamat Datang, <?php echo $user['username']; ?>!</h1>
            <hr class="my-4">
            <p class="lead">Gunakan form di bawah untuk memasukkan data tim.</p>
        </div>

        <?php echo $message; ?>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="group">Nama Group:</label>
                <select class="form-control" name="group" id="group">
                    <?php foreach ($groups as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Nama Negara:</label>
                <select class="form-control" name="country" id="country">
                    <?php foreach ($countries as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="wins">Jumlah Menang:</label>
                <input type="number" class="form-control" name="wins" id="wins" required>
            </div>
            <div class="form-group">
                <label for="draws">Jumlah Seri:</label>
                <input type="number" class="form-control" name="draws" id="draws" required>
            </div>
            <div class="form-group">
                <label for="losses">Jumlah Kalah:</label>
                <input type="number" class="form-control" name="losses" id="losses" required>
            </div>
            <div class="form-group">
                <label for="points">Jumlah Poin:</label>
                <input type="number" class="form-control" name="points" id="points" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <button id="showHistory" class="btn btn-secondary mt-3">Riwayat</button>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>

        <div id="historyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="historyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="historyModalLabel">Riwayat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="historyContent"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    document.getElementById('showHistory').addEventListener('click', function() {
        fetch('riwayat.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById('historyContent').innerHTML = data;
                $('#historyModal').modal('show');
            });
    });
    </script>
</body>
</html>
