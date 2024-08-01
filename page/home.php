<?php
    include_once('koneksi.php');
    $sql = 'SELECT * FROM tbl_funfact';
    $sql2 = 'SELECT pemberitahuan_1 FROM tbl_pemberitahuan';
    $sql3 = 'SELECT * FROM `tbl_katikan_stok` ORDER BY `terjual` DESC;';
    $query = mysqli_query($koneksi, $sql);
    $query2 = mysqli_query($koneksi, $sql2);
    $query3 = mysqli_query($koneksi, $sql3);

?>

<div class="home">
    <h1>Home</h1>
    <div class="berita">
        <h2>Pemberitahuan</h2>
        <p><?=mysqli_fetch_array($query2)['pemberitahuan_1']?></p>
    </div>

    <div class="berita funfact" >
    <?php
        $stop = rand(1,mysqli_num_rows($query));
        $count = 1;
        while($data = mysqli_fetch_array($query)){
            
            if($count == $stop){
    ?>
    <h2>Fun Fact</h2>
        <img src="<?php echo $data['link_foto']?>" alt="<?php echo $data['judul']?>" class="funfact-img">
        <p><?php echo $data['funfact']?></p>
    </div>
    <?php
                break;
            }
            $count++;
        }
    ?>
    <div class="berita">
        <h2>Produk Unggulan</h2>
        <div class="catalog">
        <?php
            $count = 0;
            $listpu = array();
            while($data = mysqli_fetch_array($query3)){
                if($count==4){break;}
                $listpu[]=$data['iid'];
                $count++;
            }

            foreach($listpu as $pu){
                $sql="SELECT * from tbl_katikan where iid='$pu'";
                $result=$koneksi-> query($sql);
                if ($result-> num_rows > 0){
                    while ($row=$result-> fetch_assoc()) {
                        $iidx = $row['iid'];
                        $sql2="SELECT * from tbl_katikan_stok WHERE iid='$pu' AND stok>=1";
                        $result2=$koneksi-> query($sql2);
                        $uk="";
                        $st="";
                        $hr="";
                        if ($result2-> num_rows > 0){
                            while ($row2=$result2-> fetch_assoc()) {
                            $uk=$uk.$row2['ukuran'].';';
                            $st=$st.$row2['stok'].';';
                            $hr=$hr.$row2['harga'].';';
                            }
                        }
                        ?>
        <div class="card-catalog enable-cc" onclick="detailIkan(`<?=$row['nama']?>`,`<?=$row['makanan']?>`,`<?=$uk?>`,`<?=$st?>`,`<?=$hr?>`,`<?=$row['link_foto']?>`)">
          <img class="img-catalog" src="<?=$row['link_foto']?>" alt="gambar ikan <?=$row['nama']?>">
          <h3 class="title-catalog"><?=$row['nama']?></h3>    
        </div> 
                        <?php
                    }
                }
            }
        ?>
        </div>
    </div>
        <hr>
    <p>Temukan lebih banyak ikan hias menarik di toko kami atau hubungi kami untuk konsultasi lebih lanjut.</p>
</div>