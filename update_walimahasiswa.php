<?php
// Koneksi Database
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'db_mahasiswa';

($koneksi = mysqli_connect($server, $user, $pass, $database)) or die(mysqli_error($koneksi));

if (isset($_POST['simpan'])) {
    $idToUpdate = $_POST['id_walimhs'];

    $update = mysqli_query(
        $koneksi,
        "UPDATE walimahasiswa SET
        nama = '$_POST[nama]',
        jenis_kelamin = '$_POST[jenis_kelamin]',
        alamat = '$_POST[alamat]'
        WHERE id_walimhs = '$idToUpdate'",
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
