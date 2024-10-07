<?php 
require_once "../database/config.php";

if (isset($_GET['filename'])) 
{
    $id_transaksi    = $_GET['filename'];
    $query= mysqli_query($con,"SELECT * FROM tb_transaksi WHERE Id='$id_transaksi' ")or die (mysqli_error($con)); 
    $data = mysqli_fetch_assoc($query);
    $jenis= $data['jenis'];
    $tgl = $data['tgl'];    
    $lampiran = $data['lampiran'];

    $tgl_olah=date('dmY', strtotime($tgl));
    $ekstensi_lampiran     = explode (".", $lampiran); 
    $file_name = $jenis."_".$tgl_olah."_".$id_transaksi.".".end($ekstensi_lampiran);
    $target_dir ="../berkas/transaksi/".$lampiran;   

    if (file_exists($target_dir)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='.basename($file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: private');
        header('Pragma: private');
        header('Content-Length: ' . filesize($target_dir));
        ob_clean();
        flush();
        readfile($target_dir);

        exit;
    } 
    else {
            // $_SESSION['pesan'] = "Oops! File - $filename - not found ...";
            // header("location:index.php");
    }
}
?>