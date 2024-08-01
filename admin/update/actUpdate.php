<?php
    include_once "../config/dbconnect.php";

    $id=$_POST['id'];
    $judul= $_POST['judul'];
    $deskripsi= $_POST['deskripsi'];
    $tanggal= $_POST['tanggal'];
    $tanggal_r= $_POST['tanggal_r'];
    $link_foto = $_POST['lf'];
    $updateItem = mysqli_query($conn,"UPDATE tbl_kegiatan SET judul='$judul', deskripsi='$deskripsi', link_foto='$link_foto', tanggal='$tanggal', tanggal_r='$tanggal_r' WHERE id='$id'");

    if($updateItem)
    {
        echo "true";
    }
?>