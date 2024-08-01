<h1>Tentang Kami</h1>
<?php
    include_once('koneksi.php');
    $sql = "SELECT * from tbl_tentang";
    $qry = mysqli_query($koneksi, $sql);
    while($row1=mysqli_fetch_array($qry)){

?>
<p><?=$row1['tentang']?></p>
<?php 
    }
?>
