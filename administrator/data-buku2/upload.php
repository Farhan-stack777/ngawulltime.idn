<?php 
require_once "../database/config.php";

if (isset($_POST['upload']))
{ 

  
  $id           = trim(mysqli_real_escape_string($con, $_POST['id']));

  $sumber_file = $_FILES['foto']['tmp_name'];
  $ukuran_file = $_FILES['foto']['size'];
  $nama_file   = $_FILES['foto']['name'];

  $ekstensi = explode (".", $nama_file);
  $rename_file = "Cover-".$id.".".end($ekstensi);
  
  $target_dir ="../data-buku/cover/";
  $target_file = $target_dir.$rename_file; 
  move_uploaded_file($sumber_file, $target_file);
   
  
  mysqli_query($con, "UPDATE tb_buku SET cover ='$rename_file' WHERE Id='$id'") or die (mysqli_eror($con));   
 
    
}   
?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Cover telah diupload", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../data-buku2/';</script>

       