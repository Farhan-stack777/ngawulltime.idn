<?php
$page = 'master';
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


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include "../1header.php"; 
  ?>
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
       <!--  <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div> -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card card-primary">
              <div class="card-header" style="background-color: grey">
                <h3 class="card-title"><i class="fas fa-clipboard mr-2"></i>Formulir Transaksi</h3> 
              </div>
              <!-- /.card-header -->

            
              <div class="button">                
                <!-- <button type="button" class="btn btn-default btn-md" style="background-color:#001f3f;" data-toggle="modal" data-target="#modal-tambah"><font color="white"><i class="fas fa-plus"></i>Simple</font></button> -->             
               <!--  <button type="button" class="btn btn-primary btn-md" onclick="">+</button> -->
              </div> 
              <!-- form start -->
              <form action="tambah2.php" method="post">
                <div class="card-body">
                  <div class="row">
                       
                        <div class="col-6">
                          <div class="form-group ">
                            <label for="inputEmail3" class="col-sm-12 control-label">Jenis Transaksi </label>
                            <select class="form-control input-lg-12" name="jenis" id="jenis"  > 
                              <option value="">-- Pilih Jenis --</option>
                              <option value="Pemasukan">Pemasukan</option>
                              <option value="Pengeluaran">Pengeluaran</option>
                              <option value="Penyesuaian">Penyesuaian</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group ">
                            <label for="inputEmail3" class="col-sm-12 control-label">Tanggal</label>                       
                            <input type="date" class="form-control" name="tgl" id="tgl" >
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group ">
                            <label for="inputEmail3" class="col-sm-12 control-label">Catatan </label>                        
                            <input type="text" class="form-control" name="catatan" id="catatan" placeholder="Masukkan catatan transaksi" >
                          </div>
                        </div>

                            <div class="col-4 col-sm-5">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Akun </label>
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Debit (cth:8000.87)</label>
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Kredit (cth:10500.41)</label> 
                              </div>
                            </div>
                            <div class="col-1">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label"> </label> 
                              </div>
                            </div>
                           <?php
                           $d=1;
                           $queryakun=mysqli_query($con,"SELECT * FROM tb_form")or die (mysqli_error($con)); 
                          while($data=mysqli_fetch_array($queryakun))
                          {
                            ?>
                            <div class="col-4 col-sm-5">
                              <div class="form-group ">                        
                                <select class="form-control input-lg-12" name="id_akun<?=$d;?>" required> 
                                  <option value="">-- Pilih Akun --</option>
                                  <?php
                                  $prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");

                                  while($hasil = mysqli_fetch_array($prov))
                                  {
                                    echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="form-group ">                                                     
                                <input type="text" class="form-control" name="debit<?=$d;?>" placeholder="Rp 0 " value="0" required>
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="form-group ">                      
                                <input type="text" class="form-control" name="kredit<?=$d;?>" placeholder="Rp 0 " value="0" required>                                
                              </div>
                            </div>
                            <div class="col-1" align="right">                              
                                <a href="aksi.php?id=<?=$data['Id'];?>" class="btn btn-danger "><i class="fas fa-trash"></i></a>
                            </div>
                          <?php $d++;
                          }
                           ?> 
                           <div class="col-12">
                           <a href="aksi.php?plus" class="btn btn-primary btn-block"><i class="fas fa-plus"></i><b> Tambah Akun</b></a>                  
                         </div>
                                                                     

                     </div><br>
                     <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <a href="../server_side_master2/" type="button" class="btn btn-default" ><i class="fas fa-times"></i></a>
                      <button type="submit" name="tambah" class="btn btn-secondary swalDefaultSuccess" style="background-color:grey;"><!-- <i class="fas fa-plus"></i> --> <b>Submit</b></button>
                    </div>
                  </form>
           <!--  </div> -->


             <!--  </div> -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

<!-- modal area -->
<?php 
if(isset($_POST['akun'])){
  
} 
else 
{
  
}?>
<!-- modal area -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../_aset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../_aset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../_aset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_aset/dist/js/demo.js"></script>

</body>
</html>
