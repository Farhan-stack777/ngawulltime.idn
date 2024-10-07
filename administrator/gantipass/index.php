<?php
$page = 'gantipass';
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
  // $query_ph=mysqli_query($conn,"SELECT * FROM tb_perusahaan WHERE Id='1' ") or die (mysqli_eror($con));
  // $fetch=mysqli_fetch_assoc($query_ph);

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
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div> -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-primary">
              <div class="card-header" style="background-color: #<?php echo $warna1; ?>">
                <h3 class="card-title"><i class="fas fa-lock mr-2"></i>Ganti Password</h3>
              </div><!-- /.card-header -->
              <div class="card-body">

               <?php
               $user = @$_SESSION['username'];
               ?>
               <form role="form" class="form-layout" action="updateprofile.php" method="post" enctype="multipart/form-data">
                Username
                <div class="form-group">
                  <input type="hidden" class="form-control" maxlength="100" name="email" id="email" value="<?=$user;?>" />
                  <input type="text" class="form-control" maxlength="100" name="email2" id="email2" value="<?=$user;?>" disabled />
                </div>
                Input Password Baru
                <div class="form-group">
                  <input type="password" class="form-control" maxlength="100" name="pw" id="pw"  placeholder=""/ required>
                </div>
                Konfirmasi Password Baru
                <div class="form-group">
                  <input type="password" class="form-control" maxlength="100" name="pw2" id="pw"  placeholder=""/ required>
                </div>

                <button class="btn btn-primary btn-md m-b btn-block" type="submit" name= "submit" ><i class="fas fa-lock"></i><b> Update </b></font>
                </button>
              </form>

            </div>
          </div>
        </section>    
        <!-- /.content -->
      </div>
      <!-- Main row -->

    </div>
  </section>
  <!-- Main content -->
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
  <script>
  $(function(){
   $('#submit').on('click',function(){  
      $('#spin').show();
   });
});
</script>
<script type="text/javascript">
$('#modal-update').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
    var id          = $(e.relatedTarget).data('id');
    var nama          = $(e.relatedTarget).data('nama');
    var alamat          = $(e.relatedTarget).data('alamat');
    var kontak          = $(e.relatedTarget).data('kontak');
    var keterangan          = $(e.relatedTarget).data('keterangan');
    var logo          = $(e.relatedTarget).data('logo');


    
     
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="nama"]').val(nama);
    $(e.currentTarget).find('input[name="alamat"]').val(alamat);
    $(e.currentTarget).find('input[name="kontak"]').val(kontak);
    $(e.currentTarget).find('input[name="keterangan"]').val(keterangan);
    $(e.currentTarget).find('input[name="logo"]').val(logo);

    
      
   
});
</script>
</body>
</html>
