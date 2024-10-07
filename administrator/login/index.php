<?php
 require_once "../../config.php";
 session_start();
                        if (isset($_SESSION['username'])) {
                          echo "<script>window.location='../dashboard/index.php';</script>";
                      } else {
                          if (isset($_POST['login'])) {
                              $username = trim(mysqli_real_escape_string($con, $_POST['username']));
                              $kata_sandi = sha1(sha1(trim(mysqli_real_escape_string($con, $_POST['kata_sandi']))));
                      
                              $sql_login = mysqli_query($con, "SELECT * FROM tb_petugas WHERE username = '$username' AND password = '$kata_sandi'") or die(mysqli_error($con));
                      
                              if (mysqli_num_rows($sql_login) > 0) {
                                  $datanya = mysqli_fetch_assoc($sql_login);
                                  if ($datanya['status'] == "Admin") {
                                      $_SESSION['username'] = $username;
                                      $_SESSION['id_petugas'] = $datanya['id_petugas'];
                                      $_SESSION['status'] = $datanya['status'];
                                      echo "<script>window.location='../dashboard/index.php';</script>";
                                  } else {
                                      echo "<p class='error'>Anda tidak memiliki hak akses sebagai Admin.</p>";
                                  }
                              } else {
                                  echo "<p class='error'>Username atau kata sandi salah.</p>";
                              }
                          }
                        }
                        ?>
<!DOCTYPE html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Ngawulltime.idn</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="styles/app.min.css"/>
  <!-- <link rel="shortcut icon" href="../../images/.png?>"> -->
</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signin v2 usersession">
    <div class="session-wrapper">
      <div class="session-carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active" style="background-image:url(../../images/banner-pg.png);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
           <div class="item" style="background-image:url(../../images/banner-pg.png);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
          <div class="item" style="background-image:url(../../images/banner-pg.png);background-size:cover;background-repeat: no-repeat;background-position: 50% 50%;">
          </div>
        </div>
      </div>
      <div class="card bg-white  blue no-border" style="background-color:#2F4F4F;">
        <div class="card-block">
          <form role="form" class="form-layout" action=" " method="post">
            <div class="text-center m-b">    
           

              <!-- <img src="../../../images/logo.png?>" style='width:125px; height:125px;'/> <br/> -->
              <img src="../../images/logo.png?>" style='width:300px; height:51px;'/> 
              <!-- <h4 class="text-uppercase"><font color="#ffffff">Sistem Penanganan Order</font></h4> -->
            </div>
            <div class="form-inputs p-b">
              <label class="text-uppercase"><font color="#ffffff">USERNAME</font></label>
              <input type="username" class="form-control input-lg" name="username" id="username" placeholder="Username" required autofocus> 
              <label class="text-uppercase"><font color="#ffffff">PASSWORD</font></label>
              <input type="password" class="form-control input-lg" name="kata_sandi" id="kata_sandi"  placeholder="Kata Sandi" required>
              <!-- <a href="lupapassword.php"><font color="#696969">Lupa Password?</font></a>
             --></div>
               <button class="btn btn-default btn-block btn-lg" type="submit" name= "login" style="background-color:#B8860B;"><font color="#ffffff">&nbsp<b>Login</b></font></button>
          <br>
           
          <!--   <a href="daftar.php" target="blank" class="btn btn-success btn-block btn-lg m-b">DAFTAR?</a> -->
            <center><font color="#ffffff"><small><em> Copyright &copy; Ngawulltime.idn </a></em></</small></font>
              <br/>  
           <font color="#ffffff"><?php echo date("Y"); ?></</small></font>
            </center>
          </form>
          
        </div>
      </div>
      <div class="push"></div>
    </div>
  </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="scripts/app.min.js"></script>
</body>

</html>