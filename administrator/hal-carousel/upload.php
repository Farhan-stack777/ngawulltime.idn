<?php 
require_once "../database/config.php";

if (isset($_POST['upload']))
{   
  $id           = trim(mysqli_real_escape_string($con, $_POST['id']));
  if($id!="")
  {
    $sumber_file = $_FILES['foto']['tmp_name'];
    $ukuran_file = $_FILES['foto']['size'];
    $nama_file   = $_FILES['foto']['name'];

    $ekstensi = explode (".", $nama_file);
    $rename_file = "Carousel-".$id.".".end($ekstensi);

    $target_dir ="carousel/";
    $target_file = $target_dir.$rename_file; 
    move_uploaded_file($sumber_file, $target_file);
    mysqli_query($con, "UPDATE tb_hal_carousel SET carousel ='$rename_file' WHERE Id='$id'") or die (mysqli_eror($con)); 
  }
  else
  {
    $sql_peran = mysqli_query($con, "SELECT MAX(Id) as angka FROM tb_hal_carousel") ;
    $data = mysqli_fetch_assoc($sql_peran);
    $id = $data['angka'] + 1;
    $sumber_file = $_FILES['foto']['tmp_name'];
    $ukuran_file = $_FILES['foto']['size'];
    $nama_file   = $_FILES['foto']['name'];

    $ekstensi = explode (".", $nama_file);
    $rename_file = "Carousel-".$id.".".end($ekstensi);

    $target_dir ="carousel/";
    $target_file = $target_dir.$rename_file; 
    move_uploaded_file($sumber_file, $target_file);
     mysqli_query($con, "INSERT INTO tb_hal_carousel (Id,carousel) VALUES ('','$rename_file')") or die (mysqli_eror($con)); 
  }


}   

?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Cover telah diupload", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../hal-carousel/';</script>

       