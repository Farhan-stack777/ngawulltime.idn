<footer id="footer" style="background-color:#00ACEE">

    <div class="footer-top" style="background-color:#fff32f">
      <div class="container" >
        <div class="row">   

          <div class="col-lg-4 col-md-6 footer-contact">
            <img src="img/penapersada.png" style='width:55px; height:55px;'/>
            <img src="img/penapersada3.png" width="193px" height="35px">
            <p align="justify"><font color="#000000">Penerbit Pena Persada adalah penerbit buku yang memfokuskan penerbitannya dalam bidang pendidikan, memberikan pelayanan yang cepat dalam respon, proses, dan hasil penerbitan serta menghasilkan terbitan buku yang tepat pasar, tepat pembaca, dan tepat harga dengan memberikan harga paling kompetitif dan terjangkau oleh seluruh generasi.
              <br/>
              <br/></font>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <center>
              <h4><i>KONTAK ADMIN KAMI</i></h4>
              <?php 
              $sql_layanan = mysqli_query($con, "SELECT * FROM tb_cs WHERE status ='1' ") or die (mysqli_error($con));
              if(mysqli_num_rows($sql_layanan)>0)
              {             
                while($data_layanan = mysqli_fetch_assoc($sql_layanan))
                {
                  ?>
                  <b>Admin <?=$data_layanan['nama'];?> </b> 
                  <br>
                  <font color="green"><img src="img/Logo WA Vector.png" width="48px" height="36"> <a href="https://api.whatsapp.com/send?phone=+62<?=$data_layanan['kontak'];?>&text=Halo kak <?=$data_layanan['nama'];?>, dengan admin PT Pena Persada Kerta Utama ya?. saya mau menerbitkan buku. Bagaimana detailnya. mohon infonya ya..." target="_blank"> <b><?=$data_layanan['kontak'];?> </b></a></font>
                  <br>
                  <br> 

                  <?php
                }
              }
              ?>                            
            </center>            
          </div>

          <div class="col-lg-4 col-md-6 footer-links">
            <h4><i>ALAMAT KANTOR</i></h4>
            <p align="justify">
              <font color="#000000">Jl. Gerilya no. 292 RT. 002 RW 002, Kelurahan Tanjung,
                Kecamatan Purwokerto Selatan, Kabupaten Banyumas,
                Jawa Tengah
                <br><br>
                Purwokerto,
                Jawa Tengah,
                Indonesia
                <br/>
                <b>(0281) 7771388  |  0857 2604 2979</b>
                <br/>
                <br/>
              </font>
              <!-- <a href="https://penapersada.com" target="_blank"><img src="img/www.png" width="40px" height="40"></a>
              &nbsp&nbsp&nbsp &nbsp&nbsp&nbsp -->
              <!-- <a href="https://www.facebook.com/pena.persada.75" target="_blank"><img src="img/facebook.png" width="40px" height="40px"></a>
              &nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp -->
              <a href="https://www.instagram.com/"><img src="instagram.png" width="40px" height="40px"></a>
              &nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp
              <a href="https://shp.ee/"><img src="shopee.png" width="40px" height="40px"></a>
              &nbsp&nbsp&nbsp  &nbsp&nbsp&nbsp
              <!-- <a href="https://www.tokopedia.com/penapersada/" target="_blank"><img src="img/tokopedia.png" width="40px" height="40px"></a> -->
            </p>
          </div>

        </div>
      </div>
    </div>
    <?php
    include 'footer1.php';
    ?>
  </footer>