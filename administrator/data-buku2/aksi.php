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

if(isset($_GET['id']))
{
  $id              = @$_GET['id'];

    mysqli_query($con, "DELETE FROM tb_form WHERE Id='$id'") or die (mysqli_eror($con));  
    echo "<script>window.location='form_transaksi.php';</script>";
}     

if(isset($_GET['plus']))
{
    mysqli_query($con,"INSERT INTO tb_form (Id) VALUES ('')")or die (mysqli_eror($con)); 
    echo "<script>window.location='form_transaksi.php';</script>";
}
?>
</body>
</html>