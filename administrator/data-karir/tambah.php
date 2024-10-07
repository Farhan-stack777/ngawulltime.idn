<?php 
require_once "../database/config.php";

if (isset($_POST['tambah']))
{ 


  $judul_buku    = trim(mysqli_real_escape_string($con, $_POST['posisi']));
  $penulis_buku  = trim(mysqli_real_escape_string($con, $_POST['summernote']));
  $isbn          = trim(mysqli_real_escape_string($con, $_POST['keterangan']));

  // $cekharga=mysqli_query($con, "SELECT * FROM tb_room WHERE Id='$room'") or die (mysqli_eror($con));
  // $datasesi = mysqli_fetch_array($cekharga);
  // $room_harga     = $datasesi['room_harga'];
 
  // $check_in       = trim(mysqli_real_escape_string($con, $_POST['reservationdatetime']));
 

    mysqli_query($con, "INSERT INTO tb_karir (Id,posisi,deskripsi,keterangan) VALUES ('','$judul_buku','$penulis_buku','$isbn')") or die (mysqli_eror($con)); 
    
}   



?>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah ditambahkan", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../data-karir/';</script>


       