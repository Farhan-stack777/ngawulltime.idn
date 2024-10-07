<?php 
//tangkap data dari halaman formulir dg metode POST
$data0 = $_POST['id'];
$data1 = $_POST['nama'];
$data2 = $_POST['username'];
$data3 = $_POST['password'];
$data4 = $_POST['email'];


//SQL query update data(definisikan koneksi)
$con = mysqli_connect('localhost','root','','db_perpustakaan2');
//SQL query update data(definisikan query sql update data, jelaskan nama field=data inputan updatenya dg kondisi berdasarkan field tertentu)
$sql = "UPDATE tb_petugas SET nama_petugas='$data1' ,username='$data2', password='$data3',email='$data4' WHERE id_petugas='$data0' ";
//SQL query update data(syntax perintah update data)
mysqli_query($con,$sql) or die (mysqli_error($con));

//redireksi ke halaman tabel
echo "<script>window.location='petugas.php';</script>";
?>