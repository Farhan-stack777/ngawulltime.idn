<?php
include 'config.php';
?>
<footer>
        <div class="footer">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4 footer-links">
                        <div class="inror_box">
                            <img src="images/logo.png" width="193" height="35" alt="Logo">
                            <?php
                              $sql = "SELECT * FROM tb_sisi_bawah ORDER BY judul DESC";
                              $result = $con->query($sql);

                              if ($result->num_rows > 0) {
                              while ($row = $result->fetch_assoc()) {
                            echo '<p>' . htmlspecialchars($row['deskripsi']) . '</p>';
                              }
                           }?>
                        </div>
                    </div>
                    <div class="col-md-4 footer-links">
                        <h3>KONTAK ADMIN</h3>
                        <?php
                        $sql_layanan = mysqli_query($con, "SELECT * FROM tb_cs WHERE status ='1'") or die(mysqli_error($con));
                        if (mysqli_num_rows($sql_layanan) > 0) {
                            while ($data_layanan = mysqli_fetch_assoc($sql_layanan)) {
                                echo '<b>Admin ' . htmlspecialchars($data_layanan['nama']) . '</b><br>
                                <img src="administrator/sisi_bawah/img/Logo WA Vector.png" width="48" height="36" alt="WhatsApp">
                                <a href="https://api.whatsapp.com/send?phone=+62' . htmlspecialchars($data_layanan['kontak']) . '&text=Halo kak ' . htmlspecialchars($data_layanan['nama']) . ', dengan admin PT Pena Persada Kerta Utama ya?. saya mau menerbitkan buku. Bagaimana detailnya. mohon infonya ya..." target="_blank" style="color: white;">
                                    <b>' . htmlspecialchars($data_layanan['kontak']) . '</b>
                                </a><br><br>';
                            }
                        }
                        ?>
                    </div>
                    <div class="col-md-4 footer-links">
                        <h3>ALAMAT TOKO</h3>
                        <p>
                            Jl Suramnggala Rt 3 Rw 4,Ds Ciputih,<br>
                            Kecamatan Salem, Kabupaten Brebes,Jawa Tengah<br>
                            ,Indonesia.<br>
                        </p>
                        <div class="social-icons">
                            <a href="https://www.instagram.com/">
                                <img src="administrator/sisi_bawah/instagram.png" width="40" height="40" alt="Instagram">
                            </a>
                            <a href="https://shp.ee/">
                                <img src="administrator/sisi_bawah/shopee.png" width="40" height="40" alt="Shopee">
                            </a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="copyright">
                    <p>Copy Right . © 2022 Ngawulltime.idn</p>
                </div>
            </div>
        </div>
    </footer>
