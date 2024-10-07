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


  $id              = @$_GET['id'];

  $cek=mysqli_query($conn, "SELECT * FROM tb_petugas WHERE status='Admin' ") or die (mysqli_eror($conn));
  
  if(mysqli_num_rows($cek)<=2)
  {
    echo "<script>alert('Maaf, Tidak dapat menghapus karena admin hanya tinggal satu. Anda akan kehilangan akses !');</script>";
    echo "<script>window.location='index.php';</script>";
    
  }
  elseif($id==1)
  {
     echo "<script>alert('Maaf, Tidak dapat menghapus data admin utama!');</script>";
    echo "<script>window.location='index.php';</script>";
  }
  else
  {
    mysqli_query($conn, "DELETE FROM tb_petugas WHERE id_petugas='$id'") or die (mysqli_eror($conn));  
  }
  
     

  
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah dihapus", "error");
  
  setTimeout(function(){ 
  window.location.href = "index.php";

  }, 500);
</script>
</body>
</html>


       