
<div >
  <h2>Katalog Ikan</h2>
  <p>Klik nama ikan untuk edit stok cepat</p>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">IID</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Makanan</th>
        <th class="text-center">Foto</th>
        <th class="text-center">Ukuran</th>
        <th class="text-center">Harga</th>
        <th class="text-center">Stok</th>
        <th class="text-center" colspan="3">Aksi</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from tbl_katikan";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        $count = 0;
        while ($row=$result-> fetch_assoc()) {
          $count++;
    ?>
    <tr id="tr-show-katikan-<?=$count?>">
      <td id="iidc"><?=$row["iid"]?></td>
      <td data-toggle="modal" data-target="#ModalEditCepat" onclick='gantiEditCepatKatikan(`<?=$count?>`)'><?=$row["nama"]?></td>
      <td><?=$row["makanan"]?></td>
      <td data-toggle="modal" data-target="#ModalLiatFoto" onclick='gantiFotoModal(`<?=$row["link_foto"]?>`)'><img src="<?=$row["link_foto"]?>" alt="foto <?=$row["nama"]?>" style="width: 50%;height: 50%;margin:0;"></td>
      <!-- <td>blank</td> -->
      <td id="td-uk">
          <ul class="kat">
          <?php
            $curiid = $row['iid'];
            $s_sql = "SELECT * FROM tbl_katikan_stok WHERE iid='$curiid'";
            $r_result=$conn-> query($s_sql);
            $countuk = false;
            if ($r_result-> num_rows > 0){
              while ($r_row=$r_result-> fetch_assoc()) {
                $countuk = $countuk?false:true;
          ?>
            <li class="<?= $countuk?'genap':'ganjil'?>"><?=$r_row['ukuran']?></li>
            <p hidden><?=$r_row['sid']?></p>
          <?php
              }
          ?>
          </ul>
          <?php    
            }
          ?>
      </td>
      <td>
          <ul class="kat">
          <?php
            $curiid = $row['iid'];
            $s_sql = "SELECT harga FROM tbl_katikan_stok WHERE iid='$curiid'";
            $r_result=$conn-> query($s_sql);
            
            $countuk = false;
            if ($r_result-> num_rows > 0){
              while ($r_row=$r_result-> fetch_assoc()) {
                
                $countuk = $countuk?false:true;
          ?>
            <li class="<?= $countuk?'genap':'ganjil'?>"><?=$r_row['harga']?></li>
            <?php
              }
          ?>
          </ul>
          <?php
                
              }
          ?>
      </td>
      <td id="td-st">
          <ul class="kat">
          <?php
            $curiid = $row['iid'];
            $s_sql = "SELECT stok FROM tbl_katikan_stok WHERE iid='$curiid'";
            $r_result=$conn-> query($s_sql);
            
            $countuk = false;
            if ($r_result-> num_rows > 0){
              while ($r_row=$r_result-> fetch_assoc()) {
                
                $countuk = $countuk?false:true;
          ?>
            <li class="<?= $countuk?'genap':'ganjil'?>"><?=$r_row['stok']?></li>
            <?php
              }
          ?>
          </ul>
          <?php
                
              }
          ?>
      </td>
      <td><button class="btn btn-primary" style="height:40px" onclick="katikanstokUpdateForm('<?=$row['iid']?>')">Edit Stok</button></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="katikanUpdateForm('<?=$row['iid']?>')">Edit Ikan</button></td>
      <td><button class="btn btn-danger" style="height:40px"  onclick="katikanDelete('<?=$row['iid']?>')">Hapus</button></td>
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
          <h4 class="modal-title">Katalog Ikan Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="katikanCreate()" method="POST">
            
            <div class="form-group">
              <input type="text" id="katikan-stok" value="1" hidden>
            </div>
            <div class="form-group">
              <label for="nama">Jenis:</label><br>
              <input type="text" id="jenis" required>
            </div>
            <div class="form-group">
              <label for="nama">Variasi:</label><br>
              <input type="text" id="variasi" required>
            </div>
            <div class="form-group">
              <label for="makanan">Makanan:</label><br>
              <input type="text" id="makanan" required>
            </div>
            <div class="form-group">
              <label>Foto:</label><br>
              <img src="" style="width: 100%;" id="image_shown">
              <input type="text" id="link_foto" onchange="changeImage(this)" required>
            </div>
            <div class="form-group">

              <table style="width: 100%;" id="t-katikan-stok">
                <thead>
                  <th>Ukuran</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th></th>
              </thead>
              <tr id="tr-katikan-stok-1">
                <td><input type="text" id="stok-uk" required></td>
                <td><input type="number" id="stok-hr" required></td>
                <td><input type="number" id="stok-st" required></td>
              </tr>
            </table>
          </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary submit" id="upload" style="height:40px">Kirim</button>
            </div>
          </form>
          
          <button class="btn btn-primary" style="height:40px" onclick="tKatikanStok()">Tambah Ukuran</button>
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
          <button type="button" class="close" data-dismiss="modal" onclick="katikanShow()">&times;</button>
        </div>
        <div class="modal-body">
          <input type="text" id="iidx" hidden>
            <div class="form-group">
              <table style="width: 100%;" id="t-katikan-stok-ec">
                <thead>
                  <th>Ukuran</th>
                  <th></th>
                  <th>Stok</th>
                  <th></th>
              </thead>
              <tbody></tbody>
            </table>
            <p id="petunjuk" hidden>Tekan Enter untuk kirim</p>
          </div>
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
  
  <script>
    katikan_stokx = 1;
  </script>
</div>
   