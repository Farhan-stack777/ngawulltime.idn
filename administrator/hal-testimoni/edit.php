<?php 
require_once "../database/config.php";

if (isset($_POST['edit']))
{ 
  $id = $_GET['id'];
  // $id         = trim(mysqli_real_escape_string($con, $_POST['id']));
  $judul = trim(mysqli_real_escape_string($conn, $_POST['judul']));
  $deskripsi = trim(mysqli_real_escape_string($conn, $_POST['deskripsi']));
  $judul1 = trim(mysqli_real_escape_string($conn, $_POST['judul1']));
  $deskripsi1 = trim(mysqli_real_escape_string($conn, $_POST['deskripsi1']));
  $judul2 = trim(mysqli_real_escape_string($conn, $_POST['judul2']));
  $deskripsi2 = trim(mysqli_real_escape_string($conn, $_POST['deskripsi2']));
  $judul3 = trim(mysqli_real_escape_string($conn, $_POST['judul3']));
  $deskripsi3 = trim(mysqli_real_escape_string($conn, $_POST['deskripsi3']));              
  
  mysqli_query($conn, "UPDATE tb_sisi_bawah SET judul='$judul', deskripsi='$deskripsi',judul1='$judul1', deskripsi1='$deskripsi1',judul2='$judul2', deskripsi2='$deskripsi2',judul3='$judul3', deskripsi3='$deskripsi3'  WHERE id=$id";) or die (mysqli_eror($conn));   

}  

?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../hal-testimoni/';</script>
