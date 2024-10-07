<?php 
require_once "../database/config.php";


$id              = @$_POST['id'];


mysqli_query($con, "DELETE FROM tb_buku WHERE Id='$id'") or die (mysqli_eror($con)); 
echo "<script>window.location='../data-buku2/';</script>";


?>




       