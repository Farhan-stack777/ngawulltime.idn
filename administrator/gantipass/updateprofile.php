<?php 
require_once "../database/config.php";
?>
<!DOCTYPE html>
<html>
<head>
  
</head>

<body>
<div class="wrapper">
  <?php

  if (isset($_POST['submit']))
  {

    $pw             = sha1(sha1(trim(mysqli_real_escape_string($conn, $_POST['pw']))));
    $pw2            = sha1(sha1(trim(mysqli_real_escape_string($conn, $_POST['pw2']))));
    $email          = trim(mysqli_real_escape_string($conn, $_POST['email']));
    if($pw==$pw2)
    {
      mysqli_query($conn, "UPDATE tb_petugas SET password='$pw' WHERE username='$email'") or die (mysqli_error());
    }
    else
    {
      echo "<script>alert('Gagal, Password baru tidak sama !');</script>";
      echo "<script>window.location='index.php';</script>";      

    }
  }

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Password telah diupdate", "success");
  
  setTimeout(function(){ 
  window.location.href = "../login/logout.php";

  }, 500);
</script>
</body>
</html>


       