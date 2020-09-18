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
<link href="Input-SDM-lain.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_Text3" style="position:absolute;left:19px;top:161px;width:408px;height:30px;z-index:32;">
<p style="font-size:27px;line-height:30px;font-weight:bold;color:#000000;"><span style="color:#000000;">Edit Profil SDM Lainnya</span></p></div>
<div id="wb_Image1" style="position:absolute;left:19px;top:204px;width:126px;height:145px;z-index:33;">
<img src="images/creative-illustration-default-avatar-profile-placeholder-isolated-background-art-design-grey-photo-blank-template-mockup-144849704.jpg" id="Image1" alt=""></div>
<input type="submit" id="Button2" name="Upload Foto" value="Upload Foto" style="position:absolute;left:66px;top:358px;width:77px;height:25px;z-index:34;">
<div id="wb_Form1" style="position:absolute;left:154px;top:204px;width:571px;height:524px;z-index:35;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form1">
<label for="Label1" id="Label1" style="position:absolute;left:6px;top:37px;width:98px;height:16px;line-height:16px;z-index:0;">Nama</label>
<label for="Label2" id="Label2" style="position:absolute;left:6px;top:68px;width:98px;height:16px;line-height:16px;z-index:1;">Alamat</label>
<input type="text" id="Editbox1" style="position:absolute;left:150px;top:37px;width:281px;height:16px;z-index:2;" name="Nama IPWL" value="" spellcheck="false">
<input type="text" id="Editbox2" style="position:absolute;left:150px;top:68px;width:281px;height:16px;z-index:3;" name="Alamat Row 1" value="" maxlength="35" spellcheck="false">
<input type="text" id="Editbox3" style="position:absolute;left:150px;top:99px;width:281px;height:16px;z-index:4;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label3" style="position:absolute;left:6px;top:224px;width:98px;height:16px;line-height:16px;z-index:5;">Nomor Telp</label>
<input type="text" id="Editbox4" style="position:absolute;left:150px;top:224px;width:44px;height:16px;z-index:6;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label4" style="position:absolute;left:6px;top:285px;width:98px;height:16px;line-height:16px;z-index:7;">Jabatan</label>
<input type="text" id="Editbox8" style="position:absolute;left:207px;top:224px;width:134px;height:16px;z-index:8;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label8" style="position:absolute;left:6px;top:254px;width:98px;height:16px;line-height:16px;z-index:9;">e-Mail</label>
<input type="text" id="Editbox9" style="position:absolute;left:150px;top:254px;width:191px;height:16px;z-index:10;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label9" style="position:absolute;left:6px;top:5px;width:178px;height:16px;line-height:16px;z-index:11;">A. IDENTITAS SDM</label>
<label for="" id="Label16" style="position:absolute;left:151px;top:317px;width:232px;height:16px;line-height:16px;z-index:12;">*(harap upload file dengan format .jpeg / .png / .pdf)</label>
<label for="" id="Label13" style="position:absolute;left:6px;top:317px;width:137px;height:16px;line-height:16px;z-index:13;">B. Berkas Pendukung</label>
<label for="" id="Label7" style="position:absolute;left:6px;top:131px;width:98px;height:16px;line-height:16px;z-index:14;">Tempat Lahir</label>
<input type="text" id="Editbox5" style="position:absolute;left:150px;top:131px;width:114px;height:16px;z-index:15;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label10" style="position:absolute;left:273px;top:131px;width:81px;height:16px;line-height:16px;z-index:16;">Tanggal Lahir</label>
<input type="text" id="Editbox6" style="position:absolute;left:359px;top:131px;width:25px;height:16px;z-index:17;" name="hari" value="hr" spellcheck="false">
<input type="text" id="Editbox7" style="position:absolute;left:396px;top:131px;width:25px;height:16px;z-index:18;" name="Bulan" value="bln" spellcheck="false">
<input type="text" id="Editbox10" style="position:absolute;left:433px;top:131px;width:60px;height:16px;z-index:19;" name="Tahun" value="Tahun" spellcheck="false">
<label for="" id="Label11" style="position:absolute;left:6px;top:164px;width:98px;height:16px;line-height:16px;z-index:20;">Jenis Kelamin</label>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:151px;top:162px;width:124px;height:28px;z-index:21;">
<option value="">Laki - Laki</option>
<option>Perempuan</option>
</select>
<input type="text" id="Editbox11" style="position:absolute;left:150px;top:192px;width:281px;height:16px;z-index:22;" name="Nama IPWL" value="" spellcheck="false">
<label for="Label1" id="Label12" style="position:absolute;left:6px;top:192px;width:98px;height:16px;line-height:16px;z-index:23;">N.I.K</label>
<input type="submit" id="Button6" name="Upload KTP" value="Upload KTP" style="position:absolute;left:452px;top:192px;width:107px;height:26px;z-index:24;">
<label for="" id="Label14" style="position:absolute;left:7px;top:350px;width:113px;height:16px;line-height:16px;z-index:25;">Pendidikan Terakhir</label>
<select name="Combobox2" size="1" id="Combobox2" style="position:absolute;left:152px;top:348px;width:110px;height:28px;z-index:26;">
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
<input type="submit" id="Button3" name="Upload Izajah" value="Upload Izajah" style="position:absolute;left:452px;top:348px;width:107px;height:26px;z-index:27;">
<input type="submit" id="Button15" onclick="document.getElementById('Button15').submit();return false;" name="SUBMIT" value="SUBMIT" style="position:absolute;left:452px;top:492px;width:107px;height:26px;z-index:28;">
<input type="text" id="Editbox22" style="position:absolute;left:150px;top:284px;width:191px;height:16px;z-index:29;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label5" style="position:absolute;left:362px;top:285px;width:43px;height:16px;line-height:16px;z-index:30;">Status</label>
<input type="text" id="Editbox23" style="position:absolute;left:416px;top:284px;width:134px;height:16px;z-index:31;" name="Editbox1" value="" spellcheck="false">
</form>
</div>
<div id="wb_Image2" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:36;">
<img src="images/logo e ipwl1.png" id="Image2" alt=""></div>

<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:38;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:39;">
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
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:40;">
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
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:41;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:42;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:43;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>