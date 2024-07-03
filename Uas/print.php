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

// Fetch data for Group B
$result = $conn->query("SELECT * FROM data_grup WHERE group_name='B'");

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
            margin: 20px auto;
            width: 80%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
            display: block;
            text-align: center;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="print-container">
        <h3 style="text-align: center;">Data Group B</h3>
        <p style="text-align: center;">Per <?php echo $currentDateTime; ?></p>
        <p style="text-align: center;">211011400877 - RYO AKBAR</p>
        <table>
            <tr>
                <th>Tim</th>
                <th>Menang</th>
                <th>Seri</th>
                <th>Kalah</th>
                <th>Poin</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['country'] . "</td>";
                    echo "<td>" . $row['wins'] . "</td>";
                    echo "<td>" . $row['draws'] . "</td>";
                    echo "<td>" . $row['losses'] . "</td>";
                    echo "<td>" . $row['points'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No data found</td></tr>";
            }
            ?>
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
