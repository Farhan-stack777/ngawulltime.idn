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
	<center><h2>FORMULIR EDIT ANGGOTA</h2></center>
	<form action="anggota_ubah.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<?php 
		$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
		$query = mysqli_query($con, "SELECT * FROM tb_anggota WHERE id='$id' ") or die (mysqli_error($con));
		$data = mysqli_fetch_assoc($query);

		?>
		<label>Nama</label>
		<input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br><br>
		<label>Alamat</label>
		<input type="text" name="alamat" value="<?php echo $data['alamat']; ?>"><br><br>
		<label>Nomor Telepon</label>
		<input type="text" name="nomor_telepon" value="<?php echo $data['nomor_telepon']; ?>"><br><br>
		<label>Email</label>
		<input type="text" name="email" value="<?php echo $data['email']; ?>"><br><br>
		<label>Tanggal Bergabung</label>
		<input type="date" name="tanggal_bergabung" value="<?php echo $data['tanggal_bergabung']; ?>"><br><br>
		<button type="submit">SUBMIT</button>	<a href="anggota.php">Kembali</a>
	</form>
</body>
</html>