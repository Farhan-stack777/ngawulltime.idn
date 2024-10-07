<?php 
require_once "../database/config.php";

if (isset($_POST['tambah']))
{  
  $layanan    = trim(mysqli_real_escape_string($con, $_POST['layanan']));
  $harga      = trim(mysqli_real_escape_string($con, $_POST['harga']));
  $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    mysqli_query($con, "INSERT INTO tb_hal_layanan (Id,layanan,icon,keterangan) VALUES ('','$layanan','$harga','$keterangan')") or die (mysqli_eror($con));    
}   
?>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah ditambahkan", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../hal-layanan/';</script>


       