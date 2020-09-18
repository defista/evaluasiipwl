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
$roles = array("Administrator", "Supervisi");
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
<title>SDM View</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="SDM-view.css" rel="stylesheet">
<script src="jquery-3.4.1.min.js"></script>
<script src="wwb15.min.js"></script>
</head>
<body>
<div id="container">
<div id="wb_Form1" style="position:absolute;visibility:hidden;left:11px;top:466px;width:734px;height:724px;z-index:34;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form1">
<input type="submit" id="Button3" name="View" value="View" style="position:absolute;left:573px;top:323px;width:107px;height:26px;z-index:0;">
<input type="submit" id="Button4" name="View" value="View" style="position:absolute;left:576px;top:403px;width:107px;height:26px;z-index:1;">
<input type="submit" id="Button5" name="View" value="View" style="position:absolute;left:576px;top:433px;width:107px;height:26px;z-index:2;">
<input type="submit" id="Button7" name="View" value="View" style="position:absolute;left:576px;top:463px;width:107px;height:26px;z-index:3;">
<input type="submit" id="Button8" name="View" value="View" style="position:absolute;left:576px;top:493px;width:107px;height:26px;z-index:4;">
<input type="submit" id="Button9" name="View" value="View" style="position:absolute;left:576px;top:523px;width:107px;height:26px;z-index:5;">
<input type="submit" id="Button10" name="View" value="View" style="position:absolute;left:576px;top:553px;width:107px;height:26px;z-index:6;">
<input type="submit" id="Button11" name="View" value="View" style="position:absolute;left:576px;top:583px;width:107px;height:26px;z-index:7;">
<input type="submit" id="Button12" name="View" value="View" style="position:absolute;left:576px;top:613px;width:107px;height:26px;z-index:8;">
<input type="submit" id="Button13" name="View" value="View" style="position:absolute;left:576px;top:644px;width:107px;height:26px;z-index:9;">
<input type="submit" id="Button14" name="View" value="View" style="position:absolute;left:576px;top:674px;width:107px;height:26px;z-index:10;">
<label for="Text4" id="Label26" style="position:absolute;left:151px;top:674px;width:98px;height:16px;line-height:16px;z-index:11;">Nama Kegiatan</label>
<label for="Text4" id="Label25" style="position:absolute;left:151px;top:644px;width:98px;height:16px;line-height:16px;z-index:12;">Nama Kegiatan</label>
<label for="Text4" id="Label24" style="position:absolute;left:151px;top:613px;width:98px;height:16px;line-height:16px;z-index:13;">Nama Kegiatan</label>
<label for="Text4" id="Label23" style="position:absolute;left:151px;top:583px;width:98px;height:16px;line-height:16px;z-index:14;">Nama Kegiatan</label>
<label for="Text4" id="Label22" style="position:absolute;left:151px;top:553px;width:98px;height:16px;line-height:16px;z-index:15;">Nama Kegiatan</label>
<label for="Text4" id="Label21" style="position:absolute;left:151px;top:523px;width:98px;height:16px;line-height:16px;z-index:16;">Nama Kegiatan</label>
<label for="Text4" id="Label20" style="position:absolute;left:151px;top:493px;width:98px;height:16px;line-height:16px;z-index:17;">Nama Kegiatan</label>
<label for="Text4" id="Label19" style="position:absolute;left:151px;top:463px;width:98px;height:16px;line-height:16px;z-index:18;">Nama Kegiatan</label>
<label for="Text4" id="Label18" style="position:absolute;left:151px;top:433px;width:98px;height:16px;line-height:16px;z-index:19;">Nama Kegiatan</label>
<label for="Text4" id="Label17" style="position:absolute;left:151px;top:403px;width:98px;height:16px;line-height:16px;z-index:20;">Nama Kegiatan</label>
<label for="" id="Label15" style="position:absolute;left:150px;top:374px;width:113px;height:16px;line-height:16px;z-index:21;">Sertifikat Pelatihan</label>
<label for="" id="Label14" style="position:absolute;left:149px;top:325px;width:113px;height:16px;line-height:16px;z-index:22;">Pendidikan Terakhir</label>
<label for="" id="Label4" style="position:absolute;left:148px;top:255px;width:98px;height:16px;line-height:16px;z-index:23;">Jabatan</label>
<label for="" id="Label8" style="position:absolute;left:148px;top:229px;width:98px;height:16px;line-height:16px;z-index:24;">e-Mail</label>
<label for="" id="Label3" style="position:absolute;left:148px;top:199px;width:98px;height:16px;line-height:16px;z-index:25;">Nomor Telp</label>
<label for="Text4" id="Label12" style="position:absolute;left:148px;top:167px;width:98px;height:16px;line-height:16px;z-index:26;">N.I.K</label>
<input type="submit" id="Button6" name="View" value="View" style="position:absolute;left:573px;top:167px;width:107px;height:26px;z-index:27;">
<label for="" id="Label10" style="position:absolute;left:415px;top:106px;width:81px;height:16px;line-height:16px;z-index:28;">Tanggal Lahir</label>
<label for="" id="Label11" style="position:absolute;left:148px;top:139px;width:98px;height:16px;line-height:16px;z-index:29;">Jenis Kelamin</label>
<label for="" id="Label7" style="position:absolute;left:148px;top:106px;width:98px;height:16px;line-height:16px;z-index:30;">Tempat Lahir</label>
<label for="Combobox3" id="Label2" style="position:absolute;left:148px;top:43px;width:98px;height:16px;line-height:16px;z-index:31;">Alamat</label>
<label for="Text4" id="Label1" style="position:absolute;left:148px;top:12px;width:98px;height:16px;line-height:16px;z-index:32;">Nama</label>
<div id="wb_Image3" style="position:absolute;left:14px;top:12px;width:126px;height:145px;z-index:33;">
<img src="images/creative-illustration-default-avatar-profile-placeholder-isolated-background-art-design-grey-photo-blank-template-mockup-144849704.jpg" id="Image3" alt=""></div>
</form>
</div>
<div id="wb_Image1" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:35;">
<img src="images/logo e ipwl1.png" id="Image1" alt=""></div>

<div id="wb_Text3" style="position:absolute;left:19px;top:155px;width:183px;height:30px;z-index:37;">
<p style="font-size:27px;line-height:30px;font-weight:bold;color:#000000;"><span style="color:#000000;">Profil SDM</span></p></div>
<div id="wb_Text1" style="position:absolute;left:19px;top:211px;width:218px;height:17px;z-index:38;">
<p style="font-size:15px;line-height:16.5px;color:#000000;"><span style="color:#000000;">PILIH NAMA IPWL</span></p></div>
<select name="Combobox1" size="1" id="Combobox2" style="position:absolute;left:19px;top:233px;width:222px;height:28px;z-index:39;">
<option selected value="">--- PILIH NAMA IPWL ---</option>
<option>BRSKPN GALIH PAKUAN BOGOR</option>
<option>SOCIETA INDONESIA</option>
<option>PENUAI</option>
<option>YAKITA </option>
</select>
<div id="wb_Text4" style="position:absolute;left:19px;top:280px;width:218px;height:17px;z-index:40;">
<p style="font-size:15px;line-height:16.5px;color:#000000;"><span style="color:#000000;">PILIH STATUS SDM</span></p></div>
<select name="Combobox1" size="1" id="Combobox3" style="position:absolute;left:19px;top:302px;width:222px;height:28px;z-index:41;">
<option selected value="">--- PILIH STATUS SDM ---</option>
<option>Pekerja Sosial</option>
<option>Konselor Adiksi</option>
</select>
<div id="wb_Text2" style="position:absolute;left:17px;top:349px;width:218px;height:17px;z-index:42;">
<p style="font-size:15px;line-height:16.5px;color:#000000;"><span style="color:#000000;">PILIH NAMA SDM</span></p></div>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:17px;top:371px;width:222px;height:28px;z-index:43;">
<option selected value="">--- PILIH NAMASDM ---</option>
<option>KONSELOR A</option>
<option>PEKSOS A</option>
</select>
<a id="Button2" href="" onclick="ShowObject('wb_Form1', 1);ShowObject('Button1', 1);return false;" style="position:absolute;left:131px;top:409px;width:102px;height:22px;z-index:44;">Lihat Profil</a>
<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:45;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<a id="Button1" href="" onclick="ShowObject('wb_Form1', 1);return false;" style="position:absolute;left:579px;top:480px;width:102px;height:22px;visibility:hidden;z-index:46;">Download .pdf</a>
<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:47;">
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
<li><a role="menuitem" href="./input-jalan.php">Input&nbsp;Penggunaan&nbsp;Rawat&nbsp;Jalan</a></li>
<li><a role="menuitem" href="./input-inap.php">Input&nbsp;Penggunaan&nbsp;Rawat&nbsp;Inap</a></li>
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
</ul>
</li>
</ul>
</div>
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:48;">
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
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:49;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:50;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:51;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>