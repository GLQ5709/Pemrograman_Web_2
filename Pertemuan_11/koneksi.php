<?php
    $servername1 ="localhost";
    $username1 ="root";
    $password1 ="";

    $conn1 = new mysqli($servername1,$username1,$password1);

    if($conn1->connect_error){
        die("Connection failed:".$conn1->connect_error);
    }
    echo"Koneksi berhasil";
?>