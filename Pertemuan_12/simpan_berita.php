<?php
    $koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    $judul_berita = $_POST['judul_berita'];
    $isi_berita = $_POST['isi_berita'];
    $penulis = $_POST['penulis'];
    $tgl_dipublish = $_POST['tgl_dipublish'];

    $query = "INSERT INTO tblBerita (judul_berita, isi_berita, penulis, tgl_dipublish) VALUES ('$judul_berita', '$isi_berita', '$penulis', '$tgl_dipublish')";
    if (mysqli_query($koneksi, $query)) {
        echo "Data berita berhasil disimpan!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
?>
