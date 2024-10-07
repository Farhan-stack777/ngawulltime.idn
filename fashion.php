<?php
session_start();
include 'config.php';

// Proses pengalihan metode pembayaran jika formulir disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payment_method = $_POST['payment_method'];

    // Ambil data dari tb_tshirt
    $sql_tshirt = "SELECT * FROM tb_tshirt ORDER BY judul DESC";
    $result_tshirt = $con->query($sql_tshirt);

    // Ambil data dari tb_pants
    $sql_pants = "SELECT * FROM tb_pants ORDER BY judul DESC";
    $result_pants = $con->query($sql_pants);

    // Ambil data dari tb_has
    $sql_has = "SELECT * FROM tb_has ORDER BY judul DESC";
    $result_has = $con->query($sql_has);

    // Buat array untuk menyimpan link
    $payment_links = array();
    
    // Masukkan link dari tb_tshirt
    if ($result_tshirt->num_rows > 0) {
        while($row = $result_tshirt->fetch_assoc()) {
            $payment_links['shope'] = $row['link']; // Asumsikan link sudah benar
        }
    }

    // Masukkan link dari tb_pants
    if ($result_pants->num_rows > 0) {
        while($row = $result_pants->fetch_assoc()) {
            if (!isset($payment_links['shope'])) {
                $payment_links['shope'] = $row['link']; // Override jika belum ada
            }
        }
    }

    // Masukkan link dari tb_has
    if ($result_has->num_rows > 0) {
        while($row = $result_has->fetch_assoc()) {
            if (!isset($payment_links['shope'])) {
                $payment_links['shope'] = $row['link']; // Override jika belum ada
            }
        }
    }

    // Tambahkan link lainnya
    $payment_links['dana'] = 'https://www.example.com/dana-payment';
    $payment_links['paypal'] = 'https://www.example.com/paypal';

    // Redirect sesuai metode pembayaran
    if (array_key_exists($payment_method, $payment_links)) {
        $redirect_url = $payment_links[$payment_method];
        
        // Debugging: Output URL sebelum pengalihan
        echo 'Redirecting to: ' . htmlspecialchars($redirect_url);
        
        header('Location: ' . $redirect_url);
        exit();
    } else {
        echo 'Metode pembayaran tidak dikenal.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Ngawulltime.idn</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      
   </head>
   <!-- body -->
   <body class="main-layout footer_to90 fashion_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <style>
    .buy-button {
        background-color: #007bff; /* Warna biru */
        color: white; /* Warna teks putih */
        padding: 10px 20px; /* Padding tombol */
        border: none; /* Hapus border default */
        border-radius: 5px; /* Membuat sudut tombol bulat */
        text-decoration: none; /* Hapus garis bawah */
        display: inline-block; /* Agar tombol tetap dalam satu baris */
        text-align: center; /* Teks tombol berada di tengah */
        font-size: 16px; /* Ukuran font tombol */
    }

    .buy-button:hover {
        background-color: #0056b3; /* Warna biru gelap saat hover */
        text-decoration: none; /* Menghindari garis bawah saat hover */
    }

    .buy-button:active {
        background-color: #004080; /* Warna biru lebih gelap saat tombol diklik */
    }
</style>

      <!-- header -->
      <?php 
            include "sisi_atas.php";
            ?>
            <div class="header_midil">
               <div class="container">
                  <div class="row d_flex">
                     <div class="col-md-4">
                        <ul class="conta_icon d_none1">
                           <li><a href="#"><img src="images/email.png" alt="#"/> Ngawulltime.idn@gmail.com</a> </li>
                        </ul>
                     </div>
                     <div class="col-md-4">
                        <a class="logo" href="#"><img src="images/logo.png" alt="#"/></a>
                     </div>
                     <div class="col-md-4">
                        <ul class="right_icon d_none1">
                           <li><a href="#"><img src="images/shopping.png" alt="#"/></a> </li>
                           <a href="#" class="order">Order Now</a> 
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="header_bottom">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                    <a class="nav-link" href="web.php"><br>Home<br><br></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="about.php"><br>About<br><br></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="products.php">Sneakers <br>
                                    and Bagpack</a>
                                 </li>
                                 <li class="nav-item active">
                                    <a class="nav-link" href="fashion.php"><br>Fashion<br><br></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="news.php"><br>News<br><br></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="contact.php"><br>Contact Us<br></a>
                                 </li>
                              </ul>
                           </div>
                        </nav>
                     </div>
                     <div class="col-md-4">
                        <div class="search">
                           <form action="/action_page.php">
                              <br><input class="form_sea" type="text" placeholder="Search" name="search">
                              <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button><br>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
         </div>
      </header>
      <!-- end header inner -->
      
      <!-- fashion section -->
      <div class="fashion">
         <img src="images/fashion.jpg" alt="#"/>
      </div>
      <!-- end fashion section -->

      <div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>T-shirt</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div id="project" class="project">
         <div class="container">
            <div class="row">
            <div class="product_main">
            <?php
                    // Ambil data dari database
                    $sql = "SELECT * FROM tb_tshirt ORDER BY judul DESC";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data dari setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="project_box ">
                                    <div class="dark_white_bg" ><img src="images/' . htmlspecialchars($row['gambar']) . '" alt="Image"></div>
                                    <h3>' . htmlspecialchars($row['judul']) . '</h3>
                                    <h4>' . htmlspecialchars($row['harga']) . '</h4>
                                    <a href="#payment-modal" data-toggle="modal" class="buy-button">Buy Now</a>
                                  </div>';
                        }
                    } else {
                        echo '<div class="project_box ">Tidak ada data di temukan</div>';
                    }
                    ?>
               </div>
            </div>
         </div>
      </div>

      <div id="payment-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Metode Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="fashion.php" method="post">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="shope" id="shope" required>
                        <label class="form-check-label" for="shope">
                            Shopee
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="dana" id="dana" required>
                        <label class="form-check-label" for="dana">
                            Dana
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" value="paypal" id="paypal" required>
                        <label class="form-check-label" for="paypal">
                            PayPal
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


      <div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Hoodie and Sweater</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div id="project" class="project">
         <div class="container">
            <div class="row">
            <div class="product_main">
            <?php
                    // Ambil data dari database
                    $sql = "SELECT * FROM tb_has ORDER BY judul DESC";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data dari setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="project_box ">
                                    <div class="dark_white_bg" ><img src="images/' . htmlspecialchars($row['gambar']) . '" alt="Image"></div>
                                    <h3>' . htmlspecialchars($row['judul']) . '</h3>
                                    <h4>' . htmlspecialchars($row['harga']) . '</h4>
                                    <a href="#payment-modal" data-toggle="modal" class="buy-button">Buy Now</a>
                                  </div>';
                        }
                    } else {
                        echo '<div class="project_box ">Tidak ada data di temukan</div>';
                    }
                    ?>
               </div>
            </div>
         </div>
      </div>

      <div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Pants</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div id="project" class="project">
         <div class="container">
            <div class="row">
            <div class="product_main">
            <?php
                    // Ambil data dari database
                    $sql = "SELECT * FROM tb_pants ORDER BY judul DESC";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data dari setiap baris
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="project_box ">
                                    <div class="dark_white_bg" ><img src="images/' . htmlspecialchars($row['gambar']) . '" alt="Image"></div>
                                    <h3>' . htmlspecialchars($row['judul']) . '</h3>
                                    <h4>' . htmlspecialchars($row['harga']) . '</h4>
                                    <a href="#payment-modal" data-toggle="modal" class="buy-button">Buy Now</a>
                                  </div>';
                        }
                    } else {
                        echo '<div class="project_box ">Tidak ada data di temukan</div>';
                    }
                    ?>
               </div>
            </div>

         <center><div class="col-md-12">
                     <a class="read_more" href="#">See More</a>
         </center></div>
         </div>
            </div>
      <!--  footer -->
      <?php 
            include "sisi_bawah.php";
            ?>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>

