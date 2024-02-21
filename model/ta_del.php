<?php 
    include '../layout/Config.php';
    $id   = $_GET['id'];

    // Query hapus data ta
    $perintah = "DELETE FROM ta WHERE id='$id'";
    $hapus_data = mysqli_query($db, $perintah);
    
    echo "<script>document.location.href = '../views/TA.php'</script>";
    
?>