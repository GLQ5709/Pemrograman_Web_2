<?php
    $con = mysqli_connect("localhost", "root", "", "db_pw2_pert11");

    if (!$con) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
        $age = (int)$_POST['age'];

        $sql = "INSERT INTO tbl_mhs (FirstName, LastName, Age) VALUES ('$firstname', '$lastname', '$age')";

        if (mysqli_query($con, $sql)) {
            echo "1 record added";
        } else {
            die('Error: ' . mysqli_error($con));
        }
    } else {
        echo "No data received";
    }

    mysqli_close($con);
?>
