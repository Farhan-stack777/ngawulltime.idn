<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD</title>
</head>
<body>
    <center><h2>TABEL PENGEMBALIAN</h2></center>
    <div style="display: flex; height: 100vh;">
        <div style="flex: 1; background-color: #f0f0f0; padding: 20px;">
            <!-- Konten bagian kiri -->
            <?php 
            include "../sisi_kiri.php";
            ?>
            <!-- Konten bagian kanan -->
            <h2>Bagian Kanan</h2>
				<table id="example1" class="table table-bordered table-striped" border="1">
				<button onclick="confirmDelete();" >Hapus</button><br><br>
				<thead>
					<tr>
						<th bgcolor="#ffffff" ><font color="#000000">No.</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Data Peminjaman</font></th>
						<th bgcolor="#ffffff" ><font color="#000000">Tanggal Pengembalian</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Denda</font></th>
					</tr>
				</thead>
				<tbody> 
                <?php 
                $no = 1;
                $con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');

                if (!$con) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = mysqli_query($con, "SELECT * FROM tb_pengembalian") or die(mysqli_error($con));

                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_array($query)) {

                        $query2 = mysqli_query($con, "SELECT * FROM tb_peminjaman WHERE id_peminjaman='" . $data['id_peminjaman'] . "'") or die(mysqli_error($con));
                        $data2 = mysqli_fetch_array($query2);

                        $query3 = mysqli_query($con, "SELECT * FROM tb_buku WHERE id_buku='" . $data2['id_buku'] . "'") or die(mysqli_error($con));
                        $data3 = mysqli_fetch_array($query3);

                        $query4 = mysqli_query($con, "SELECT * FROM tb_anggota WHERE id='" . $data2['id_anggota'] . "'") or die(mysqli_error($con));
                        $data4 = mysqli_fetch_array($query4);

                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                Peminjam: <?=$data4['nama']; ?><br>
                                Buku dipinjam: <?=$data3['judul_buku']; ?><br>
                                Jadwal Kembali: <?=$data2['tanggal_kembali']; ?>
                            </td>
                            <td><?=$data['tanggal_pengembalian']; ?></td>
                            <td><?=$data['denda']>0?"Rp. " . number_format($data['denda'], 0, ',', '.') : "Tidak Ada Denda"; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='4' align='center'>Data Kosong</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete() {
            if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
                window.location.href = 'pengembalian_hapus.php';
            }
        }
    </script>
</body>
</html>
