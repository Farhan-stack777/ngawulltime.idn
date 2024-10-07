<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar dengan Submenu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .main-sidebar {
            width: 250px;
            background-color: #2F4F4F;
            color: white;
            height: 100vh;
            position: fixed;
            overflow-y: auto;
        }

        .brand-logo {
            background-color: #2F4F4F;
            text-align: center;
            padding: 10px 0;
        }

        .sidebar {
            padding: 15px;
        }

        .nav {
            list-style: none;
            padding: 0;
        }

        .nav-item {
            margin: 15px 0;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: #3A9B9B;
        }

        .nav-link .nav-icon {
            margin-right: 10px; /* Ruang antara ikon dan teks */
        }

        .nav-treeview {
            display: none;
            padding-left: 15px;
        }

        .submenu-toggle {
            cursor: pointer;
        }

        .active {
            background-color: #3A9B9B; /* Warna latar belakang untuk menu aktif */
        }

        .nav-treeview .active {
            background-color: #4F4F4F; /* Warna latar belakang untuk submenu aktif */
        }
    </style>
</head>
<body>
    <aside class="main-sidebar">
        <div class="brand-logo">
            <a href="../../" target="_blank">
                <img src="../../images/logo.png" alt="logo" style="width: 230px; height: 50px;">
            </a>
        </div>

        <div class="sidebar">
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link submenu-toggle">
                            <i class="nav-icon fas fa-clipboard"></i>
                            Data Home <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="../dashboard/index.php" class="nav-link"><i class="nav-icon far fa-circle"></i> Home</a></li>
                            <li class="nav-item"><a href="../sisi_atas/" class="nav-link"><i class="nav-icon far fa-circle"></i> Sisi Atas</a></li>
                            <li class="nav-item"><a href="../data-cs/" class="nav-link"><i class="nav-icon far fa-circle"></i> Sisi Bawah</a></li>
                            <!-- <li class="nav-item"><a href="../hal-testimoni/" class="nav-link"><i class="nav-icon far fa-circle"></i> Sisi Bawah</a></li> -->
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link submenu-toggle">
                            <i class="nav-icon fas fa-clipboard"></i>
                            Data Tentang Kami <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="../ngawulltime/" class="nav-link"><i class="nav-icon far fa-circle"></i> Ngawulltime.idn</a></li>
                            <li class="nav-item"><a href="../perjuangan/" class="nav-link"><i class="nav-icon far fa-circle"></i> Perjuangan</a></li>
                            <li class="nav-item"><a href="../akhir_sempurna/" class="nav-link"><i class="nav-icon far fa-circle"></i> Akhir Sempurna</a></li>
                        </ul>
                    </li>

                    <!-- <li class="nav-item"><a href="../hal-layanan/" class="nav-link"><i class="nav-icon fas fa-clipboard"></i> Data Layanan</a></li> -->

                    <li class="nav-item">
                        <a href="#" class="nav-link submenu-toggle">
                            <i class="nav-icon fas fa-clipboard"></i>
                            Data Produk <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="../sneakers/" class="nav-link"><i class="nav-icon far fa-circle"></i> Data Sneakers</a></li>
                            <li class="nav-item"><a href="../bagpack/" class="nav-link"><i class="nav-icon far fa-circle"></i> Data Bagpack</a></li>
                            <li class="nav-item"><a href="../t-shirt/" class="nav-link"><i class="nav-icon far fa-circle"></i> Data T-shirt</a></li>
                            <li class="nav-item"><a href="../hoodie/" class="nav-link"><i class="nav-icon far fa-circle"></i> Data Hoodie</a></li>
                            <li class="nav-item"><a href="../pants/" class="nav-link"><i class="nav-icon far fa-circle"></i> Data Pants</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link submenu-toggle">
                            <i class="nav-icon fas fa-clipboard"></i>
                            Data Keamanan <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="../data-user/" class="nav-link"><i class="nav-icon far fa-circle"></i> Data Contact Us</a></li>
                            <li class="nav-item"><a href="../data-admin/" class="nav-link"><i class="nav-icon far fa-circle"></i> Data Administrator</a></li>
                            <li class="nav-item"><a href="../gantipass/" class="nav-link"><i class="nav-icon far fa-circle"></i> Ganti Password</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <script>
    // Menambahkan event listener untuk toggle submenu
    document.querySelectorAll('.submenu-toggle').forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const submenu = this.nextElementSibling;
            const isOpen = submenu.style.display === 'block';

            // Tutup semua submenu
            document.querySelectorAll('.nav-treeview').forEach(s => {
                s.style.display = 'none';
            });

            // Hapus kelas active dari semua toggle
            document.querySelectorAll('.submenu-toggle').forEach(t => {
                t.classList.remove('active');
            });

            // Jika submenu tidak terbuka, buka submenu yang dipilih
            if (!isOpen) {
                submenu.style.display = 'block';
                this.classList.add('active'); // Tambahkan active pada toggle
            }
        });
    });

    // Menambahkan kelas active pada menu yang diklik
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', function() {
            // Hapus kelas active dari semua link
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            // Tambahkan kelas active pada link yang diklik
            this.classList.add('active');
        });
    });

    // Menandai submenu aktif berdasarkan URL
    const currentUrl = window.location.href;
    document.querySelectorAll('.nav-link').forEach(link => {
        if (link.href === currentUrl) {
            link.classList.add('active');

            // Cari submenu induk dan tampilkan jika link aktif
            let submenu = link.closest('.nav-treeview');
            if (submenu) {
                submenu.style.display = 'block'; // Tampilkan submenu
                submenu.previousElementSibling.classList.add('active'); // Tambahkan active pada submenu-toggle
            }
        }
    });
</script>

</body>
</html>
