<?php 
require_once "../database/config.php";

if (isset($_POST['edit']))
{ 

  $id         = trim(mysqli_real_escape_string($conn, $_POST['id']));
  $layanan    = trim(mysqli_real_escape_string($conn, $_POST['nama']));
  $keterangan = trim(mysqli_real_escape_string($conn, $_POST['kontak']));  
  $status = trim(mysqli_real_escape_string($conn, $_POST['status']));
  if($id=='1' AND $status=='0')

  {
    echo "<script>alert('Maaf, Admin Utama! Tidak Bisa di sembunyikan');</script>";
  }
  else
  {
    mysqli_query($conn, "UPDATE tb_cs SET nama='$layanan',kontak='$keterangan',status='$status' WHERE id='$id'") or die (mysqli_eror($conn));   
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

       