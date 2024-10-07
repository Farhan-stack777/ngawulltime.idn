<?php 
require_once "../database/config.php";
?>
<!DOCTYPE html>
<html>
<head>
  
</head>

<body>
<div class="wrapper">
  <?php

if (isset($_POST['update']))
{ 

  $id             = trim(mysqli_real_escape_string($con, $_POST['id'])); 
  $nama         = trim(mysqli_real_escape_string($con, $_POST['nama']));
  $alamat          = trim(mysqli_real_escape_string($con, $_POST['alamat']));
  $kontak          = trim(mysqli_real_escape_string($con, $_POST['kontak']));
  $keterangan           = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
  $sumber_file = $_FILES['logo']['tmp_name'];
  $ukuran_file = $_FILES['logo']['size'];
  $nama_file   = $_FILES['logo']['name'];

  if($nama_file=="")
  {

  $query_ph = mysqli_query($con, "SELECT * FROM tb_perusahaan WHERE Id='1' ") or die (mysqli_eror($con));
  $fetch=mysqli_fetch_assoc($query_ph);
  $logo_lama = $fetch['logo'];
  
  mysqli_query($con, "UPDATE tb_perusahaan SET logo ='$logo_lama', nama='$nama',alamat='$alamat',kontak='$kontak',keterangan='$keterangan' WHERE Id='$id'") or die (mysqli_eror($con));
  }
  else
  {
  $ekstensi = explode (".", $nama_file);
  $rename_file = "Logo-".$id.".".end($ekstensi);
  
  $target_dir ="../img/";
  $target_file = $target_dir.$rename_file; 
  move_uploaded_file($sumber_file, $target_file);
   
  
  mysqli_query($con, "UPDATE tb_perusahaan SET logo ='$rename_file', nama='$nama',alamat='$alamat',kontak='$kontak',keterangan='$keterangan' WHERE Id='$id'") or die (mysqli_eror($con));
  }
     

}  

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "../superuser";

  }, 500);
</script>
</body>
</html>