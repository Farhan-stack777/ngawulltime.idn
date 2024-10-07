<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORMULIR</title>
</head>
<body>
	<center><h2>FORMULIR TAMBAH BUKU</h2></center>
	<form action="buku_tambah.php" method="post">
		<label>Judul Buku</label>
		<input type="text" name="judul_buku"><br><br>
		<label>Pengarang</label>
		<input type="text" name="pengarang"><br><br>
		<label>Penerbit</label>
		<input type="text" name="penerbit"><br><br>
		<label>Tahun Terbit</label>
		<input type="text" name="tahun_terbit"><br><br>
		<label>Kategori</label>
		<select name="kategori"> 
			<?php
			$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
			$prov = mysqli_query($con,"SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
			while($hasil = mysqli_fetch_array($prov))
			{
				echo "<option value='$hasil[id_kategori]'>$hasil[nama_kategori]</option>";
			}
			?>
		</select><br><br>
		<label>Jumlah Halaman</label>
		<input type="text" name="jumlah_halaman"><br><br>
		<label>Stok</label>
		<input type="text" name="stok"><br><br>
		<button type="text">SUBMIT</button>	<a href="buku.php">Kembali</a>
	</form>
</body>
</html>