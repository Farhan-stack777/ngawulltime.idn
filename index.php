<?php
session_start();
include 'config.php';
$news_items = [1, 2, 3];
$query = "SELECT * FROM tb_home WHERE id='1'";
$result = mysqli_query($con, $query);
$home = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ngawulltime.idn</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

    <style>

        .footer {
            background-color: #2f4f4f; /* Ubah warna latar belakang footer */
            color: white;
            padding: 40px 0;
        }

        .footer-links {
            margin: 20px 0;
            text-align: center;
        }

        .footer img {
            margin-bottom: 10px;
        }

        h3 {
            font-size: 20px;
            margin-bottom: 15px;
            color: white; /* Mengubah warna teks menjadi putih */
        }

        p {
            font-size: 14px;
            line-height: 1.5;
            color: white; /* Mengubah warna teks menjadi putih */
        }

        .copyright {
            text-align: center;
            margin-top: 40px; /* Increased margin-top for more space */
            margin-bottom: 20px; /* Added margin-bottom for better spacing */
            color: white; /* Mengubah warna teks menjadi putih */
        }

        .social-icons {
            margin-top: 10px;
        }

        .social-icons img {
            margin: 0 10px;
        }

        .three_box {
            margin-bottom: 60px; /* Add margin to the bottom */
        }

        .six_probpx {
            background-color: #2f4f4f; /* Mengubah warna latar belakang kotak kategori */
        }

        /* Ubah warna link biru di elemen lain menjadi #2f4f4f */
        a {
            color: #2f4f4f; /* Mengubah warna teks link */
        }

        a:hover {
            color: #1f3030; /* Warna saat hover */
        }

        /* Pastikan semua elemen lain yang bisa berwarna biru juga diubah */
        .bluedark_bg {
            background-color: #2f4f4f !important; /* Pastikan elemen dengan class ini diubah */
        }

        .yellow_bg {
            background-color: #FFD700; /* Jika ada elemen lain yang perlu diubah warna */
        }
    </style>
</head>
<body class="main-layout">
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>

    <?php include "sisi_atas.php"; ?>

    <div class="header_midil">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-4">
                    <ul class="conta_icon d_none1">
                        <li><a href="#"><img src="images/email.png" alt="#"/> Ngawulltime.idn@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <a class="logo" href="#"><img src="images/logo.png" alt="#"/></a>
                </div>
                <div class="col-md-4">
                    <ul class="right_icon d_none1">
                        <li><a href="#"><img src="images/shopping.png" alt="#"/></a></li>
                        <a href="#" class="order">Pesan sekarang!</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <nav class="navigation navbar navbar-expand-md navbar-dark">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="index.php"><br>Home<br><br></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php"><br>About<br><br></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="products.php">Sneakers <br>and Bagpack</a>
                                </li>
                                <li class="nav-item">
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
                            <input class="form_sea" type="text" placeholder="Search" name="search">
                            <button type="submit" class="seach_icon"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="banner_main">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="text-bg">
                        <h1><span class="blodark"> Hanss.cloid </span><br>Since 2022</h1>
                        <p>A huge fashion collection for cloth and thrift. </p>
                        <a class="read_more" href="products.php">Buy now!</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ban_img">
                        <figure><img src="<?php echo "images/" . $home['gambar']; ?>" alt="Login Image"></figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="six_box">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-4 pa_left"><div class="six_probpx"><span>Sepatu</span></div></div>
                <div class="col-md-2 col-sm-4 pa_left"><div class="six_probpx bluedark_bg"><span>Tas</span></div></div>
                <div class="col-md-2 col-sm-4 pa_left"><div class="six_probpx"><span>Celana</span></div></div>
                <div class="col-md-2 col-sm-4 pa_left"><div class="six_probpx bluedark_bg"><span>Jaket</span></div></div>
                <div class="col-md-2 col-sm-4 pa_left"><div class="six_probpx"><span>Kaos</span></div></div>
                <div class="col-md-2 col-sm-4 pa_left"><div class="six_probpx bluedark_bg"><span>Koleksi</span></div></div>
            </div>
        </div>
    </div>

    <div class="fashion">
        <img src="images/fashion.jpg" alt="#"/>
    </div>

    <div class="news">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>The power of past experience</h2>
                    </div>
                </div>
            </div>
            <?php foreach ($news_items as $id): ?>
                <?php 
                $query = mysqli_query($con, "SELECT * FROM tb_news WHERE id='$id' ") or die(mysqli_error($con));
                $data = mysqli_fetch_assoc($query);
                ?>
                <div class="row">
                    <div class="container" data-aos="fade-up">
                        <div class="row align-items-center">
                            <div class="col-lg-4 col-md-5">
                                <div class="news_img">
                                    <figure><img src="images/<?php echo $data['gambar']; ?>" alt="Image" class="img-fluid" style="max-width: 100%; height: auto;"></figure>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7">
                                <div class="news_description">
                                    <?php echo $data['deskripsi']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php endforeach; ?>
        </div>
    </div>

    <div class="newslatter">
        <div class="container">
            <div class="row d_flex">
                <div class="col-md-5">
                    <h3 class="neslatter">Garansi dua kali lipat jika produk tidak original dan tidak berkualitas.</h3>
                </div>
                <div class="col-md-7">
                    <form class="news_form">
                        <input class="letter_form" placeholder="Send number phone" type="text" name="Enter your email"><button class="sumbit">Send kuy!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="three_box">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gift_box">
                        <i><img src="images/icon_mony.png"></i>
                        <span>Uang Kembali</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gift_box">
                        <i><img src="images/icon_gift.png"></i>
                        <span>Bonus Spesial</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gift_box">
                        <i><img src="images/icon_car.png"></i>
                        <span>Berbelanja Gratis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'sisi_bawah.php'; ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
