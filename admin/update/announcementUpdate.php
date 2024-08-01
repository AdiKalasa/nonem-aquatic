<?php
    include_once "../config/dbconnect.php";
    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $w = $_POST['w'];
    $updateItem = mysqli_query($conn,"UPDATE tbl_pemberitahuan SET pemberitahuan_1='$p1', pemberitahuan_2='$p2' , tanggal_diubah='$w'");

    if($updateItem)
    {
        echo "true";
    }
?>