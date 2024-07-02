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
        echo "Record updated successfully!";
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM data_grup WHERE id=$id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found!";
        exit;
    }
} else {
    echo "No ID provided!";
    exit;
}

$conn->close();
?>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    
    <label for="group">Nama Group:</label>
    <select name="group" id="group">
        <?php foreach (array('A' => 'Group A', 'B' => 'Group B', 'C' => 'Group C', 'D' => 'Group D') as $key => $value) { ?>
            <option value="<?php echo $key; ?>" <?php if ($row['group_name'] == $key) echo 'selected'; ?>><?php echo $value; ?></option>
        <?php } ?>
    </select>

    <label for="country">Nama Negara:</label>
    <select name="country" id="country">
        <?php foreach (array('Spain' => 'Spain', 'Croatia' => 'Croatia', 'Italy' => 'Italy', 'Albania' => 'Albania') as $key => $value) { ?>
            <option value="<?php echo $key; ?>" <?php if ($row['country'] == $key) echo 'selected'; ?>><?php echo $value; ?></option>
        <?php } ?>
    </select>

    <label for="wins">Jumlah Menang:</label>
    <input type="number" name="wins" id="wins" value="<?php echo $row['wins']; ?>" required>

    <label for="draws">Jumlah Seri:</label>
    <input type="number" name="draws" id="draws" value="<?php echo $row['draws']; ?>" required>

    <label for="losses">Jumlah Kalah:</label>
    <input type="number" name="losses" id="losses" value="<?php echo $row['losses']; ?>" required>

    <label for="points">Jumlah Poin:</label>
    <input type="number" name="points" id="points" value="<?php echo $row['points']; ?>" required>

    <input type="submit" name="update" value="Update">
</form>
