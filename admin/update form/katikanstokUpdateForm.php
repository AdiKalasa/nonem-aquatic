
<div >
  <?php
    include_once "../config/dbconnect.php";
      
    $IID=$_POST['record'];
	  $qry=mysqli_query($conn, "SELECT * from tbl_katikan Where iid='$IID'");
    while($row1=mysqli_fetch_array($qry)){ 
  ?>
  <h2>Edit Stok "<?=$row1['nama']?>"</h2>
  <form id="update-Items" onsubmit="katikanstokUpdate()" enctype='multipart/form-data'>
    <input type="text" id="iid" value="<?=$row1['iid']?>" hidden>
  <table class="table" id="t-katikan-stok">
    <thead>
      <tr>
        <th class="text-center">Ukuran</th>
        <th class="text-center">Harga</th>
        <th class="text-center">Stok</th>
        <th class="text-center"></th>
      </tr>
    </thead>
    <?php
    }
      $countD = 0;
      $sql="SELECT * from tbl_katikan_stok Where iid='$IID'";
      $result=$conn-> query($sql);
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
            $countD++;
    ?>
    <tr id="tr-katikan-stok-<?=$countD?>">
      <td><input type="text" value="<?=$row["ukuran"]?>" id="stok-uk"></td>
      <td><input type="number" value="<?=$row["harga"]?>" id="stok-hr"></td>
      <td><input type="number" value="<?=$row["stok"]?>" id="stok-st"></td>
      <td><span class="close" style="height:40px"  onclick="tKatikanStokClose(<?=$countD?>)">&times;</span></td>
      </tr>
      <?php
          }
        }
      ?>
  </table>
  <div class="form-group">
    <input type="text" class="" id="katikan-stok" value="<?=$countD?>" hidden>
  </div>
  <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary submit">Kirim</button>
    </div>
  </form>
  <script>
    katikan_stokx = Number(document.getElementById("katikan-stok").value);
  </script>
  <button class="btn btn-primary" style="height:40px" onclick="tKatikanStok()">Tambah Baru</button>
  
</div>
   