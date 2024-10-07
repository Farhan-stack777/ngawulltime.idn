

<?php 
// Tangkap data dari halaman formulir dengan metode GET
$data0 = $_GET['id'];

// Definisikan koneksi
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Periksa apakah kategori digunakan dalam tabel buku
$query_cek = "SELECT COUNT(*) AS count FROM tb_buku WHERE kategori = '$data0'";
$result_cek = mysqli_query($con, $query_cek);
$data_cek = mysqli_fetch_assoc($result_cek);

// Jika kategori masih digunakan dalam tabel buku, tampilkan pesan
if ($data_cek['count'] > 0) {
    echo "<script>alert('Kategori tidak dapat dihapus karena masih di gunakan!.'); window.location='kategori_buku.php';</script>";
} else {
    // Jika kategori tidak digunakan, hapus kategori
    $query_delete = "DELETE FROM tb_kategori WHERE id_kategori = '$data0'";
    mysqli_query($con, $query_delete);
}
//redireksi ke halaman tabel
echo "<script>window.location='kategori_buku.php';</script>";
?>
