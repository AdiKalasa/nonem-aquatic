<?php

    include_once "../config/dbconnect.php";
    
    $id=$_POST['record'];
    $query="DELETE FROM tbl_funfact where id='$id'";

    $data=mysqli_query($conn,$query);
?> 