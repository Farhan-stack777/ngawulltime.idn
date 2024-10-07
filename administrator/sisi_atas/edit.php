<?php 
require_once "../database/config.php";

if (isset($_POST['edit']))
{
    // Ambil data dari formulir
    $link_wa = $_POST['link_wa'];
    $link_ig = $_POST['link_ig'];
    $jam = $_POST['jam'];
    $id = $_POST['id'];
    // Query untuk memperbarui data
    $sql = "UPDATE tb_sisi_atas SET link_wa='$link_wa', link_ig='$link_ig', jam='$jam' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo"<script>window.location='index.php';</script>";
        echo"<p>Data berhasil diperbarui!</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}


?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  swal("Success", "Data telah diedit", "success");
  
  setTimeout(function(){ 
  window.location.href = "../data-buku/";

  }, 500);
</script> -->
<script>window.location='index.php';</script>

       
            