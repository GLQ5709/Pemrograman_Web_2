<?php
    include'koneksi.php';
    echo $kode = $_POST['kode'];
    echo $jumlah = $_POST['jumlah'];

    mysqli_query($koneksi,"call update_datatable('$kode','$jumlah')");

    header("location:form.php");
?>