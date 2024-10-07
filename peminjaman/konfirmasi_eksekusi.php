<?php
// Tangkap data dari halaman formulir dengan metode POST
$data0 = $_POST['id']; // ID Peminjaman
$data1 = $_POST['tanggal_kembali']; // Tanggal Pengembalian
$data2 = $_POST['id2']; // ID Anggota
$denda_per_hari = 10000; // Denda per hari keterlambatan

// Koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Ambil data peminjaman terkait
$query_peminjaman = mysqli_query($con, "SELECT * FROM tb_peminjaman WHERE id_peminjaman='$data0'");
$data_peminjaman = mysqli_fetch_array($query_peminjaman);

if ($data_peminjaman) {
    $id_buku = $data_peminjaman['id_buku'];
    $tanggal_kembali_peminjaman = $data_peminjaman['tanggal_kembali'];

    // Update status peminjaman
    $sql_update_peminjaman = "UPDATE tb_peminjaman SET status='dikembalikan' WHERE id_peminjaman='$data0'";
    mysqli_query($con, $sql_update_peminjaman);

    // Update stok buku
    $query_buku = mysqli_query($con, "SELECT stok FROM tb_buku WHERE id_buku='$id_buku'");
    $data_buku = mysqli_fetch_array($query_buku);

    if ($data_buku) {
        $stok_buku = $data_buku['stok'];
        $stok_buku_baru = $stok_buku + 1;
        $sql_update_buku = "UPDATE tb_buku SET stok='$stok_buku_baru' WHERE id_buku='$id_buku'";
        mysqli_query($con, $sql_update_buku);
    }

    // Hitung denda
    $tanggal_kembali_peminjaman_date = new DateTime($tanggal_kembali_peminjaman);
    $tanggal_pengembalian_date = new DateTime($data1);
    $interval = $tanggal_kembali_peminjaman_date->diff($tanggal_pengembalian_date);
    $hari_telat = $interval->days;

    if ($tanggal_pengembalian_date > $tanggal_kembali_peminjaman_date) {
        $jumlah_denda = $hari_telat * $denda_per_hari;
        $status_pembayaran = 'belum_dibayar';
    } else {
        $jumlah_denda = 0;
        $status_pembayaran = 'dibayar';
    }

    // Insert data ke tb_pengembalian
    $sql_insert_pengembalian = "INSERT INTO tb_pengembalian (id_peminjaman, tanggal_pengembalian, denda) VALUES ('$data0', '$data1', '$jumlah_denda')";
    mysqli_query($con, $sql_insert_pengembalian);

    // Insert data ke tb_riwayatdenda
    // Note: ID Denda tidak dihasilkan secara otomatis, maka ID harus diatur secara manual atau gunakan AUTO_INCREMENT di database
    $sql_insert_riwayatdenda = "INSERT INTO tb_riwayatdenda (id_anggota, id_peminjaman, jumlah_denda, status_pembayaran) VALUES ('$data2', '$data0', '$jumlah_denda', '$status_pembayaran')";
    mysqli_query($con, $sql_insert_riwayatdenda);
}

// Redirect ke halaman tabel pengembalian
echo "<script>window.location='../pengembalian/pengembalian.php';</script>";
?>
