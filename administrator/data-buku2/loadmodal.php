<?php 
require_once "../database/config.php";

$query_ph=mysqli_query($con,"SELECT * FROM tb_perusahaan WHERE Id='1' ") or die (mysqli_eror($con));
$fetch=mysqli_fetch_assoc($query_ph);
?>
<?php 
$warna1 = 'ffc107';
$warna2 = '00ACEE';

if(isset($_GET['modal']))
{
  $modal = $_GET['modal'];

  if($modal=='lihat_foto')
  { 
    $Id = $_GET['Id'];

    $sql_tr= mysqli_query($con, "SELECT * FROM tb_buku WHERE Id='$Id'  ") or die (mysqli_error($con));
    $data2 = mysqli_fetch_assoc($sql_tr);

    ?>
    
        <div id="modal_show" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Upload Cover</font></h4>
            </div>
            <form class="form-horizontal" action="upload.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                      <input type="text" class="form-control" name="id" id="id" value="<?php echo $data2['Id']; ?>" hidden>

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
      
    <script type="text/javascript">
      $(document).ready(function(){
        $('#modal_show').modal('show');
      });

      function dismiss(){
        $('#modal_show').modal('hide');
      }
    </script>
  <?php } 

  elseif($modal=='lihat_foto2')
  { 
    $Id = $_GET['Id'];
    ?>
    <div id="modal_show" class="modal fade" role="dialog">
      <div class="modal-dialog modal-md">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header bg-danger">
            <h4 class="modal-title"><i class="fas fa-trash"></i> Hapus </h4>
            <button type="button" class="close btn-default btn-sm" style="color: white;" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="fas fa-times"></span>
            </button>
          </div>

          <form action="hapus.php" method="POST">
            <div class="modal-body">
              <div class="card card-info">
                <div class="card-body">
                  <center>

                    Anda Yakin Akan Menghapus Data ini, [Id : <?php echo $Id; ?>] ?
                    <input type="hidden" name="id" value="<?php echo $Id; ?>">
                  </center>
                </div>
                <div class="modal-footer justify-content-between" style="background-color: #e5eaf0;">
                  <button type="button" onclick="dismiss()" class="btn btn-default"><i class="fas fa-times"></i></button>
                  <!-- <a href="hapus.php?id=<?php echo $Id; ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a> -->
                  <button type="submit" name="hapus" class="btn btn-danger swalDefaultDanger"> <i class="fas fa-trash"></i> Hapus</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#modal_show').modal('show');
      });

      function dismiss(){
        $('#modal_show').modal('hide');
      }
    </script>
    <?php 
  } 

  elseif($modal=='edit_modal')
  {
    $Id = $_GET['Id'];
    $sql_tr= mysqli_query($con, "SELECT * FROM tb_buku WHERE Id='$Id'  ") or die (mysqli_error($con));
    $data2 = mysqli_fetch_assoc($sql_tr);   
    // $tgl = $data2['tgl'];
    // $jenis = $data2['jenis'];



    ?>
              
          <div id="modal_show" class="modal fade" role="dialog" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#<?php echo $warna2; ?>;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Edit Data Buku</font></h4>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="peranan" enctype="multipart/form-data">
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                          <input type="hidden" class="form-control" name="id" id="id" value="<?=$data2['Id']; ?>" >
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Judul Buku </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="judul_buku" id="judul_buku" placeholder="Judul Buku" value="<?=$data2['judul_buku']; ?>" autofocus required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Penulis Buku </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="penulis_buku" id="penulis_buku" placeholder="Nama Penulis Buku" value="<?=$data2['penulis_buku']; ?>" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">ISBN  </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="isbn" id="isbn" placeholder="ISBN" value="<?=$data2['isbn']; ?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 control-label">Link </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="link" id="link" placeholder="Link" value="<?=$data2['link']; ?>">
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <label for="inputEmail3" class="col-sm-12 control-label">Sinopsis Buku </label> 
                          <textarea class="form-control" rows="4" name="sinopsis" id="sinopsis" placeholder="Sinopsis Buku ..." required><?=$data2['sinopsis']; ?></textarea>
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

       
    <script type="text/javascript">
      $(document).ready(function(){
        $('#modal_show').modal('show');
      });

      function dismiss(){
        $('#modal_show').modal('hide');
      }
    </script>
<?php
  } 
}?>
