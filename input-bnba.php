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
<title>Input Data BNBA</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="base/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="input-bnba.css" rel="stylesheet">
<script src="jquery-3.4.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   $("#FileUpload1 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
   $("#Spinner1").spinner(
   {
      min: 1,
      max: 31,
      step: 1
   });
   $("#Spinner2").spinner(
   {
      min: 1900,
      max: 3000,
      step: 1
   });
   $("#Spinner3").spinner(
   {
      min: 1,
      max: 31,
      step: 1
   });
   $("#Spinner4").spinner(
   {
      min: 1900,
      max: 3000,
      step: 1
   });
   $("#Spinner5").spinner(
   {
      min: 1,
      max: 31,
      step: 1
   });
   $("#Spinner6").spinner(
   {
      min: 1900,
      max: 3000,
      step: 1
   });
   $("#FileUpload2 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
});
</script>
</head>
<body>
<div id="container">
<div id="wb_Image1" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:68;">
<img src="images/logo e ipwl1.png" id="Image1" alt=""></div>

<div id="wb_Text3" style="position:absolute;left:16px;top:164px;width:380px;height:20px;z-index:70;">
<p style="font-size:17px;line-height:20.5px;font-weight:bold;color:#000000;"><span style="color:#000000;">INPUT BNBA PPKS KPN DI IPWL</span></p></div>
<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:71;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<div id="wb_Form1" style="position:absolute;left:16px;top:192px;width:858px;height:790px;z-index:72;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form1">
<label for="" id="Label1" style="position:absolute;left:9px;top:46px;width:147px;height:16px;line-height:16px;z-index:0;">Nama Lengkap</label>
<label for="" id="Label2" style="position:absolute;left:9px;top:12px;width:110px;height:16px;line-height:16px;z-index:1;">DATA PPKS KPN</label>
<div id="wb_Image4" style="position:absolute;left:691px;top:12px;width:141px;height:164px;z-index:2;">
<img src="images/creative-illustration-default-avatar-profile-placeholder-isolated-background-art-design-grey-photo-blank-template-mockup-144849704.jpg" id="Image4" alt=""></div>
<div id="FileUpload1" class="input-group" style="position:absolute;left:691px;top:176px;width:141px;height:26px;z-index:3;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="Upload Foto" id="FileUpload1-file" style="display:none;"><span class="btn">Upload Foto</span>
</label>
</div>
<input type="text" id="Editbox1" style="position:absolute;left:280px;top:45px;width:336px;height:16px;z-index:4;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label3" style="position:absolute;left:9px;top:80px;width:147px;height:16px;line-height:16px;z-index:5;">Tanggal Mulai Layanan</label>
<div id="wb_Spinner1" style="position:absolute;left:280px;top:80px;width:55px;height:28px;z-index:6;">
<input type="text" id="Spinner1" style="width:26px;height:20px;line-height:20px;" name="Spinner1" value="1"></div>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:354px;top:80px;width:152px;height:28px;z-index:7;">
<option selected value="Bulan">Pilih Bulan</option>
<option value="Januari">Januari</option>
<option value="Februari">Februari</option>
<option value="Maret">Maret</option>
<option value="April">April</option>
<option value="Mei">Mei</option>
<option value="Juni">Juni</option>
<option value="Juli">Juli</option>
<option value="Agustus">Agustus</option>
<option value="September">September</option>
<option value="Oktober">Oktober</option>
<option value="November">November</option>
<option value="Desember">Desember</option>
</select>
<div id="wb_Spinner2" style="position:absolute;left:532px;top:80px;width:94px;height:28px;z-index:8;">
<input type="text" id="Spinner2" style="width:65px;height:20px;line-height:20px;" name="Spinner1" value="2018"></div>
<label for="" id="Label4" style="position:absolute;left:9px;top:116px;width:199px;height:16px;line-height:16px;z-index:9;">Rencana Tanggal Akhir Layanan</label>
<div id="wb_Spinner3" style="position:absolute;left:280px;top:116px;width:55px;height:28px;z-index:10;">
<input type="text" id="Spinner3" style="width:26px;height:20px;line-height:20px;" name="Spinner1" value="1"></div>
<select name="Combobox1" size="1" id="Combobox2" style="position:absolute;left:354px;top:116px;width:152px;height:28px;z-index:11;">
<option selected value="Bulan">Pilih Bulan</option>
<option value="Januari">Januari</option>
<option value="Februari">Februari</option>
<option value="Maret">Maret</option>
<option value="April">April</option>
<option value="Mei">Mei</option>
<option value="Juni">Juni</option>
<option value="Juli">Juli</option>
<option value="Agustus">Agustus</option>
<option value="September">September</option>
<option value="Oktober">Oktober</option>
<option value="November">November</option>
<option value="Desember">Desember</option>
</select>
<div id="wb_Spinner4" style="position:absolute;left:532px;top:116px;width:94px;height:28px;z-index:12;">
<input type="text" id="Spinner4" style="width:65px;height:20px;line-height:20px;" name="Spinner1" value="2018"></div>
<label for="" id="Label5" style="position:absolute;left:9px;top:153px;width:147px;height:16px;line-height:16px;z-index:13;">N.I.K</label>
<input type="text" id="Editbox2" style="position:absolute;left:280px;top:152px;width:336px;height:16px;z-index:14;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label6" style="position:absolute;left:9px;top:188px;width:147px;height:16px;line-height:16px;z-index:15;">Status Perkawinan</label>
<select name="Combobox3" size="1" id="Combobox3" style="position:absolute;left:280px;top:186px;width:174px;height:28px;z-index:16;">
<option selected value="Menikah">Menikah</option>
<option value="Belum Menikah">Belum Menikah</option>
</select>
<label for="" id="Label7" style="position:absolute;left:9px;top:225px;width:147px;height:16px;line-height:16px;z-index:17;">Pekerjaan Saat Ini</label>
<select name="Combobox3" size="1" id="Combobox4" style="position:absolute;left:280px;top:223px;width:174px;height:28px;z-index:18;">
<option selected value="Pelajar / Mahasiswa">Pelajar / Mahasiswa</option>
<option value="Karyawan Swasta">Karyawan Swasta</option>
<option value="Pegawai Negeri Sipil">Pegawai Negeri Sipil</option>
<option value="Wiraswasta">Wiraswasta</option>
<option value="Tidak Bekerja">Tidak Bekerja</option>
<option value="Lainnya">Lainnya</option>
</select>
<label for="" id="Label8" style="position:absolute;left:9px;top:261px;width:147px;height:16px;line-height:16px;z-index:19;">Jenis Kelamin</label>
<select name="Combobox3" size="1" id="Combobox5" style="position:absolute;left:280px;top:259px;width:174px;height:28px;z-index:20;">
<option selected value="Laki - Laki">Laki - Laki</option>
<option value="Perempuan">Perempuan</option>
</select>
<label for="" id="Label9" style="position:absolute;left:462px;top:260px;width:147px;height:16px;line-height:16px;z-index:21;">Usia Saat Ini</label>
<input type="text" id="Editbox3" style="position:absolute;left:548px;top:260px;width:43px;height:16px;z-index:22;" name="Editbox1" value="" spellcheck="false">
<div id="wb_Text1" style="position:absolute;left:609px;top:266px;width:49px;height:15px;z-index:23;">
<p style="color:#000000;"><span style="color:#000000;">Tahun</span></p></div>
<label for="" id="Label10" style="position:absolute;left:9px;top:297px;width:147px;height:16px;line-height:16px;z-index:24;">Tempat Lahir</label>
<input type="text" id="Editbox4" style="position:absolute;left:280px;top:296px;width:216px;height:16px;z-index:25;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label11" style="position:absolute;left:9px;top:331px;width:199px;height:16px;line-height:16px;z-index:26;">Tanggal Lahir</label>
<div id="wb_Spinner5" style="position:absolute;left:280px;top:331px;width:55px;height:28px;z-index:27;">
<input type="text" id="Spinner5" style="width:26px;height:20px;line-height:20px;" name="Spinner1" value="1"></div>
<select name="Combobox1" size="1" id="Combobox6" style="position:absolute;left:354px;top:331px;width:152px;height:28px;z-index:28;">
<option selected value="Bulan">Pilih Bulan</option>
<option value="Januari">Januari</option>
<option value="Februari">Februari</option>
<option value="Maret">Maret</option>
<option value="April">April</option>
<option value="Mei">Mei</option>
<option value="Juni">Juni</option>
<option value="Juli">Juli</option>
<option value="Agustus">Agustus</option>
<option value="September">September</option>
<option value="Oktober">Oktober</option>
<option value="November">November</option>
<option value="Desember">Desember</option>
</select>
<div id="wb_Spinner6" style="position:absolute;left:532px;top:331px;width:94px;height:28px;z-index:29;">
<input type="text" id="Spinner6" style="width:65px;height:20px;line-height:20px;" name="Spinner1" value="2018"></div>
<label for="" id="Label12" style="position:absolute;left:9px;top:369px;width:147px;height:16px;line-height:16px;z-index:30;">Alamat Lengkap</label>
<input type="text" id="Editbox5" style="position:absolute;left:280px;top:368px;width:336px;height:16px;z-index:31;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label13" style="position:absolute;left:9px;top:402px;width:147px;height:16px;line-height:16px;z-index:32;">Provinsi</label>
<input type="text" id="Editbox6" style="position:absolute;left:280px;top:401px;width:216px;height:16px;z-index:33;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label14" style="position:absolute;left:511px;top:401px;width:80px;height:16px;line-height:16px;z-index:34;">Kode Provinsi</label>
<input type="text" id="Editbox7" style="position:absolute;left:691px;top:401px;width:46px;height:16px;z-index:35;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label15" style="position:absolute;left:9px;top:435px;width:147px;height:16px;line-height:16px;z-index:36;">Kabupaten / Kota</label>
<input type="text" id="Editbox8" style="position:absolute;left:280px;top:434px;width:216px;height:16px;z-index:37;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label16" style="position:absolute;left:511px;top:434px;width:139px;height:16px;line-height:16px;z-index:38;">Kode Kabupaten / Kota</label>
<input type="text" id="Editbox9" style="position:absolute;left:691px;top:434px;width:46px;height:16px;z-index:39;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label17" style="position:absolute;left:9px;top:469px;width:147px;height:16px;line-height:16px;z-index:40;">Kecamatan</label>
<input type="text" id="Editbox10" style="position:absolute;left:280px;top:468px;width:216px;height:16px;z-index:41;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label18" style="position:absolute;left:511px;top:468px;width:139px;height:16px;line-height:16px;z-index:42;">Kode Kecamatan</label>
<input type="text" id="Editbox11" style="position:absolute;left:691px;top:468px;width:46px;height:16px;z-index:43;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label19" style="position:absolute;left:9px;top:502px;width:147px;height:16px;line-height:16px;z-index:44;">Kelurahan / Desa</label>
<input type="text" id="Editbox12" style="position:absolute;left:280px;top:501px;width:216px;height:16px;z-index:45;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label20" style="position:absolute;left:511px;top:501px;width:139px;height:16px;line-height:16px;z-index:46;">Kode Kelurahan / Desa</label>
<input type="text" id="Editbox13" style="position:absolute;left:691px;top:501px;width:46px;height:16px;z-index:47;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label21" style="position:absolute;left:9px;top:535px;width:147px;height:16px;line-height:16px;z-index:48;">Nomor Handphone</label>
<input type="text" id="Editbox14" style="position:absolute;left:280px;top:534px;width:216px;height:16px;z-index:49;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label22" style="position:absolute;left:9px;top:569px;width:199px;height:16px;line-height:16px;z-index:50;">Jenis Napza yang Digunakan</label>
<input type="text" id="Editbox15" style="position:absolute;left:280px;top:568px;width:216px;height:16px;z-index:51;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox16" style="position:absolute;left:280px;top:600px;width:216px;height:16px;z-index:52;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox17" style="position:absolute;left:280px;top:632px;width:216px;height:16px;z-index:53;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox18" style="position:absolute;left:691px;top:568px;width:37px;height:16px;z-index:54;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox19" style="position:absolute;left:691px;top:600px;width:37px;height:16px;z-index:55;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox20" style="position:absolute;left:691px;top:632px;width:37px;height:16px;z-index:56;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label23" style="position:absolute;left:511px;top:635px;width:164px;height:16px;line-height:16px;z-index:57;">Lama Penggunaan (Tahun)</label>
<label for="" id="Label24" style="position:absolute;left:511px;top:602px;width:164px;height:16px;line-height:16px;z-index:58;">Lama Penggunaan (Tahun)</label>
<label for="" id="Label25" style="position:absolute;left:511px;top:568px;width:164px;height:16px;line-height:16px;z-index:59;">Lama Penggunaan (Tahun)</label>
<label for="" id="Label26" style="position:absolute;left:9px;top:667px;width:147px;height:16px;line-height:16px;z-index:60;">Asal KPN</label>
<select name="Combobox3" size="1" id="Combobox7" style="position:absolute;left:280px;top:665px;width:226px;height:28px;z-index:61;">
<option value="Diantar Keluarga">Diantar Keluarga</option>
<option value="Rujukan Kepolisian">Rujukan Kepolisian</option>
<option value="Pengadilan">Pengadilan</option>
<option value="Rujukan Rumah Sakit">Rujukan Rumah Sakit</option>
<option value="Rujukan Lembaga Rehabilitasi Lain">Rujukan Lembaga Rehabilitasi Lain</option>
<option value="Mandiri (Kemauan Sendiri)">Mandiri (Kemauan Sendiri)</option>
<option value="Lainnya">Lainnya</option>
</select>
<label for="" id="Label27" style="position:absolute;left:9px;top:701px;width:199px;height:16px;line-height:16px;z-index:62;">Jenis Disabilitas</label>
<input type="text" id="Editbox21" style="position:absolute;left:280px;top:700px;width:216px;height:16px;z-index:63;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label28" style="position:absolute;left:9px;top:734px;width:199px;height:16px;line-height:16px;z-index:64;">Rencana Intervensi</label>
<input type="text" id="Editbox22" style="position:absolute;left:280px;top:733px;width:216px;height:16px;z-index:65;" name="Editbox1" value="" spellcheck="false">
<a id="Button1" href="./view-bnba.php" style="position:absolute;left:520px;top:735px;width:142px;height:21px;z-index:66;">Simpan Data</a>
<div id="FileUpload2" class="input-group" style="position:absolute;left:486px;top:188px;width:141px;height:26px;z-index:67;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="Upload KTP / KK" id="FileUpload2-file" style="display:none;"><span class="btn">Upload KTP / KK</span>
</label>
</div>
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