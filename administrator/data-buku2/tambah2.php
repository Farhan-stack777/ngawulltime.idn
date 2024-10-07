<?php 
require_once "../database/config.php";

if (isset($_POST['tambah']))
{ 

  
  $jenis           = trim(mysqli_real_escape_string($con, $_POST['jenis']));
  $tgl             = trim(mysqli_real_escape_string($con, $_POST['tgl']));
  $catatan         = trim(mysqli_real_escape_string($con, $_POST['catatan']));

  $d=1;
  $queryakun=mysqli_query($con,"SELECT * FROM tb_form")or die (mysqli_error($con)); 
  while($data=mysqli_fetch_array($queryakun))
  {
    $id_akun           = trim(mysqli_real_escape_string($con, $_POST['id_akun'.$d]));
    $debit           = trim(mysqli_real_escape_string($con, $_POST['debit'.$d]));
    $kredit           = trim(mysqli_real_escape_string($con, $_POST['kredit'.$d]));
  mysqli_query($con,"INSERT INTO tb_temporary (Id,akun,debit,kredit) VALUES ('','$id_akun','$debit','$kredit')");
  $d++;
  }

  // $cek_keseimbangan=mysqli_query($con,"SELECT * FROM tb_temporary ");
  
  $hitungdebit = mysqli_query($con, "SELECT SUM(debit) as jumlahdebit FROM tb_temporary ") or die (mysqli_eror($con));
  $datasesidebitawal    = mysqli_fetch_assoc($hitungdebit);
  $jumlahdebit  = $datasesidebitawal['jumlahdebit'];

  $hitungkredit = mysqli_query($con, "SELECT SUM(kredit) as jumlahkredit FROM tb_temporary ") or die (mysqli_eror($con));
  $datasesikreditawal    = mysqli_fetch_assoc($hitungkredit);
  $jumlahkredit  = $datasesikreditawal['jumlahkredit'];

  if($jumlahdebit==$jumlahkredit)
  {
    $nominal=$jumlahdebit;
    $nambah= "INSERT INTO tb_transaksi (Id,tgl,jenis,nominal,catatan) VALUES ('','$tgl','$jenis','$nominal','$catatan')";


    if (mysqli_query($con, $nambah)) 
    {
     $last_id = mysqli_insert_id($con);   
     $d=1;
     $queryakun=mysqli_query($con,"SELECT * FROM tb_form")or die (mysqli_error($con)); 
     while($data=mysqli_fetch_array($queryakun))
     {      
      $id_akun           = trim(mysqli_real_escape_string($con, $_POST['id_akun'.$d]));
      $debit           = trim(mysqli_real_escape_string($con, $_POST['debit'.$d]));
      $kredit           = trim(mysqli_real_escape_string($con, $_POST['kredit'.$d]));
      mysqli_query($con,"INSERT INTO tb_buku_besar (Id,tgl,id_transaksi,kode_akun,debit,kredit) VALUES ('','$tgl','$last_id','$id_akun','$debit','$kredit')");
        $d++;
      }
  
    } 
    else 
    {
      echo "Error: " . $nambah . "<br>" . mysqli_error($con);

    }
    mysqli_query($con, "DELETE FROM tb_temporary ") or die (mysqli_eror($con));
      echo "<script>window.location='../server_side_master2/';</script>";
  }
  else
  {    
    echo "<script>alert('Nominal Transaksi salah')</script>";  
    mysqli_query($con, "DELETE FROM tb_temporary ") or die (mysqli_eror($con));
    echo "<script>window.location='../server_side_master2/';</script>";
  }
  
}   



?>


       