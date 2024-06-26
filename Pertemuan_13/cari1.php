<?php
// Membuat koneksi
$koneksi = mysqli_connect("localhost", "root", "", "tabel_mahasiswa");

// Memeriksa koneksi
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

// Memeriksa apakah permintaan POST dan input 'nama' ada
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama'])) {
    $cari = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $sql = "SELECT * FROM tblmhs WHERE nama LIKE '%$cari%' ORDER BY nama ASC";
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) > 0) {
        echo "<table>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jurusan</th>
                </tr>";

        while ($data = mysqli_fetch_assoc($hasil)) {
            echo "<tr>
                    <td>" . htmlspecialchars($data['nim']) . "</td>
                    <td>" . htmlspecialchars($data['nama']) . "</td>
                    <td>" . htmlspecialchars($data['alamat']) . "</td>
                    <td>" . htmlspecialchars($data['jurusan']) . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No results found.";
    }

    // Bebaskan hasil query
    mysqli_free_result($hasil);
} else {
    echo "Please submit a valid search query.";
}

// Menutup koneksi
mysqli_close($koneksi);
?>
