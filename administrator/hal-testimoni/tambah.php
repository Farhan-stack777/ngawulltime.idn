<?php 
require_once "../database/config.php";

if (isset($_POST['tambah']))
{ 

  $foto      ='';
  $nama      = trim(mysqli_real_escape_string($con, $_POST['nama']));
  $asal      = trim(mysqli_real_escape_string($con, $_POST['asal']));
  $testimoni = trim(mysqli_real_escape_string($con, $_POST['testimoni']));
 

    mysqli_query($con, "INSERT INTO tb_hal_testimoni (Id,foto,nama,asal,testimoni) VALUES ('','$foto','$nama','$asal','$testimoni')") or die (mysqli_eror($con)); 
    
}   



?>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah ditambahkan", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../hal-testimoni/';</script>


       