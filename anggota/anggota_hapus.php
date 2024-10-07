
<?php 
// Tangkap data dari halaman formulir dengan metode GET
$data0 = $_GET['id'];

// Definisikan koneksi
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Periksa apakah buku ada dalam tabel peminjaman
$query_check = "SELECT COUNT(*) AS count FROM tb_peminjaman WHERE id_anggota = '$data0'";
$result_check = mysqli_query($con, $query_check);

$data_check = mysqli_fetch_assoc($result_check);

// Jika buku masih digunakan dalam tabel peminjaman, tampilkan pesan
if ($data_check['count'] > 0) {
    echo "<script>alert('Anggota tidak dapat dihapus karena masih digunakan dalam tabel peminjaman!.'); window.location='anggota.php';</script>";
} else {
    // Jika buku tidak digunakan, hapus buku dari tabel
    $sql = "DELETE FROM tb_anggota WHERE id='$data0'";
    mysqli_query($con, $sql);
}

// Redirect ke halaman tabel jika penghapusan berhasil
echo "<script>window.location='anggota.php';</script>";
?>
