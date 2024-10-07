<?php 
require_once "database/config.php";
if(isset($_GET['modal']))
{
  $modal = $_GET['modal'];

  if($modal=='lihat_foto')
  { 
    $Id = $_GET['Id'];
    ?>
    <div id="modal_show" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header bg-navi">
            <h4 class="modal-title"><i class="fas fa-database"></i> Foto</h4>
            <button type="button" class="close btn-default btn-sm" style="color: white;" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true" class="fas fa-times"></span>
            </button>
          </div>
          <div class="modal-body">
            <div class="card card-info">
              <div class="card-body">
                <center>
                  <?php
                  $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_produk WHERE Id='$Id' "));
                  ?>
                  <?php if($data['foto'] != '' && file_exists('img/produk/'.$data['foto'])){ ?>
                    <img src="img/produk/<?= $data['foto'] ?>" style="width:175px; height:200px;">
                  <?php } else { ?>
                    <img src="assets/img/noimage.jpg" style="width:175px; height:200px;">
                  <?php } ?>
                </center>
              </div>
              <div class="modal-footer justify-content-between" style="background-color: #e5eaf0;">
                <button type="button" onclick="dismiss()" class="btn btn-default"><i class="fas fa-times"></i></button>
              </div>
            </div>
          </div>
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
<?php } } ?>