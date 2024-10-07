<?php 
require_once "../database/config.php";

if (isset($_POST['upload']))
{ 

  
  $id           = trim(mysqli_real_escape_string($conn, $_POST['id']));

  $sumber_file = $_FILES['foto']['tmp_name'];
  $ukuran_file = $_FILES['foto']['size'];
  $nama_file   = $_FILES['foto']['name'];

  $ekstensi = explode (".", $nama_file);
  $rename_file = "Cover-".$id.".".end($ekstensi);
  
  $target_dir ="../../images/";
  $target_file = $target_dir.$rename_file; 
  move_uploaded_file($sumber_file, $target_file);
   
  
  mysqli_query($conn, "UPDATE tb_has SET gambar ='$rename_file' WHERE id='$id'") or die (mysqli_eror($conn));   
 
    
}   
?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Cover telah diupload", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='index.php';</script>

       