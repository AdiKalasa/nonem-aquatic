<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM tbl_perawatan where id='$id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Berhasil dihapus";
    }
    else{
        echo"Gagal dihapus";
    }
    
?>