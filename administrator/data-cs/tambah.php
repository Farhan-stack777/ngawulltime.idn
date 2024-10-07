<?php 
require_once "../database/config.php";

if (isset($_POST['tambah']))
{  
  $layanan    = trim(mysqli_real_escape_string($conn, $_POST['nama']));
  $harga      = trim(mysqli_real_escape_string($conn, $_POST['kontak']));
  $keterangan = trim(mysqli_real_escape_string($conn, $_POST['status']));
    mysqli_query($conn, "INSERT INTO tb_cs (id,nama,kontak,status) VALUES ('','$layanan','$harga','$keterangan')") or die (mysqli_eror($conn));    
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


       