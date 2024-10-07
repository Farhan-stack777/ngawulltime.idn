<?php 
require_once "../database/config.php";

if (isset($_POST['edit']))
{ 

  $id             = trim(mysqli_real_escape_string($con, $_POST['id']));
  $judul_buku    = trim(mysqli_real_escape_string($con, $_POST['judul_buku']));
  $penulis_buku  = trim(mysqli_real_escape_string($con, $_POST['penulis_buku']));
  $isbn          = trim(mysqli_real_escape_string($con, $_POST['isbn']));
  $sinopsis      = trim(mysqli_real_escape_string($con, $_POST['sinopsis']));
  $link          = trim(mysqli_real_escape_string($con, $_POST['link']));
 
  
  mysqli_query($con, "UPDATE tb_buku SET judul_buku='$judul_buku',penulis_buku='$penulis_buku',isbn='$isbn',sinopsis='$sinopsis',link='$link' WHERE Id='$id'") or die (mysqli_eror($con));   

}  

?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../data-buku/';</script>

       