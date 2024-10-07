<?php
$page = 'home';
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
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">
                  Halaman Home                  
                </h3>
              </div>
              <!-- /.card-header -->             
              <form action="update.php" method="post">
                <div class="card-body">
                  <a href="../hal-carousel/" class="btn btn-primary btn-md mb-2">Carousel</a>
                  <a href="../hal-penapersada/" class="btn btn-primary btn-md mb-2">Mengapa Pena Persada</a>
                  <a href="../hal-paket/" class="btn btn-primary btn-md mb-2">Paket</a>
                  <a href="../hal-testimoni/" class="btn btn-primary btn-md mb-2">Testimoni</a>
                  <!-- <textarea name="summernote" id="summernote">  
                    <?php 
                    $query = mysqli_query($con,"SELECT * FROM tb_hal_home WHERE Id='1' ") or die (mysqli_error($con));
                    $row = mysqli_fetch_assoc($query);
                    ?>                  
                    <?php echo $row['konten']; ?>
                  </textarea> -->
                </div>

                <div class="card-footer" align="right">                
                  <!-- <button type="submit" name="update" class="btn btn-primary"><i class="fas fa-sync"></i> Update</button> -->
                </div>
              </form>
             
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->


      


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

</body>
</html>
