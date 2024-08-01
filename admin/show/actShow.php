
<div >
  <h2>Katalog Ikan</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Judul</th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Foto</th>
        <th class="text-center">Deskripsi</th>
        <th class="text-center" colspan="2">Aksi</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from tbl_kegiatan";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["judul"]?></td>
      <td><?=$row["tanggal"]?></td>
      <td data-toggle="modal" data-target="#ModalLiatFoto" onclick='gantiFotoModal(`<?=$row["link_foto"]?>`)'><img src="<?=$row["link_foto"]?>" alt="foto <?=$row["judul"]?>" style="width: 50%;height: 50%;margin:0;"></td>
      <td><textarea disabled><?=$row['deskripsi']?></textarea></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="actUpdateForm('<?=$row['id']?>')">Ubah</button></td>
      <td><button class="btn btn-danger" style="height:40px"  onclick="actDelete('<?=$row['id']?>')">Hapus</button></td>
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
          <h4 class="modal-title">Kegiatan Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="actCreate()" method="POST">
            <div class="form-group">
              <label for="nama">Judul:</label><br>
              <input type="text" id="judul" required>
            </div>
            <div class="form-group">
              <label for="nama">Tanggal:</label><br>
              <input type="datetime-local" id="tanggal_r" required>
            </div>
            <div class="form-group">
              <label for="nama">Deskripsi:</label><br>
              <textarea id="deskripsi" style="width:100%" required></textarea>
            </div>
            <div class="form-group"> 
              <label>Foto:</label><br>
              <img src="" style="width: 100%;" id="image_shown">
              <input type="text" id="link_foto" onchange="changeImage(this)" required>
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
  <div class="modal fade" id="ModalLiatFoto" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <img src="" id="ModalLiatFoto-img" style="width: 100%;height:100%;">
        </div>
      </div>
    </div>
  </div>
</div>
   