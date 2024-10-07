<?php
require_once "../database/config.php";

if (isset($_POST['upload']))
{

$sumber = $_FILES['file']['tmp_name'];
$ukuran = $_FILES['file']['size'];
$file = $_FILES['file']['name'];

$query = mysqli_query($conn, "SELECT * FROM tb_home WHERE id='1' ") or die (mysqli_error($conn));
$fetch = mysqli_fetch_assoc($query);
$gambar = $fetch['gambar'];
if ($file) {
$ekstensi = explode (".", $file);
$file_name = "login-image.".end($ekstensi);

$target_dir ="../../images/".$file_name;

move_uploaded_file($sumber, $target_dir);
mysqli_query($conn, "UPDATE tb_home SET gambar='$file_name' WHERE id='1'") or die (mysqli_error($conn));
}else{
    mysqli_query($conn, "UPDATE tb_home SET gambar='$file_name' WHERE id='1'") or die (mysqli_error($conn));
}

echo "<script type='text/javascript'> window.location.href = 'index.php';</script>";
}
?>