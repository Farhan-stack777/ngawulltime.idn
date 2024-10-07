<?php 
require_once "../config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tabel Peminjaman</title>
</head>
<body>
	<center><h2>TABEL PEMINJAMAN</h2></center>
	<div style="display: flex; height: 100vh;">
		<div style="flex: 1; background-color: #f0f0f0; padding: 20px;">
			<!-- Konten bagian kiri -->
			<?php 
			include "../sisi_kiri.php";
			?>
			<!-- Konten bagian kanan -->
			<h2>Bagian Kanan</h2>
			<button onclick="window.location.href='peminjaman_form-tambah.php';">+ Tambah data</button>
			<table id="example1" class="table table-bordered table-striped" border="1">
				<thead>
					<tr>
						<th bgcolor="#ffffff"><font color="#000000">No.</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Nama Anggota</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Judul Buku</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Tanggal Pinjam</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Tanggal Kembali</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Status</font></th>
						<th bgcolor="#ffffff" style="width:10%"><center><font color="#000000">Aksi</font></center></th>
					</tr>
				</thead>
				<tbody>  
					<?php 
					$no = 1;
					$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
					
					// Ambil data peminjaman
					$query_peminjaman = mysqli_query($con, "SELECT * FROM tb_peminjaman") or die(mysqli_error($con));
					
					while ($data_peminjaman = mysqli_fetch_array($query_peminjaman)) {
						$id_anggota = $data_peminjaman['id_anggota'];
						$id_buku = $data_peminjaman['id_buku'];

						// Ambil nama anggota berdasarkan id_anggota
						$query_anggota = mysqli_query($con, "SELECT nama FROM tb_anggota WHERE id='$id_anggota'") or die(mysqli_error($con));
						$data_anggota = mysqli_fetch_array($query_anggota);
						$nama_anggota = $data_anggota['nama'];

						// Ambil judul buku berdasarkan id_buku
						$query_buku = mysqli_query($con, "SELECT judul_buku FROM tb_buku WHERE id_buku='$id_buku'") or die(mysqli_error($con));
						$data_buku = mysqli_fetch_array($query_buku);
						$judul_buku = $data_buku['judul_buku'];

						?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $nama_anggota; ?></td>
							<td><?= $judul_buku; ?></td>     
							<td><?= $data_peminjaman['tanggal_pinjam']; ?></td>
							<td><?= $data_peminjaman['tanggal_kembali']; ?></td>
							<td><?= $data_peminjaman['status']; ?></td>     
							<td>
								<center>
									<a href="../pengembalian/pengembalian_form-ubah.php?id=<?= $data_peminjaman['id_peminjaman']; ?>&id2=<?= $data_peminjaman['id_anggota']; ?>">Pengembalian</a>
									<a href="peminjaman_hapus.php?id=<?= $data_peminjaman['id_peminjaman']; ?>" onclick="return confirm('Anda yakin akan menghapus data [<?= $data_peminjaman['id_peminjaman']; ?>] ?')" class="btn btn-danger btn-sm">Hapus</a>
								</center> 
							</td>                  
						</tr>
						<?php
					}
					?>  
				</tbody>
			</table>
		</div>
	</div>
	<hr>
	<hr>
</body>
</html>
