<?php
// Koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Ambil ID denda dari parameter URL
$id_denda = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Validasi ID denda
if ($id_denda <= 0) {
    die("ID denda tidak valid.");
}

// Update status denda menjadi "Lunas"
$query = "UPDATE tb_riwayatdenda SET status_pembayaran = 'dibayar' WHERE id_denda = $id_denda";
if (mysqli_query($con, $query)) {
    // Redirect ke halaman riwayat denda setelah sukses
    header("Location:riwayatdenda.php");
    exit();
} else {
    echo "Error: " . mysqli_error($con);
}

// Tutup koneksi
mysqli_close($con);
?>
