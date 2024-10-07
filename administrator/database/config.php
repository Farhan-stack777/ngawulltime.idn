<?php  
date_default_timezone_set('Asia/Jakarta');
session_start();

// Koneksi ke database bootcamp3
$conn = mysqli_connect('localhost', 'root', '', 'bootcamp3');
if (!$conn) {
    die('Connect Error (bootcamp3): ' . mysqli_connect_error());
}

// // Koneksi ke database penapersadalanding
// $con = mysqli_connect('localhost', 'root', '', 'penapersadalanding');
// if (!$con) {
//     die('Connect Error (penapersadalanding): ' . mysqli_connect_error());
// }

?>
