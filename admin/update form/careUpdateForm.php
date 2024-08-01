<div class="container p-5">

<h4>Edit Perawatan</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * from tbl_perawatan Where id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){ 
?>
<form id="update-Items" onsubmit="careUpdate()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" id="id" value="<?=$row1['id']?>" hidden>
    </div>
    <div class="form-group">
        <label>Jenis:</label><br>
        <input type="text" id="jenis" class="form-control" value="<?=$row1['jenis']?>" required>
    </div>
    <div class="form-group">
        <label>Judul:</label><br>
        <input type="text" id="judul" class="form-control" value="<?=$row1['judul']?>" required>
    </div>
    
    <div class="form-group">
        <label for="konten">Konten:</label><br>
        <textarea id="konten" class="form-control" style="height: 184px;" required><?=$row1['konten']?></textarea>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary submit">kirim</button>
    </div>
    <?php
    		}
    	}
    ?>
  </form>
</div>