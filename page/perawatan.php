<h1>Perawatan</h1>
<div class="perawatan">
    <label for="pilih-jenis">Jenis ikan: </label>
    <?php
      include_once "page/koneksi.php";
      $sql="SELECT * from tbl_perawatan";
      $result=$koneksi-> query($sql);
      $kumpJenis=array();
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
            $inc = false;
            foreach($kumpJenis as $jenis){
                if($jenis == $row['jenis']){$inc = true;}
            }
            if(!$inc){$kumpJenis[] = $row['jenis'];}
        }
        }
    ?>
    <select name="" id="pilih-jenis" onchange="jenisPerawatan(this)">
        <?php
            foreach($kumpJenis as $jenis){
        ?>
        <option value="<?=$jenis?>"><?=$jenis?></option>
        <?php
            }
        ?>
    </select>
    <?php
      include_once "page/koneksi.php";
      $jenisG='';
      if(isset($_GET['jenis'])){
          $jenisG = $_GET['jenis'];
        $sql="SELECT * from tbl_perawatan where jenis='$jenisG'";
        $sql2="SELECT * from tbl_katikan where jenis='$jenisG'";
        
    }else{
        $sql="SELECT * from tbl_perawatan where jenis='Discus' ";
        $sql2="SELECT * from tbl_katikan where jenis='Discus'";
      }
      $result=$koneksi-> query($sql);
      $result2=$koneksi-> query($sql2);
      $listnama='';
      $listfoto='';
      if ($result2-> num_rows > 0){
        while ($row=$result2-> fetch_assoc()) {
            $listnama = $listnama.$row['variasi'].';';
            $listfoto = $listfoto.$row['link_foto'].';';
        }
        }
    ?>
    <div class="isNotFound">
        <h2>Panduan Perawatan Ikan</h2>
        
        <div class="slider">
            <input type="text" id="list foto" value="<?=$listfoto?>" hidden>
            <input type="text" id="list variasi" value="<?=$listnama?>" hidden>

            <button onclick="slide('l')" id="l"><</button>
            <div class="slider-img">
                <img class="main" src="" alt="">
                <img class="sec" src="" alt="">
            </div>
            <button onclick="slide('r')" id="r">></button>
        </div>
        
        <p class="jenis"><?=$jenisG?></p>
        <?php
            if ($result-> num_rows > 0){
                while ($row=$result-> fetch_assoc()) {
        ?>
        <h3><?=$row['judul']?></h3>
        <p><?=$row['konten']?></p>
        <?php
                }
            }
        ?>
        <script>
            let lv;
            let lf;
            let idx_perawatan = 0;
            let clicked = false;
            function slide(direction) {
                if (clicked) {
                    return;
                }
                clicked = true;
                let idx_img_post = idx_perawatan;
                let mainImg = document.querySelector("img.main");
                let secImg = document.querySelector("img.sec");
                let nama = document.querySelector(".perawatan .jenis");

                if (direction === "l") {
                    idx_perawatan--;
                    idx_perawatan = idx_perawatan < 0 ? lf.length - 2 : idx_perawatan;
                } else {
                    idx_perawatan++;
                    idx_perawatan = idx_perawatan > lf.length - 2 ? 0 : idx_perawatan;
                }
                mainImg.src = lf[idx_perawatan];
                secImg.src = lf[idx_img_post];
                nama.textContent = lv[idx_perawatan];

                if (direction === "l") {
                    mainImg.classList.add("img-rm");
                    secImg.classList.add("img-rs");
                } else {
                    mainImg.classList.add("img-lm");
                    secImg.classList.add("img-ls");
                }

                setTimeout(() => {
                    mainImg.classList.remove("img-rm");
                    secImg.classList.remove("img-rs");
                    mainImg.classList.remove("img-lm");
                    secImg.classList.remove("img-ls");
                    clicked = false;
                }, 1000);
            }

            function jenisPerawatan(it){
                
                let url = new URLSearchParams(location.search);
                location.href = `${location.origin}${location.pathname}?page=${url.get('page')}&jenis=${it.value}`;
            }
            function renderDikit( foto,variasi){
              lv = variasi.split(';');
              lf = foto.split(';');
              document.querySelector("img.main").src = lf[idx_perawatan];
              document.querySelector("img.sec").src = lf[idx_perawatan+1];
                
                setInterval(() => slide("r"), 4000);
            }
            renderDikit('<?=$listfoto?>','<?=$listnama?>');
        </script>
    </div>
</div>