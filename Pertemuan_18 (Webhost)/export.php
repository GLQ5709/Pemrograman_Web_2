<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM tabel_mahasiswa ORDER BY nim DESC";
    $result = mysqli_query($koneksi, $query);

    // Membuat nama file Excel
    $filename = "data_mahasiswa_" . date('Ymd') . ".xls";

    // Header untuk eksport ke Excel
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=$filename");
?>
    <table class="text-center" border="1">
        <thead class="text-center">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php $no = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nim']; ?></td>
                    <td><?= $row['kelas']; ?></td>
                    <td><?= $row['jurusan']; ?></td>
                    <td><?= $row['semester']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

<?php
    mysqli_close($koneksi);
?>
