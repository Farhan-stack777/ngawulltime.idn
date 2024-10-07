<?php 
$id = $_GET['id'];
 ?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORMULIR</title>
</head>
<body>
	<center><h2>FORMULIR EDIT BUKU</h2></center>
	<form action="buku_ubah.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<?php 
		$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
		$query = mysqli_query($con, "SELECT * FROM tb_buku WHERE id_buku='$id' ") or die (mysqli_error($con));
		$data = mysqli_fetch_assoc($query);

		?>
		<label>Judul Buku</label>
		<input type="text" name="judul_buku" value="<?php echo $data['judul_buku']; ?>"><br><br>
		<label>Pengarang</label>
		<input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>"><br><br>
		<label>Penerbit</label>
		<input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>"><br><br>
		<label>Tahun Terbit</label>
		<input type="text" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>"><br><br>
		<label>Kategori</label>
		<select name="kategori"> 
			<?php
			$prov = mysqli_query($con,"SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
			while($hasil = mysqli_fetch_array($prov))
			{
				if($hasil['id_kategori']==$data['kategori']) 
				{
					echo "<option value='$hasil[id_kategori]' selected>$hasil[nama_kategori]</option>";
				}
				else
				{
					echo "<option value='$hasil[id_kategori]' >$hasil[nama_kategori]</option>";
				}
				
			}
			?>

		</select><br><br>
		<label>Jumlah Halaman</label>
		<input type="text" name="jumlah_halaman" value="<?php echo $data['jumlah_halaman']; ?>"><br><br>
		<label>Stok</label>
		<input type="text" name="stok" value="<?php echo $data['stok']; ?>"><br><br>
		<button type="submit">SUBMIT</button>	<a href="buku.php">Kembali</a>
	</form>
</body>
</html>