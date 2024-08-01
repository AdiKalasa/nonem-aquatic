<?php
    include_once('page/koneksi.php');
    $sql = "SELECT pemberitahuan_2 from tbl_pemberitahuan";
    $query = mysqli_query($koneksi, $sql);
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Nonem Aquatic</title>
    <link rel="stylesheet" type="text/css" href="css/top.css"/>
    <link rel="stylesheet" type="text/css" href="css/mid.css"/>
    <link rel="stylesheet" type="text/css" href="css/bot.css"/>
    <link rel="stylesheet" type="text/css" href="css/global.css"/>
    <link rel="icon" href="gambar/logo etc/log.png">
</head>

<body>
    <div class="header">
        <img src="gambar/logo etc/header.png" width="100%" height="230px" />
    </div>

    <div id="navbar">
        <a href="index.php?page=home" id="home-page">Home</a>
        <!-- <a href="index.php?page=katalog" id="katalog-page">Katalog</a> -->
        <div class="dropdown">
            <button class="dropbtn" onmouseenter="geserAtas()">Katalog</button>
            <div id="myDropdown" class="dropdown-content">
                <ul><a href="index.php?page=katikan" id="katikan-page" class="sub-nav">Ikan</a></ul>
                <ul><a href="index.php?page=katumpan" id="katumpan-page" class="sub-nav">Keperluan</a></ul>
            </div>
        </div>
        <a href="index.php?page=perawatan" id="perawatan-page">Perawatan</a>
        <a href="index.php?page=kegiatan" id="kegiatan-page">Kegiatan</a>
        <span id="spanme"></span>
        <!-- <a href="index.php?page=login" id="login-page">Login</a> -->
    </div>
    <marquee><?=mysqli_fetch_array($query)['pemberitahuan_2']?></marquee>
    <div class="row">
        <div class="leftcolumn">
            <?php include "page/detail-ikan.html"?>
            <?php include "page/detail-umpan.html"?>
            <div class="card">
                <?php include "page/paging.php" ?>
            </div>
        </div>
        <div class="rightcolumn">
            <div class="card">
                <?php include "page/about.php" ?>
            </div>
            <div class="card">
                <?php include "page/lokasi.html" ?>
            </div>
            <div class="card">
                <?php include "page/socialmedia.html" ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php include "page/footer.html" ?>
    </div>
    <script src="js/aksi.js"></script>
    <script src="js/katalog.js"></script>
    <script src="js/kegiatan.js"></script>
    <script src="js/script.js"></script>
</body>


</html>