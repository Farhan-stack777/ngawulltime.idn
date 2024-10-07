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

if (isset($_GET['id']))
{ 

  $id             = trim(mysqli_real_escape_string($conn, $_GET['id']));  
  
  $pwreset = "Admin!@#";
  $encrypt = sha1(sha1($pwreset));


  mysqli_query($conn, "UPDATE tb_petugas SET password='$encrypt' WHERE id_petugas='$id' ") or die (mysqli_eror($conn));
}  

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Password telah direset", "success");
  
  setTimeout(function(){ 
  window.location.href = "index.php";

  }, 500);
</script>
</body>
</html>


       