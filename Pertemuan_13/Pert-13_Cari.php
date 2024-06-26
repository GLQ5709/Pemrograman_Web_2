<?php
    $koneksi = mysqli_connect("localhost", "root", "", "tabel_taruhan");

    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama']) && isset($_POST['bertaruh_No'])) {
        $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
        $taruhan = mysqli_real_escape_string($koneksi, $_POST['bertaruh_No']);

        $sql = "SELECT * FROM tbltrh WHERE nama LIKE '%$nama%' AND bertaruh_No LIKE '%$taruhan%' ORDER BY nama ASC";
        $hasil = mysqli_query($koneksi, $sql);

        if (!$hasil) {
            die("Query error: " . mysqli_error($koneksi));
        }

        echo "<html><body>";
        if (mysqli_num_rows($hasil) > 0) {
            echo "<table>
                    <tr>
                        <th>No Taruhan</th>
                        <th>Nama Pemasang</th>
                        <th>Total Taruhan</th>
                        <th>Bertaruh Pada Nomer</th>
                    </tr>";

            while ($data = mysqli_fetch_assoc($hasil)) {
                echo "<tr>
                        <td>" . htmlspecialchars($data['no_taruhan']) . "</td>
                        <td>" . htmlspecialchars($data['nama']) . "</td>
                        <td>" . htmlspecialchars($data['total_pasang']) . "</td>
                        <td>" . htmlspecialchars($data['bertaruh_No']) . "</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Data Tidak Ditemukan!";
        }
        echo "</body></html>";

        mysqli_free_result($hasil);
    } else {
        echo "Mohon Masukkan Pencarian Yang Benar!";
    }

    mysqli_close($koneksi);
?>
