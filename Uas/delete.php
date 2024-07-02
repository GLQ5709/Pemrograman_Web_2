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

// Get record ID
$id = $_GET['id'];

// Delete record
$stmt = $conn->prepare("DELETE FROM data_grup WHERE id=?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Record deleted successfully!";
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
