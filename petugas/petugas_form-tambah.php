<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORMULIR</title>
</head>
<body>
    <center><h2>FORMULIR TAMBAH PETUGAS</h2></center>
    <form action="petugas_tambah.php" method="post">
        <label>Nama</label>
        <input type="text" name="nama" required><br><br>
        <label>Username</label>
        <input type="text" name="username" required><br><br>
        <label>Password</label>
        <input type="password" name="password" required><br><br>
        <label>Email</label>
        <input type="email" name="email" required><br><br>
        <button type="submit">SUBMIT</button>    <a href="petugas.php">Kembali</a>
    </form>
</body>
</html>
