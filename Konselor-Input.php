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
$roles = array("Administrator", "IPWL");
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
<title>SDM Input</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="Konselor-Input.css" rel="stylesheet">
<script src="jquery-3.4.1.min.js"></script>
<script src="wwb15.min.js"></script>
</head>
<body>
<div id="container">

<div id="wb_Text3" style="position:absolute;left:19px;top:155px;width:266px;height:30px;z-index:66;">
<p style="font-size:27px;line-height:30px;font-weight:bold;color:#000000;"><span style="color:#000000;">EDIT PROFIL SDM</span></p></div>
<div id="wb_Image1" style="position:absolute;left:19px;top:204px;width:126px;height:145px;z-index:67;">
<img src="images/creative-illustration-default-avatar-profile-placeholder-isolated-background-art-design-grey-photo-blank-template-mockup-144849704.jpg" id="Image1" alt=""></div>
<input type="submit" id="Button2" name="Upload Foto" value="Upload Foto" style="position:absolute;left:66px;top:358px;width:77px;height:25px;z-index:68;">
<div id="wb_Form1" style="position:absolute;left:154px;top:204px;width:571px;height:816px;z-index:69;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form1">
<label for="Label1" id="Label1" style="position:absolute;left:6px;top:37px;width:98px;height:16px;line-height:16px;z-index:0;">Nama</label>
<label for="Label2" id="Label2" style="position:absolute;left:6px;top:68px;width:98px;height:16px;line-height:16px;z-index:1;">Alamat</label>
<input type="text" id="Editbox1" style="position:absolute;left:150px;top:37px;width:281px;height:16px;z-index:2;" name="Nama IPWL" value="" spellcheck="false">
<input type="text" id="Editbox2" style="position:absolute;left:150px;top:68px;width:281px;height:16px;z-index:3;" name="Alamat Row 1" value="" maxlength="35" spellcheck="false">
<input type="text" id="Editbox3" style="position:absolute;left:150px;top:99px;width:281px;height:16px;z-index:4;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label3" style="position:absolute;left:6px;top:224px;width:98px;height:16px;line-height:16px;z-index:5;">Nomor Telp</label>
<input type="text" id="Editbox4" style="position:absolute;left:150px;top:224px;width:44px;height:16px;z-index:6;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label4" style="position:absolute;left:6px;top:280px;width:98px;height:16px;line-height:16px;z-index:7;">Jabatan</label>
<label for="" id="Label5" style="position:absolute;left:150px;top:281px;width:98px;height:16px;line-height:16px;z-index:8;">Konselor Adiksi</label>
<label for="" id="Label6" style="position:absolute;left:273px;top:281px;width:98px;height:16px;line-height:16px;z-index:9;">Pekerja Sosial</label>
<input type="text" id="Editbox8" style="position:absolute;left:207px;top:224px;width:134px;height:16px;z-index:10;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label8" style="position:absolute;left:6px;top:254px;width:98px;height:16px;line-height:16px;z-index:11;">e-Mail</label>
<input type="text" id="Editbox9" style="position:absolute;left:150px;top:254px;width:191px;height:16px;z-index:12;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label9" style="position:absolute;left:6px;top:5px;width:178px;height:16px;line-height:16px;z-index:13;">A. IDENTITAS SDM</label>
<label for="" id="Label16" style="position:absolute;left:151px;top:317px;width:232px;height:16px;line-height:16px;z-index:14;">*(harap upload file dengan format .jpeg / .png / .pdf)</label>
<div id="wb_Checkbox28" style="position:absolute;left:250px;top:286px;width:15px;height:18px;z-index:15;">
<input type="checkbox" id="Checkbox28" name="Checkbox28" value="on" style="position:absolute;left:0;top:0;"><label for="Checkbox28"></label></div>
<div id="wb_Checkbox29" style="position:absolute;left:376px;top:286px;width:15px;height:18px;z-index:16;">
<input type="checkbox" id="Checkbox29" name="Checkbox28" value="on" style="position:absolute;left:0;top:0;"><label for="Checkbox29"></label></div>
<label for="" id="Label13" style="position:absolute;left:6px;top:317px;width:137px;height:16px;line-height:16px;z-index:17;">B. Berkas Pendukung</label>
<label for="" id="Label7" style="position:absolute;left:6px;top:131px;width:98px;height:16px;line-height:16px;z-index:18;">Tempat Lahir</label>
<input type="text" id="Editbox5" style="position:absolute;left:150px;top:131px;width:114px;height:16px;z-index:19;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label10" style="position:absolute;left:273px;top:131px;width:81px;height:16px;line-height:16px;z-index:20;">Tanggal Lahir</label>
<input type="text" id="Editbox6" style="position:absolute;left:359px;top:131px;width:25px;height:16px;z-index:21;" name="hari" value="hr" spellcheck="false">
<input type="text" id="Editbox7" style="position:absolute;left:396px;top:131px;width:25px;height:16px;z-index:22;" name="Bulan" value="bln" spellcheck="false">
<input type="text" id="Editbox10" style="position:absolute;left:433px;top:131px;width:60px;height:16px;z-index:23;" name="Tahun" value="Tahun" spellcheck="false">
<label for="" id="Label11" style="position:absolute;left:6px;top:164px;width:98px;height:16px;line-height:16px;z-index:24;">Jenis Kelamin</label>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:151px;top:162px;width:124px;height:28px;z-index:25;">
<option value="">Laki - Laki</option>
<option>Perempuan</option>
</select>
<input type="text" id="Editbox11" style="position:absolute;left:150px;top:192px;width:281px;height:16px;z-index:26;" name="Nama IPWL" value="" spellcheck="false">
<label for="Label1" id="Label12" style="position:absolute;left:6px;top:192px;width:98px;height:16px;line-height:16px;z-index:27;">N.I.K</label>
<input type="submit" id="Button6" name="Upload KTP" value="Upload KTP" style="position:absolute;left:452px;top:192px;width:107px;height:26px;z-index:28;">
<label for="" id="Label14" style="position:absolute;left:7px;top:350px;width:113px;height:16px;line-height:16px;z-index:29;">Pendidikan Terakhir</label>
<select name="Combobox2" size="1" id="Combobox2" style="position:absolute;left:152px;top:348px;width:110px;height:28px;z-index:30;">
<option value="SD">SD</option>
<option value="SMP">SMP</option>
<option value="SMA">SMA</option>
<option>D1</option>
<option>D2</option>
<option>D3</option>
<option>S1</option>
<option>S2</option>
<option>S3</option>
</select>
<input type="submit" id="Button3" name="Upload Izajah" value="Upload Izajah" style="position:absolute;left:452px;top:348px;width:107px;height:26px;z-index:31;">
<label for="" id="Label15" style="position:absolute;left:8px;top:399px;width:113px;height:16px;line-height:16px;z-index:32;">Sertifikat Pelatihan</label>
<label for="Label1" id="Label17" style="position:absolute;left:9px;top:428px;width:98px;height:16px;line-height:16px;z-index:33;">Nama Pelatihan</label>
<input type="text" id="Editbox12" style="position:absolute;left:153px;top:428px;width:281px;height:16px;z-index:34;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button4" onclick="ShowObject('Label18', 1);ShowObject('Editbox13', 1);ShowObject('Button5', 1);return false;" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:428px;width:107px;height:26px;z-index:35;">
<label for="Label1" id="Label18" style="visibility:hidden;position:absolute;left:9px;top:458px;width:98px;height:16px;line-height:16px;z-index:36;">Nama Pelatihan</label>
<input type="text" id="Editbox13" style="position:absolute;left:153px;top:458px;width:281px;visibility:hidden;height:16px;z-index:37;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button5" onclick="ShowObject('Label19', 1);ShowObject('Editbox14', 1);ShowObject('Button7', 1);return false;" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:458px;width:107px;height:26px;visibility:hidden;z-index:38;">
<label for="Label1" id="Label19" style="visibility:hidden;position:absolute;left:9px;top:488px;width:98px;height:16px;line-height:16px;z-index:39;">Nama Pelatihan</label>
<input type="text" id="Editbox14" style="position:absolute;left:153px;top:488px;width:281px;visibility:hidden;height:16px;z-index:40;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button7" onclick="ShowObject('Label20', 1);ShowObject('Editbox15', 1);ShowObject('Button8', 1);return false;" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:488px;width:107px;height:26px;visibility:hidden;z-index:41;">
<label for="Label1" id="Label20" style="visibility:hidden;position:absolute;left:9px;top:518px;width:98px;height:16px;line-height:16px;z-index:42;">Nama Pelatihan</label>
<input type="text" id="Editbox15" style="position:absolute;left:153px;top:518px;width:281px;visibility:hidden;height:16px;z-index:43;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button8" onclick="ShowObject('Label21', 1);ShowObject('Editbox16', 1);ShowObject('Button9', 1);return false;" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:518px;width:107px;height:26px;visibility:hidden;z-index:44;">
<label for="Label1" id="Label21" style="visibility:hidden;position:absolute;left:9px;top:548px;width:98px;height:16px;line-height:16px;z-index:45;">Nama Pelatihan</label>
<input type="text" id="Editbox16" style="position:absolute;left:153px;top:548px;width:281px;visibility:hidden;height:16px;z-index:46;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button9" onclick="ShowObject('Label22', 1);ShowObject('Editbox17', 1);ShowObject('Button10', 1);return false;" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:548px;width:107px;height:26px;visibility:hidden;z-index:47;">
<label for="Label1" id="Label22" style="visibility:hidden;position:absolute;left:9px;top:578px;width:98px;height:16px;line-height:16px;z-index:48;">Nama Pelatihan</label>
<input type="text" id="Editbox17" style="position:absolute;left:153px;top:578px;width:281px;visibility:hidden;height:16px;z-index:49;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button10" onclick="ShowObject('Label23', 1);ShowObject('Editbox18', 1);ShowObject('Button11', 1);return false;" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:578px;width:107px;height:26px;visibility:hidden;z-index:50;">
<label for="Label1" id="Label23" style="visibility:hidden;position:absolute;left:9px;top:608px;width:98px;height:16px;line-height:16px;z-index:51;">Nama Pelatihan</label>
<input type="text" id="Editbox18" style="position:absolute;left:153px;top:608px;width:281px;visibility:hidden;height:16px;z-index:52;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button11" onclick="ShowObject('Label24', 1);ShowObject('Editbox19', 1);ShowObject('Button12', 1);return false;" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:608px;width:107px;height:26px;visibility:hidden;z-index:53;">
<label for="Label1" id="Label24" style="visibility:hidden;position:absolute;left:9px;top:638px;width:98px;height:16px;line-height:16px;z-index:54;">Nama Pelatihan</label>
<input type="text" id="Editbox19" style="position:absolute;left:153px;top:638px;width:281px;visibility:hidden;height:16px;z-index:55;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button12" onclick="ShowObject('Label25', 1);ShowObject('Editbox20', 1);ShowObject('Button13', 1);return false;" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:638px;width:107px;height:26px;visibility:hidden;z-index:56;">
<label for="Label1" id="Label25" style="visibility:hidden;position:absolute;left:9px;top:669px;width:98px;height:16px;line-height:16px;z-index:57;">Nama Pelatihan</label>
<input type="text" id="Editbox20" style="position:absolute;left:153px;top:669px;width:281px;visibility:hidden;height:16px;z-index:58;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button13" onclick="ShowObject('Label26', 1);ShowObject('Editbox21', 1);ShowObject('Button14', 1);return false;" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:669px;width:107px;height:26px;visibility:hidden;z-index:59;">
<label for="Label1" id="Label26" style="visibility:hidden;position:absolute;left:9px;top:699px;width:98px;height:16px;line-height:16px;z-index:60;">Nama Pelatihan</label>
<input type="text" id="Editbox21" style="position:absolute;left:153px;top:699px;width:281px;visibility:hidden;height:16px;z-index:61;" name="Nama IPWL" value="" spellcheck="false">
<input type="submit" id="Button14" name="Upload Sertifikat" value="Upload Sertifikat" style="position:absolute;left:455px;top:699px;width:107px;height:26px;visibility:hidden;z-index:62;">
<input type="reset" id="Button15" onclick="document.getElementById('Form1').reset();return false;" name="SUBMIT" value="SUBMIT" style="position:absolute;left:452px;top:770px;width:107px;height:26px;z-index:63;">
<select name="Combobox2" size="1" id="Combobox3" style="position:absolute;left:398px;top:280px;width:162px;height:28px;z-index:64;">
<option value="Terdaftar di Kemsos">SK Kemensos</option>
<option value="Tidak Terdaftfar di Kemsos">Non SK Kemensos</option>
</select>
</form>
</div>
<div id="wb_Image2" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:70;">
<img src="images/logo e ipwl1.png" id="Image2" alt=""></div>

<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:72;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:73;">
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
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:74;">
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
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:75;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:76;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:77;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>