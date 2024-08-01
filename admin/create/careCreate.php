<?php
    include_once "../config/dbconnect.php";
    
    if(isset($_POST['upload']))
    {
        $jenis = $_POST['jenis'];
        for($i = 1;$i<=$_POST['data_count'];$i++){
            $judul = $_POST['tr-'.$i.'-j'];
            $konten = $_POST['tr-'.$i.'-k'];
            $insert2 = mysqli_query($conn,"INSERT INTO tbl_perawatan (jenis,judul,konten) VALUES ('$jenis','$judul','$konten')");
        }
 
         if(!$insert)
         {
             echo mysqli_error($conn);
         }
         else
         {
             echo "Records added successfully.";
         }
     
    }
        
?>