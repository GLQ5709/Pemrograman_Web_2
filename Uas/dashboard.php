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

$countries = array(
    'Spain' => 'Spain',
    'Croatia' => 'Croatia',
    'Italy' => 'Italy',
    'Albania' => 'Albania',
);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        .container {
            margin: 20px;
        }
        .modal {
            display: none;
            position: fixed;
            top: 10%;
            left: 10%;
            width: 80%;
            height: 80%;
            background-color: white;
            border: 1px solid black;
            overflow: auto;
        }
        .modal button {
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="group">Nama Group:</label>
            <select name="group" id="group">
                <?php foreach ($groups as $key => $value) { ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <br>
            <label for="country">Nama Negara:</label>
            <select name="country" id="country">
                <?php foreach ($countries as $key => $value) { ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php } ?>
            </select>
            <br>
            <label for="wins">Jumlah Menang:</label>
            <input type="number" name="wins" id="wins" required>
            <br>
            <label for="draws">Jumlah Seri:</label>
            <input type="number" name="draws" id="draws" required>
            <br>
            <label for="losses">Jumlah Kalah:</label>
            <input type="number" name="losses" id="losses" required>
            <br>
            <label for="points">Jumlah Poin:</label>
            <input type="number" name="points" id="points" required>
            <br><br>
            <input type="submit" name="submit" value="Submit">
            <br>
        </form>

        <button id="showHistory">Riwayat</button>
        <button id="logout">Logout</button>

        <div id="historyModal" class="modal">
            <button id="closeHistory">Close</button>
            <div id="historyContent"></div>
        </div>
    </div>

    <?php
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

    document.getElementById('logout').addEventListener('click', function() {
        window.location.href = 'login.php';
    });
    </script>
</body>
</html>
