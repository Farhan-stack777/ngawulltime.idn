<?php
$page = 'karir';
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


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <?php
include "../1header.php"; 
?>
<style type="text/css">
.img-kotak {
  width: 80px;
  height: 80px;
  /*border: solid red; */
  
}
.modified-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>
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
              <div class="card-header" style="background-color: #<?php echo $warna1; ?>">
                <h3 class="card-title"><i class="fas fa-clipboard mr-2"></i>Data Karir</h3> 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="button">                
                  <button type="button" class="btn btn-default btn-md" style="background-color:#<?php echo $warna2; ?>;" data-toggle="modal" data-target="#modal-tambah"><font color="white"><i class="fas fa-plus"></i>Tambah Data</font></button>
                </div> 
                <br>
                <div class="table-responsive">
                  <table id="cobatabel" class="table table-sm table-bordered table-striped table-hover ">
                    <thead>
                      <tr>
                        <th bgcolor="#ffffff" width="3%"><center>No</center></th>
                        <th bgcolor="#ffffff" ><center>Posisi/Bagian</center></th>
                        <th bgcolor="#ffffff" ><center>Deskripsi Pekerjaan</center></th>
                        <th bgcolor="#ffffff" ><center>Keterangan</center></th>
                        <th bgcolor="#ffffff" ><center>Lampiran</center></th>
                        <th bgcolor="#ffffff" style="width: 10%;"><center>Aksi</center></th>                    

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $query = "SELECT * FROM tb_karir ";
                      $sql_peran = mysqli_query($con, $query) or die (mysqli_error($con));
                      if (mysqli_num_rows($sql_peran) >0 )
                      {
                        while($data = mysqli_fetch_array($sql_peran))
                        {
                          ?>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <td>
                              <h6>
                                <?=$no++;?> 
                              </h6>
                            </td>                        
                           
                            <td>
                              <h6> 
                                <?=$data['posisi']?>
                              </h6>
                            </td>
                            <td>
                              <h6>
                                <?=$data['deskripsi']?>
                              </h6>
                            </td>
                            <td>
                              <h6>
                                <?=$data['keterangan'];?>  
                              </h6>
                            </td>
                            <td>
                              <h6>
                                <center>
                                  <?php if(!empty($data['lampiran'])) {?>
                                    
                                    <button type="button" class="btn btn-warning btn-sm " data-toggle="modal" data-target="#modal-upload2" data-id="<?=$data['Id'];?>" data-lampiran="<?=$data['lampiran'];?>"><i class="fas fa-upload"></i>                          
                                    </button>
                                    <a href="<?=$data['lampiran'];?>" type="button" target="_blank" class="btn btn-warning btn-sm"><i class="fas fa-bullhorn"></i></a>
                                  <?php } else {?>
                                    <button type="button" class="btn btn-warning btn-sm " data-toggle="modal" data-target="#modal-upload2" data-id="<?=$data['Id'];?>" data-lampiran="<?=$data['lampiran'];?>"><i class="fas fa-upload"></i>
                                     Upload 
                                   </button>
                                  <?php } ?>    
                                </center>           
                              </h6>
                            </td>
                            <td >
                              <h6>
                                <center>                                 
                                  <a href="edit_hal.php?id=<?=$data['Id'];?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </a>
                                  <a href="hapus.php?id=<?=$data['Id'];?>" onclick="return confirm('Anda akan menghapus data ini ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
                                </center>
                              </h6>
                            </td>
                          </tr>    
                          <?php
                        }
                      }
                      else
                      {
                        echo "<tr><td colspan=\"8\" align=\"center\"><h6>Data Tidak Ditemukan!</h6></td></tr>";
                      }
                      ?>
                    </tbody>                         
                  </table>
                </div>      
              </div><!-- /.card-body -->            
            </div> <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->


      <div class="modal fade" id="modal-tambah" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Data Karir</font></h4>
            </div>
            <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Posisi </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Posisi / Bagian" autofocus required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Deskripsi Pekerjaan </label>
                        <div class="col-sm-12">
                          <textarea name="summernote" id="summernote"> 
                          </textarea>
                        </div>
                      </div>  
                     
                      
                      
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label for="inputEmail3" class="col-sm-12 control-label">Keterangan</label> 
                          <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan..." required></textarea>
                        </div>
                      </div>
                                        

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
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Edit Data Karir</font></h4>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                          <input type="hidden" class="form-control" name="id" id="id" >
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Posisi </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="posisi" id="posisi" placeholder="Posisi / Bagian" autofocus required>
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label for="inputEmail3" class="col-sm-12 control-label">Deskripsi Pekerjaan </label> 
                          <textarea class="form-control" rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi pekerjaan..." required></textarea>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label for="inputEmail3" class="col-sm-12 control-label">Keterangan</label> 
                          <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan..." required></textarea>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="edit" class="btn btn-secondary swalDefaultSuccess" style="background-color:#<?php echo $warna1; ?>;"><i class="fas fa-edit"></i> Edit</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.modal -->


      <div class="modal fade" id="modal-upload2" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Upload Link GDrive Pengumuman</font></h4>
            </div>
            <form class="form-horizontal" action="upload.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <input type="hidden" class="form-control" name="id" id="id" >

                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Link Gdrive </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="lampiran" id="lampiran" placeholder="Link Lampiran Google Drive" autofocus required>
                        </div>
                      </div>
                      

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="upload" class="btn btn-secondary swalDefaultSuccess" style="background-color:#<?php echo $warna1; ?>"><i class="fas fa-upload"></i> Upload</button>
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

<!-- jQuery -->
<script src="../_aset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../_aset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../_aset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../_aset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../_aset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../_aset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../_aset/plugins/jszip/jszip.min.js"></script>
<script src="../_aset/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../_aset/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../_aset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../_aset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_aset/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="../_aset/plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#cobatabel").DataTable(); 
     $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');   
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript">
$('#modal-edit').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');
     var judul_Karir         = $(e.relatedTarget).data('posisi');
     var penulis_Karir        = $(e.relatedTarget).data('deskripsi');
     var isbn  = $(e.relatedTarget).data('keterangan');

    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="posisi"]').val(judul_Karir);
    $(e.currentTarget).find('textarea[name="deskripsi"]').val(penulis_Karir);
    $(e.currentTarget).find('textarea[name="keterangan"]').val(isbn);
   
});
</script>
<script type="text/javascript">
$('#modal-upload2').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');
     var lampiran    = $(e.relatedTarget).data('lampiran');  
    $(e.currentTarget).find('input[name="id"]').val(id);  
    $(e.currentTarget).find('input[name="lampiran"]').val(lampiran);
      
   
});
</script>


</body>
</html>
