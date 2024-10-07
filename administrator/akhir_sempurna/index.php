<?php
$page = 'akhir_sempurna';
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
                    Tentang Akhir yang Sempurna               
                </h3>
              </div>
              <!-- /.card-header -->
              
      <form action="update.php" method="post">
                <div class="card-body">
                  <textarea name="summernote" id="summernote">  
                    <?php 
                    $query = mysqli_query($conn,"SELECT * FROM tb_news WHERE id='3' ") or die (mysqli_error($conn));
                    $row = mysqli_fetch_assoc($query);
                    ?>                  
                    <?php echo $row['deskripsi']; ?>
                  </textarea>
                </div>
                <div class="card-footer" align="right">                  
                  <button type="submit" name="update" class="btn btn-primary"><i class="fas fa-sync"></i> Update</button>
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
