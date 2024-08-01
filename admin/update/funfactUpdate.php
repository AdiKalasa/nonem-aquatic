<?php
    include_once "../config/dbconnect.php";

    $id=$_POST['id'];
    $judul= $_POST['judul'];
    $funfact= $_POST['funfact'];
    $link_foto = $_POST['lf'];
    
    $updateItem = mysqli_query($conn,"UPDATE tbl_funfact SET judul='$judul', funfact='$funfact', link_foto='$link_foto' WHERE id='$id'");

    if($updateItem)
    {
        echo "true";
    }
?>