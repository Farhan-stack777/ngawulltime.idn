<?php
$page = 'dasbor';
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
  $query_ph=mysqli_query($con,"SELECT * FROM tb_perusahaan WHERE Id='1' ") or die (mysqli_eror($con));
  $fetch=mysqli_fetch_assoc($query_ph);

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
        <div class="row">
          <div class="col-12 col-md-6">
           

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-university mr-2"></i>Data Perusahaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../img/<?php echo $fetch['logo'] ;?>"
                       alt="User profile picture">
                </div>
                 <h3 class="profile-username text-center"><?php echo $fetch['nama'] ;?></h3>

               <!--  <p class="text-muted text-center">Software Engineer</p> -->
                <hr>
               <!--  <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr> -->

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Kantor</strong>

                <p class="text-muted"><?php echo $fetch['alamat'] ;?></p>

                <hr>

                <strong><i class="fas fa-book mr-1"></i> Kontak</strong>
                <?php 
                $tangkap = intval($fetch['kontak']);
                $number="+62".$tangkap;
                 ?>
                <p class="text-muted">
                 <a href="https://api.whatsapp.com/send?phone=<?=$number;?>&text=Halo, Mau tanya mengenai data perusahaan. mohon infonya ya..." target="_blank"><i class="fas fa-phone mr-2"></i><?php echo $fetch['kontak'] ;?></a>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Keterangan</strong>

                <p class="text-muted">
                 <?php echo $fetch['keterangan'] ;?>
                   
                 </p>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
               <!--  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
               <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-id="<?=$fetch['Id'];?>" data-nama="<?=$fetch['nama'];?>" data-alamat="<?=$fetch['alamat'];?>"  data-kontak="<?=$fetch['kontak'];?>" data-keterangan="<?=$fetch['keterangan'];?>" data-logo="<?=$fetch['logo'];?>"data-target="#modal-update" ><i class="fas fa-edit"></i><b>Update</b></button>

               
               

              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->






      <!-- batasan -->
     <div class="modal fade" id="modal-update" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#001f3f;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-university"></i> Update Data</font></h4>
            </div>
            <form class="form-horizontal" action="update.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <input type="text" class="form-control" name="id" id="id" value="id" hidden >

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Nama Perusahaan </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Perusahaan">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Alamat Perusahaan </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Perusahaan">
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Kontak </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="kontak" id="kontak" placeholder="Kontak w.a. Bisnis">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Keterangan </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="keterangan" id="keterangan" >
                        </div>
                      </div>
                      <img class="profile-user-img img-fluid img-circle"
                       src="../img/<?php echo $fetch['logo'] ;?>"
                       alt="User profile picture">
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">logo </label>
                        <div class="col-sm-12">
                          <input type="file" class="form-control" name="logo" id="logo" accept="image/*" >
                        </div>
                      </div>
                      

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="update" class="btn btn-secondary swalDefaultSuccess" style="background-color:#001f3f"><i class="fas fa-edit"></i> Update</button>
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
