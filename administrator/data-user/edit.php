<?php 
require_once "../database/config.php";

if (isset($_POST['edit']))
{ 

  $id         = trim(mysqli_real_escape_string($con, $_POST['id']));
  $layanan    = trim(mysqli_real_escape_string($con, $_POST['nama']));
  $keterangan = trim(mysqli_real_escape_string($con, $_POST['kontak']));  
  $status = trim(mysqli_real_escape_string($con, $_POST['status']));
  if($id=='1' AND $status=='0')

  {
    echo "<script>alert('Maaf, Admin Utama! Tidak Bisa di sembunyikan');</script>";
  }
  else
  {
    mysqli_query($con, "UPDATE tb_cs SET nama='$layanan',kontak='$keterangan',status='$status' WHERE Id='$id'") or die (mysqli_eror($con));   
  }

}  


?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../data-cs/';</script>

       