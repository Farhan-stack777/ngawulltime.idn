<?php
    // Koneksi ke basis data
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bootcamp3";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil ID dan tabel dari query string
    if (isset($_GET['id']) && isset($_GET['table'])) {
        $id = intval($_GET['id']);
        $table = $_GET['table'];

        // Validasi tabel
        $valid_tables = ['tb_sepatu', 'tb_tas'];
        if (in_array($table, $valid_tables)) {
            // Update status sold_out menjadi 1
            $sql = "UPDATE $table SET sold_out = 1 WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                header("Location: index.php"); // Redirect kembali ke halaman utama setelah update
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Tabel tidak valid.";
        }
    } else {
        echo "ID atau tabel tidak ditemukan.";
    }

    $conn->close();
?>
