<?php
$page = 'sisi_atas';
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        td {
            word-wrap: break-word; /* Ensures long text wraps within the cell */
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
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
                  Pengaturan Sisi Atas            
                </h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card">
             <div class="card-header">
                <?php
            // Koneksi ke basis data
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bootcamp3";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Periksa koneksi
            if ($conn->connect_error) {
                die("Koneksi gagal: " . $conn->connect_error);
            }

            // Query untuk mengambil data
            $sql = "SELECT id, link_wa, link_ig, jam FROM tb_sisi_atas";
            $result = $conn->query($sql);
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Link Whatsapp</th>
                        <th>Link Instagram</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><br><?php echo $row["link_wa"]; ?></td>
                                <td><?php echo $row["link_ig"]; ?></td>
                                <td><?php echo $row["jam"]; ?></td>
                                <td >
                                <h6>
                                    <center>
                                    <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-edit" 
                                    data-id="<?=$row['id'];?>"
                                    data-layanan="<?=$row['link_wa'];?>"
                                    data-harga="<?=$row['link_ig'];?>"
                                    data-keterangan="<?=$row['jam'];?>"
                                        <font color="white"><i class="fas fa-edit"></i>
                                        </font>
                                    </button><br><br>
                                    <a href="hapus.php?id=<?=$row['id'];?>" onclick="return confirm('Anda akan menghapus data ini ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
                                    </center>
                                </h6>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">Tidak ada data</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php
            $conn->close();
            ?>
        </div>
                                </div>        
             
            </div>
          </div>
          <!-- /.col-->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <div class="modal fade" id="modal-edit" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Edit Data </font></h4>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST"  enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <input type="hidden" name="id">
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Link Whatsapp </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="link_wa"  placeholder="https//" autofocus required>
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Link Instagram </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="link_ig"  placeholder="https//" required>
                        </div>
                      </div> 

                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Jam Buka </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="jam"  placeholder="open-close" required>
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
     var layanan     = $(e.relatedTarget).data('layanan');
     var harga        = $(e.relatedTarget).data('harga');
     var keterangan  = $(e.relatedTarget).data('keterangan');

    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="link_wa"]').val(layanan);
    $(e.currentTarget).find('input[name="link_ig"]').val(harga);
    $(e.currentTarget).find('input[name="jam"]').val(keterangan);
   
});
</script>

</body>
</html>
