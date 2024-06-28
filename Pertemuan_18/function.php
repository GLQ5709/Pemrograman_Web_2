<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

    function query($query)
    {
        global $koneksi;

        $result = mysqli_query($koneksi, $query);

        $rows = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function tambah($data)
    {
        global $koneksi;

        $nim = htmlspecialchars($data['nim']);
        $nama = htmlspecialchars($data['nama']);
        $kelas = htmlspecialchars($data['kelas']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $semester = htmlspecialchars($data['semester']);

        $sql = "INSERT INTO tabel_mahasiswa(nim, nama, kelas, jurusan, semester) VALUES ('$nim','$nama','$kelas','$jurusan','$semester')";

        mysqli_query($koneksi, $sql);

        return mysqli_affected_rows($koneksi);
    }

    function hapus($nim)
    {
        global $koneksi;

        mysqli_query($koneksi, "DELETE FROM tabel_mahasiswa WHERE nim = $nim");
        return mysqli_affected_rows($koneksi);
    }

    function ubah($data)
    {
        global $koneksi;

        $nim = htmlspecialchars($data['nim']);
        $nama = htmlspecialchars($data['nama']);
        $kelas = htmlspecialchars($data['kelas']);
        $jurusan = htmlspecialchars($data['jurusan']);
        $semester = htmlspecialchars($data['semester']);

        $sql = "UPDATE tabel_mahasiswa SET nama = '$nama', kelas = '$kelas', jurusan = '$jurusan', semester = '$semester' WHERE nim = $nim";

        mysqli_query($koneksi, $sql);

        return mysqli_affected_rows($koneksi);
    }
?>