<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Ganti dengan username database kamu
$password = ""; // Ganti dengan password database kamu
$dbname = "bootcamp3"; // Ganti dengan nama database kamu

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek jika formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gambar = "";

    // Pastikan file diunggah
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $uploadDir = '../images/'; // Pastikan path ini sesuai dengan lokasi folder upload
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $uploadFile = $uploadDir . $imageName;
        if (move_uploaded_file($imageTmpName, $uploadFile)) {
            $gambar = $imageName;
        } else {
            header("Location:news.php?error=image_upload_failed");
            exit();
        }
    }

    // Ambil data dari formulir
    $judul = $conn->real_escape_string($_POST['title']);
    $tanggal = $conn->real_escape_string($_POST['date']);
    $deskripsi = $conn->real_escape_string($_POST['description']);

    // Simpan data ke database
    $stmt = $conn->prepare("INSERT INTO tb_news (gambar, judul, tanggal, deskripsi) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $gambar, $judul, $tanggal, $deskripsi);

    if ($stmt->execute()) {
        header("Location:news.php?success=data_saved");
    } else {
        header("Location:news.php?error=db_error");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location:news.php?error=form_not_submitted");
}
?>