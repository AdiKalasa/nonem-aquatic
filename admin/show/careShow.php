
<div >
  <h2>Perawatan</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Jenis</th>
        <th class="text-center">Judul</th>
        <th class="text-center">Konten</th>
        <th class="text-center" colspan="2">Aksi</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from tbl_perawatan";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$row["jenis"]?></td>
      <td><?=$row["judul"]?></td>
      <td><textarea disabled><?=$row["konten"]?></textarea></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="careUpdateForm('<?=$row['id']?>')">Ubah</button></td>
      <td><button class="btn btn-danger" style="height:40px"  onclick="careDelete('<?=$row['id']?>')">Hapus</button></td>
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
          <h4 class="modal-title">Perawatan Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="careCreate()" method="POST">
            
            <div class="form-group">
              <label for="jenis">Jenis:</label><br>
              <input type="number" id="data-count" value="1" hidden>
              <input type="text" class="" id="jenis" required>
            </div>
            <div class="form-group">
              <table style="width: 100%;" id="t-care-data">
                <thead>
                  <th>Judul</th>
                  <th>Konten</th>
                  <th></th>
              </thead>
              <tr id="tr-care-data-1">
                <td><input type="text" id="judul" required></td>
                <td><textarea id="konten" required></textarea></td>
              </tr>
              </table>
              </div>
              <div class="form-group">
              <button type="submit" class="btn btn-secondary submit" id="upload" style="height:40px">Kirim</button>
            </div>
          </form>
          <button class="btn btn-primary" style="height:40px" onclick="tCare()">Tambah Judul</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Batal</button>
        </div>
      </div>
      
    </div> 
  </div>

  
</div>
   