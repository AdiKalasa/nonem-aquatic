<h1>Keperluan Ikan</h1>
<div class="catalog">
    <!-- contoh component 
    <div class="card-catalog enable-cc" onclick="detailIkan(this)" id="iid-dbm">
        <img class="img-catalog" src="gambar/discus blue mercury.jpg" alt="gambar ikan">
        <h3 class="title-catalog">Discus Blue Mercury</h3>    
    </div> 
    -->
    <?php
      include_once "page/koneksi.php";
      $sql="SELECT * from tbl_katuan";
      $result=$koneksi-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
      <div class="card-catalog enable-cc" onclick="detailKeperluan(`<?=$row['nama']?>`,`<?=$row['harga']?>`,`<?=$row['link_foto']?>`,`<?=$row['stok']?>`,`<?=$row['keterangan']?>`) ">
          <img class="img-catalog" src="<?=$row['link_foto']?>" alt="gambar <?=$row['nama']?>">
          <h3 class="title-catalog"><?=$row['nama']?></h3>    
      </div> 
      <?php
           }
        }
    ?>

</div>