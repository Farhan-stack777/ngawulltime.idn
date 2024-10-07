<?php
require_once "../config.php";

if (isset($_POST['upload']))
{

$sumber = $_FILES['file']['tmp_name'];
$ukuran = $_FILES['file']['size'];
$file = $_FILES['file']['name'];
$data1 = $_POST['nama_aplikasi'];

$query = mysqli_query($con, "SELECT * FROM tb_pengaturan WHERE id='1' ") or die (mysqli_error($con));
$fetch = mysqli_fetch_assoc($query);
$gambar = $fetch['gambar'];
if ($file) {
$ekstensi = explode (".", $file);
$file_name = "login-image.".end($ekstensi);

$target_dir ="../berkas/".$file_name;

move_uploaded_file($sumber, $target_dir);
mysqli_query($con, "UPDATE tb_pengaturan SET gambar='$file_name' , nama_aplikasi ='$data1' WHERE id='1'") or die (mysqli_error($con));
}else{
    mysqli_query($con, "UPDATE tb_pengaturan SET nama_aplikasi='$data1' WHERE id='1'") or die (mysqli_error($con));
}

echo "<script type='text/javascript'> window.location.href = 'index.php';</script>";
}
?>