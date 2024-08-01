<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $judul = $_POST['judul'];
        $funfact= $_POST['funfact'];
        $waktu = $_POST['waktu'];
        $link_foto=$_POST['lf'];
        $insert = mysqli_query($conn,"INSERT INTO tbl_funfact
        (judul,link_foto,tanggal_ditambahkan,funfact) 
        VALUES ('$judul','$link_foto','$waktu','$funfact')");
        if($insert){echo "<script>new PUM('masuk kah?', 1)</script>";}
        else{echo "Gagal ditambahkan.";}
    }
?>