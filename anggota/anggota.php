<?php 
require_once "../config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<center><h2>TABEL ANGGOTA<h2></center>
			<div style="display: flex; height: 100vh;">
		<div style="flex: 1; background-color: #f0f0f0; padding: 20px;">
			<!-- Konten bagian kiri -->
			<?php
			include "../sisi_kiri.php";
			?>
			<!-- Konten bagian kanan -->
			<h2>Bagian Kanan</h2>
			<button onclick="window.location.href='anggota_form-tambah.php';" >+ Tambah data</button>
			<table id="example1" class="table table-bordered table-striped" border="1">
				<thead>
					<tr>
						<th bgcolor="#ffffff" ><font color="#000000">No.</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Nama</font></th>
						<th bgcolor="#ffffff" ><font color="#000000">Alamat</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Nomor Telepon</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Email</font></th>
						<th bgcolor="#ffffff"><font color="#000000">Tanggal Bergabung</font></th>
						<th bgcolor="#ffffff" style="width:10%"><center><font color="#000000">Aksi</font></center></th>
					</tr>
				</thead>
				<tbody>  
					<?php 
					$no = 1;
					$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
					$query = mysqli_query($con, "SELECT * FROM tb_anggota") or die (mysqli_error($con));
					if (mysqli_num_rows($query) >0 )
					{
						while ($data=mysqli_fetch_array($query)) 
						{
							?>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $data['nama']; ?></td>
								<td><?= $data['alamat']; ?></td>     
								<td><?= $data['nomor_telepon']; ?></td>
								<td><?= $data['email']; ?></td>
								<td><?= $data['tanggal_bergabung']; ?></td>       
								<td>
									<center>
										<a href="anggota_form-ubah.php?id=<?=$data['id'];?>"><i></i>Edit</a>
										<a href="anggota_hapus.php?id=<?=$data['id'];?>" onclick="return confirm('Anda yakin akan menghapus akun [<?=$data['nama'];?>] ?')">Hapus</a>
									</center> 
								</td>                  
							</tr>
							<?php
						}
					}
					else
					{
						echo "<tr><td colspan='9' align='center'>Data Kosong</td></tr>";
					}
					?>  
				</tbody>
			</table>
		</div>
	</div>
	<hr>
	<hr>
	</html>