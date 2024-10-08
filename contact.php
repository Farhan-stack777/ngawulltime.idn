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
   <body class="main-layout footer_to90 contact_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
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
                                    <a class="nav-link" href="index.php"><br>Home<br><br></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="about.php"><br>About<br><br></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="products.php">Sneakers <br>
                                    and Bagpack</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="fashion.php"><br>Fashion<br><br></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="news.php"><br>News<br><br></a>
                                 </li>
                                 <li class="nav-item active">
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
      <!-- end header -->
      <!-- banner -->
      <div class="blue_bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section -->
      <div id="contact" class="contact">
         <div class="con_bg">
            <div class="container">
               <div class="row">
                  <div class="col-md-10 offset-md-1">
                     <form id="request" class="main_form">
                        <div class="row">
                           <div class="col-md-6 col-sm-6">
                           <form action="../user/tambah.php" method="post">
                              <input class="contactus" placeholder="Name" type="text" name="nama"> 
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="Password" type="text" name="password">                          
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="Email" type="text" name="email">                          
                           </div>
                           <div class="col-md-6 col-sm-6">
                              <input class="contactus" placeholder="Telepon" type="text" name="telepon"> 
                           </div>
                           <div class="col-md-12">
                              <input class="contactusmess" placeholder="Alamat" type="text" name="alamat">
                           </div>
                           <div class="col-md-12">
                              <button class="send_btn" type="submit">Send</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end contact section -->
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

