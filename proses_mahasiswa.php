<?php
// Koneksi Database
$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'db_mahasiswa';

($koneksi = mysqli_connect($server, $user, $pass, $database)) or die(mysqli_error($koneksi));

// Aksi Tombol Simpan
if (isset($_POST['simpan'])) {
    // Mengambil nilai id_wali dari pilihan yang dipilih
    $id_wali = $_POST['id_walimhs'];

    // Melakukan penyimpanan data sesuai kebutuhan, termasuk id_wali yang telah diambil
    $simpan = mysqli_query(
        $koneksi,
        "INSERT INTO mahasiswa (nim, nama, jenis_kelamin, jurusan, alamat, id_wali)
        VALUES ('$_POST[nim]', '$_POST[nama]', '$_POST[jenis_kelamin]', '$_POST[jurusan]', '$_POST[alamat]', '$id_wali')",
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

    // Query untuk menghapus data mahasiswa berdasarkan id
    $hapus = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id_mhs = '$idToDelete'");

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