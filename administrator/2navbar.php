 <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#DCDCDC;"> 
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index.php" class="nav-link">Home</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a> -->
        <!-- <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div> -->
      </li>
      <ul class="navbar-nav ml-auto">       
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <font color="#000000"><i class="fas fa-user-circle"></i> &nbsp Welcome ,  <?=$_SESSION['username'];?> &nbsp <i class="fas fa-chevron-down"></i></font>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="dropdown-divider"></div>
            <a href="../gantipass/" class="dropdown-item">
              <i class="fas fa-lock mr-2"></i> Ganti Password
            </a>
            <!-- <div class="dropdown-divider"></div>
            <a href="../download.php?filename=Manual Book Landing Page Pena Persada.pdf" class="dropdown-item">
              <i class="fas fa-book mr-2"></i> Manual Book
            </a> -->
            <!-- <button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal-reset" data-id="2" >
              <i class="fas fa-lock mr-2"></i> Ganti Password</button> -->
            
            <div class="dropdown-divider"></div>
           <!--  <a href="../../../administrator/" class="dropdown-item"> -->
             <a href="../login/logout.php" class="dropdown-item">
              <i class="fas fa-sign-out-alt mr-2"></i> Keluar
            </a>
          </div>
          </li>
        </ul>
     
    </ul>
  </nav>

      
      <div class="modal fade" id="modal-reset" >
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header" style="background-color:#001f3f;">
              <h4 class="modal-title"><font color="#ffffff"><i class="fas fa-lock"></i> Ganti Password</font></h4>
            </div>
            <form class="form-horizontal" action="edit.php" method="POST" id="peranan" >
              <div class="modal-body" >
                <div class="col-md-12">                
                  <div class="card card-info">                
                    <div class="card-body" class="bootstrap-timepicker">

                          <input type="text" class="form-control" name="id" id="id" >
                     
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-12 control-label">Username </label>
                        <div class="col-sm-12">
                          <input type="text" class="form-control" name="username" id="username" hidden>
                          <input type="text" class="form-control" name="username" id="username" disabled>
                        </div>
                      </div>
                      

                    </div>
                    <div class="modal-footer justify-content-between" style="background-color:#e5eaf0;">
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <button type="submit" name="edit" class="btn btn-secondary swalDefaultSuccess" style="background-color:#001f3f"><i class="fas fa-lock"></i> Update</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.modal -->

