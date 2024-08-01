<h1>Kegiatan</h1>
<div class="kegiatan">
    <?php
      include_once "page/koneksi.php";
      $sql="SELECT * from tbl_kegiatan";
      $result=$koneksi-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <div class="card-catalog">
        <img src="<?=$row['link_foto']?>" alt="sedang <?=$row['judul']?>" class="img-kegiatan">
        <p class="date-kegiatan"><?=$row['tanggal']?></p>
        <h3 class="judul-kegiatan"><?=$row['judul']?></h3>
        <p class="deskripsi-kegiatan"><?=$row['deskripsi']?></p>
    </div>
    <?php
           }
        }
    ?>
</div>