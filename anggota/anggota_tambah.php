<?php
// Tangkap data dari halaman formulir dengan metode POST
$data1 = $_POST['nama'];
$data2 = $_POST['alamat'];
$data3 = $_POST['nomor_telepon'];
$data4 = $_POST['email'];
$data5 = $_POST['tanggal_bergabung'];

// Koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Query untuk memeriksa apakah nomor telepon sudah ada
$query_telepon = mysqli_query($con, "SELECT * FROM tb_anggota WHERE nomor_telepon='$data3'");
$stmt_telepon = mysqli_num_rows($query_telepon) > 0;

// Query untuk memeriksa apakah email sudah ada
$query_email = mysqli_query($con, "SELECT * FROM tb_anggota WHERE email='$data4'");
$stmt_email = mysqli_num_rows($query_email) > 0;

if ($stmt_telepon && $stmt_email) {
    // Jika nomor telepon dan email sudah ada
    echo "<script>alert('Nomor telepon dan email sudah digunakan. Silakan coba dengan data lain.'); window.location='anggota_form-tambah.php';</script>";
} elseif ($stmt_telepon) {
    // Jika hanya nomor telepon yang sudah ada
    $query = "INSERT INTO tb_anggota (nama, alamat, nomor_telepon, email, tanggal_bergabung) VALUES ('$data1', '$data2', '$data3', '$data4', '$data5')";
    mysqli_query($con,$query) or die (mysqli_error($con));
} elseif ($stmt_email) {
    // Jika hanya email yang sudah ada
    $query = "INSERT INTO tb_anggota (nama, alamat, nomor_telepon, email, tanggal_bergabung) VALUES ('$data1', '$data2', '$data3', '$data4', '$data5')";
    mysqli_query($con,$query) or die (mysqli_error($con));
} else {
    // Masukkan data baru jika tidak ada duplikasi
    $query = "INSERT INTO tb_anggota (nama, alamat, nomor_telepon, email, tanggal_bergabung) VALUES ('$data1', '$data2', '$data3', '$data4', '$data5')";
    mysqli_query($con,$query) or die (mysqli_error($con));
}
//redireksi ke halaman tabel
echo "<script>window.location='anggota.php';</script>";
?>
