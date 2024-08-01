<div class="container p-5">

<h4>Edit Ikan</h4>
<?php
    include_once "../config/dbconnect.php";
	$kid=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * from tbl_katuan Where kid='$kid'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){ 
?>
<form id="update-Items" onsubmit="katuanUpdate()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" id="kid" value="<?=$row1['kid']?>" hidden>
    </div>
    <div class="form-group">
        <label>Nama:</label><br>
        <input type="text" id="nama" class="form-control" value="<?=$row1['nama']?>" required>
    </div>
    <div class="form-group">
         <img width='600px' id="image_shown" height='400px' src='<?=$row1["link_foto"]?>'>
         <div>
            <label for="file">Foto:</label>
            <input type="text" id="link_foto" onchange="changeImage()" value="<?=$row1["link_foto"]?>" required>
         </div>
    </div>
    <div class="form-group">
        <label>Harga:</label><br>
        <input type="number" id="harga" class="form-control" value="<?=$row1['harga']?>" required>
    </div>
    <div class="form-group">
        <label>Stok:</label><br>
        <input type="number" id="stok" class="form-control" value="<?=$row1['stok']?>" required>
    </div>
    <div class="form-group">
        <label for="qty">Keterangan:</label><br>
        <textarea id="keterangan" class="form-control" style="height: 184px;" required><?=$row1['keterangan']?></textarea>
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