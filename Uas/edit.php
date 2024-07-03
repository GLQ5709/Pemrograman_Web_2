<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_uas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $group = $_POST['group'];
    $country = $_POST['country'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    // Update the record
    $stmt = $conn->prepare("UPDATE data_grup SET group_name=?, country=?, wins=?, draws=?, losses=?, points=? WHERE id=?");
    $stmt->bind_param("ssiiiii", $group, $country, $wins, $draws, $losses, $points, $id);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success" role="alert">Record updated successfully!</div>';
        header("Location: dashboard.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" role="alert">Error updating record: ' . $stmt->error . '</div>';
    }

    $stmt->close();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM data_grup WHERE id=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo '<div class="alert alert-danger" role="alert">No record found!</div>';
        exit;
    }
} else {
    echo '<div class="alert alert-danger" role="alert">No ID provided!</div>';
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Data</h2>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="form-group">
                <label for="group">Nama Group:</label>
                <select name="group" id="group" class="form-control">
                    <?php foreach (array('A' => 'Group A', 'B' => 'Group B', 'C' => 'Group C', 'D' => 'Group D') as $key => $value) { ?>
                        <option value="<?php echo $key; ?>" <?php if ($row['group_name'] == $key) echo 'selected'; ?>><?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="country">Nama Negara:</label>
                <select name="country" id="country" class="form-control">
                    <?php foreach (array('Spain' => 'Spain', 'Croatia' => 'Croatia', 'Italy' => 'Italy', 'Albania' => 'Albania') as $key => $value) { ?>
                        <option value="<?php echo $key; ?>" <?php if ($row['country'] == $key) echo 'selected'; ?>><?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="wins">Jumlah Menang:</label>
                <input type="number" name="wins" id="wins" class="form-control" value="<?php echo $row['wins']; ?>" required>
            </div>

            <div class="form-group">
                <label for="draws">Jumlah Seri:</label>
                <input type="number" name="draws" id="draws" class="form-control" value="<?php echo $row['draws']; ?>" required>
            </div>

            <div class="form-group">
                <label for="losses">Jumlah Kalah:</label>
                <input type="number" name="losses" id="losses" class="form-control" value="<?php echo $row['losses']; ?>" required>
            </div>

            <div class="form-group">
                <label for="points">Jumlah Poin:</label>
                <input type="number" name="points" id="points" class="form-control" value="<?php echo $row['points']; ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
