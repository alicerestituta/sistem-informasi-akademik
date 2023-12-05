<?php
// Koneksi Database
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'db_mahasiswa';

($koneksi = mysqli_connect($server, $user, $pass, $database)) or die(mysqli_error($koneksi));

// Aksi Tombol Simpan
if (isset($_POST['simpanadmin'])) {
    // Melakukan penyimpanan data sesuai kebutuhan
    $simpan = mysqli_query(
        $koneksi,
        "INSERT INTO admin (username, password, status)
        VALUES ('$_POST[username]', '$_POST[password]', '$_POST[status]')",
    );

    if ($simpan) {
        // Kondisi jika penyimpanan sukses
        echo "<script>
              alert('Sukses menyimpan data');
              document.location='index.php';
              </script>";
    } else {
        // Kondisi jika penyimpanan gagal
        echo "<script>
              alert('Gagal menyimpan data');
              document.location='index.php';
              </script>";
    }
}
// Aksi Tombol Hapus
if (isset($_GET['hapus'])) {
    $idToDelete = $_GET['hapus'];

    // Query untuk menghapus data admin berdasarkan id
    $hapus = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$idToDelete'");

    if ($hapus) {
        // Kondisi jika menghapus sukses
        echo "<script>
              alert('Sukses menghapus data');
              document.location='index.php';
              </script>";
    } else {
        // Kondisi jika menghapus sukses
        echo "<script>
              alert('Gagal menghapus data. Error: " .
            mysqli_error($koneksi) .
            "');
              document.location='index.php';
              </script>";
    }
}
?>
