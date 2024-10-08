<?php
$page = 'user';
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
                <h3 class="card-title"><i class="fas fa-user-cog mr-2"></i>Data Customer Servis</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">                              
          
               <div class="button">                
                <button type="button" class="btn btn-default btn-md" style="background-color:#<?php echo $warna2; ?>;" data-toggle="modal" data-target="#modal-tambah"><font color="white"><i class="fas fa-plus"></i>
                   Tambah Data</font>
                </button>                
              </div> 
              <br>
             
             
                 
                <table id="example0" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width:3%"><center>No</center></th>
                    <th><center>Username</center></th>
                    <th><center>Password</center></th>
                    <th><center>Email</center></th>
                    <th><center>No Telepon</center></th>
                    <th><center>Alamat</center></th>
                    <th style="width:28%"><center>Aksi</center></th>
                  </tr>
                  </thead>
                  <tbody>
                 

                     <?php
                     $no = 1;
                      $query = "SELECT * FROM tb_anggota WHERE id!='1' ";
                     
             
                $sql_peran = mysqli_query($conn, $query) or die (mysqli_error($conn));
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
                            <?=$data['nama']?>
                      	</h6>
                      </td>
                      <td>
                      		<h6> 
                            <?=$data['password']?>
                      	</h6>
                      </td>
                      <td>
                      		<h6> 
                            <?=$data['email']?>
                      	</h6>
                      </td>
                      <td>
                      		<h6> 
                            <?=$data['telepon']?>
                      	</h6>
                      </td>
                      <td>
                      		<h6> 
                            <?=$data['alamat']?>
                      	</h6>
                      </td>
                      <td>
                      	<h6>
                      		<center>
                            <a href="resetpw.php?id=<?=$data['id'];?>" onclick="return confirm('Anda akan mereset password menjadi = Admin!@# ?')" class="btn btn-warning btn-sm"><i class="fas fa-history"></i> Reset Password</a>
                            <button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-edit" data-id="<?=$data['id'];?>" data-nama="<?=$data['nama'];?>" data-password="<?=$data['password'];?>" data-email="<?=$data['email'];?>" data-nomer="<?=$data['telepon'];?>" data-alamat="<?=$data['alamat'];?>">
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
                echo "<tr><td colspan=\"11\" align=\"center\"><h6>Data Tidak Ditemukan!</h6></td></tr>";
              }

                ?>
             
                </tbody>
                  </tbody>
                </table>
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

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-tambah" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Data </font></h4>
            </div>
            <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Nama </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Username" >
                        </div>
                      </div> 
                     <!--  <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Password </label>
                        <div class="col-sm-12">
                          <input type="password" class="form-control" name="pass1" id="pass1" >
                        </div>
                      </div> 
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Konfirmasi Password </label>
                        <div class="col-sm-12">
                          <input type="password" class="form-control" name="pass2" id="pass2" >
                        </div>
                      </div>   -->      

                      <!--  <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Status </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="status" id="status"  >
                        </div>
                      </div>  -->

                                              
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
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Edit Data </font></h4>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                          <input type="text" class="form-control" name="id" id="id" hidden>
                      
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Nama </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Produk" >
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


      <div class="modal fade" id="modal-upload" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Upload Foto Produk</font></h4>
            </div>
            <form class="form-horizontal" action="upload.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <input type="text" class="form-control" name="id" id="id" value="id"  >

                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Kode </label>
                        <div class="col-sm-12">
                          <input type="file" class="form-control" name="foto" id="foto" accept="image/*" >
                        </div>
                      </div>
                      

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="upload" class="btn btn-secondary swalDefaultSuccess" style="background-color:#<?php echo $warna1; ?>"><i class="fas fa-plus"></i> Tambah</button>
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
$('#modal-edit').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');
     var kode         = $(e.relatedTarget).data('kode');
     var nama        = $(e.relatedTarget).data('nama');
     var keterangan  = $(e.relatedTarget).data('keterangan');
     var harga_satuan      = $(e.relatedTarget).data('harga_satuan');
     
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="kode"]').val(kode);
    $(e.currentTarget).find('input[name="nama"]').val(nama);
    $(e.currentTarget).find('input[name="keterangan"]').val(keterangan);
    $(e.currentTarget).find('input[name="harga"]').val(harga_satuan);
      
   
});
</script>
<script type="text/javascript">
$('#modal-upload').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element
     var id          = $(e.relatedTarget).data('id');  
    $(e.currentTarget).find('input[name="id"]').val(id);
      
   
});
</script>
<script>
function isNumberKey(evt)
{
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
  return false;

  return true;
}
</script>
<script type="text/javascript">
  new AutoNumeric('#jeemel',{
    decimalPlaces:'0',
    decimalCharacter:',',
    digitGroupSeparator:'.'
  });
</script>
<script type="text/javascript">
  new AutoNumeric('#jeemel2',{
    decimalPlaces:'0',
    decimalCharacter:',',
    digitGroupSeparator:'.'
  });
</script>



<!-- Select2 -->
<script src="../_aset/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>





</body>
</html>
