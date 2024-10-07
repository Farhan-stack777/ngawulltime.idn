<?php 
//tangkap data dari halaman formulir dg metode POST
$data1 = $_POST['name'];
$data2 = $_POST['email'];
$data3 = $_POST['password'];
$data4 = $_POST['alamat'];
$data5 = $_POST['telepon'];

// Koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

    // Query untuk memeriksa apakah username sudah ada
    $query = mysqli_query($con, "SELECT * FROM tb_petugas WHERE name='$data1'");

    if (mysqli_num_rows($query) > 0) {
        // Username sudah ada, arahkan dengan pesan kesalahan
        echo "<script>alert('Username sudah di pakai. Silakan coba gunakan username lain.'); window.location='petugas_form-tambah.php';</script>";
    } else {
        // Masukkan data baru
        $query = "INSERT INTO tb_petugas (id_petugas,nama,email,password,alamat,telepon) VALUES ('','$data1','$data2','$data3','$data4','$data5')";
        mysqli_query($con,$query) or die (mysqli_error($con));
    }
    //redireksi ke halaman tabel
    echo "<script>window.location='contact.php';</script>";
?>