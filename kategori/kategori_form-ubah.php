<?php 
$id = $_GET['id'];

// Database connection
$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the category data
$query = mysqli_query($con, "SELECT * FROM tb_kategori WHERE id_kategori='$id'") or die(mysqli_error($con));
$data = mysqli_fetch_assoc($query);

// Close the database connection
mysqli_close($con);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORMULIR EDIT KATEGORI</title>
</head>
<body>
    <center><h2>FORMULIR EDIT KATEGORI</h2></center>
    <form action="kategori_ubah.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <label>Nama Kategori</label>
        <input type="text" name="nama_kategori" value="<?php echo htmlspecialchars($data['nama_kategori']); ?>"><br><br>
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" value="<?php echo htmlspecialchars($data['deskripsi']); ?>"><br><br>
        <button type="submit">SUBMIT</button>    <a href="kategori_buku.php">Kembali</a>
    </form>
</body>
</html>
