<?php 
//tangkap data dari halaman formulir dg metode POST
$data0 = $_POST['id'];
$data1 = $_POST['nama'];
$data2 = $_POST['alamat'];
$data3 = $_POST['nomor_telepon'];
$data4 = $_POST['email'];
$data5 = $_POST['tanggal_bergabung'];

//SQL query update data(definisikan koneksi)
$con = mysqli_connect('localhost','root','','db_perpustakaan2');
//SQL query update data(definisikan query sql update data, jelaskan nama field=data inputan updatenya dg kondisi berdasarkan field tertentu)
$sql = "UPDATE tb_anggota SET nama='$data1' ,alamat='$data2', nomor_telepon='$data3',email='$data4' ,tanggal_bergabung='$data5'WHERE id='$data0' ";
//SQL query update data(syntax perintah update data)
mysqli_query($con,$sql) or die (mysqli_error($con));

//redireksi ke halaman tabel
echo "<script>window.location='anggota.php';</script>";
?>