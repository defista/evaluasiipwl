<?php
if (session_id() == "")
{
   session_start();
}
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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Profil IPWL</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="Profile-View.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:0;">
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
<div id="wb_Text3" style="position:absolute;left:19px;top:155px;width:183px;height:30px;z-index:1;">
<p style="font-size:27px;line-height:30px;font-weight:bold;color:#000000;"><span style="color:#000000;">PROFIL IPWL</span></p></div>
<div id="wb_Text4" style="position:absolute;left:172px;top:220px;width:131px;height:201px;z-index:2;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nama IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Alamat IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Jumlah SDM</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">- Staff</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">- Konselor</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">- Pekerja Sosial</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">- SDM Lainnya</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p></div>
<div id="wb_Image1" style="position:absolute;left:19px;top:220px;width:141px;height:164px;z-index:3;">
<img src="images/creative-illustration-default-avatar-profile-placeholder-isolated-background-art-design-grey-photo-blank-template-mockup-144849704.jpg" id="Image1" alt=""></div>
<label for="" id="Label14" style="position:absolute;left:19px;top:430px;width:133px;height:16px;line-height:16px;z-index:4;">Program Pelayanan</label>
<label for="" id="Label15" style="position:absolute;left:19px;top:461px;width:133px;height:16px;line-height:16px;z-index:5;">Struktur Organisasi</label>
<div id="wb_Text5" style="position:absolute;left:23px;top:508px;width:134px;height:40px;z-index:6;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Akta Notaris yang menyebutkan adanya pelayanan RSKPN</span></p></div>
<label for="" id="Label21" style="position:absolute;left:19px;top:560px;width:133px;height:16px;line-height:16px;z-index:7;">Nomor Akta Notaris</label>
<label for="" id="Label22" style="position:absolute;left:19px;top:591px;width:133px;height:16px;line-height:16px;z-index:8;">Dikeluarkan di</label>
<div id="wb_Text6" style="position:absolute;left:23px;top:630px;width:134px;height:27px;z-index:9;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nomor Rekening Bank Atas Nama Lembaga</span></p></div>
<label for="" id="Label26" style="position:absolute;left:19px;top:665px;width:133px;height:16px;line-height:16px;z-index:10;">Nama Bank</label>
<label for="" id="Label27" style="position:absolute;left:19px;top:696px;width:133px;height:16px;line-height:16px;z-index:11;">Nomor Rekening</label>
<div id="wb_Text7" style="position:absolute;left:27px;top:736px;width:130px;height:40px;z-index:12;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Akta Legalitas Kementerian Hukum dan Hak Asasi Manusia</span></p></div>
<label for="" id="Label30" style="position:absolute;left:23px;top:788px;width:133px;height:16px;line-height:16px;z-index:13;">Nomor Akta</label>
<label for="" id="Label31" style="position:absolute;left:23px;top:819px;width:133px;height:16px;line-height:16px;z-index:14;">Dikeluarkan di</label>
<label for="" id="Label32" style="position:absolute;left:307px;top:819px;width:53px;height:16px;line-height:16px;z-index:15;">Tanggal</label>
<label for="" id="Label23" style="position:absolute;left:303px;top:591px;width:53px;height:16px;line-height:16px;z-index:16;">Tanggal</label>
<input type="submit" id="Button2" name="View" value="View" style="position:absolute;left:307px;top:461px;width:111px;height:24px;z-index:17;">
<label for="" id="Label35" style="position:absolute;left:539px;top:469px;width:133px;height:16px;line-height:16px;z-index:18;">Nomor NPWP</label>
<div id="wb_Text8" style="position:absolute;left:543px;top:508px;width:137px;height:40px;z-index:19;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Rekomendasi Dinsos Provinsi untuk menjadi IPWL Kementerian Sosial</span></p></div>
<label for="" id="Label39" style="position:absolute;left:539px;top:561px;width:133px;height:16px;line-height:16px;z-index:20;">Nomor Surat</label>
<label for="" id="Label40" style="position:absolute;left:539px;top:592px;width:133px;height:16px;line-height:16px;z-index:21;">Dikeluarkan di</label>
<label for="" id="Label41" style="position:absolute;left:824px;top:592px;width:53px;height:16px;line-height:16px;z-index:22;">Tanggal</label>
<input type="submit" id="Button4" name="View" value="View" style="position:absolute;left:823px;top:667px;width:111px;height:24px;z-index:23;">
<label for="" id="Label45" style="position:absolute;left:539px;top:625px;width:133px;height:16px;line-height:16px;z-index:24;">Nomor KTP</label>
<label for="" id="Label46" style="position:absolute;left:539px;top:667px;width:133px;height:16px;line-height:16px;z-index:25;">BNBA Klien</label>
<label for="" id="Label49" style="position:absolute;left:539px;top:703px;width:133px;height:16px;line-height:16px;z-index:26;">BNBA SDM</label>
<input type="submit" id="Button5" name="View" value="View" style="position:absolute;left:823px;top:703px;width:111px;height:24px;z-index:27;">
<label for="" id="Label52" style="position:absolute;left:539px;top:739px;width:133px;height:16px;line-height:16px;z-index:28;">Keberhasilan Layanan</label>
<label for="" id="Label55" style="position:absolute;left:539px;top:775px;width:133px;height:16px;line-height:16px;z-index:29;">Keterangan Domisili</label>
<div id="wb_Text9" style="position:absolute;left:543px;top:810px;width:137px;height:81px;z-index:30;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Izin dari Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (PMTSP) / Izin Operasional dari Dinsos Kab/Kota</span></p></div>
<label for="" id="Label60" style="position:absolute;left:539px;top:895px;width:133px;height:16px;line-height:16px;z-index:31;">Nomor Surat</label>
<label for="" id="Label61" style="position:absolute;left:539px;top:926px;width:133px;height:16px;line-height:16px;z-index:32;">Dikeluarkan di</label>
<div id="wb_Text10" style="position:absolute;left:543px;top:959px;width:137px;height:27px;z-index:33;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Hasil Akreditasi dari BALK Pusbangprof</span></p></div>
<label for="" id="Label62" style="position:absolute;left:824px;top:926px;width:53px;height:16px;line-height:16px;z-index:34;">Tanggal</label>
<input type="submit" id="Button3" name="View" value="View" style="position:absolute;left:823px;top:775px;width:111px;height:24px;z-index:35;">
<input type="submit" id="Button6" name="View" value="View" style="position:absolute;left:823px;top:739px;width:111px;height:24px;z-index:36;">
<div id="wb_Image2" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:37;">
<img src="images/logo e ipwl1.png" id="Image2" alt=""></div>

<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:39;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<input type="submit" id="Button1" name="Download" value="Download .pdf" style="position:absolute;left:19px;top:185px;width:144px;height:27px;z-index:40;">
<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:41;">
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
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:42;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:43;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:44;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>