<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   $_SESSION['referrer'] = $_SERVER['REQUEST_URI'];
   header('Location: ./akses-ditolak.html');
   exit;
}
if (isset($_SESSION['expires_by']))
{
   $expires_by = intval($_SESSION['expires_by']);
   if (time() < $expires_by)
   {
      $_SESSION['expires_by'] = time() + intval($_SESSION['expires_timeout']);
   }
   else
   {
      unset($_SESSION['username']);
      unset($_SESSION['expires_by']);
      unset($_SESSION['expires_timeout']);
      $_SESSION['referrer'] = $_SERVER['REQUEST_URI'];
      header('Location: ./akses-ditolak.html');
      exit;
   }
}
$roles = array("Administrator", "Supervisi", "IPWL");
if (!in_array($_SESSION['role'], $roles))
{
   header('Location: ./akses-ditolak.html');
   exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'logoutform')
{
   if (session_id() == "")
   {
      session_start();
   }
   unset($_SESSION['username']);
   unset($_SESSION['fullname']);
   header('Location: ./index.php');
   exit;
}
if (session_id() == "")
{
   session_start();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>e-Evaluasi IPWL Beranda</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="Laporan-Kegiatan.css" rel="stylesheet">
<script src="jquery-3.4.1.min.js"></script>
<script src="wwb15.min.js"></script>
</head>
<body>
<div id="container">
<div id="wb_Image1" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:47;">
<img src="images/logo e ipwl1.png" id="Image1" alt=""></div>

<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:49;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<div id="wb_Form1" style="position:absolute;left:11px;top:174px;width:580px;height:831px;z-index:50;">
<form name="uploadform" method="post" action="<?php echo basename(__FILE__);  ?>" enctype="multipart/form-data" id="Form1">
<label for="" id="Label1" style="position:absolute;left:321px;top:81px;width:44px;height:16px;line-height:16px;z-index:0;">Durasi</label>
<label for="" id="Label2" style="position:absolute;left:1px;top:41px;width:46px;height:16px;line-height:16px;z-index:1;">Tanggal</label>
<label for="" id="Label3" style="position:absolute;left:310px;top:41px;width:55px;height:16px;line-height:16px;z-index:2;">Tahun</label>
<label for="" id="Label4" style="position:absolute;left:1px;top:81px;width:101px;height:16px;line-height:16px;z-index:3;">Jenis Kegiatan</label>
<label for="" id="Label5" style="position:absolute;left:437px;top:81px;width:44px;height:16px;line-height:16px;z-index:4;">Menit</label>
<label for="" id="Label6" style="position:absolute;left:1px;top:189px;width:123px;height:16px;line-height:16px;z-index:5;">Petugas Pelaksana</label>
<label for="" id="Label7" style="position:absolute;left:321px;top:189px;width:169px;height:16px;line-height:16px;z-index:6;">Nama Petugas Pelaksana</label>
<label for="" id="Label8" style="position:absolute;left:1px;top:135px;width:169px;height:16px;line-height:16px;z-index:7;">Nama Kegiatan</label>
<label for="" id="Label9" style="position:absolute;left:1px;top:245px;width:169px;height:16px;line-height:16px;z-index:8;">Uraian Kegiatan</label>
<label for="" id="Label10" style="position:absolute;left:1px;top:411px;width:169px;height:16px;line-height:16px;z-index:9;">Hasil Kegiatan</label>
<a id="Button1" href="file://" onclick="ShowObject('wb_Picture1', 1);return false;" style="position:absolute;left:447px;top:560px;width:113px;height:26px;z-index:10;">View Photo</a>
<label for="" id="Label11" style="position:absolute;left:110px;top:41px;width:35px;height:16px;line-height:16px;z-index:11;">Bulan</label>
<picture id="wb_Picture1" style="position:absolute;left:310px;top:605px;width:252px;height:154px;visibility:hidden;z-index:12">
<img src="2. Weekend Wrap Up Group.jpeg" id="Picture1" alt="" srcset="">
</picture>
<a id="Button2" href="file://" onclick="ShowObject('Button2', 1);return false;" style="position:absolute;left:447px;top:789px;width:113px;height:26px;z-index:13;">Download .pdf</a>
<label for="" id="Label12" style="position:absolute;left:1px;top:8px;width:144px;height:16px;line-height:16px;z-index:14;">Nama IPWL</label>
</form>
</div>
<div id="wb_Form2" style="position:absolute;left:11px;top:1019px;width:580px;height:831px;z-index:51;">
<form name="uploadform" method="post" action="<?php echo basename(__FILE__);  ?>" enctype="multipart/form-data" id="Form2">
<label for="" id="Label13" style="position:absolute;left:321px;top:81px;width:44px;height:16px;line-height:16px;z-index:15;">Durasi</label>
<label for="" id="Label14" style="position:absolute;left:1px;top:41px;width:46px;height:16px;line-height:16px;z-index:16;">Tanggal</label>
<label for="" id="Label15" style="position:absolute;left:310px;top:41px;width:55px;height:16px;line-height:16px;z-index:17;">Tahun</label>
<label for="" id="Label16" style="position:absolute;left:1px;top:81px;width:101px;height:16px;line-height:16px;z-index:18;">Jenis Kegiatan</label>
<label for="" id="Label17" style="position:absolute;left:437px;top:81px;width:44px;height:16px;line-height:16px;z-index:19;">Menit</label>
<label for="" id="Label18" style="position:absolute;left:1px;top:189px;width:123px;height:16px;line-height:16px;z-index:20;">Petugas Pelaksana</label>
<label for="" id="Label19" style="position:absolute;left:321px;top:189px;width:169px;height:16px;line-height:16px;z-index:21;">Nama Petugas Pelaksana</label>
<label for="" id="Label20" style="position:absolute;left:1px;top:135px;width:169px;height:16px;line-height:16px;z-index:22;">Nama Kegiatan</label>
<label for="" id="Label21" style="position:absolute;left:1px;top:245px;width:169px;height:16px;line-height:16px;z-index:23;">Uraian Kegiatan</label>
<label for="" id="Label22" style="position:absolute;left:1px;top:411px;width:169px;height:16px;line-height:16px;z-index:24;">Hasil Kegiatan</label>
<a id="Button3" href="file://" onclick="ShowObject('wb_Picture2', 1);return false;" style="position:absolute;left:447px;top:560px;width:113px;height:26px;z-index:25;">View Photo</a>
<label for="" id="Label23" style="position:absolute;left:110px;top:41px;width:35px;height:16px;line-height:16px;z-index:26;">Bulan</label>
<picture id="wb_Picture2" style="position:absolute;left:310px;top:605px;width:252px;height:154px;visibility:hidden;z-index:27">
<img src="2. Weekend Wrap Up Group.jpeg" id="Picture2" alt="" srcset="">
</picture>
<a id="Button4" href="file://" onclick="ShowObject('Button4', 1);return false;" style="position:absolute;left:447px;top:789px;width:113px;height:26px;z-index:28;">Download .pdf</a>
<label for="" id="Label24" style="position:absolute;left:1px;top:8px;width:144px;height:16px;line-height:16px;z-index:29;">Nama IPWL</label>
<label for="" id="Label38" style="position:absolute;left:132px;top:8px;width:226px;height:16px;line-height:16px;z-index:30;">Yayasan Sahabat Rekan Sebaya</label>
</form>
</div>
<div id="wb_Form3" style="position:absolute;left:11px;top:1864px;width:580px;height:831px;z-index:52;">
<form name="uploadform" method="post" action="<?php echo basename(__FILE__);  ?>" enctype="multipart/form-data" id="Form3">
<label for="" id="Label25" style="position:absolute;left:321px;top:81px;width:44px;height:16px;line-height:16px;z-index:31;">Durasi</label>
<label for="" id="Label26" style="position:absolute;left:1px;top:41px;width:46px;height:16px;line-height:16px;z-index:32;">Tanggal</label>
<label for="" id="Label27" style="position:absolute;left:310px;top:41px;width:55px;height:16px;line-height:16px;z-index:33;">Tahun</label>
<label for="" id="Label28" style="position:absolute;left:1px;top:81px;width:101px;height:16px;line-height:16px;z-index:34;">Jenis Kegiatan</label>
<label for="" id="Label29" style="position:absolute;left:437px;top:81px;width:44px;height:16px;line-height:16px;z-index:35;">Menit</label>
<label for="" id="Label30" style="position:absolute;left:1px;top:189px;width:123px;height:16px;line-height:16px;z-index:36;">Petugas Pelaksana</label>
<label for="" id="Label31" style="position:absolute;left:321px;top:189px;width:169px;height:16px;line-height:16px;z-index:37;">Nama Petugas Pelaksana</label>
<label for="" id="Label32" style="position:absolute;left:1px;top:135px;width:169px;height:16px;line-height:16px;z-index:38;">Nama Kegiatan</label>
<label for="" id="Label33" style="position:absolute;left:1px;top:245px;width:169px;height:16px;line-height:16px;z-index:39;">Uraian Kegiatan</label>
<label for="" id="Label34" style="position:absolute;left:1px;top:411px;width:169px;height:16px;line-height:16px;z-index:40;">Hasil Kegiatan</label>
<a id="Button5" href="file://" onclick="ShowObject('wb_Picture2', 1);return false;" style="position:absolute;left:447px;top:560px;width:113px;height:26px;z-index:41;">View Photo</a>
<label for="" id="Label35" style="position:absolute;left:110px;top:41px;width:35px;height:16px;line-height:16px;z-index:42;">Bulan</label>
<picture id="wb_Picture3" style="position:absolute;left:310px;top:605px;width:252px;height:154px;visibility:hidden;z-index:43">
<img src="2. Weekend Wrap Up Group.jpeg" id="Picture3" alt="" srcset="">
</picture>
<a id="Button6" href="file://" onclick="ShowObject('Button6', 1);return false;" style="position:absolute;left:447px;top:789px;width:113px;height:26px;z-index:44;">Download .pdf</a>
<label for="" id="Label36" style="position:absolute;left:1px;top:8px;width:144px;height:16px;line-height:16px;z-index:45;">Nama IPWL</label>
<label for="" id="Label39" style="position:absolute;left:132px;top:8px;width:226px;height:16px;line-height:16px;z-index:46;">Yayasan Sahabat Rekan Sebaya</label>
</form>
</div>
<input type="submit" id="Button7" name="Download 1" value="Download Rekap Kegiatan Harian" style="position:absolute;left:606px;top:174px;width:144px;height:37px;z-index:53;">
<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:54;">
<label class="toggle" for="ResponsiveMenu1-submenu" id="ResponsiveMenu1-title">Menu<span id="ResponsiveMenu1-icon"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></span></label>
<input type="checkbox" id="ResponsiveMenu1-submenu">
<ul class="ResponsiveMenu1" id="ResponsiveMenu1" role="menu">
<li>
<label for="ResponsiveMenu1-submenu-0" class="toggle"><i class="fa fa-building-o fa-2x">&nbsp;</i>Profil&nbsp;IPWL<b class="arrow-down"></b></label>
<a role="menuitem" href="#"><i class="fa fa-building-o fa-2x">&nbsp;</i><br>Profil&nbsp;IPWL<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-0">
<ul role="menu">
<li><a role="menuitem" href="./Profile-View.php">Lihat&nbsp;Profil</a></li>
<li><a role="menuitem" href="./Profile-Input.php">Input&nbsp;Profil</a></li>
<li><a role="menuitem" href="./Search-Profile.php">Cari&nbsp;Profil</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-1" class="toggle"><i class="fa fa-newspaper-o fa-2x">&nbsp;</i>Akreditasi&nbsp;IPWL<b class="arrow-down"></b></label>
<a role="menuitem" href="#"><i class="fa fa-newspaper-o fa-2x">&nbsp;</i><br>Akreditasi&nbsp;IPWL<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-1">
<ul role="menu">
<li><a role="menuitem" href="./Akreditasi-IPWL.php">View&nbsp;Akreditasi</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-2" class="toggle"><i class="fa fa-user-circle-o fa-2x">&nbsp;</i>Profil&nbsp;SDM<b class="arrow-down"></b></label>
<a role="menuitem" href="#"><i class="fa fa-user-circle-o fa-2x">&nbsp;</i><br>Profil&nbsp;SDM<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-2">
<ul role="menu">
<li>
<label for="ResponsiveMenu1-submenu-3" class="toggle">Pekerja&nbsp;Sosial<b class="arrow-down"></b></label>
<a role="menuitem" href="#">Pekerja&nbsp;Sosial<b class="arrow-left"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-3">
<ul role="menu">
<li><a role="menuitem" href="./Konselor-Input.php">Input&nbsp;Profil&nbsp;Pekerja&nbsp;Sosial</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-4" class="toggle">Konselor&nbsp;Adiksi<b class="arrow-down"></b></label>
<a role="menuitem" href="#">Konselor&nbsp;Adiksi<b class="arrow-left"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-4">
<ul role="menu">
<li><a role="menuitem" href="./Konselor-Input.php">Input&nbsp;Profil&nbsp;Konselor</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-5" class="toggle">SDM&nbsp;Lainnya<b class="arrow-down"></b></label>
<a role="menuitem" href="#">SDM&nbsp;Lainnya<b class="arrow-left"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-5">
<ul role="menu">
<li><a role="menuitem" href="./Input-SDM-lain.php">Input&nbsp;Profil&nbsp;SDM&nbsp;Lainya</a></li>
</ul>
</li>
<li><a role="menuitem" href="./SDM-view.php">View&nbsp;Profil&nbsp;SDM</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-6" class="toggle"><i class="fa fa-street-view fa-2x">&nbsp;</i>Laporan&nbsp;Kegiatan&nbsp;Rehsos<b class="arrow-down"></b></label>
<a role="menuitem" href="#"><i class="fa fa-street-view fa-2x">&nbsp;</i><br>Laporan&nbsp;Kegiatan&nbsp;Rehsos<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-6">
<ul role="menu">
<li>
<label for="ResponsiveMenu1-submenu-7" class="toggle">Laporan&nbsp;Kegiatan<b class="arrow-down"></b></label>
<a role="menuitem" href="#">Laporan&nbsp;Kegiatan<b class="arrow-left"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-7">
<ul role="menu">
<li><a role="menuitem" href="./Input-Kegiatan.php">Input&nbsp;Kegiatan&nbsp;Rehsos</a></li>
<li><a role="menuitem" href="./View-Kegiatan.php">View&nbsp;Kegiatan&nbsp;Rehsos</a></li>
<li><a role="menuitem" href="./Kegiatan-Search.php">Search&nbsp;Kegiatan&nbsp;Rehsos</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-8" class="toggle">Alur&nbsp;Pelayanan<b class="arrow-down"></b></label>
<a role="menuitem" href="#">Alur&nbsp;Pelayanan<b class="arrow-left"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-8">
<ul role="menu">
<li><a role="menuitem" href="./Input-Alur.php">Input&nbsp;Alur&nbsp;Pelayanan</a></li>
<li><a role="menuitem" href="./view-alur.php">View&nbsp;Alur&nbsp;Pelayanan</a></li>
<li><a role="menuitem" href="./Search-Alur.php">Search&nbsp;Alur&nbsp;Pelayanan</a></li>
</ul>
</li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-9" class="toggle"><i class="fa fa-bar-chart fa-2x">&nbsp;</i>Laporan&nbsp;Keuangan<b class="arrow-down"></b></label>
<a role="menuitem" href="#"><i class="fa fa-bar-chart fa-2x">&nbsp;</i><br>Laporan&nbsp;Keuangan<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-9">
<ul role="menu">
<li>
<label for="ResponsiveMenu1-submenu-10" class="toggle">View&nbsp;Laporan&nbsp;Keuangan<b class="arrow-down"></b></label>
<a role="menuitem" href="#">View&nbsp;Laporan&nbsp;Keuangan<b class="arrow-left"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-10">
<ul role="menu">
<li><a role="menuitem" href="./View-Inap.php">View&nbsp;Penggunaan&nbsp;Rawat&nbsp;Inap</a></li>
<li><a role="menuitem" href="./View-Jalan.php">View&nbsp;Penggunaan&nbsp;Rawat&nbsp;Jalan</a></li>
<li><a role="menuitem" href="./view-after.php">View&nbsp;Penggunaan&nbsp;Aftercare</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-11" class="toggle">Input&nbsp;Laporan&nbsp;Keuangan<b class="arrow-down"></b></label>
<a role="menuitem" href="#">Input&nbsp;Laporan&nbsp;Keuangan<b class="arrow-left"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-11">
<ul role="menu">
<li><a role="menuitem" href="./input-inap.php">Input&nbsp;Penggunaan&nbsp;Rawat&nbsp;Inap</a></li>
<li><a role="menuitem" href="./input-jalan.php">Input&nbsp;Penggunaan&nbsp;Rawat&nbsp;Jalan</a></li>
<li><a role="menuitem" href="./input-after.php">Input&nbsp;Penggunaan&nbsp;Aftercare</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-12" class="toggle">Search&nbsp;Laporan&nbsp;Keuangan<b class="arrow-down"></b></label>
<a role="menuitem" href="#">Search&nbsp;Laporan&nbsp;Keuangan<b class="arrow-left"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-12">
<ul role="menu">
<li><a role="menuitem" href="./search-inap.php">Search&nbsp;Laporan&nbsp;Keuangan&nbsp;Rawat&nbsp;Inap</a></li>
<li><a role="menuitem" href="./search-jalan.php">Search&nbsp;Laporan&nbsp;Keuangan&nbsp;Rawat&nbsp;Jalan</a></li>
<li><a role="menuitem" href="./search-aftercare.php">Search&nbsp;Laporan&nbsp;Keuangan&nbsp;Aftercare</a></li>
</ul>
</li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-13" class="toggle"><i class="fa fa-address-book-o fa-2x">&nbsp;</i>Data&nbsp;PPKS&nbsp;KPN<b class="arrow-down"></b></label>
<a role="menuitem" href="#"><i class="fa fa-address-book-o fa-2x">&nbsp;</i><br>Data&nbsp;PPKS&nbsp;KPN<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-13">
<ul role="menu">
<li><a role="menuitem" href="./view-bnba.php">View&nbsp;BNBA&nbsp;PPKS&nbsp;KPN</a></li>
<li><a role="menuitem" href="./input-bnba.php">Input&nbsp;BNBA&nbsp;PPKS&nbsp;KPN</a></li>
<li><a role="menuitem" href="./search-bnba.php">Search&nbsp;BNBA&nbsp;PPKS&nbsp;KPN</a></li>
</ul>
</li>
<li>
<label for="ResponsiveMenu1-submenu-14" class="toggle"><i class="fa fa-book fa-2x">&nbsp;</i>Rekapitulasi&nbsp;Data<b class="arrow-down"></b></label>
<a role="menuitem" href="#"><i class="fa fa-book fa-2x">&nbsp;</i><br>Rekapitulasi&nbsp;Data<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-14">
<ul role="menu">
<li><a role="menuitem" href="./rekap-evaluasi.php">Rekapitulasi&nbsp;Hasil&nbsp;Evaluasi&nbsp;IPWL</a></li>
<li><a role="menuitem" href="./peringkat.php">Peringkat&nbsp;Hasil&nbsp;Evaluasi</a></li>
</ul>
</li>
</ul>
</div>
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:55;">
<span id="LoginName1">Anda Login Sebagai  <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['fullname'];
}
else
{
   echo 'Not logged in';
}
?></span></div>
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:56;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:57;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:58;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>