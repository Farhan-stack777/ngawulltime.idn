<?php 
require_once "../database/config.php";

  $id              = @$_GET['id'];


    mysqli_query($conn, "DELETE FROM tb_sepatu WHERE id='$id'") or die (mysqli_eror($conn));  

  
     

  
?>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah dihapus", "error");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='index.php';</script>

       