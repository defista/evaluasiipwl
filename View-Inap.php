<?php
if (session_id() == "")
{
   session_start();
}
if (!isset($_SESSION['username']))
{
   $_SESSION['referrer'] = $_SERVER['REQUEST_URI'];
   header('Location: ./index.php');
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
      header('Location: ./index.php');
      exit;
   }
}
$roles = array("Administrator", "Supervisi", "IPWL");
if (!in_array($_SESSION['role'], $roles))
{
   header('Location: ./index.php');
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
if (session_id() == "")
{
   session_start();
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Inap</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="View-Inap.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_Image1" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:7;">
<img src="images/logo e ipwl1.png" id="Image1" alt=""></div>

<div id="wb_Text3" style="position:absolute;left:9px;top:158px;width:406px;height:21px;z-index:9;">
<p style="font-size:19px;line-height:21px;font-weight:bold;color:#000000;"><span style="color:#000000;">VIEW LAPORAN RAWAT INAP</span></p></div>
<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:10;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<div id="wb_Image2" style="position:absolute;left:11px;top:364px;width:933px;height:893px;z-index:11;">
<img src="images/nr9g7r66ud.jpg" id="Image2" alt=""></div>
<div id="wb_Form1" style="position:absolute;left:11px;top:182px;width:623px;height:114px;z-index:12;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form1">
<label for="" id="Label1" style="position:absolute;left:4px;top:6px;width:123px;height:19px;line-height:19px;z-index:0;">Nama IPWL</label>
<label for="" id="Label2" style="position:absolute;left:4px;top:38px;width:123px;height:19px;line-height:19px;z-index:1;">Tahun Anggaran</label>
<label for="" id="Label3" style="position:absolute;left:5px;top:72px;width:123px;height:19px;line-height:19px;z-index:2;">Periode</label>
<input type="submit" id="Button1" name="Download Dokumen Bukti Dukung" value="Download Dokumen Bukti Dukung" style="position:absolute;left:262px;top:23px;width:174px;height:33px;z-index:3;">
<input type="submit" id="Button2" name="Download Rekapitulasi Pemanfaatan Bantuan" value="Download Rekapitulasi Pemanfaatan Bantuan" style="position:absolute;left:262px;top:59px;width:174px;height:33px;z-index:4;">
<input type="submit" id="Button3" name="Download Rincian Nota" value="Download Rincian Nota" style="position:absolute;left:441px;top:59px;width:174px;height:33px;z-index:5;">
<input type="submit" id="Button4" name="Download Rincian Penarikan" value="Download Rincian Penarikan" style="position:absolute;left:441px;top:23px;width:174px;height:33px;z-index:6;">
</form>
</div>
<div id="wb_Image3" style="position:absolute;left:11px;top:1349px;width:932px;height:570px;z-index:13;">
<img src="images/t9h1b8yx62.jpg" id="Image3" alt=""></div>
<div id="wb_Image4" style="position:absolute;left:11px;top:1295px;width:932px;height:42px;z-index:14;">
<img src="images/ny8l2q8wwa.jpg" id="Image4" alt=""></div>
<div id="wb_Image5" style="position:absolute;left:11px;top:315px;width:932px;height:40px;z-index:15;">
<img src="images/5h1dc3vdpe.jpg" id="Image5" alt=""></div>
<div id="wb_Image6" style="position:absolute;left:11px;top:2036px;width:933px;height:990px;z-index:16;">
<img src="images/1gmnbd8wmd.jpg" id="Image6" alt=""></div>
<div id="wb_Image7" style="position:absolute;left:9px;top:1971px;width:934px;height:47px;z-index:17;">
<img src="images/tdt6ododug.jpg" id="Image7" alt=""></div>
<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:18;">
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
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;visibility:hidden;text-align:center;z-index:19;">
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
<div id="wb_LoginName2" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:20;">
<span id="LoginName2">Anda Login Sebagai  <?php
if (isset($_SESSION['username']))
{
   echo $_SESSION['fullname'];
}
else
{
   echo 'Not logged in';
}
?></span></div>
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:21;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:22;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:23;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>