<?php
$page = 'sneakers';
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
                <h3 class="card-title"><i class="fas fa-clipboard mr-2"></i>Data Sneakers</h3> 
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
                        <th bgcolor="#ffffff" >No</th>
                        <th bgcolor="#ffffff" >Gambar</th>
                        <th bgcolor="#ffffff" >Merk</th>
                        <th bgcolor="#ffffff" >Harga</th>
                        <th bgcolor="#ffffff" >Link</th>
                        <th bgcolor="#ffffff" >Aksi</th>                    

                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $query = "SELECT * FROM tb_sepatu ";
                      $sql_peran = mysqli_query($conn, $query) or die (mysqli_error($conn));
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
                              <center>
                                <h6>
                                  <?php if($data['gambar']=="") {?>
                                    <div class="img-kotak">
                                      <img src="../../image/" width="50px" height="50px" class="modified-img">
                                    </div><br>
                                    <button type="button" class="btn btn-default btn-sm" style="background-color:#<?php echo $warna2; ?>;" data-toggle="modal" data-target="#modal-upload" data-id="<?php echo $data['id'] ;?>"><font color="white"><i class="fas fa-download"></i>Upload</font></button>  
                                  <?php }else{ ?> 
                                    <div class="img-kotak">                         
                                      <img src="../../images/<?=$data['gambar']?>" width="50px" class="modified-img">
                                    </div><br>                          
                                    <button type="button" class="btn btn-default btn-sm" style="background-color:#<?php echo $warna2; ?>;" data-toggle="modal" data-target="#modal-upload" data-id="<?php echo $data['id'] ;?>"><font color="white"><i class="fas fa-download"></i>Update</font></button>
                                  <?php } ?>
                                </h6>
                              </center>
                            </td>
                            <td>
                              <h6> 
                                <?=$data['judul']?>
                              </h6>
                            </td>
                            <td>
                              <h6>
                                <?=$data['harga']?>
                              </h6>
                            </td>
                            <td>
                              <h6>
                                <a href="<?php echo $data['link']; ?>" target="_blank"><?=$data['link'];?>  </a>
                              </h6>
                            </td>
                            <td>
                              <h6>
                                <center>
                                  <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-edit" data-id="<?=$data['id'];?>" data-judul_buku="<?=$data['judul'];?>" data-penulis_buku="<?=$data['harga'];?>"  data-link="<?=$data['link'];?>">
                                    <font color="white"><i class="fas fa-edit"></i>
                                    </font>
                                  </button>
                                  <a href="hapus.php?id=<?=$data['id'];?>" onclick="return confirm('Anda akan menghapus data ini ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
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
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Data Sneakers</font></h4>
            </div>
            <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Merk </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="judul" id="judul_buku" placeholder="Merk" autofocus required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Harga</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="harga" id="penulis_buku" placeholder="Harga" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Link </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="link" id="link" placeholder="Link" >
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
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Edit Data Sneakers</font></h4>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                          <input type="hidden" class="form-control" name="id" id="id" >
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Merk</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="judul" id="judul_buku" placeholder="Merk" autofocus required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Harga</label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="harga" id="penulis_buku" placeholder="Harga" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Link </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="link" id="link" placeholder="Link" >
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


      <div class="modal fade" id="modal-upload" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Upload Gambar</font></h4>
            </div>
            <form class="form-horizontal" action="upload.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <input type="text" class="form-control" name="id" id="id" value="id"  hidden>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Pilih File </label>
                        <div class="col-sm-12">
                          <input type="file" class="form-control" name="foto" id="foto" accept="image/*" >
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
     var judul_buku         = $(e.relatedTarget).data('judul_buku');
     var penulis_buku        = $(e.relatedTarget).data('penulis_buku');
     var link      = $(e.relatedTarget).data('link');

    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="judul"]').val(judul_buku);
    $(e.currentTarget).find('input[name="harga"]').val(penulis_buku);
    $(e.currentTarget).find('input[name="link"]').val(link);
      
   
});
</script>
<script type="text/javascript">
$('#modal-upload').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');  
    $(e.currentTarget).find('input[name="id"]').val(id);
      
   
});
</script>


</body>
</html>
