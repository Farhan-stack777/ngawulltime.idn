<?php 
require_once "../database/config.php";

if (isset($_POST['tambah']))
{  
  $judul      = trim(mysqli_real_escape_string($con, $_POST['judul']));
  $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));

  mysqli_query($con, "INSERT INTO tb_hal_penapersada (Id,judul,keterangan) VALUES ('','$judul','$keterangan')") or die (mysqli_eror($con)); 

  $sql_peran = mysqli_query($con, "SELECT MAX(Id) as angka FROM tb_hal_penapersada") ;
  $data = mysqli_fetch_assoc($sql_peran);
  $id = $data['angka'];
  $sumber_file = $_FILES['gambar']['tmp_name'];
  $ukuran_file = $_FILES['gambar']['size'];
  $nama_file   = $_FILES['gambar']['name'];

  $ekstensi = explode (".", $nama_file);
  $rename_file = "gambar-".$id.".".end($ekstensi);

  $target_dir ="gambar/";
  $target_file = $target_dir.$rename_file; 
  move_uploaded_file($sumber_file, $target_file);
  mysqli_query($con, "UPDATE tb_hal_penapersada SET gambar ='$rename_file' WHERE Id='$id'") or die (mysqli_eror($con)); 
} 

?>

<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah ditambahkan", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='../hal-penapersada/';</script>


       