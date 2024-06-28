<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO tabel_mahasiswa (nama, nim, kelas, jurusan, semester) VALUES ('$nama', '$nim', '$kelas', '$jurusan', '$semester')";

    if (mysqli_query($koneksi, $sql)) {
        header("location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
    mysqli_close($koneksi);
?>
