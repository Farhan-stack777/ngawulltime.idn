<?php 
require_once "../database/config.php";

if (isset($_POST['edit']))
{ 

  $id         = trim(mysqli_real_escape_string($con, $_POST['id']));
  $layanan    = trim(mysqli_real_escape_string($con, $_POST['layanan']));
  $harga      = trim(mysqli_real_escape_string($con, $_POST['harga']));
  $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));

  mysqli_query($con, "UPDATE tb_hal_paket SET layanan='$layanan',harga='$harga',keterangan='$keterangan' WHERE Id='$id'") or die (mysqli_eror($con));   

}  


?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../hal-paket/';</script>

       