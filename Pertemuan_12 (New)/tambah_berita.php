<?php
    $koneksi = mysqli_connect("localhost", "root", "", "dbBerita");

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
        exit();
    }

    // Mengambil nilai dari form
    $idberita = $_POST['idberita'];
    $idkategori = $_POST['idkategori'];
    $judul_berita = mysqli_real_escape_string($koneksi, $_POST['judul_berita']);
    $isi_berita = mysqli_real_escape_string($koneksi, $_POST['isi_berita']);
    $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $tgl_dipublish = mysqli_real_escape_string($koneksi, $_POST['tgl_dipublish']);

    // Query untuk menambahkan data berita
    $query = "INSERT INTO tblberita (idberita, idkategori, judul_berita, isi_berita, penulis, tgl_dipublish)VALUES('$idberita','$idkategori', '$judul_berita', '$isi_berita', '$penulis', '$tgl_dipublish')";

    if (mysqli_query($koneksi, $query)) {
        echo "Data berita berhasil disimpan!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
?>
