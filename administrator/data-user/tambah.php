<?php 
require_once "../database/config.php";

if (isset($_POST['tambah']))
{  
  $layanan    = trim(mysqli_real_escape_string($con, $_POST['nama']));
  $harga      = trim(mysqli_real_escape_string($con, $_POST['kontak']));
  $keterangan = trim(mysqli_real_escape_string($con, $_POST['status']));
    mysqli_query($con, "INSERT INTO tb_cs (Id,nama,kontak,status) VALUES ('','$layanan','$harga','$keterangan')") or die (mysqli_eror($con));    
}   
?>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah ditambahkan", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../data-cs/';</script>


       