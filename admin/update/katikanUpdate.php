<?php
    include_once "../config/dbconnect.php";

    $iid=$_POST['iid'];
    $nama= $_POST['nama'];
    $jenis= $_POST['jenis']; 
    $variasi= $_POST['variasi'];
    $makanan= $_POST['makanan'];
    $link_foto = $_POST['lf'];
    $updateItem = mysqli_query($conn,"UPDATE tbl_katikan SET nama='$nama',jenis='$jenis',variasi='$variasi', makanan='$makanan', link_foto='$link_foto' WHERE iid='$iid'");
    if($updateItem)
    {
        echo "true";
    }
?>