
<div >
  <h2>Keperluan</h2>
  <p>Klik nama barang untuk edit stok cepat</p>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Foto</th>
        <th class="text-center">Harga</th>
        <th class="text-center">Stok</th>
        <th class="text-center">Keterangan</th>
        <th class="text-center" colspan="2">Aksi</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from tbl_katuan";
      $result=$conn-> query($sql);
      $countx=0;
      if ($result-> num_rows > 0){
        
        while ($row=$result-> fetch_assoc()) {
          $countx++;
    ?>
    <tr id="tr-show-katuan-<?=$countx?>">
      <td id="kidx"><?=$row["kid"]?></td>
      <td data-toggle="modal" data-target="#ModalEditCepat" onclick='gantiEditCepatKatuan(`<?=$countx?>`)' id="namax"><?=$row["nama"]?></td>
      <td><img src="<?=$row["link_foto"]?>" alt="foto <?=$row["nama"]?>" style="width: 50%;height: 50%;margin:0;"></td>
      <td><?=$row["harga"]?></td>
      <td id="stokx"><?=$row["stok"]?></td>
      <td><textarea disabled><?=$row["keterangan"]?></textarea></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="katuanUpdateForm('<?=$row['kid']?>')">Ubah</button></td>
      <td><button class="btn btn-danger" style="height:40px"  onclick="katuanDelete('<?=$row['kid']?>')">Hapus</button></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Tambah Baru
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Keperluan Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="katuanCreate()" method="POST">
            
            <div class="form-group">
              <label for="judul">Nama:</label><br>
              <input type="text" id="nama" required>
            </div>
            <div class="form-group">
              <label for="judul">Harga:</label><br>
              <input type="number" id="harga" required>
            </div>
            <div class="form-group">
              <label for="judul">Stok:</label><br>
              <input type="number" id="stok" required>
            </div>
            <div class="form-group">
              <label>Foto:</label><br>
              <img src="" style="width: 100%;" id="image_shown">
              <input type="text" id="link_foto" onchange="changeImage(this)" required>
            </div>
            <div class="form-group">
              <label for="funfact">Keterangan:</label><br>
              <textarea id="keterangan" style="width:100%" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary submit" id="upload" style="height:40px">Kirim</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Batal</button>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Modal -->
  <div class="modal fade" id="ModalEditCepat" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Edit Cepat</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="text" id="iidx" hidden>
            <div class="form-group">
              <table style="width: 100%;" id="t-katuan-stok-ec">
                <thead>
                  <th>Nama</th>
                  <th></th>
                  <th>Stok</th>
                  <th></th>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  
</div>
   