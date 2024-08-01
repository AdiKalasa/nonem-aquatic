<?php
    include_once "../config/dbconnect.php";
        $iid = $_POST['iid'];
        $insert = mysqli_query($conn,"DELETE FROM tbl_katikan_stok where iid='$iid'");
        for($i = 1;$i<=$_POST['katikan_stok'];$i++){
            $ukuran = $_POST['tr-'.$i.'-uk'];
            $harga = $_POST['tr-'.$i.'-hr'];
            $stok = $_POST['tr-'.$i.'-st'];
            $sid = $_POST['sid-'.$i];
            $insert2 = mysqli_query($conn,"INSERT INTO tbl_katikan_stok (sid,iid,ukuran,harga,stok) VALUES ('$sid','$iid','$ukuran','$harga','$stok')");
        }
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
         }
        
?>