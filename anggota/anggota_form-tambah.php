<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORMULIR</title>
</head>
<body>
	<center><h2>FORMULIR TAMBAH ANGGOTA</h2></center>
	<form action="anggota_tambah.php" method="post">
		<label>Nama</label>
		<input type="text" name="nama"><br><br>
		<label>Alamat</label>
		<input type="text" name="alamat"><br><br>
		<label>Nomor Telepon</label>
		<input type="text" name="nomor_telepon"><br><br>
		<label>Email</label>
		<input type="text" name="email"><br><br>
		<label>Tanggal Bergabung</label>
		<input type="date" name="tanggal_bergabung"><br><br>
		<button type="submit">SUBMIT</button>  <a href="anggota.php">Kembali</a>	
	</form>
</body>
</html>