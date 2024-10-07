<?php
$page = 'produk';
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
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
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
                <h3 class="card-title"><i class="fas fa-clipboard mr-2"></i>Data Buku</h3> 
              </div><!-- /.card-header -->
              <div class="card-body">

                <div class="button">                
                  <button type="button" class="btn btn-default btn-md" style="background-color:#<?php echo $warna2; ?>;" data-toggle="modal" data-target="#modal-tambah"><font color="white"><i class="fas fa-plus"></i>Tambah Data</font></button>
                </div> 
                <br>

                <div class="table-responsive">
                  <table id="table_data" class="table table-bordered table-striped table-sm">
                    <thead>
                      <tr>
        <th bgcolor="#ffffff" width="3%"><center>No</center></th>
        <th bgcolor="#ffffff" ><center>Cover</center></th>
        <th bgcolor="#ffffff" ><center>Judul Buku</center></th>
        <th bgcolor="#ffffff" ><center>Penulis Buku</center></th>
        <th bgcolor="#ffffff" style="width: 5%;"><center>ISBN</center></th>
        <th bgcolor="#ffffff" style="width: 5%;"><center>Link</center></th>
        <th bgcolor="#ffffff" style="width: 40%;"><center>Sinopsis</center></th>
        <th bgcolor="#ffffff" style="width: 10%;"><center>Aksi</center></th>                                  
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

      <!-- /.modal -->
      <div class="modal fade" id="modal-upload2" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#001f3f;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Upload Lampiran 2</font></h4>
            </div>
            <form class="form-horizontal" action="upload2.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <input type="text" class="form-control" name="id" id="id" value="id"  hidden>

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Pilih File </label>
                        <div class="col-sm-12">
                          <input type="file" class="form-control" name="file" id="file" accept=".jpg, .png, .pdf, .jpeg" required>
                        </div>
                      </div>
                      

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="upload" class="btn btn-secondary swalDefaultSuccess" style="background-color:#001f3f"><i class="fas fa-upload"></i> Upload</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.modal -->

<div class="modal fade" id="modal-tambah" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Data Buku</font></h4>
            </div>
            <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Judul Buku </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku" autofocus required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Penulis Buku </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="penulis_buku" id="penulis_buku" placeholder="Nama Penulis Buku" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">ISBN  </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Link </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="link" id="link" placeholder="Link" >
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label for="inputEmail3" class="col-sm-12 control-label">Sinopsis Buku </label> 
                          <textarea class="form-control" rows="4" name="sinopsis" id="sinopsis" placeholder="Sinopsis Buku ..." required></textarea>
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
      


      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include "../4footer.php"; ?>

  <div id="konten_modal"></div>
     <script type="text/javascript">
    function tambah_data(Id){
      $('#konten_modal').load('loadmodal2.php?modal=tambah_data');
    }
  </script>
  <script type="text/javascript">
    function lihat_foto(Id){
      $('#konten_modal').load('loadmodal.php?modal=lihat_foto&Id='+Id);
    }
  </script>
  <script type="text/javascript">
    function edit_modal(Id){
      $('#konten_modal').load('loadmodal.php?modal=edit_modal&Id='+Id);
    }
  </script>
  <script type="text/javascript">
    function lihat_foto2(Id){
      $('#konten_modal').load('loadmodal.php?modal=lihat_foto2&Id='+Id);
    }
  </script>


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
          "url": "ajax/ajax_transaksi.php?action=table_data",
          "dataType": "json",
          "type": "POST"
        },
        
        "columns": [
          { "data": "no" },      
         { 
            "render": function ( data, type, row ) {          
              html = '<center>'

              if(row.cover == ''){
                html += '<img src="../img/noimage.png" width="100px" height="100px" class="modified-img" alt="cover-buku" class="img-circle img-fluid">'
              }
              else {
                html += '<img src="../data-buku/cover/'+row.cover+'" alt="cover-buku" class="img-circle img-fluid">'
              }

              html += '<button  onclick="lihat_foto('+row.Id+')" class="btn btn-primary btn-sm"><i class="fas fa-download"></i> Upload</button> '
             
              html += '</center>'
             
              return html
            }
          },
          { "data": "judul_buku" },
          { "data": "penulis_buku" },
          { "data": "isbn" },
          { 
            "render": function ( data, type, row ) {     
              html = '<center>'   

              html += '<a href="'+row.link+'" target="_blank">'+row.link+'  </a>'
              html += '</center>'
              return html
            }
          },
          
          { "data": "sinopsis" },
          { 
            "render": function ( data, type, row ) {     
              html = '<center>'   

              html += '<button type="button" onclick="edit_modal('+row.Id+')" class="btn btn-primary btn-sm"><font color="white"><i class="fas fa-edit"></i></font></button> '

              html += '<button  onclick="lihat_foto2('+row.Id+')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>'
              html += '</center>'
              return html
            }
          },
        ], 
        'columnDefs': [
          {
            "targets": 0,
            "className": "text-center"
          }
       ]
      });
    });
    
  </script> 
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


<script type="text/javascript">
$('#modal-edit').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');
     var kode        = $(e.relatedTarget).data('tgl');
     var nama        = $(e.relatedTarget).data('jenis');
     var keterangan  = $(e.relatedTarget).data('nominal');
     var harga_satuan      = $(e.relatedTarget).data('catatan');
     var debit = $(e.relatedTarget).data('debit');
     var kredit = $(e.relatedTarget).data('kredit');
     
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="tgl"]').val(kode);
    $(e.currentTarget).find('select[name="jenis"]').val(nama);
    $(e.currentTarget).find('input[name="nominal"]').val(keterangan);
    $(e.currentTarget).find('textarea[name="catatan"]').val(harga_satuan);
    $(e.currentTarget).find('select[name="debit"]').val(debit);
    $(e.currentTarget).find('select[name="kredit"]').val(kredit);
      
   
});
</script>
<script type="text/javascript">
$('#modal-upload').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');  
    $(e.currentTarget).find('input[name="id"]').val(id);
      
   
});
</script>
<script type="text/javascript">
$('#modal-upload2').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');  
    $(e.currentTarget).find('input[name="id"]').val(id);
         
});
</script>

</body>
</html>
