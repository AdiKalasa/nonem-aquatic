<?php
    $page=(isset($_GET['page']))?$_GET['page']:"main";
    switch($page){
        case 'home': include"page/home.html";break;
        case 'katikan': include"page/katalog/katalogikan.html";break;
        case 'katumpan': include"page/katalog/katalogumpan.html";break;
        case 'katdekorasi': include"page/katalog/katalogdekorasi.html";break;
        case 'perawatan': include"page/perawatan.html";break;
        case 'kegiatan': include"page/kegiatan.html";break;
        default:include"page/home.html";
    }
?>