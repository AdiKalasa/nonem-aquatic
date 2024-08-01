<div class="container p-5">

<h4>Tentang</h4>
<form id="update-Items" onsubmit="aboutUpdate()" enctype='multipart/form-data'>
<?php
    include_once "../config/dbconnect.php";
	$qry=mysqli_query($conn, "SELECT * from tbl_tentang");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
    $count = 0;
		while($row1=mysqli_fetch_array($qry)){ 
      $count++;
      if($count==1){
?>
    <div class="form-group">
        <label>Terakhir Dirubah:</label><br>
        <input type="text" class="form-control" disabled value="<?=$row1['tanggal_diubah']?>">
    </div>
    <?php
      }
    ?>
    <div class="form-group">
        <textarea id="t-tentang-<?=$count?>" class="form-control" style="height: 184px;" required><?=$row1['tentang']?></textarea>
    </div>
    <?php
    		}
    	}
      ?>
      <div class="form-group">
        <button type="submit" style="height:40px" class="btn btn-primary">Perbarui Tentang</button>
      </div>
  </form>
</div>