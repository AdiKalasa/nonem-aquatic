<div class="container p-5">

<h4>Edit Ikan</h4>
<?php
    include_once "../config/dbconnect.php";
	$IID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * from tbl_katikan Where iid='$IID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){ 
		while($row1=mysqli_fetch_array($qry)){ 
?>
<form id="update-Items" onsubmit="katikanUpdate()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" id="iid" value="<?=$row1['iid']?>" hidden>
    </div>
    <div class="form-group">
        <label>Jenis:</label><br>
        <input type="text" id="jenis" class="form-control" value="<?=$row1['jenis']?>" required>
    </div>
    <div class="form-group">
        <label>Variasi:</label><br>
        <input type="text" id="variasi" class="form-control" value="<?=$row1['variasi']?>" required>
    </div>
    <div class="form-group">
        <label>Makanan:</label><br>
        <input type="text" id="makanan" class="form-control" value="<?=$row1['makanan']?>" required>
    </div>
    <div class="form-group">
         <img width='600px' id="image_shown" height='400px' src='<?=$row1["link_foto"]?>'>
         <div>
            <label for="file">Foto:</label>
            <input type="text" id="link_foto" onchange="changeImage(this)" value="<?=$row1["link_foto"]?>" required>
         </div>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary submit">Kirim</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>
</div>