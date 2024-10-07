<?php 
require_once "../database/config.php";

if (isset($_POST['edit']))
{ 

  $id             = trim(mysqli_real_escape_string($conn, $_POST['id']));
  $judul          = trim(mysqli_real_escape_string($conn, $_POST['judul']));
  $harga          = trim(mysqli_real_escape_string($conn, $_POST['harga']));
  $link           = trim(mysqli_real_escape_string($conn, $_POST['link']));
 
  
  mysqli_query($conn, "UPDATE tb_tas SET judul='$judul',harga='$harga',link='$link' WHERE id='$id'") or die (mysqli_eror($conn));   

}  

?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='index.php';</script>

       