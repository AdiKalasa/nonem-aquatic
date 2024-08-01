<?php
    include_once "../config/dbconnect.php";

    $kid=$_POST['kid'];
    $nama= $_POST['nama'];
    $harga= $_POST['harga'];
    $stok= $_POST['stok'];
    $keterangan= $_POST['keterangan'];
    $link_foto = $_POST['lf'];
    $updateItem = mysqli_query($conn,"UPDATE tbl_katuan SET nama='$nama', harga='$harga',stok='$stok',keterangan='$keterangan', link_foto='$link_foto' WHERE kid='$kid'");

    if($updateItem)
    {
        echo "true";
    }
?>