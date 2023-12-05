<?php
// Koneksi Database
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'db_mahasiswa';

($koneksi = mysqli_connect($server, $user, $pass, $database)) or die(mysqli_error($koneksi));
if (isset($_GET['id'])) {
    $idToEdit = $_GET['id'];

    $result = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$idToEdit'");
    $data = mysqli_fetch_assoc($result);

    if (!$data) {
        die('Data not found.');
    }

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
    <main>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-light" style="background-color: #B11016;">Edit Data Admin</div>
                <div class="card-body">
                    <form method="post" action="update_admin.php">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $data['id_admin']; ?>" name="id_admin">
                        </div>
                        <div class="form-group mt-3">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan Username Anda"
                                value="<?php echo $data['username']; ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password Anda"
                                value="<?php echo $data['password']; ?>">
                        </div>

                        <div class="form-group mt-3">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" placeholder="Masukkan Status Anda"
                                value="<?php echo $data['status']; ?>">
                        </div>
                        <button type="submit" class="btn text-light mt-4" name="simpan"
                            style="background-color: #B11016;">Simpan</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
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

    <?php
} else {
    echo 'ID not specified.';
}
?>
</body>
</html>