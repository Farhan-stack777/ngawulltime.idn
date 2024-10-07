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

if (isset($_POST['edit']))
{ 

  $id             = trim(mysqli_real_escape_string($conn, $_POST['id']));
  
  $nama         = trim(mysqli_real_escape_string($conn, $_POST['nama']));



 
  
  mysqli_query($conn, "UPDATE tb_petugas SET username='$nama' WHERE id_petugas='$id'") or die (mysqli_eror($conn));   

}  

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "index.php";

  }, 500);
</script>
</body>
</html>


       