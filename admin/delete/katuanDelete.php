<?php

    include_once "../config/dbconnect.php";
    
    $kid=$_POST['record'];
    $query="DELETE FROM tbl_katuan WHERE kid='$kid'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Berhasil dihapus";
    }
    else{
        echo"Gagal dihapus";
    }
    
?>