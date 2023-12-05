<?php
// Koneksi Database
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'db_mahasiswa';

($koneksi = mysqli_connect($server, $user, $pass, $database)) or die(mysqli_error($koneksi));

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Akademik</title>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap Style-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,400;6..12,700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <!-- Navbar -->
        <img src="assets/header.png" alt="header" class="header-image">
        <nav class="navbar d-flex justify-content-center fs-6 shadow p-3 mb-5">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#mahasiswa" class="nav-link">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a href="#wali" class="nav-link">Wali Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a href="#admin" class="nav-link">Admin</a>
                </li>
            </ul>
        </nav>
        <!-- Akhir Navbar -->
    </header>

    <main>
        <!-- Home -->
        <div class="content-home-header text-center">
            <h2>Sistem Informasi Akademik</h2>
            <p>Selamat datang di laman Sistem Informasi Akademik Universitas Telkom Indonesia</p>
            <div class="content-home-video">
                <video src="assets/video-profile.mp4" class="object-fit-sm-cover" autoplay muted></video>
            </div>
        </div>
        <!-- Akhir Home -->

        <!-- Mahasiswa Input -->
        <div class="content-walimahasiswa text-center mt-5">
            <h4>Sistem Informasi Mahasiswa</h4>
            <p>Silahkan mengisi, mengupdate, atau menghapus data yang dimaksud</p>
        </div>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-light" style="background-color: #B11016;" id="mahasiswa">Input Data
                    Mahasiswa</div>
                <div class="card-body">
                    <form method="post" action="proses_mahasiswa.php">
                        <div class="form-group">
                            <label>Nim</label>
                            <input type="text" name="nim" class="form-control" placeholder="Masukkan Nama Anda"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Nama Mahasiswa</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Nama Wali Mahasiswa</label>
                            <select name="id_walimhs" class="form-control" required>
                                <!-- Opsi yang akan diisi dari tabel walimahasiswa -->
                                <?php
                                // Query untuk mendapatkan data nama dari tabel walimahasiswa
                                $queryWali = 'SELECT id_walimhs, nama FROM walimahasiswa';
                                $resultWali = mysqli_query($koneksi, $queryWali);
                                
                                // Loop untuk menampilkan setiap opsi
                                while ($rowWali = mysqli_fetch_assoc($resultWali)) {
                                    echo "<option value='{$rowWali['id_walimhs']}'>{$rowWali['nama']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label>Jenis Kelamin</label>
                            <div class="form-check mt-3">
                                <label>Laki-Laki</label>
                                <input type="radio" name="jenis_kelamin" class="form-check-input" value="Laki-Laki"
                                    required>
                            </div>
                            <div class="form-check mt-3">
                                <label>Perempuan</label>
                                <input type="radio" name="jenis_kelamin" class="form-check-input" value="Perempuan"
                                    required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Jurusan</label>
                                <select class="form-control" name="jurusan" placeholder="Pilihan Jurusan Anda">
                                    <option value="Informatika">Informatika</option>
                                    <option value="Farmasi">Farmasi</option>
                                    <option value="Hukum">Hukum</option>
                                    <option value="Akutansi">Akutansi</option>
                                    <option value="Kedokteran">Kedokteran</option>
                                    <option value="Psikologi">Psikologi</option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control"
                                    placeholder="Masukkan Alamat Anda" required>
                            </div>
                        </div>
                        <button type="submit" class="btn text-light mt-4" name="simpan"
                            style="background-color: #B11016;">Simpan</button>
                        <button type="reset" class="btn text-light mt-4" name="kosongkan"
                            style="background-color: #585859;">Kosongkan</button>
                    </form>
                </div>
            </div>
            <!-- Akhir Mahasiswa Input -->

            <!-- Mahasiswa Output -->
            <div class="card mt-5">
                <div class="card-header text-light" style="background-color: #B11016;">Data Mahasiswa</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nomor</th>
                            <th>Nim</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Alamat</th>
                            <th>Nama Wali</th>
                            <th>Aksi</th>
                        </tr>

                        <?php
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * from mahasiswa order by id_mhs desc");
                        while($data = mysqli_fetch_array($tampil)):
                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nim'] ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= $data['jurusan'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <!-- Menampilkan nama wali mahasiswa berdasarkan id_walimhs -->
                            <td>
                                <?php
                                // Ambil id_wali dari data mahasiswa
                                $id_wali = $data['id_wali'];
                                
                                // Query untuk mendapatkan nama wali berdasarkan id_wali
                                $queryNamaWali = "SELECT nama FROM walimahasiswa WHERE id_walimhs = '$id_wali'";
                                $resultNamaWali = mysqli_query($koneksi, $queryNamaWali);
                                
                                // Cek apakah query berhasil dijalankan
                                if ($resultNamaWali) {
                                    $rowNamaWali = mysqli_fetch_assoc($resultNamaWali);
                                    echo $rowNamaWali['nama'];
                                } else {
                                    echo 'Data tidak ditemukan';
                                }
                                ?>
                            </td>
                            <td>
                            <a href="proses_mahasiswa.php?hapus=<?= $data['id_mhs'] ?>"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus?')"
                                    class="btn btn-danger">Hapus</a>
                                <a href="edit_mahasiswa.php?id=<?= $data['id_mhs'] ?>" class="btn text-light"
                                    style="background-color: #585859;">Edit</a>
                            </td>
                        </tr>

                        <?php endwhile; ?>

                    </table>
                </div>
            </div>
        </div>
        <!-- Akhir Mahasiswa Output-->

        <!-- Wali Mahasiswa Input-->
        <div class="content-walimahasiswa text-center mt-5">
            <h4>Sistem Informasi Wali Mahasiswa</h4>
            <p>Silahkan mengisi, mengupdate, atau menghapus data yang dimaksud</p>
        </div>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-light" style="background-color: #B11016;" id="wali">Input Data Wali
                    Mahasiswa</div>
                <div class="card-body">
                    <form method="post" action="proses_wali.php">
                        <div class="form-group">
                            <label>Nama Wali Mahasiswa</label>
                            <input type="text" name="nama" class="form-control"
                                placeholder="Masukkan Nama Anda" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Jenis Kelamin</label>
                            <div class="form-check mt-3">
                                <label>Laki-Laki</label>
                                <input type="radio" name="jenis_kelamin" class="form-check-input"
                                    value="Laki-Laki" required>
                            </div>
                            <div class="form-check mt-3">
                                <label>Perempuan</label>
                                <input type="radio" name="jenis_kelamin" class="form-check-input"
                                    value="Perempuan" required>
                            </div>
                            <div class="form-group mt-3">
                                <label>Alamat</label>
                                <input type="text" name="alamat" class="form-control"
                                    placeholder="Masukkan Alamat Anda" required>
                            </div>
                        </div>
                        <button type="submit" class="btn text-light mt-4" name="simpanwali"
                            style="background-color: #B11016;">Simpan</button>
                        <button type="reset" class="btn text-light mt-4" name="kosongkanwali"
                            style="background-color: #585859;">Kosongkan</button>
                    </form>
                </div>
            </div>
            <!-- Akhir Wali Mahasiswa Input -->

            <!-- Wali Mahasiswa Output -->
            <div class="card mt-5">
                <div class="card-header text-light" style="background-color: #B11016;">Data Wali Mahasiswa</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Opsi</th>
                        </tr>

                        <?php
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * from walimahasiswa order by id_walimhs desc");
                        while($data = mysqli_fetch_array($tampil)):
                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['nama'] ?></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                            <td><?= $data['alamat'] ?></td>
                            <td>
                                <a href="proses_wali.php?hapus=<?= $data['id_walimhs'] ?>"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus?')"
                                    class="btn btn-danger">Hapus</a>
                                <a href="edit_walimahasiswa.php?id=<?= $data['id_walimhs'] ?>" class="btn text-light"
                                    style="background-color: #585859;">Edit</a>
                            </td>
                        </tr>

                        <?php endwhile; ?>

                    </table>
                </div>
            </div>
        </div>
        <!-- Akhir Wali Mahasiswa Output -->

        <!-- Admin Input -->
        <div class="content-admin text-center mt-5">
            <h4>Laman Admin</h4>
            <p>Silahkan mengisi, mengupdate, atau menghapus data yang dimaksud</p>
        </div>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-light" style="background-color: #B11016;" id="admin">Input Data Admin</div>
                <div class="card-body">
                    <form method="post" action="proses_admin.php">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control"
                                placeholder="Masukkan Username Anda" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control"
                                placeholder="Masukkan Password Anda" required>
                        </div>
                        <div class="form-group mt-3">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control"
                                placeholder="Masukkan Status Anda" required>
                        </div>
                        <button type="submit" class="btn text-light mt-4" name="simpanadmin"
                            style="background-color: #B11016 ;">Simpan</button>
                        <button type="reset" class="btn text-light mt-4" name="kosongkanadmin"
                            style="background-color: #585859;">Kosongkan</button>
                    </form>
                </div>
            </div>
        <!-- Akhir Admin Input -->

        <!-- Admin Output -->
        <div class="card mt-5">
                <div class="card-header text-light" style="background-color: #B11016;">Data Admin</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nomor</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>

                        <?php
                        $no = 1;
                        $tampil = mysqli_query($koneksi, "SELECT * from admin order by id_admin desc");
                        while($data = mysqli_fetch_array($tampil)):
                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['password'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td>
                                <a href="proses_admin.php?hapus=<?= $data['id_admin'] ?>"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus?')"
                                    class="btn btn-danger">Hapus</a>
                                <a href="edit_admin.php?id=<?= $data['id_admin'] ?>" class="btn text-light"
                                    style="background-color: #585859;">Edit</a>
                            </td>
                        </tr>

                        <?php endwhile; ?>

                    </table>
                </div>
            </div>
        </div>
        <!-- Akhir Admin Output -->
    </main>

    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container">
            <div class=" text-center">
                <h5>Sistem Informasi Akademik</h5>
                <p>Universitas Telkom Indonesia</p><br><br>
                <p id="copyright"></p>

                <script>
                    // Mencari tahun saat ini
                    var currentYear = new Date().getFullYear();

                    // Teks hak cipta dengan tahun saat ini
                    var copyrightText = "Copyright © " + currentYear;

                    // Menetapkan teks hak cipta ke elemen HTML dengan ID "copyright"
                    document.getElementById("copyright").innerHTML = copyrightText;
                </script>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-eF4OCn9tu1QdTKP/4EZZLwi3zINa5mRszVX6jWB6JwEAgdg4T0slShEiEM6GGgvn" crossorigin="anonymous">
    </script>
</body>

</html>
