<div class="container p-5">

<h4>Edit Fun Fact</h4>
<?php
    include_once "../config/dbconnect.php";
	$ID=$_POST['record'];
	$qry=mysqli_query($conn, "SELECT * from tbl_funfact Where id='$ID'");
	$numberOfRow=mysqli_num_rows($qry);
	if($numberOfRow>0){
		while($row1=mysqli_fetch_array($qry)){ 
?>
<form id="update-Items" onsubmit="funfactUpdate()" enctype='multipart/form-data'>
	<div class="form-group">
      <input type="text" id="ff-id" value="<?=$row1['id']?>" hidden>
    </div>
    <div class="form-group">
        <label>Judul:</label><br>
        <input type="text" id="ff-judul" class="form-control" value="<?=$row1['judul']?>" required>
    </div>
    <div class="form-group">
         <img width='600px' id="image_shown" height='400px' src='<?=$row1["link_foto"]?>'>
         <div>
            <label for="file">Foto:</label>
            <input type="text" id="link_foto" onchange="changeImage()" value="<?=$row1["link_foto"]?>" required>
         </div>
    </div>
    <div class="form-group">
        <label for="qty">Fun Fact:</label><br>
        <textarea id="ff-funfact" class="form-control" style="height: 184px;" required><?=$row1['funfact']?></textarea>
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