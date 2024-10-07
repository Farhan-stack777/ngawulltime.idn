<?php 
require_once "../database/config.php";

if (isset($_POST['upload']))
{ 

  $id             = trim(mysqli_real_escape_string($con, $_POST['id']));
  $lampiran    = trim(mysqli_real_escape_string($con, $_POST['lampiran']));
 
 
  
  mysqli_query($con, "UPDATE tb_karir SET lampiran='$lampiran' WHERE Id='$id'") or die (mysqli_eror($con));   

}  

?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../data-karir/';</script>

       