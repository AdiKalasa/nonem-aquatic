<?php
    include_once "../config/dbconnect.php";
    $st = $_POST['st'];
    $stb = $_POST['stb'];
    $kid = $_POST['kid'];
    $updateItem = mysqli_query($conn,"UPDATE tbl_katuan SET stok='$st' WHERE kid='$kid'");
    if(isset($_POST['terjual'])){
        $terjual = $_POST['terjual'];
        $tanggal = $_POST['t'];
        $waktu = $_POST['w'];
        $updateItem2 = mysqli_query($conn,"UPDATE tbl_katuan SET terjual=terjual+'$terjual' WHERE kid='$kid'");
        $insert = mysqli_query($conn,"INSERT INTO tbl_penjualan
         (tanggal,waktu,id,banyak,jenis) 
         VALUES ('$tanggal','$waktu','$kid','$terjual','k')");
    }
    if($updateItem)
    {
        echo "true";
    }
?>