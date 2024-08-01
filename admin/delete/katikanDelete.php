<?php

    include_once "../config/dbconnect.php";
    
    $iid=$_POST['record'];
    $query="DELETE FROM tbl_katikan where iid='$iid'";
    $query2="DELETE FROM tbl_katikan_stok where iid='$iid'";

    $data=mysqli_query($conn,$query);
    $data=mysqli_query($conn,$query2);

    if($data){
        echo"Berhasil dihapus";
    }
    else{
        echo"Gagal dihapus";
    }
    
?>