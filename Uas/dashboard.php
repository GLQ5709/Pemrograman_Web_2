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

// Create an array of UEFA country options
$countries = array(
    'Spain' => 'Spain',
    'Croatia' => 'Croatia',
    'Italy' => 'Italy',
    'Albania' => 'Albania',
    // Add more countries as needed
);

// Create a form to input data
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="group">Nama Group:</label>
    <select name="group" id="group">
        <?php foreach ($groups as $key => $value) { ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php } ?>
    </select>

    <label for="country">Nama Negara:</label>
    <select name="country" id="country">
        <?php foreach ($countries as $key => $value) { ?>
            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
        <?php } ?>
    </select>

    <label for="wins">Jumlah Menang:</label>
    <input type="number" name="wins" id="wins" required>

    <label for="draws">Jumlah Seri:</label>
    <input type="number" name="draws" id="draws" required>

    <label for="losses">Jumlah Kalah:</label>
    <input type="number" name="losses" id="losses" required>

    <label for="points">Jumlah Poin:</label>
    <input type="number" name="points" id="points" required>

    <input type="submit" name="submit" value="Submit">
</form>

<button id="showHistory">Riwayat</button>

<div id="historyModal" style="display:none; position:fixed; top:10%; left:10%; width:80%; height:80%; background-color:white; border:1px solid black; overflow:auto;">
    <button id="closeHistory" style="float:right;">Close</button>
    <div id="historyContent"></div>
</div>

<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $group = $_POST['group'];
    $country = $_POST['country'];
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $points = $_POST['points'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO data_grup (group_name, country, wins, draws, losses, points) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiiii", $group, $country, $wins, $draws, $losses, $points);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<script>
document.getElementById('showHistory').addEventListener('click', function() {
    fetch('riwayat.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('historyContent').innerHTML = data;
            document.getElementById('historyModal').style.display = 'block';
        });
});

document.getElementById('closeHistory').addEventListener('click', function() {
    document.getElementById('historyModal').style.display = 'none';
});
</script>
