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

<div>
    <h3>Data Group B</h3>
    <p>Per <?php echo $currentDateTime; ?></p>
    <p>211011400877 - RYO AKBAR</p>
</div>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: left;">
    <tr>
        <th>Tim</th>
        <th>Menang</th>
        <th>Seri</th>
        <th>Kalah</th>
        <th>Poin</th>
        <th>Keterangan</th>
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
            echo "<td>";
            echo "<a href='edit.php?id=" . $row['id'] . "'>Edit</a> | ";
            echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a> | ";
            echo "<a href='print.php?id=" . $row['id'] . "' target='_blank'>Print PDF</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data found</td></tr>";
    }
    ?>
</table>

<?php
$conn->close();
?>
