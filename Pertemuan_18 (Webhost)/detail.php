<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_mahasiswa");

    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    if (isset($_POST['dataSiswa'])) {
        $output = '';

        $nim = $_POST['dataSiswa'];
        $sql = "SELECT * FROM tabel_mahasiswa WHERE nim = '$nim'";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $output = '<div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">NIM</th>
                                    <td width="60%">' . $row['nim'] . '</td>
                                </tr>
                                <tr>
                                    <th width="40%">Nama</th>
                                    <td width="60%">' . $row['nama'] . '</td>
                                </tr>
                                <tr>
                                    <th width="40%">Kelas</th>
                                    <td width="60%">' . $row['kelas'] . '</td>
                                </tr>
                                <tr>
                                    <th width="40%">Jurusan</th>
                                    <td width="60%">' . $row['jurusan'] . '</td>
                                </tr>
                                <tr>
                                    <th width="40%">Semester</th>
                                    <td width="60%">' . $row['semester'] . '</td>
                                </tr>
                            </table>
                        </div>';
        } else {
            $output = '<div class="alert alert-danger" role="alert">Data Mahasiswa tidak ditemukan!</div>';
        }
        echo $output;
    }
    mysqli_close($koneksi);
?>
