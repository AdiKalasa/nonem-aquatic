<?php
    $page=(isset($_GET['page']))?$_GET['page']:"main";
    switch($page){
        case 'home': include"page/home.php";break;
        case 'katikan': include"page/katalog/katalogikan.php";break;
        case 'katumpan': include"page/katalog/katalogumpan.php";break;
        case 'katdekorasi': include"page/katalog/katalogdekorasi.html";break;
        case 'perawatan': include"page/perawatan.php";break;
        case 'kegiatan': include"page/kegiatan.php";break;
        default:include"page/home.php";
    }
?>