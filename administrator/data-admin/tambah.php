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

if (isset($_POST['tambah']))
{ 

  
 
  $nama         = trim(mysqli_real_escape_string($conn, $_POST['nama']));
  // $status          = trim(mysqli_real_escape_string($conn, $_POST['status']));
  $status = "Admin";
  
  $pwreset = "Admin!@#";
  $encrypt = sha1(sha1($pwreset));


    mysqli_query($conn, "INSERT INTO tb_petugas (id_petugas,username,password,status) VALUES ('','$nama','$encrypt','$status')") or die (mysqli_eror($conn)); 
    
}   



?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah ditambahkan", "success");
  
  setTimeout(function(){ 
  window.location.href = "index.php";

  }, 500);
</script>
</body>
</html>


       