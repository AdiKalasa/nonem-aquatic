<?php
    $db_host = "localhost";
    $db_usn = "root";
    $db_pw = "";
    $db_name = "nonemaquatic";

    $koneksi = mysqli_connect($db_host,$db_usn,$db_pw,$db_name);
    if(!$koneksi){
        echo"tidah dapat terhubung ke database";
    }
?>