<?php 
//tangkap data dari halaman formulir dg metode POST
$data0 = $_POST['id'];
$data1 = $_POST['judul_buku'];
$data2 = $_POST['pengarang'];
$data3 = $_POST['penerbit'];
$data4 = $_POST['tahun_terbit'];
$data5 = $_POST['kategori'];
$data6 = $_POST['jumlah_halaman'];
$data7 = $_POST['stok'];

//SQL query update data(definisikan koneksi)
$con = mysqli_connect('localhost','root','','db_perpustakaan2');
//SQL query update data(definisikan query sql update data, jelaskan nama field=data inputan updatenya dg kondisi berdasarkan field tertentu)
$sql = "UPDATE tb_buku SET judul_buku='$data1' ,pengarang='$data2', penerbit='$data3',tahun_terbit='$data4' ,kategori='$data5',jumlah_halaman='$data6',stok='$data7' WHERE id_buku='$data0' ";
//SQL query update data(syntax perintah update data)
mysqli_query($con,$sql) or die (mysqli_error($con));

//redireksi ke halaman tabel
echo "<script>window.location='buku.php';</script>";
?>