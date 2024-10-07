<?php 
require_once "../database/config.php";

if (isset($_POST['edit']))
{ 

  $id         = trim(mysqli_real_escape_string($con, $_POST['id']));
  $judul      = trim(mysqli_real_escape_string($con, $_POST['judul']));
  $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
 
  mysqli_query($con, "UPDATE tb_hal_penapersada SET judul='$judul',keterangan='$keterangan' WHERE Id='$id'") or die (mysqli_eror($con));   

}  

?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../hal-penapersada/';</script>

       