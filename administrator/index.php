<?php require_once "database/config.php";

if (isset($_SESSION['username']))
  {
  	 session_destroy();
  	 echo "<script>window.location='login/';</script>"; 		  
   } 
  else
  {
  	session_destroy();
    echo "<script>window.location='login/';</script>";
  }
 ?>
