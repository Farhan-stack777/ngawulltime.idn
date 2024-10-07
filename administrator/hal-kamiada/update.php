 <?php 
 require_once "../database/config.php";

 if(isset($_POST['update']))
 {
  $konten    = trim(mysqli_real_escape_string($con, $_POST['summernote']));

  mysqli_query($con, "UPDATE tb_mengapa SET konten='$konten' WHERE Id='1'") or die (mysqli_eror($con));  
}
else
{

}
?>
<script>window.location='../hal-kamiada/';</script>