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

$groups = array(
    'B' => 'Group B'
);

$result = $conn->query("SELECT * FROM data_grup WHERE group_name='B'");

date_default_timezone_set('Asia/Jakarta');
$currentDateTime = date('d F Y H:i:s');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Group B</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }
        .table th, .table td {
            text-align: center;
        }
        .header-info {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-info">
            <h3>Data Group B</h3>
            <p>Per <?php echo $currentDateTime; ?></p>
            <p>211011400877 - RYO AKBAR</p>
        </div>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Tim</th>
                    <th>Menang</th>
                    <th>Seri</th>
                    <th>Kalah</th>
                    <th>Poin</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['country'] . "</td>";
                        echo "<td>" . $row['wins'] . "</td>";
                        echo "<td>" . $row['draws'] . "</td>";
                        echo "<td>" . $row['losses'] . "</td>";
                        echo "<td>" . $row['points'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a> ";
                        echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a> ";
                        echo "<a href='print.php?id=" . $row['id'] . "' class='btn btn-info btn-sm' target='_blank'>Print PDF</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
