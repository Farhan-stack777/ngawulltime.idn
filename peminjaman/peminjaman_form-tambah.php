<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORMULIR</title>
</head>
<body>
	<center><h2>FORMULIR TAMBAH PEMINJAMAN</h2></center>
	<form action="peminjaman_tambah.php" method="post">
		<label>Nama Anggota</label>
		<select name="id_anggota">
			<?php
			$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
			$prov = mysqli_query($con,"SELECT * FROM tb_anggota ORDER BY nama ASC");
			while($hasil = mysqli_fetch_array($prov))
			{
				echo "<option value='$hasil[id]'>$hasil[nama]</option>";
			}
			?>
		</select><br><br>
		<label>Judul Buku</label>
		<select name="id_buku" name="status" value="Dipinjam">
			<?php
			$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
			$prov = mysqli_query($con,"SELECT * FROM tb_buku ORDER BY judul_buku ASC");
			while($hasil = mysqli_fetch_array($prov))
			{
				echo "<option value='$hasil[id_buku]'>$hasil[judul_buku]</option>";
			}
			?>
		</select><br><br>
		<label>Tanggal Pinjam</label>
		<input type="date" name="tanggal_pinjam"><br><br>
		<label>Tanggal Kembali</label>
		<input type="date" name="tanggal_kembali"><br><br>
		<input type="hidden" name="status" value="Dipinjam">
		<button type="submit">SUBMIT</button>	<a href="peminjaman.php">Kembali</a>
	</form>
</body>
</html>