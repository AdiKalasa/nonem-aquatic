<?php
    include_once "../config/dbconnect.php";

    $id=$_POST['id'];
    $judul= $_POST['judul'];
    $jenis= $_POST['jenis'];
    $konten= $_POST['konten'];
    
    $updateItem = mysqli_query($conn,"UPDATE tbl_perawatan SET judul='$judul', jenis='$jenis', konten='$konten' WHERE id='$id'");

    if($updateItem)
    {
        echo "true";
    }
?>