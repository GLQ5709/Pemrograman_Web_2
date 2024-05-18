<?php
    $koneksi = mysqli_connect("localhost","root","","db_pw2_pert11");

    $sql="CREATE TABLE tbl_mhs (mhsID int NOT NULL AUTO_INCREMENT, PRIMARY KEY(mhsID), FirstName varchar(15), LastName varchar(15), Age int)";
    mysqli_query($koneksi,$sql);
?>