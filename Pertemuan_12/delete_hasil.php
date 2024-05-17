<?php
    if(isset($_GET['idBerita'])) {
        $koneksi = mysqli_connect("localhost", "root", "", "dbberita");

        $idBerita = $_GET['idBerita'];

        $queryBerita = "DELETE FROM tblBerita WHERE idBerita = $idBerita";
        mysqli_query($koneksi, $queryBerita);

        $queryCheckKategori = "SELECT * FROM tblBerita WHERE idKategori NOT IN (SELECT idKategori FROM tblBerita)";
        $resultCheckKategori = mysqli_query($koneksi, $queryCheckKategori);
        if(mysqli_num_rows($resultCheckKategori) == 0) {
            $queryKategori = "DELETE FROM tblKategori WHERE idKategori IN (SELECT idKategori FROM tblBerita)";
            mysqli_query($koneksi, $queryKategori);
        }

        header("Location: index_hasil.php");
        exit();
    } else {
        echo "ID Berita tidak ditemukan";
    }
?>
