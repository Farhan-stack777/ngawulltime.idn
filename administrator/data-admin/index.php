<?php
$page = 'admin';
require_once "../database/config.php";
$tahunini = date('Y');
if (isset($_SESSION['status'])) {
  if ($_SESSION['status'] !== "Admin") {
      // Clear session data if the user is not an admin
      session_unset(); // Clears all session variables
      session_destroy(); // Destroys the session
      echo "<script>window.location='../../login/index.php';</script>";
      exit;
  } 
  // If status is "admin", you can add the allowed page content or functionality here
} else {
  // If no session status is set, redirect to the login page
  echo "<script>window.location='../../login/index.php';</script>";
  exit;
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
<style>
        body {
            background-color: #778899; /* Set background color to light gray */
        }
        .content-wrapper {
            background-color: #778899; /* Set content wrapper background to white if needed */
        }
        .card {
            background-color: #DCDCDC; /* Set card background to white if needed */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../_aset/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

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
        <!-- <div class="row mb-2">
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
              <div class="card-header" style="background-color: #<?php echo $warna1; ?>">
                <h3 class="card-title"><i class="fas fa-user-cog mr-2"></i>Data Administrator</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">                              
          
               <div class="button">                
                <button type="button" class="btn btn-default btn-md" style="background-color:#<?php echo $warna2; ?>;" data-toggle="modal" data-target="#modal-tambah"><font color="white"><i class="fas fa-plus"></i>
                   Tambah Data</font>
                </button>                
              </div> 
              <br>
             
             
                 
                <table id="example0" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:3%"><center>No</center></th>
                    <th><center>Username</center></th>
                    <th><center>Status</center></th>
                    <th style="width:28%"><center>Aksi</center></th>
                  </tr>
                  </thead>
                  <tbody>
                 

                     <?php
                     $no = 1;
                      $query = "SELECT * FROM tb_petugas WHERE id_petugas!='1' ";
                     
             
                $sql_peran = mysqli_query($conn, $query) or die (mysqli_error($conn));
                if (mysqli_num_rows($sql_peran) >0 )
                {
                while($data = mysqli_fetch_array($sql_peran))
                {
                      ?>
                      <tr>
                      	<td>
                      		<h6>
                      			<?=$no++;?> 
                      		</h6>
                      	</td>
                      	<td>
                      		<h6> 
                            <?=$data['username']?>
                      	</h6>
                      </td>
                      <td>
                        <center>
                      	<h6>
                          <?=$data['status']?>
                      	</h6>
                      </center>
                      </td>
                      
                      <td>
                      	<h6>
                      		<center>
                            <a href="resetpw.php?id=<?=$data['id_petugas'];?>" onclick="return confirm('Anda akan mereset password menjadi = Admin!@# ?')" class="btn btn-warning btn-sm"><i class="fas fa-history"></i> Reset Password</a>
                            <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-edit" data-id="<?=$data['id_petugas'];?>" data-nama="<?=$data['username'];?>" data-status="<?=$data['status'];?>" >
                              <font color="white"><i class="fas fa-edit"></i>
                              </font>
                            </button>
                            <a href="hapus.php?id=<?=$data['id_petugas'];?>" onclick="return confirm('Anda akan menghapus data ini ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
                          </center>

                      	</h6>
                      </td>

                  </tr>

                  <?php
                }

              }
              else
              {
                echo "<tr><td colspan=\"11\" align=\"center\"><h6>Data Tidak Ditemukan!</h6></td></tr>";
              }

                ?>
             
                </tbody>
                  </tbody>
                </table>
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

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-tambah" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Data </font></h4>
            </div>
            <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Nama </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Username" >
                        </div>
                      </div> 
                     <!--  <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Password </label>
                        <div class="col-sm-12">
                          <input type="password" class="form-control" name="pass1" id="pass1" >
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Konfirmasi Password </label>
                        <div class="col-sm-12">
                          <input type="password" class="form-control" name="pass2" id="pass2" >
                        </div>
                      </div>   -->      

                      <!--  <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Status </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="status" id="status"  >
                        </div>
                      </div>  -->

                                              
                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="tambah" class="btn btn-secondary swalDefaultSuccess" style="background-color:#<?php echo $warna1; ?>"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-edit" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Edit Data </font></h4>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                          <input type="text" class="form-control" name="id" id="id" hidden>
                      
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Nama </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Produk" >
                        </div>
                      </div>
                      
                     

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="edit" class="btn btn-secondary swalDefaultSuccess" style="background-color:#<?php echo $warna1; ?>"><i class="fas fa-edit"></i> Edit</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="modal-upload" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Upload Foto Produk</font></h4>
            </div>
            <form class="form-horizontal" action="upload.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <input type="text" class="form-control" name="id" id="id" value="id"  >

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Kode </label>
                        <div class="col-sm-12">
                          <input type="file" class="form-control" name="foto" id="foto" accept="image/*" >
                        </div>
                      </div>
                      

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="upload" class="btn btn-secondary swalDefaultSuccess" style="background-color:#<?php echo $warna1; ?>"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.modal -->



 </section>
    <!-- /.content -->
  </div>

  <!-- /.content-wrapper -->
 <?php 
  include "../4footer.php";
   ?>




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->





 <?php 
  include "../5script.php";
  ?>
<script src="../_aset/plugins/jquery/jquery.min.js"></script>
<script src="../_aset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../_aset/plugins/select2/js/select2.full.min.js"></script>
<script src="../_aset/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="../_aset/plugins/moment/moment.min.js"></script>
<script src="../_aset/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../_aset/plugins/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="../_aset/plugins/autoNumeric/autoNumeric.min.js"></script>

<script>
$(function() {
    // Menampilkan spinner saat submit
    $('#submit').on('click', function() {
        $('#spin').show();
    });

    // Modal Edit
    $('#modal-edit').on('show.bs.modal', function(e) {
        var target = $(e.relatedTarget);
        $(this).find('input[name="id"]').val(target.data('id'));
        $(this).find('input[name="kode"]').val(target.data('kode'));
        $(this).find('input[name="nama"]').val(target.data('nama'));
        $(this).find('input[name="keterangan"]').val(target.data('keterangan'));
        $(this).find('input[name="harga"]').val(target.data('harga_satuan'));
    });

    // Modal Upload
    $('#modal-upload').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(this).find('input[name="id"]').val(id);
    });

    // Inisialisasi Select2
    $('.select2').select2();
    $('.select2bs4').select2({ theme: 'bootstrap4' });

    // Inisialisasi Mask Input
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
    $('[data-mask]').inputmask();

    // Inisialisasi Datepicker
    $('#reservationdate').datetimepicker({ format: 'L' });
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    $('#reservation').daterangepicker();

    // Inisialisasi Colorpicker
    $('.my-colorpicker1').colorpicker();
    $('.my-colorpicker2').colorpicker().on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    // Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox();

    // AutoNumeric
    new AutoNumeric('#jeemel', {
        decimalPlaces: '0',
        decimalCharacter: ',',
        digitGroupSeparator: '.'
    });
    new AutoNumeric('#jeemel2', {
        decimalPlaces: '0',
        decimalCharacter: ',',
        digitGroupSeparator: '.'
    });

    // Pastikan DropzoneJS diinisialisasi dengan benar jika diperlukan
    Dropzone.autoDiscover = false;
});
</script>

</body>
</html>
