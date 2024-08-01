<?php
    include_once "../config/dbconnect.php";
    $w = $_POST['w'];
    for($i=1;$i<5;$i++){
        $t = $_POST['t'.$i];
        if($i==1){
            $updateItem = mysqli_query($conn,"UPDATE tbl_tentang SET tentang='$t' , tanggal_diubah='$w' WHERE no='$i'");
        }else{
            $updateItem = mysqli_query($conn,"UPDATE tbl_tentang SET tentang='$t' WHERE no='$i'");
        }
    }

    if($updateItem)
    {
        echo "true";
    }
?>