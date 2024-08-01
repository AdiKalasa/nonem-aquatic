<!-- Sidebar -->
<div class="sidebar" id="mySidebar" style="background-color: #365486;">
<div class="side-header">
    <img src="./assets/images/logo.png" width="120" height="120" alt="Swiss Collection"> 
    <h5 style="margin-top:10px;">Hello, Admin</h5>
</div>

<hr style="border:1px solid; background-color:#365486; border-color:black;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="./index.php" onclick="changeSpotlight(this)" id="csl-spawn"><i class="fa fa-home"></i> Dashboard</a>
    <a href="#ddc-profile" onclick="dropDown('profile')"><i class="fa fa-users"></i> Profil</a>
    <ul class="dropdown-content ddc-profile">
        <li><a href="#announcement"  onclick="announcementShow();changeSpotlight(this)" > Pemberitahuan</a></li>
        <li><a href="#tentang"  onclick="aboutShow();changeSpotlight(this)" > Tentang</a></li>
        <li><a href="#funfact"  onclick="funfactShow();changeSpotlight(this)" > Fun Fact</a></li>
    </ul>
    <a href="#ddc-katalog" onclick="dropDown('katalog')"><i class="fa fa-th-list"></i> Katalog</a>
    <ul class="dropdown-content ddc-katalog">
        <li><a href="#katikan"  onclick="katikanShow();changeSpotlight(this)" > Ikan</a></li>
        <li><a href="#keperluan"  onclick="katuanShow();changeSpotlight(this)" > Keperluan</a></li>
    </ul>
    
    <a href="#perawatan"   onclick="careShow();changeSpotlight(this)" ><i class="fa fa-th-large"></i> Perawatan</a>
    <a href="#kegiatan"  onclick="actShow();changeSpotlight(this)" ><i class="fa fa-th"></i> Kegiatan</a>
  <!---->
</div>
 
<div id="main">
    <button class="openbtn birukan" onclick="openNav()"><i class="fa fa-home putihkan"></i></button>
</div>


