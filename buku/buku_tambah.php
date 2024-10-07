<?php
// Tangkap data dari halaman formulir dengan metode POST
$data1 = $_POST['judul_buku'];
$data2 = $_POST['pengarang'];
$data3 = $_POST['penerbit'];
$data4 = $_POST['tahun_terbit'];
$data5 = $_POST['kategori'];
$data6 = $_POST['jumlah_halaman'];
$data7 = $_POST['stok'];

// Koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Periksa koneksi database
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk memeriksa apakah judul buku dan kategori sudah ada
$query_judulbuku = mysqli_query($con, "SELECT * FROM tb_buku WHERE judul_buku='$data1' AND kategori='$data5'");
$judul_buku_dan_kategori_exists = mysqli_num_rows($query_judulbuku) > 0;

// Query untuk memeriksa apakah judul buku sudah ada
$query_judulbuku_only = mysqli_query($con, "SELECT * FROM tb_buku WHERE judul_buku='$data1'");
$judul_buku_exists = mysqli_num_rows($query_judulbuku_only) > 0;

// Query untuk memeriksa apakah kategori sudah ada
$query_kategori_only = mysqli_query($con, "SELECT * FROM tb_buku WHERE kategori='$data5'");
$kategori_exists = mysqli_num_rows($query_kategori_only) > 0;

// Logika untuk memeriksa duplikasi
if ($judul_buku_dan_kategori_exists) {
    // Jika kombinasi judul buku dan kategori sudah ada
    echo "<script>alert('Judul Buku dan Kategori sudah digunakan. Silakan coba dengan data lain.'); window.location='buku_form-tambah.php';</script>";
} elseif ($judul_buku_exists) {
    // Jika hanya judul buku yang sudah ada
    $query = "INSERT INTO tb_buku (id_buku,judul_buku,pengarang,penerbit,tahun_terbit,kategori,jumlah_halaman,stok) VALUES ('','$data1','$data2','$data3','$data4','$data5','$data6','$data7')";
    mysqli_query($con,$query) or die(mysqli_error($con));
    echo "<script>window.location='buku.php';</script>";
} elseif ($kategori_exists) {
    // Jika hanya kategori yang sudah ada
    $query = "INSERT INTO tb_buku (id_buku,judul_buku,pengarang,penerbit,tahun_terbit,kategori,jumlah_halaman,stok) VALUES ('','$data1','$data2','$data3','$data4','$data5','$data6','$data7')";
    mysqli_query($con,$query) or die(mysqli_error($con));
    echo "<script>window.location='buku.php';</script>";
} else {
    // Masukkan data baru jika tidak ada duplikasi
    $query = "INSERT INTO tb_buku (id_buku,judul_buku,pengarang,penerbit,tahun_terbit,kategori,jumlah_halaman,stok) VALUES ('','$data1','$data2','$data3','$data4','$data5','$data6','$data7')";
    mysqli_query($con,$query) or die(mysqli_error($con));
    echo "<script>window.location='buku.php';</script>";
}

// Tutup koneksi database
mysqli_close($con);
?>
