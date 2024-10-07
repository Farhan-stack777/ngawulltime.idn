<?php
$page = 'layanan';
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
        echo "<script>window.location='".base_url('auth/')."';</script>";       
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
<!-- Vendor CSS Files -->

  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <!-- <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> -->
  <!-- <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->

<!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

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
                <h3 class="card-title"><i class="fas fa-clipboard mr-2"></i>Data Layanan</h3> 
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="button">                
                  <!-- <button type="button" class="btn btn-default btn-md" style="background-color:#<?php echo $warna2; ?>;" data-toggle="modal" data-target="#modal-tambah"><font color="white"><i class="fas fa-plus"></i>Tambah Data</font></button> -->
                </div> 
                <br>
                <div class="table-responsive">
                  <table id="cobatabel" class="table table-sm table-bordered table-striped table-hover ">
                    <thead>
                      <tr>
                        <th bgcolor="#ffffff" width="3%"><center>No</center></th>
                        <th bgcolor="#ffffff" ><center>Paket</center></th>
                        <!-- <th bgcolor="#ffffff" ><center>Icon</center></th> -->
                        <th bgcolor="#ffffff" ><center>Keterangan</center></th>
                        <th bgcolor="#ffffff" ><center>Aksi</center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      $query = "SELECT * FROM tb_hal_layanan ";
                      $sql_peran = mysqli_query($con, $query) or die (mysqli_error($con));
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
                                <?=$data['layanan'];?>
                              </h6>
                            </td>
                            <!-- <td align="right">
                              <h6>
                               <i class="<?php echo $data['icon']; ?>"></i>
                              </h6>
                            </td> -->
                            <td>
                              <h6>
                                <?=$data['keterangan'];?>  
                              </h6>
                            </td>                            
                            <td >
                              <h6>
                                <center>
                                  <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-edit" 
                                  data-id="<?=$data['Id'];?>"
                                  data-layanan="<?=$data['layanan'];?>"
                                  data-harga="<?=$data['harga'];?>"
                                  data-keterangan="<?=$data['keterangan'];?>"
                                  >
                                    <font color="white"><i class="fas fa-edit"></i>
                                    </font>
                                  </button>
                                  <!-- <a href="hapus.php?id=<?=$data['Id'];?>" onclick="return confirm('Anda akan menghapus data ini ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a> -->
                                </center>
                              </h6>
                            </td>
                          </tr>    
                          <?php
                        }
                      }
                      else
                      {
                        echo "<tr><td colspan=\"5\" align=\"center\"><h6>Data Tidak Ditemukan!</h6></td></tr>";
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
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Data Layanan</font></h4>
            </div>
            <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Nama Layanan </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="layanan" id="layanan" placeholder="Nama Layanan" autofocus required>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Keterangan  </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" >
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
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Edit Data Layanan</font></h4>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <input type="hidden" name="id">
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Nama Layanan </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="layanan" id="layanan" placeholder="Nama Layanan" autofocus required>
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Keterangan  </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" >
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
    </section>
    <!-- /.content -->

    <!-- <div class="container-fluid" data-aos="fade-up">
      <section id="featured-services" class="featured-services"  >
        <div class="container-fluid" data-aos="fade-up">
          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <a href="#">
                  <div class="icon"><i class="bx bx-book"></i></div>
                  <h4 class="title"><font color="#000000">Penerbitan Buku</font></h4>
                  <p class="description">Layanan penerbitan buku baik dari naskah mentah / hasil penelitian skripsi / thesis anda</p>
                </a>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <a href="#">
                  <div class="icon"><i class="bx bx-file"></i></div>
                  <h4 class="title"><font color="#000000">Sertifikat HAKI</font></h4>
                  <p class="description">Layanan untuk kepenguruan Hak Kekayaan Intelektual (HAKI) terhadap buku anda</p>
                </a>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <a href="#">
                  <div class="icon"><i class="fas fa-globe"></i></div>
                  <h4 class="title"><font color="#000000">Indeks Google Scholar</font></h4>
                  <p class="description">Layanan indexing buku anda pada google scholar</p>
                </a>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                <a href="#">
                  <div class="icon"><i class="bx bx-search"></i></div>
                  <h4 class="title"><font color="#000000">Cek Progress Pesanan</font></h4>
                  <p class="description">Mengecek progress pesanan anda</p>
                </a>
              </div>
            </div>

          </div>
        </div>
      </section>
    </div> -->

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
<!-- AdminLTE App -->
<script src="../_aset/dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../_aset/plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="../_aset/plugins/codemirror/codemirror.js"></script>
<script src="../_aset/plugins/codemirror/mode/css/css.js"></script>
<script src="../_aset/plugins/codemirror/mode/xml/xml.js"></script>
<script src="../_aset/plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../_aset/dist/js/demo.js"></script>
<!-- Page specific script -->
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
<script type="text/javascript">
$('#modal-edit').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');
     var layanan         = $(e.relatedTarget).data('layanan');
     var harga        = $(e.relatedTarget).data('harga');
     var keterangan  = $(e.relatedTarget).data('keterangan');

    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="layanan"]').val(layanan);
    $(e.currentTarget).find('input[name="harga"]').val(harga);
    $(e.currentTarget).find('input[name="keterangan"]').val(keterangan);
   
});
</script>
</body>
</html>
