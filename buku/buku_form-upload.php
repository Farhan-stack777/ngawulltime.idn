<?php
$id_buku = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$query = mysqli_query($con, "SELECT judul_buku, cover_image FROM tb_buku WHERE id_buku=$id_buku");
$data_buku = mysqli_fetch_assoc($query);
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPDATE GAMBAR</title>
</head>
<body style="margin: 0; font-family: Arial, sans-serif;">
<center><h1>Update gambar Buku</h1></center>
		<div style="flex: 1; background-color: #f0f0f0; padding: 20px;">
    <div style="display: flex; height: 100vh;">
        <!-- Sidebar -->
        <div style="flex: 1; background-color: #f0f0f0; padding: 20px; box-sizing: border-box; border-right: 1px solid #ddd;">
        <?php
			include "../sisi_kiri.php";
			?>
            <!-- Heading above form -->
        <h2 style="margin-bottom: 50px;">Bagian Kanan</h2>
    <form action="buku_upload.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_buku" value="<?= htmlspecialchars($id_buku); ?>">
        <center><label>Judul Buku:</label><br></center>
        <center><input type="text" value="<?= htmlspecialchars($data_buku['judul_buku']); ?>"readonly><br></center>
        <center><label>Gambar Saat Ini:</label><br></center>
        <?php if ($data_buku['cover_image']): ?>
            <center><img src="../berkas/<?= htmlspecialchars($data_buku['cover_image']); ?>" alt="Cover Image" height="100px"><br></center>
        <?php else: ?>
            <center><p>Tidak ada gambar</p></center>
        <?php endif; ?>
        <br>
        <center><input type="file" name="cover_image"><br></center>
        <center><input type="submit" value="Upload Gambar">  <a href="buku.php">Kembali</a></center>
    </form>
</body>
</html>
