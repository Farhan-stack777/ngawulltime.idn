<?php 
// Tangkap data dari halaman formulir dengan metode GET
$data0 = $_GET['id'];

// Definisikan koneksi
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Periksa koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Periksa apakah id_peminjaman ada dalam tabel pengembalian
$query_check_pengembalian = "SELECT COUNT(*) AS count FROM tb_pengembalian WHERE id_peminjaman = '$data0'";
$result_check_pengembalian = mysqli_query($con, $query_check_pengembalian);

$data_check_pengembalian = mysqli_fetch_assoc($result_check_pengembalian);

// Periksa apakah id_peminjaman ada dalam tabel riwayatdenda
$query_check_denda = "SELECT COUNT(*) AS count FROM tb_riwayatdenda WHERE id_peminjaman = '$data0'";
$result_check_denda = mysqli_query($con, $query_check_denda);

$data_check_denda = mysqli_fetch_assoc($result_check_denda);

// Jika id_peminjaman masih digunakan dalam tabel pengembalian atau tabel riwayatdenda
if ($data_check_pengembalian['count'] > 0) {
    echo "<script>alert('Tidak dapat dihapus karena masih digunakan dalam tabel pengembalian.'); window.location='peminjaman.php';</script>";
} elseif ($data_check_denda['count'] > 0) {
    echo "<script>alert('Tidak dapat dihapus karena masih digunakan dalam tabel denda.'); window.location='peminjaman.php';</script>";
} else {
    // Jika id_peminjaman tidak digunakan, hapus dari tabel peminjaman
    $sql_delete = "DELETE FROM tb_peminjaman WHERE id_peminjaman='$data0'";
    mysqli_query($con, $sql_delete);
}

// Tutup koneksi
echo "<script>window.location='peminjaman.php';</script>";
?>
