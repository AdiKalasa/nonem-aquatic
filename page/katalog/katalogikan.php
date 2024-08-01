<!-- home, cv, galery, contact -->
<h1>Katalog Ikan</h1>
<div class="catalog">
    <!-- contoh component 
    <div class="card-catalog enable-cc" onclick="detailIkan(this)" id="iid-dbm">
        <img class="img-catalog" src="gambar/discus blue mercury.jpg" alt="gambar ikan">
        <h3 class="title-catalog">Discus Blue Mercury</h3>    
    </div> 
    -->
    <?php
      include_once "page/koneksi.php";
      $sql="SELECT * from tbl_katikan";
      $result=$koneksi-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
            $iidx = $row['iid'];
            $sql2="SELECT * from tbl_katikan_stok WHERE iid='$iidx' AND  stok>=1";
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
    ?>

</div>