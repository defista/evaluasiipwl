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
$roles = array("Administrator", "Supervisi");
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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rekapitulasi Data Evaluasi IPWL</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="rekap-evaluasi.css" rel="stylesheet">
<script src="jquery-3.4.1.min.js"></script>
<script src="wwb15.min.js"></script>
</head>
<body>
<div id="container">
<div id="wb_Image1" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:22;">
<img src="images/logo e ipwl1.png" id="Image1" alt=""></div>

<div id="wb_Text3" style="position:absolute;left:19px;top:162px;width:450px;height:21px;z-index:24;">
<p style="font-size:19px;line-height:22px;font-weight:bold;color:#000000;"><span style="color:#000000;">REKAPITULASI DATA HASIL EVALUASI IPWL</span></p></div>
<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:25;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<div id="wb_Form1" style="position:absolute;visibility:hidden;left:19px;top:329px;width:615px;height:476px;z-index:26;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form1">
<div id="wb_Text4" style="position:absolute;left:161px;top:45px;width:131px;height:161px;z-index:0;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nama IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Alamat IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nomor Telepon</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Ketua IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Program Manager IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Kapasitas Rawat Inap</span></p></div>
<div id="wb_Image2" style="position:absolute;left:8px;top:45px;width:141px;height:164px;z-index:1;">
<img src="images/creative-illustration-default-avatar-profile-placeholder-isolated-background-art-design-grey-photo-blank-template-mockup-144849704.jpg" id="Image2" alt=""></div>
<input type="submit" id="Button1" name="Download" value="Download .pdf" style="position:absolute;left:8px;top:10px;width:144px;height:27px;z-index:2;">
<div id="wb_Text1" style="position:absolute;left:8px;top:222px;width:131px;height:174px;z-index:3;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Aspek Peniliaian</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">3.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">4.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">5.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">6.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">7.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">8.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">9.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">10.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">dst...</span></p></div>
<div id="wb_Text5" style="position:absolute;left:157px;top:222px;width:131px;height:174px;z-index:4;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nilai Kredit</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">3</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">3</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">dst...</span></p></div>
<div id="wb_Text6" style="position:absolute;left:317px;top:274px;width:131px;height:95px;z-index:5;">
<p style="font-size:21px;line-height:24.5px;color:#000000;"><span style="color:#000000;">TOTAL NILAI</span></p>
<p style="font-size:21px;line-height:24.5px;">&nbsp;</p>
<p style="font-size:21px;line-height:24.5px;">&nbsp;</p>
<p style="font-size:21px;line-height:24.5px;color:#000000;"><span style="color:#000000;">AKREDITASI</span></p></div>
</form>
</div>
<div id="wb_Form2" style="position:absolute;left:19px;top:197px;width:340px;height:111px;z-index:27;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form2">
<a id="Button2" href="./Search-Alur.php" onclick="ShowObject('wb_Form1', 1);return false;" style="position:absolute;left:8px;top:76px;width:107px;height:21px;z-index:6;">View</a>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:8px;top:37px;width:284px;height:28px;z-index:7;">
<option selected value="">--- PILIH NAMA IPWL ---</option>
<option>BRSKPN GALIH PAKUAN BOGOR</option>
<option>SOCIETA INDONESIA</option>
<option>PENUAI</option>
<option>YAKITA </option>
</select>
<div id="wb_Text2" style="position:absolute;left:8px;top:15px;width:218px;height:17px;z-index:8;">
<p style="font-size:15px;line-height:16.5px;color:#000000;"><span style="color:#000000;">PILIH NAMA IPWL</span></p></div>
</form>
</div>
<div id="wb_Form3" style="position:absolute;visibility:hidden;left:19px;top:329px;width:615px;height:476px;z-index:28;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form3">
<div id="wb_Text7" style="position:absolute;left:161px;top:45px;width:131px;height:161px;z-index:9;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nama IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Alamat IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nomor Telepon</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Ketua IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Program Manager IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Kapasitas Rawat Inap</span></p></div>
<div id="wb_Image3" style="position:absolute;left:8px;top:45px;width:141px;height:164px;z-index:10;">
<img src="images/creative-illustration-default-avatar-profile-placeholder-isolated-background-art-design-grey-photo-blank-template-mockup-144849704.jpg" id="Image3" alt=""></div>
<input type="submit" id="Button3" name="Download" value="Download .pdf" style="position:absolute;left:8px;top:10px;width:144px;height:27px;z-index:11;">
<div id="wb_Text8" style="position:absolute;left:8px;top:222px;width:131px;height:174px;z-index:12;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Aspek Peniliaian</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">3.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">4.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">5.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">6.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">7.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">8.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">9.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">10.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">dst...</span></p></div>
<div id="wb_Text9" style="position:absolute;left:157px;top:222px;width:131px;height:174px;z-index:13;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nilai Kredit</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">3</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">3</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">dst...</span></p></div>
<div id="wb_Text10" style="position:absolute;left:317px;top:274px;width:131px;height:95px;z-index:14;">
<p style="font-size:21px;line-height:24.5px;color:#000000;"><span style="color:#000000;">TOTAL NILAI</span></p>
<p style="font-size:21px;line-height:24.5px;">&nbsp;</p>
<p style="font-size:21px;line-height:24.5px;">&nbsp;</p>
<p style="font-size:21px;line-height:24.5px;color:#000000;"><span style="color:#000000;">AKREDITASI</span></p></div>
</form>
</div>
<div id="wb_Form4" style="position:absolute;visibility:hidden;left:19px;top:329px;width:615px;height:476px;z-index:29;">
<form name="Form1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Form4">
<div id="wb_Text11" style="position:absolute;left:161px;top:45px;width:131px;height:161px;z-index:15;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nama IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Alamat IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nomor Telepon</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Ketua IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Program Manager IPWL</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Kapasitas Rawat Inap</span></p></div>
<div id="wb_Image4" style="position:absolute;left:8px;top:45px;width:141px;height:164px;z-index:16;">
<img src="images/creative-illustration-default-avatar-profile-placeholder-isolated-background-art-design-grey-photo-blank-template-mockup-144849704.jpg" id="Image4" alt=""></div>
<input type="submit" id="Button4" name="Download" value="Download .pdf" style="position:absolute;left:8px;top:10px;width:144px;height:27px;z-index:17;">
<div id="wb_Text12" style="position:absolute;left:8px;top:222px;width:131px;height:174px;z-index:18;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Aspek Peniliaian</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">3.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">4.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">5.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">6.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">7.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">8.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">9.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">10.</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">dst...</span></p></div>
<div id="wb_Text13" style="position:absolute;left:157px;top:222px;width:131px;height:174px;z-index:19;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nilai Kredit</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">3</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">3</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">1</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">2</span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">dst...</span></p></div>
<div id="wb_Text14" style="position:absolute;left:317px;top:274px;width:251px;height:95px;z-index:20;">
<p style="font-size:21px;line-height:24.5px;color:#000000;"><span style="color:#000000;">TOTAL NILAI&nbsp;&nbsp; &nbsp;&nbsp; 37</span></p>
<p style="font-size:21px;line-height:24.5px;">&nbsp;</p>
<p style="font-size:21px;line-height:24.5px;">&nbsp;</p>
<p style="font-size:21px;line-height:24.5px;color:#000000;"><span style="color:#000000;">AKREDITASI&nbsp;&nbsp; &nbsp;&nbsp; A</span></p></div>
<div id="wb_Text15" style="position:absolute;left:319px;top:45px;width:276px;height:161px;z-index:21;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">BRSKPN Galih Pakuan Bogor</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Jl.H Miing No.71, Desa Putat Nutug,Kecamataan </span></p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Ciseeng, Kabupaten Bogor</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">(0251) - xxxxxxx</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Wahidin</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Yoyok Dwi Hertanto</span></p>
<p style="font-size:12px;line-height:13.5px;">&nbsp;</p>
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">150 PPKS</span></p></div>
</form>
</div>
<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:30;">
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
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:31;">
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
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:32;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:33;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:34;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>