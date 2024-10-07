<?php
$id_buku = isset($_POST['id_buku']) ? (int)$_POST['id_buku'] : 0;

$con = mysqli_connect('localhost', 'root', '', 'db_perpustakaan2');
if (!$con) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cover_image = $_FILES['cover_image']['name'];
    $cover_image_tmp = $_FILES['cover_image']['tmp_name'];
 $query = "UPDATE tb_buku SET cover_image = '$cover_image' WHERE id_buku = $id_buku";
    if ($cover_image) {
        $cover_image_path = "../berkas/" . basename($cover_image);
        if (move_uploaded_file($cover_image_tmp, $cover_image_path)) {
            // Update gambar di database
           
            if (mysqli_query($con, $query)) {
                echo "<script>window.location='buku.php';</script>";
            } else {
                echo "Error: " . mysqli_error($con);
            }
        } else {
            echo "Gagal mengunggah gambar.";
        }
    } else {
        echo "Tidak ada gambar baru yang diunggah.";
    }
}

mysqli_close($con);
?>
