<?php 
//tangkap data dari halaman formulir dg metode POST
$data1 = $_POST['nama_kategori'];
$data2 = $_POST['deskripsi'];

//SQL query insert data(definisikan koneksi)
$con = mysqli_connect('localhost','root','','db_perpustakaan2');

//SQL query insert data(definisikan query insert sql)
$sql = "INSERT INTO tb_kategori (id_kategori,nama_kategori,deskripsi) VALUES ('','$data1','$data2')";

//SQL query insert data(syntax perintah tambah datanya)
mysqli_query($con,$sql) or die (mysqli_error($con));

//redireksi ke halaman tabel
echo "<script>window.location='kategori_buku.php';</script>";
?>