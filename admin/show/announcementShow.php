<div class="container p-5">

<h4>Pemberitahuan</h4>
<?php
    include_once "../config/dbconnect.php";
	$qry=mysqli_query($conn, "SELECT * from tbl_pemberitahuan");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){ 
?>
<form id="update-Items" onsubmit="announcementUpdate()" enctype='multipart/form-data'>
    <div class="form-group">
        <label>Terakhir Dirubah:</label><br>
        <input type="text" class="form-control" disabled value="<?=$row1['tanggal_diubah']?>">
    </div>
    
    <div class="form-group">
        <textarea id="p-pemberitahuan_1" class="form-control" required><?=$row1['pemberitahuan_1']?></textarea>
    </div>
    <div class="form-group">
        <textarea id="p-pemberitahuan_2" class="form-control" required><?=$row1['pemberitahuan_2']?></textarea>
    </div>
    <div class="form-group">
      <button type="submit" style="height:40px" class="btn btn-primary">Perbarui Pemberitahuan</button>
    </div>
    <?php
    		}
    	}
      ?>
  </form>
</div>