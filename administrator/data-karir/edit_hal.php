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

                <?php
                if(!empty($_GET['id'])){
                  $id_karir = $_GET['id'];
                  $sql_layanan2 = mysqli_query($con, "SELECT * FROM tb_karir WHERE Id='$id_karir' ") or die (mysqli_error($con));
                  $data_layanan2 = mysqli_fetch_assoc($sql_layanan2);
                  ?>
                  <form class="form-horizontal" action="edit.php" method="POST" id="peranan" enctype="multipart/form-data">

                    <div class="col-md-12">                
                      <div class="card card-info">                
                        <div class="card-body" class="bootstrap-timepicker">

                          <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data_layanan2['Id']; ?>">
                          <div class="form-group row">
                            <label class="col-sm-12 control-label">Posisi </label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" name="posisi" id="posisi" value="<?php echo $data_layanan2['posisi']; ?>" placeholder="Posisi / Bagian" autofocus required>
                            </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label for="inputEmail3" class="col-sm-12 control-label">Deskripsi Pekerjaan </label> 
                              <textarea name="summernote"  id="summernote">
                                <?php echo $data_layanan2['deskripsi']; ?>
                              </textarea>
                            </div>
                          </div>


                          <div class="form-group row">
                            <div class="col-sm-12">
                              <label for="inputEmail3" class="col-sm-12 control-label">Keterangan</label> 
                              <textarea class="form-control" rows="3" name="keterangan" id="keterangan" placeholder="Keterangan..." required><?php echo $data_layanan2['keterangan']; ?></textarea>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                          <a type="button" href="../data-karir/" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></a>
                          <button type="submit" name="edit" class="btn btn-secondary swalDefaultSuccess" style="background-color:#<?php echo $warna1; ?>;"><i class="fas fa-edit"></i> Edit</button>
                        </div>
                      </div>
                    </div>
                  </form>
                <?php } else{ ?>

                <?php } ?>


                

              </div> <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->




      </div>


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
  $('#modal-upload').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
   var id          = $(e.relatedTarget).data('id');  
   $(e.currentTarget).find('input[name="id"]').val(id);

   
 });
</script>


</body>
</html>
