<?php
$page = 'check';
require_once "../database/config.php";
$tahunini = date('Y');
if (isset($_SESSION['status']))
{
  if ($_SESSION['status']!="Admin")
  {
    unset($_SESSION['status']);
    unset($_SESSION['username']);
    unset($_SESSION['nama']);
    unset($_SESSION['Id']);
    echo "<script>window.location='".base_url('auth')."';</script>";       
  } 
  else
  {
    
  }
  
} 
else 
{
  echo "<script>window.location='".base_url('auth')."';</script>";
}

$now=date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include "../1header.php"; 
  ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php
  include "../2navbar.php"; 
  ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php 
  include "../3sidebar.php";
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">       
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">            

            <div class="card card-primary">
              <div class="card-header" style="background-color: grey">
                <h3 class="card-title"><i class="fas fa-clipboard mr-2"></i>Data Transaksi</h3> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <a href="../server_side_master2/" class="btn btn-outline-primary mb-2"><i class="fas fa-angle-double-left"></i> Back</a>
  
                <div class="table-responsive">
                  <table id="table_data" class="table table-bordered table-striped table-sm">
                    <thead>
                    	<tr>
                    		<th bgcolor="#ffffff" style="width:10%"><font color="#000000">Tanggal</font></th>                   
                    		<th bgcolor="#ffffff"><center><font color="#000000">Transaksi</font></center></th>
                    		<th bgcolor="#ffffff"><center><font color="#000000">Akun</font></center></th>
                    		<th  bgcolor="#ffffff" style="width:14%"><center><font color="#000000">Debit</font></center></th></th>
                    		<th bgcolor="#ffffff" style="width:14%"><center><font color="#000000">Kredit</font></center></th></th>
                    	</tr>
                    </thead>
                    <tbody>
                      <!-- List Data Menggunakan DataTable -->              
                    </tbody>
                  </table>
                </div> <!-- responsive -->


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->


     
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "../4footer.php"; ?>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <script>  
    $(function(){
      $('#table_data').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": false,
        "ajax":{
          "url": "ajax/ajax_ju.php?action=table_data",
          "dataType": "json",
          "type": "POST"
        },
        "columns": [
          { "data": "tgl" },

 { "data": "catatan" },
           
          { "data": "kode_akun" },
          { "data": "debit" },
          { "data": "kredit" }, 
        ], 
        'columnDefs': [
          {
            "targets": 0,
            "className": "text-center"
          },
          {
            "targets": 3,
            "className": "text-right"
          },
          {
            "targets": 4,
            "className": "text-right"
          }
       ]
      });
    });
    
  </script>
  
</body>
</html>
