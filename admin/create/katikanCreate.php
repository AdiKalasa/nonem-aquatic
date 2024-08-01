<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $nama = $_POST['nama'];
        $makanan= $_POST['makanan'];
        $iid = $_POST['iid'];
        $jenis = $_POST['jenis'];
        $variasi = $_POST['variasi'];
        $link_foto= $_POST['lf'];
        $insert = mysqli_query($conn,"INSERT INTO tbl_katikan
        (iid,nama,jenis,variasi,makanan,link_foto) 
        VALUES ('$iid','$nama','$jenis','$variasi','$makanan','$link_foto')");
        for($i = 1;$i<=$_POST['katikan_stok'];$i++){
            $ukuran = $_POST['tr-'.$i.'-uk'];
            $harga = $_POST['tr-'.$i.'-hr'];
            $stok = $_POST['tr-'.$i.'-st'];
            $sid = $_POST['sid-'.$i];
            $insert2 = mysqli_query($conn,"INSERT INTO tbl_katikan_stok (sid,iid,ukuran,harga,stok) VALUES ('$sid','$iid','$ukuran','$harga','$stok')");
        }
        if(!$insert){echo mysqli_error($conn);}
        else{echo "Records added successfully.";}
    }
?>