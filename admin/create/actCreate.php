<?php
    include_once "../config/dbconnect.php";
    if(isset($_POST['upload']))
    {
        $judul = $_POST['judul'];
        $deskripsi= $_POST['deskripsi'];
        $tanggal= $_POST['tanggal'];
        $tanggal_r= $_POST['tanggal_r'];
        $link_foto= $_POST['lf'];
        $insert = mysqli_query($conn,"INSERT INTO tbl_kegiatan
        (judul,link_foto,tanggal,tanggal_r,deskripsi) 
        VALUES ('$judul','$link_foto','$tanggal','$tanggal_r','$deskripsi')");
        if(!$insert){echo mysqli_error($conn);}
        else{echo "Records added successfully.";}
    }
        
?>