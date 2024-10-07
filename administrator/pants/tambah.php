<?php 
require_once "../database/config.php";

if (isset($_POST['tambah']))
{ 

  $gambar        ='';
  $judul         = trim(mysqli_real_escape_string($conn, $_POST['judul']));
  $harga         = trim(mysqli_real_escape_string($conn, $_POST['harga']));
  $link          = trim(mysqli_real_escape_string($conn, $_POST['link']));

  // $cekharga=mysqli_query($conn, "SELECT * FROM tb_room WHERE Id='$room'") or die (mysqli_eror($conn));
  // $datasesi = mysqli_fetch_array($cekharga);
  // $room_harga     = $datasesi['room_harga'];
 
  // $check_in       = trim(mysqli_real_escape_string($conn, $_POST['reservationdatetime']));
 

    mysqli_query($conn, "INSERT INTO tb_pants (id,gambar,judul,harga,link) VALUES ('','$gambar','$judul','$harga','$link')") or die (mysqli_eror($conn)); 
    
}   



?>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah ditambahkan", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='index.php';</script>


       