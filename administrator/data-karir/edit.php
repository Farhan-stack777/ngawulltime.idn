<?php 
require_once "../database/config.php";

if (isset($_POST['edit']))
{ 

  $id             = trim(mysqli_real_escape_string($con, $_POST['id']));
  $judul_buku    = trim(mysqli_real_escape_string($con, $_POST['posisi']));
  $penulis_buku  = trim(mysqli_real_escape_string($con, $_POST['summernote']));
  $isbn          = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
 
  
  mysqli_query($con, "UPDATE tb_karir SET posisi='$judul_buku',deskripsi='$penulis_buku',keterangan='$isbn' WHERE Id='$id'") or die (mysqli_eror($con));   

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

       