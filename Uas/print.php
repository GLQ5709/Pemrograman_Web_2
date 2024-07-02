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
$result = $conn->query("SELECT * FROM data_grup WHERE id=$id");
$row = $result->fetch_assoc();

$conn->close();

date_default_timezone_set('Asia/Jakarta');
$currentDateTime = date('d F Y H:i:s');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Print Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .print-container {
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .back-button {
            margin-top: 20px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="print-container">
        <h3>Data Tim <?php echo $row['country']; ?></h3>
        <p>Per <?php echo $currentDateTime; ?></p>
        <p>211011400877 - RYO AKBAR</p>
        <table>
            <tr>
                <th>Tim</th>
                <th>Menang</th>
                <th>Seri</th>
                <th>Kalah</th>
                <th>Poin</th>
            </tr>
            <tr>
                <td><?php echo $row['country']; ?></td>
                <td><?php echo $row['wins']; ?></td>
                <td><?php echo $row['draws']; ?></td>
                <td><?php echo $row['losses']; ?></td>
                <td><?php echo $row['points']; ?></td>
            </tr>
        </table>
        <button class="back-button" onclick="goBack()">Kembali ke Dashboard</button>
    </div>

    <script>
        function goBack() {
            window.location.href = 'dashboard.php';
        }
    </script>
</body>
</html>
