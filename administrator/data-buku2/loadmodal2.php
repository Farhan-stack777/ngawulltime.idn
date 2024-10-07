<?php 
require_once "../database/config.php";
if(isset($_GET['modal']))
{
  $modal = $_GET['modal'];
  if($modal=='tambah_data')
  { 
    ?>
    <div class="modal fade" id="modal_show" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#001f3f;">
            <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Transaksi secara 4Javascript</font></h4>
          </div>
          <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
            <div class="modal-body" >
              <div class="col-md-12">                
                <div class="card card-info">                
                  <div class="card-body" class="bootstrap-timepicker">
                    <div class="row">

                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Jenis Transaksi </label>                     
                          <select class="form-control input-lg-12" name="jenis" id="jenis"  onchange="displayResult(this)" required> 
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                            <option value="Penyesuaian">Penyesuaian</option>
                            <option value="Penyesuaian" >Kas Pegangan</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Tanggal</label>                       
                          <input type="date" class="form-control" name="tgl" id="tgl" required>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Akun Debit </label>                       
                          <select class="form-control input-lg-12" name="debit" id="debit"  required> 
                            <option value="">-- Pilih Akun --</option>
                            <?php
                            $prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");
                            while($hasil = mysqli_fetch_array($prov))
                            {
                              echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Akun Kredit </label>                        
                          <select class="form-control input-lg-12" name="kredit" id="kredit"  required> 
                            <option value="">-- Pilih Akun --</option>
                            <?php
                            $prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");
                            while($hasil = mysqli_fetch_array($prov))
                            {
                              echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Nominal </label>                        
                          <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Rp 0 " >
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <!-- <label class="col-sm-12 control-label">Catatan </label> -->
                          <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Masukkan catatan transaksi" required></textarea>
                        </div>
                      </div>   

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="tambah" class="btn btn-secondary swalDefaultSuccess" style="background-color:#001f3f"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-java11" >
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#001f3f;">
            <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Transaksi11</font></h4>
          </div>
          <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
            <div class="modal-body" >
              <div class="col-md-12">                
                <div class="card card-info">                
                  <div class="card-body" class="bootstrap-timepicker">
                    <div class="row">


                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Jenis Transaksi </label>                     
                          <select class="form-control input-lg-12" name="jenis" id="jenis"  onchange="displayResult(this)" required> 
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Pemasukan" selected>Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                            <option value="Penyesuaian">Penyesuaian</option>
                            <option value="Penyesuaian">Kas Pegangan</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Tanggal</label>                       
                          <input type="date" class="form-control" name="tgl" id="tgl" value="<?=$now; ?>" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Akun Debit </label>                       
                          <select class="form-control input-lg-12" name="debit" id="debit"  required> 
                            <option value="">-- Pilih Akun --</option>
                            <?php
                            $prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");
                            while($hasil = mysqli_fetch_array($prov))
                            {
                              if($hasil['nama_akun']=='Bank Mandiri')
                              {
                                echo "<option value='$hasil[kode]' selected>$hasil[kode] - $hasil[nama_akun]</option>";
                              } else {
                                echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Akun Kredit </label>                        
                          <select class="form-control input-lg-12" name="kredit" id="kredit"  required> 
                            <option value="">-- Pilih Akun --</option>
                            <?php
                            $prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");
                            while($hasil = mysqli_fetch_array($prov))
                            {
                              echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Nominal </label>                        
                          <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Rp 0 " >
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <!-- <label class="col-sm-12 control-label">Catatan </label> -->
                          <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Masukkan catatan transaksi" required></textarea>
                        </div>
                      </div>   

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="tambah" class="btn btn-secondary swalDefaultSuccess" style="background-color:#001f3f"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-java22" >
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#001f3f;">
            <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Transaksi22</font></h4>
          </div>
          <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
            <div class="modal-body" >
              <div class="col-md-12">                
                <div class="card card-info">                
                  <div class="card-body" class="bootstrap-timepicker">
                    <div class="row">


                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Jenis Transaksi </label>                     
                          <select class="form-control input-lg-12" name="jenis" id="jenis" onchange="displayResult(this)" required > 
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran" selected>Pengeluaran</option>
                            <option value="Penyesuaian">Penyesuaian</option>
                            <option value="Penyesuaian" >Kas Pegangan</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Tanggal</label>                       
                          <input type="date" class="form-control" name="tgl" id="tgl" value="<?=$now; ?>" required>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Akun Debit </label>                       
                          <select class="form-control input-lg-12" name="debit" id="debit"  required> 
                            <option value="">-- Pilih Akun --</option>
                            <?php
                            $prov = mysqli_query($con,"SELECT * FROM tb_akun WHERE (kode BETWEEN 1000 AND 3999) OR (kode BETWEEN 5000 AND 7000)  ORDER BY kode ASC");
                            while($hasil = mysqli_fetch_array($prov))
                            {
                              echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Akun Kredit </label>                        
                          <select class="form-control input-lg-12" name="kredit" id="kredit"  required> 
                            <option value="">-- Pilih Akun --</option>
                            <?php
                            $prov = mysqli_query($con,"SELECT * FROM tb_akun WHERE (kode BETWEEN 1000 AND 4999) OR (kode BETWEEN 6000 AND 7000) ORDER BY kode ASC");
                            while($hasil = mysqli_fetch_array($prov))
                            {
                              if($hasil['nama_akun']=='Bank Mandiri')
                              {
                                echo "<option value='$hasil[kode]' selected>$hasil[kode] - $hasil[nama_akun]</option>";
                              } else {
                                echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Nominal </label>                        
                          <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Rp 0 " >
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <!-- <label class="col-sm-12 control-label">Catatan </label> -->
                          <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Masukkan catatan transaksi" required></textarea>
                        </div>
                      </div>   

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="tambah" class="btn btn-secondary swalDefaultSuccess" style="background-color:#001f3f"><i class="fas fa-plus"></i> Tambah</button>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-java33" >
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#001f3f;">
            <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Transaksi33</font></h4>
          </div>
          <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
            <div class="modal-body" >
              <div class="col-md-12">                
                <div class="card card-info">                
                  <div class="card-body" class="bootstrap-timepicker">
                    <div class="row">


                      <div class="col-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Jenis Transaksi </label>
                          <select class="form-control input-lg-12" name="jenis" id="jenis" onchange="displayResult(this)" required > 
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Pemasukan">Pemasukan</option>
                            <option value="Pengeluaran">Pengeluaran</option>
                            <option value="Penyesuaian" selected>Penyesuaian</option>
                            <option value="Penyesuaian" >Kas Pegangan</option>
                          </select>
                        </div>
                      </div>

<div class="col-sm-6">
<div class="form-group ">
<label class="col-sm-12 control-label">Tanggal</label>
<input type="date" class="form-control" name="tgl" id="tgl" required>
</div>
</div>
<div class="col-sm-12">
<div class="form-group ">
<label class="col-sm-12 control-label">Akun Debit </label>                       
<select class="form-control input-lg-12" name="debit" id="debit"  required> 
<option value="">-- Pilih Akun --</option>
<?php
$prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");
while($hasil = mysqli_fetch_array($prov))
{
echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
}
?>
</select>
</div>
</div>
<div class="col-sm-12">
<div class="form-group ">
<label class="col-sm-12 control-label">Akun Kredit </label>                        
<select class="form-control input-lg-12" name="kredit" id="kredit"  required> 
<option value="">-- Pilih Akun --</option>
<?php
$prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");
while($hasil = mysqli_fetch_array($prov))
{
echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
}
?>
</select>
</div>
</div>
<div class="col-sm-12">
<div class="form-group ">
<label class="col-sm-12 control-label">Nominal </label>
<input type="text" class="form-control" name="nominal" id="nominal" placeholder="Rp 0 " required>
</div>
</div>
<div class="col-sm-12">
<div class="form-group">
<textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Masukkan catatan transaksi" required></textarea>
</div>
</div>       

                      <!-- <div class="col-6">
                        <div class="form-group ">
                          <label for="inputEmail3" class="col-sm-12 control-label">Tanggal</label>
                          <input type="date" class="form-control" name="tgl" id="tgl" >
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group">
                          <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Masukkan catatan transaksi" required></textarea>
                        </div>
                      </div>   
                       
                          <div class="col-1 mr-3" >                              
                            <button type="button" class="btn btn-primary " id="tombol"><i class="fas fa-plus" ></i></a>
                            </div>
                            <div class="col-4 col-sm-4">
                              <div class="form-group " align="center" >
                                <label  class="col-sm-12 control-label" id="akunx">Akun </label>
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Debit </label>
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Kredit </label> 
                              </div>
                            </div>

                              <div class="col-1  mr-3" >                              
                                <a href="aksi.php?id=<?=$data['Id'];?>" class="btn btn-danger "><i class="fas fa-trash"></i></a>
                              </div>
                              <div class="col-4 col-sm-4" align="left">
                                <div class="form-group ">                        
                                  <select class="form-control input-lg-12" name="id_akun<?=$d;?>" required> 
                                    <option value="">-- Pilih Akun --</option>
                                    <?php
                                    $prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");
                                    while($hasil = mysqli_fetch_array($prov))
                                    {
                                      echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="form-group " >                        
                                  <input type="text" class="form-control" name="debit<?=$d;?>" placeholder="Rp 0 " value="0" required>
                                </div>
                              </div>
                              <div class="col-3">
                                <div class="form-group ">                      
                                  <input type="text" class="form-control" name="kredit<?=$d;?>" placeholder="Rp 0 " value="0" required>
                                </div>
                              </div> -->

                           </div>
                           <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                            <button type="submit" name="tambah" class="btn btn-secondary swalDefaultSuccess" style="background-color:#001f3f"><i class="fas fa-plus"></i> Tambah</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.modal -->

          <div class="modal fade" id="modal-java44" >
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header" style="background-color:#001f3f;">
                  <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-clipboard"></i> Tambah Transaksi44</font></h4>
                </div>
                <form class="form-horizontal" action="tambah.php" method="POST" id="peranan" enctype="multipart/form-data">
                  <div class="modal-body" >
                    <div class="col-md-12">                
                      <div class="card card-info">                
                        <div class="card-body" class="bootstrap-timepicker">
                          <div class="row">


                            <div class="col-sm-6">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Jenis Transaksi </label>                     
                                <select class="form-control input-lg-12" name="jenis" id="jenis" onchange="displayResult(this)" required > 
                                  <option value="">-- Pilih Jenis --</option>
                                  <option value="Pemasukan">Pemasukan</option>
                                  <option value="Pengeluaran">Pengeluaran</option>
                                  <option value="Penyesuaian">Penyesuaian</option>
                                  <option value="Penyesuaian" selected>Kas Pegangan</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Tanggal</label>                       
                                <input type="date" class="form-control" name="tgl" id="tgl" value="<?=$now; ?>" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Akun Debit </label>
                                <select class="form-control input-lg-12" name="debit" id="debit"  required> 
                                  <option value="">-- Pilih Akun --</option>
                                  <?php
                                  $prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");
                                  while($hasil = mysqli_fetch_array($prov))
                                  {
                                    if($hasil['kode']=='1101')
                                    {
                                      echo "<option value='$hasil[kode]' selected>$hasil[kode] - $hasil[nama_akun]</option>";
                                    } else {
                                      echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Akun Kredit </label>
                                <select class="form-control input-lg-12" name="kredit" id="kredit"  required> 
                                  <option value="">-- Pilih Akun --</option>
                                  <?php
                                  $prov = mysqli_query($con,"SELECT * FROM tb_akun ORDER BY kode ASC");
                                  while($hasil = mysqli_fetch_array($prov))
                                  {
                                    if($hasil['kode']=='1102')
                                    {
                                      echo "<option value='$hasil[kode]' selected>$hasil[kode] - $hasil[nama_akun]</option>";
                                    } else {
                                      echo "<option value='$hasil[kode]'>$hasil[kode] - $hasil[nama_akun]</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group ">
                                <label for="inputEmail3" class="col-sm-12 control-label">Nominal </label>
                                <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Rp 0 " >
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <!-- <label class="col-sm-12 control-label">Catatan </label> -->
                                <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Masukkan catatan transaksi" required>Penarikan ATM untuk kas pegangan</textarea>
                              </div>
                            </div>   

                          </div>
                          <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                            <button type="submit" name="tambah" class="btn btn-secondary swalDefaultSuccess" style="background-color:#001f3f"><i class="fas fa-plus"></i> Tambah</button>
                          </div>

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
          function displayResult(selTag){
            const x=selTag.options[selTag.selectedIndex].text;
            const terpilih0 = document.getElementById("modal_show");
            const terpilih1 = document.getElementById("modal-java11");
            const terpilih2 = document.getElementById("modal-java22");
            const terpilih3 = document.getElementById("modal-java33");
            const terpilih4 = document.getElementById("modal-java44");
// const terpilih9 = document.getElementById("pengganti");  
if(x=='Pemasukan')
{
  terpilih0.innerHTML= terpilih1.innerHTML ;
}
else if(x=='Pengeluaran')
{
  terpilih0.innerHTML= terpilih2.innerHTML;
}
else if(x=='Penyesuaian')
{
  terpilih0.innerHTML= terpilih3.innerHTML;
}
else if(x=='Kas Pegangan')
{
  terpilih0.innerHTML= terpilih4.innerHTML;
}
else
{
  const k = document.getElementById("pilih");
  k.style.backgroundColor = 'red';
}

}
</script>
          <script type="text/javascript">
            $(document).ready(function(){
              $('#modal_show').modal('show');
            });

            function dismiss(){
              $('#modal_show').modal('hide');
            }
          </script>
        <?php } } ?>

        



