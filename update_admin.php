<?php
// Koneksi Database
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'db_mahasiswa';

($koneksi = mysqli_connect($server, $user, $pass, $database)) or die(mysqli_error($koneksi));

if (isset($_POST['simpan'])) {
    $idToUpdate = $_POST['id_admin'];

    $update = mysqli_query(
        $koneksi,
        "UPDATE admin SET
        username = '$_POST[username]',
        password = '$_POST[password]',
        status = '$_POST[status]'
        WHERE id_admin = '$idToUpdate'",
    );

    if ($update) {
        // Kondisi jika mengedit sukses
        echo "<script>
              alert('Sukses mengupdate data');
              document.location='index.php';
              </script>";
    } else {
        // Kondisi jika mengedit gagal
        echo "<script>
              alert('Gagal mengupdate data');
              document.location='index.php';
              </script>";
    }
}
?>
