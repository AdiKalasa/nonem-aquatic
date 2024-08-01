<?php
    include_once "../config/dbconnect.php";
    if(isset($_POST['upload']))
    {
        $nama = $_POST['nama'];
        $harga= $_POST['harga'];
        $kid = $_POST['kid'];
        $stok = $_POST['stok'];
        $keterangan = $_POST['keterangan'];
        $link_foto= $_POST['lf'];
        $insert = mysqli_query($conn,"INSERT INTO tbl_katuan
        (kid,nama,harga,stok,keterangan,link_foto,terjual) 
        VALUES ('$kid','$nama','$harga','$stok','$keterangan','$link_foto','0')");
        if(!$insert){echo mysqli_error($conn);}
        else{echo "Records added successfully.";}
    }
?>