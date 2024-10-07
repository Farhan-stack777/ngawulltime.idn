<?php 
// Tangkap data dari formulir dengan metode POST
$data1 = $_POST['id_anggota'];
$data2 = $_POST['id_buku'];
$data3 = $_POST['tanggal_pinjam'];
$data4 = $_POST['tanggal_kembali'];
$data5 = $_POST['status'];

// Definisikan koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Mulai transaksi
mysqli_begin_transaction($con);

// Query untuk mendapatkan data buku
$query_buku = mysqli_query($con, "SELECT * FROM tb_buku WHERE id_buku='$data2'");
$data_buku = mysqli_fetch_array($query_buku);

if ($data_buku) {
    $stok_buku = $data_buku['stok'];

    // Jika stok buku lebih dari 0, maka lanjutkan proses
    if ($stok_buku > 0) {
        // Insert data peminjaman
        $sql_peminjaman = "INSERT INTO tb_peminjaman (id_anggota, id_buku, tanggal_pinjam, tanggal_kembali, status) VALUES ('$data1', '$data2', '$data3', '$data4', '$data5')";
        mysqli_query($con, $sql_peminjaman);

        // Update stok buku
        $stok_buku_baru = $stok_buku - 1;
        $sql_update_buku = "UPDATE tb_buku SET stok='$stok_buku_baru' WHERE id_buku='$data2'";
        mysqli_query($con, $sql_update_buku);

        // Commit transaksi
        mysqli_commit($con);
    } else {
        // Jika stok buku kosong, rollback transaksi
        mysqli_rollback($con);
        echo "<script>alert('Stok buku kosong. Silakan untuk dapat meminjam buku lain.'); window.location='peminjaman_form-tambah.php';</script>";
    }
}
echo "<script>window.location='peminjaman.php';</script>";
?>
