<?php
// Koneksi ke basis data
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bootcamp3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$id = $_GET['id'];

// Query untuk menghapus data
$sql = "DELETE FROM tb_has WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus!";
} else {
    echo "Error: " . $conn->error;
}

header("Location: has.php"); // Kembali ke halaman utama
$conn->close();
?>
