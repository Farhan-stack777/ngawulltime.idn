<?php 
// Definisikan koneksi database
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Query untuk menghapus semua data dari tabel tb_pengembalian
$sql_truncate = "TRUNCATE TABLE tb_pengembalian";

// Eksekusi query TRUNCATE
if (mysqli_query($con, $sql_truncate)) {
    // Redirect ke halaman tabel jika TRUNCATE berhasil
    echo "<script>window.location='pengembalian.php';</script>";
} else {
    // Tampilkan pesan kesalahan jika terjadi kesalahan
    echo "<script>alert('Terjadi kesalahan saat menghapus data.'); window.location='pengembalian.php';</script>";
}

// Tutup koneksi
mysqli_close($con);
?>



<?php
session_start();
include '../config.php';

// Fetch the application name and image from the database
$query = "SELECT * FROM tb_pengaturan WHERE id='1'";
$result = mysqli_query($con, $query);
$pengaturan = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en"> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Ngawulltime.idn | Login Page</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE 4 | Login Page">
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"><!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="../_aset/dist/css/adminlte.css"><!--end::Required Plugin(AdminLTE)-->
</head> <!--end::Head--> <!--begin::Body-->

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="login-logo"> <a href="../index2.html"><b>Ngawulltime</b>.idn</a> </div> <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="cek.php" method="post">
                    <div class="input-group mb-3"> <input type="text" name="username" placeholder="Username">
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="password" name="password" placeholder="Password">
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div> <!--begin::Row-->
                    <div class="row">
                        
                        <center><div class="col-4">
                            <div class="d-grid gap-2"> <button type="submit" value="Login" class="btn btn-primary">Sign In</button> </div>
                        </div> <!-- /.col -->
                    </div> <!--end::Row--></center>
                </form>
                <div class="social-auth-links text-center mb-3 d-grid gap-2">
                    <p>- OR -</p> <a href="#" class="btn btn-danger"> <i class="bi bi-google me-2"></i> Sign in using Google+
                    </a>
                </div> <!-- /.social-auth-links -->
                <!-- <p class="mb-1"> <a href="forgot-password.html">I forgot my password</a> </p>
                <p class="mb-0"> <a href="register.html" class="text-center">
                        Register a new membership
                    </a> </p> -->
            </div> <!-- /.login-card-body -->
        </div>
    </div> <!-- /.login-box --> <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script> <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script> <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script> <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="../../../dist/js/adminlte.js"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
        const Default = {
            scrollbarTheme: "os-theme-light",
            scrollbarAutoHide: "leave",
            scrollbarClickScroll: true,
        };
        document.addEventListener("DOMContentLoaded", function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (
                sidebarWrapper &&
                typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script> <!--end::OverlayScrollbars Configure--> <!--end::Script-->
</body><!--end::Body-->

</html>



<?php
session_start();
include '../config.php';

// Fetch the application name and image from the database
$query = "SELECT * FROM tb_pengaturan WHERE id='1'";
$result = mysqli_query($con, $query);
$pengaturan = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo htmlspecialchars($pengaturan['nama_aplikasi']); ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .login-container button:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
        img {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2><?php echo $pengaturan['nama_aplikasi'];?></h2>
        <!-- Display dynamic image -->
        <img src="<?php echo "../berkas/" . $pengaturan['gambar']; ?>" alt="Login Image">
        <p><?php echo date("d-m-Y"); ?></p>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<p class='error'>{$_SESSION['error']}</p>";
            unset($_SESSION['error']);
        }
        ?>
        
        <form action="cek.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>