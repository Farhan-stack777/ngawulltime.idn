
<?php 
//tangkap data dari halaman formulir dg metode POST
$data0 = $_POST['id'];
$data1 = $_POST['nama_kategori'];
$data2 = $_POST['deskripsi'];

//SQL query update data(definisikan koneksi)
$con = mysqli_connect('localhost','root','','db_perpustakaan2');
//SQL query update data(definisikan query sql update data, jelaskan nama field=data inputan updatenya dg kondisi berdasarkan field tertentu)
$sql = "UPDATE tb_kategori SET nama_kategori='$data1' ,deskripsi='$data2' WHERE id_kategori='$data0' ";
//SQL query update data(syntax perintah update data)
mysqli_query($con,$sql) or die (mysqli_error($con));

//redireksi ke halaman tabel
echo "<script>window.location='kategori_buku.php';</script>";
?>