
<div >
  <h2>Fun Fact</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Judul</th>
        <th class="text-center">Tanggal Ditambahkan</th>
        <th class="text-center">Lokasi Foto</th>
        <th class="text-center">Fun Fact</th>
        <th class="text-center" colspan="2">Aksi</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from tbl_funfact";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["id"]?></td>
      <td><?=$row["judul"]?></td>
      <td><?=$row["tanggal_ditambahkan"]?></td>
      <td><img src="<?=$row["link_foto"]?>" alt="foto <?=$row["judul"]?>" style="width: 50%;height: 50%;margin:0;"></td>
      <td><textarea disabled><?=$row["funfact"]?></textarea></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="funfactUpdateForm('<?=$row['id']?>')">Ubah</button></td>
      <td><button class="btn btn-danger" style="height:40px"  onclick="funfactDelete('<?=$row['id']?>')">Hapus</button></td>
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
          <h4 class="modal-title">Fun Fact Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="funfactCreate()" method="POST">
            
            <div class="form-group">
              <label for="judul">Judul:</label><br>
              <input type="text" class="" id="judul" required>
            </div>
            <div class="form-group">
              <label>Foto:</label><br>
              <img src="" style="width: 100%;" id="image_shown">
              <input type="text" id="link_foto" onchange="changeImage(this)" required>
            </div>
            <div class="form-group">
              <label for="funfact">Fun Fact:</label><br>
              <textarea id="funfact" style="width:100%" required></textarea>
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

  
</div>
   