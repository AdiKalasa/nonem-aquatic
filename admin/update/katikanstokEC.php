<?php
    include_once "../config/dbconnect.php";
    $st = $_POST['st'];
    $stb = $_POST['stb'];
    $sid = $_POST['sid'];
    $updateItem = mysqli_query($conn,"UPDATE tbl_katikan_stok SET stok='$st' WHERE sid='$sid'");
    if(isset($_POST['terjual'])){
        $terjual = $_POST['terjual'];
        $tanggal = $_POST['t'];
        $waktu = $_POST['w'];
        $updateItem2 = mysqli_query($conn,"UPDATE tbl_katikan_stok SET terjual=terjual+'$terjual' WHERE sid='$sid'");
        $insert = mysqli_query($conn,"INSERT INTO tbl_penjualan
         (tanggal,waktu,id,banyak,jenis) 
         VALUES ('$tanggal','$waktu','$sid','$terjual','i')");
    }
    if($updateItem)
    {
        echo "true";
    }
?>