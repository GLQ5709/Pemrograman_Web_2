<?php
    $servername1 = "localhost";
    $username1 = "root";
    $password1 = "";

    $conn1 = new mysqli($servername1,$username1,$password1);
    if(mysqli_close($conn1)){
        echo"koneksi berhasil ditutup";
    }
?>