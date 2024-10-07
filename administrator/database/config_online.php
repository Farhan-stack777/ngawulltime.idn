<?php  
date_default_timezone_set('Asia/Jakarta');
session_start();

$con = mysqli_connect('localhost','ikhwan','bismillah','penapersadalanding'); 

if (!$con) 
{
    die('Connect Error: ' . mysqli_connect_errno());
}


function base_url($url = null)

  {
    $base_url = "http://penapersada.id/administrator";
    if ($url != null)
    {
    	return $base_url."/".$url;
    }
    else
    {
    	return $base_url;
    }

  } 

?>