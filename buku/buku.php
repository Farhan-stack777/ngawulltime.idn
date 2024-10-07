<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel Buku</title>
</head>
<body>
    <center><h2>TABEL BUKU</h2></center>
    <div style="display: flex; height: 100vh;">
        <div style="flex: 1; background-color: #f0f0f0; padding: 20px;">
            <!-- Konten bagian kiri -->
            <?php 
            include "../sisi_kiri.php";
            ?>
            <!-- Konten bagian kanan -->
            <h2>Bagian Kanan</h2>
            <button onclick="window.location.href='buku_form-tambah.php';">+ Tambah data</button>
            <table id="example1" class="table table-bordered table-striped" border="1">
                <thead>
                    <tr>
                        <th bgcolor="#ffffff"><font color="#000000">No.</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Gambar</font></th> <!-- Tambahkan header gambar -->
                        <th bgcolor="#ffffff"><font color="#000000">Judul Buku</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Pengarang</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Penerbit</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Tahun Terbit</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Kategori</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Jumlah Halaman</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Stok</font></th>
                        <th bgcolor="#ffffff" style="width:10%"><center><font color="#000000">Aksi</font></center></th>
                    </tr>
                </thead>
                <tbody>  
                    <?php 
                    $no = 1;
                    $con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
                    if (!$con) {
                        die("Koneksi gagal: " . mysqli_connect_error());
                    }

                    // Query untuk mendapatkan data buku
                    $query_buku = mysqli_query($con, "SELECT * FROM tb_buku") or die(mysqli_error($con));

                    if (mysqli_num_rows($query_buku) > 0) {
                        while ($data_buku = mysqli_fetch_array($query_buku)) {
                            
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($no++); ?></td>
                                <td><img src="<?= "../berkas/" . $data_buku['cover_image']; ?>" alt="Login Image" height="100px"></td><br>
                                <td><?= htmlspecialchars($data_buku['judul_buku']); ?></td>
                                <td><?= htmlspecialchars($data_buku['pengarang']); ?></td>
                                <td><?= htmlspecialchars($data_buku['penerbit']); ?></td>     
                                <td><?= htmlspecialchars($data_buku['tahun_terbit']); ?></td>
                                <?php
                                $id_kategori = (int)$data_buku['kategori'];

                                // Query untuk mendapatkan nama kategori berdasarkan id_kategori
                                $query_kategori = mysqli_query($con, "SELECT nama_kategori FROM tb_kategori WHERE id_kategori = $id_kategori") or die(mysqli_error($con));
                                $data_kategori = mysqli_fetch_assoc($query_kategori);

                                // Menggunakan ternary operator untuk menentukan nama kategori
                                $nama_kategori = $data_kategori ? htmlspecialchars($data_kategori['nama_kategori']) : 'Tidak Diketahui';
                                ?>
                                <td><?= htmlspecialchars($nama_kategori); ?></td>
                                <td><?= htmlspecialchars($data_buku['jumlah_halaman']); ?></td> 
                                <td><?= htmlspecialchars($data_buku['stok']); ?></td>             
                                <td>
                                    <center>
                                        <a href="buku_form-upload.php?id=<?= htmlspecialchars($data_buku['id_buku']); ?>">Upload</a>
                                        <a href="buku_form-ubah.php?id=<?= htmlspecialchars($data_buku['id_buku']); ?>">Edit</a>
                                        <a href="buku_hapus.php?id=<?= htmlspecialchars($data_buku['id_buku']); ?>" onclick="return confirm('Anda yakin akan menghapus akun [<?= htmlspecialchars($data_buku['judul_buku']); ?>] ?')" class="btn btn-danger btn-sm">Hapus</a>
                                    </center> 
                                </td>                  
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='10' align='center'>Data Kosong</td></tr>";
                    }

                    // Menutup koneksi
                    mysqli_close($con);
                    ?>  
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <hr>
</body>
</html>
