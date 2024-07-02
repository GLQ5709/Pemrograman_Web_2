<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Ganti dengan password MySQL Anda
$dbname = "db_uas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create an array of group options
$groups = array(
    'B' => 'Group B'
);

// Fetch data from the database
$result = $conn->query("SELECT * FROM data_grup");

date_default_timezone_set('Asia/Jakarta'); // Set timezone to your local timezone
$currentDateTime = date('d F Y H:i:s');
?>

<!-- Header information -->
<div>
    <h3>Data Group B</h3>
    <p>Per <?php echo $currentDateTime; ?></p>
    <p>211011400877 - RYO AKBAR</p>
</div>

<!-- Display data in a table -->
<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
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

<?php
$conn->close();
?>
