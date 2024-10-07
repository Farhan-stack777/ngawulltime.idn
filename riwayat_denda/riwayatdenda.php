<?php 
require_once "../config.php";

// Koneksi ke database
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

// Cek koneksi
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Riwayat Denda</title>
</head>
<body>
    <center><h2>TABEL RIWAYAT DENDA</h2></center>
    <div style="display: flex; height: 100vh;">
        <div style="flex: 1; background-color: #f0f0f0; padding: 20px;">
            <!-- Konten bagian kiri -->
            <?php 
            include "../sisi_kiri.php";
            ?>
            <!-- Konten bagian kanan -->
            <h2>Bagian Kanan</h2>
            <table id="example1" class="table table-bordered table-striped" border="1">
                <button onclick="confirmDelete();">Hapus</button><br><br>
                <thead>
                    <tr>
                        <th bgcolor="#ffffff"><font color="#000000">No.</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Peminjam</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Data Peminjam</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Jumlah Denda</font></th>
                        <th bgcolor="#ffffff"><font color="#000000">Status Pembayaran</font></th>
                        <th bgcolor="#ffffff" style="width:10%"><center><font color="#000000">Aksi</font></center></th>
                    </tr>
                </thead>
                <tbody>  
                <?php 
                $no = 1;
                $query = mysqli_query($con, "SELECT * FROM tb_riwayatdenda") or die(mysqli_error($con));
                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_assoc($query)) {
                        
                        // Periksa apakah data ada sebelum melanjutkan
                        $id_peminjaman = $data['id_peminjaman'];
                        $id_anggota = $data['id_anggota'];

                        $query2 = mysqli_query($con, "SELECT * FROM tb_peminjaman WHERE id_peminjaman='$id_peminjaman'") or die(mysqli_error($con));
                        $data2 = mysqli_fetch_assoc($query2);

                        if (!$data2) {
                            echo "<tr><td colspan='6' align='center'>Data peminjaman tidak ditemukan</td></tr>";
                            continue;
                        }

                        $query3 = mysqli_query($con, "SELECT * FROM tb_buku WHERE id_buku='{$data2['id_buku']}'") or die(mysqli_error($con));
                        $data3 = mysqli_fetch_assoc($query3);

                        if (!$data3) {
                            echo "<tr><td colspan='6' align='center'>Data buku tidak ditemukan</td></tr>";
                            continue;
                        }

                        $query4 = mysqli_query($con, "SELECT * FROM tb_anggota WHERE id='$id_anggota'") or die(mysqli_error($con));
                        $data4 = mysqli_fetch_assoc($query4);

                        if (!$data4) {
                            echo "<tr><td colspan='6' align='center'>Data anggota tidak ditemukan</td></tr>";
                            continue;
                        }

                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($data4['nama']); ?></td>
                            <td>
                                Peminjam: <?= htmlspecialchars($data4['nama']); ?><br>
                                Buku Dipinjam: <?= htmlspecialchars($data3['judul_buku']); ?>
                            </td>
                            <td>
                                <?= $data['jumlah_denda'] > 0 ? "Rp. " . number_format($data['jumlah_denda'], 0, ',', '.') : "Tidak Ada Denda"; ?>
                            </td>
                            <td><?= htmlspecialchars($data['status_pembayaran']); ?></td>
                            <td>
                                <center>
                                    <?php if ($data['status_pembayaran'] === 'belum_dibayar'): ?>
                                        <a href="pelunasan.php?id=<?= htmlspecialchars($data['id_denda']); ?>" class="btn-edit">Lunaskan</a>
                                    <?php endif; ?>
                                </center>
                            </td>  
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='6' align='center'>Data Kosong</td></tr>";
                }
                ?>  
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function confirmDelete() {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = 'denda_hapus.php';
            }
        }
    </script>
</body>
</html>
