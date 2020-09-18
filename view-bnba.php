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
<title>View Data BNBA</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="view-bnba.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_Form1" style="position:absolute;left:18px;top:188px;width:702px;height:244px;z-index:16;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form1">
<div id="wb_Text1" style="position:absolute;left:4px;top:8px;width:66px;height:12px;z-index:0;">
<p style="font-size:11px;line-height:12px;color:#000000;"><span style="color:#000000;">Provinsi</span></p></div>
<div id="wb_Text2" style="position:absolute;left:4px;top:29px;width:176px;height:12px;z-index:1;">
<p style="font-size:11px;line-height:12px;color:#000000;"><span style="color:#000000;">Metode Yang Digunakan</span></p></div>
<div id="wb_Text7" style="position:absolute;left:165px;top:29px;width:176px;height:12px;z-index:2;">
<p style="font-size:11px;line-height:12px;color:#000000;"><span style="color:#000000;">Therapeutic Community</span></p></div>
<div id="wb_Text6" style="position:absolute;left:165px;top:8px;width:107px;height:12px;z-index:3;">
<p style="font-size:11px;line-height:12px;color:#000000;"><span style="color:#000000;">Jawa Barat</span></p></div>
<div id="wb_Text4" style="position:absolute;left:359px;top:8px;width:329px;height:12px;z-index:4;">
<p style="font-size:11px;line-height:12px;color:#000000;"><span style="color:#000000;">Nama Lembaga&nbsp;&nbsp; BRSKPN GALIH PAKUAN Bogor</span></p></div>
<div id="wb_Text5" style="position:absolute;left:359px;top:29px;width:302px;height:12px;z-index:5;">
<p style="font-size:11px;line-height:12px;color:#000000;"><span style="color:#000000;">Tahun&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 2020</span></p></div>
<a id="Button1" href="./bnba-content.php" style="position:absolute;left:447px;top:98px;width:79px;height:14px;z-index:6;">View</a>
<input type="submit" id="Button2" name="Download" value="Download" style="position:absolute;left:580px;top:98px;width:81px;height:16px;z-index:7;">
<a id="Button3" href="./bnba-content.php" style="position:absolute;left:447px;top:125px;width:79px;height:14px;z-index:8;">View</a>
<input type="submit" id="Button4" name="Download" value="Download" style="position:absolute;left:580px;top:125px;width:81px;height:16px;z-index:9;">
<a id="Button5" href="./bnba-content.php" style="position:absolute;left:447px;top:154px;width:79px;height:14px;z-index:10;">View</a>
<input type="submit" id="Button6" name="Download" value="Download" style="position:absolute;left:580px;top:154px;width:81px;height:16px;z-index:11;">
<a id="Button7" href="./bnba-content.php" style="position:absolute;left:447px;top:183px;width:79px;height:14px;z-index:12;">View</a>
<input type="submit" id="Button8" name="Download" value="Download" style="position:absolute;left:580px;top:183px;width:81px;height:16px;z-index:13;">
<table style="position:absolute;left:7px;top:67px;width:415px;height:140px;z-index:14;" id="Table1">
<tr>
<td class="cell0"><p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;"> NO</span></p></td>
<td class="cell1"><p style="color:#000000;"><span style="color:#000000;"> NAMA PPKS KPN</span></p></td>
</tr>
<tr>
<td class="cell2"><p style="font-size:8px;line-height:9.5px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell3"><p style="font-size:8px;line-height:9.5px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell4"><p style="font-size:8px;line-height:9.5px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell5"><p style="font-size:8px;line-height:9.5px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell4"><p style="font-size:8px;line-height:9.5px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell5"><p style="font-size:8px;line-height:9.5px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
<tr>
<td class="cell2"><p style="font-size:8px;line-height:9.5px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
<td class="cell3"><p style="font-size:8px;line-height:9.5px;color:#000000;"><span style="color:#000000;">&nbsp;</span></p></td>
</tr>
</table>
<input type="submit" id="Button9" name="Download All" value="Download All" style="position:absolute;left:580px;top:213px;width:81px;height:21px;z-index:15;">
</form>
</div>
<div id="wb_Image1" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:17;">
<img src="images/logo e ipwl1.png" id="Image1" alt=""></div>

<div id="wb_Text3" style="position:absolute;left:19px;top:157px;width:282px;height:20px;z-index:19;">
<p style="font-size:17px;line-height:20.5px;font-weight:bold;color:#000000;"><span style="color:#000000;">VIEW BNBA PPKS KPN DI IPWL</span></p></div>
<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:20;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:21;">
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
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:22;">
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
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:23;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:24;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:25;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>