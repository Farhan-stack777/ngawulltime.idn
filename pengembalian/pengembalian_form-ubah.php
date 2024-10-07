<?php 
$id = $_GET['id'];
$id2 = $_GET['id2']; // Fixed the variable name to match the input field
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORMULIR</title>
</head>
<body>
	<center><h2>KONFIRMASI PENGEMBALIAN</h2></center>
	<form action="../peminjaman/konfirmasi_eksekusi.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="hidden" name="id2" value="<?php echo $id2; ?>">
		<?php
		$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
		if (!$con) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		$query = mysqli_query($con, "SELECT * FROM tb_peminjaman WHERE id_peminjaman='$id'");
		if (!$query) {
		    die("Query failed: " . mysqli_error($con));
		}
		$data = mysqli_fetch_assoc($query);
		?>
		<label>Tanggal Kembali</label>
		<input type="date" name="tanggal_kembali" ><br><br>
		<button type="submit">SUBMIT</button>	<a href="../peminjaman/peminjaman.php">Kembali</a>
	</form>
</body>
</html>
