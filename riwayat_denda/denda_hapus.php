<?php 
// Definisikan koneksi database
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Periksa koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk menghapus semua data dari tabel tb_riwayatdenda
$sql_truncate = "TRUNCATE TABLE tb_riwayatdenda";

// Eksekusi query TRUNCATE
if (mysqli_query($con, $sql_truncate)) {
    // Redirect ke halaman tabel jika TRUNCATE berhasil
    echo "<script>window.location='riwayatdenda.php';</script>";
} else {
    // Tampilkan pesan kesalahan jika terjadi kesalahan
    echo "<script>alert('Terjadi kesalahan saat menghapus data.'); window.location='riwayatdenda.php';</script>";
}

// Tutup koneksi
mysqli_close($con);
?>
