<?php 
require_once "../database/config.php";

  $id              = @$_GET['id'];


    mysqli_query($con, "DELETE FROM tb_hal_carousel WHERE Id='$id'") or die (mysqli_eror($con));  

  
     

  
?>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah dihapus", "error");
  
  setTimeout(function(){ 
  window.location.href = "../data-carousel/";

  }, 500);
</script> -->
<script>window.location='../hal-carousel/';</script>

       