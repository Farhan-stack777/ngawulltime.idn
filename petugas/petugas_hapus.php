<?php 
//tangkap data dari halaman formulir dg metode GET
$data0 = $_GET['id'];

//SQL query delete data (definisikan koneksi database)
$con = mysqli_connect('localhost','root','','db_perpustakaan2');
//SQL query delete data (definisikan query sql delete di tabelnya dg ketentuan berdasarkan field tertentu)
$sql = "DELETE FROM tb_petugas WHERE id_petugas='$data0' ";
//SQL query delete data (syntax perintah delete datanya)
mysqli_query($con,$sql) or die (mysqli_error($con));

//redireksi ke halaman tabel
echo "<script>window.location='petugas.php';</script>";
?>