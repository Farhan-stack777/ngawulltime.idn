<?php 
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORMULIR</title>
</head>
<body>
	<center><h2>FORMULIR EDIT PETUGAS</h2></center>
	<form action="petugas_ubah.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<?php 
		$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
		$query = mysqli_query($con, "SELECT * FROM tb_petugas WHERE id_petugas='$id' ") or die (mysqli_error($con));
		$data = mysqli_fetch_assoc($query);
		?>
		<label>Nama</label>
		<input type="text" name="nama" value="<?php echo $data['nama_petugas']; ?>"><br><br>
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $data['username']; ?>"><br><br>
		<label>Password</label>
		<input type="password" name="password" value="<?php echo $data['password']; ?>"><br><br>
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $data['email']; ?>"><br><br>
		<button type="submit">SUBMIT</button>	<a href="petugas.php">Kembali</a>
	</form>
</body>
</html>