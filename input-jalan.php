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
<title>Rawat Jalan Input</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="base/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="input-jalan.css" rel="stylesheet">
<script src="jquery-3.4.1.min.js"></script>
<script src="jquery-ui.min.js"></script>
<script>
$(document).ready(function()
{
   $("#Tabs1").tabs(
   {
      show: false,
      hide: false,
      event: 'click',
      collapsible: false
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
   $("#FileUpload1 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
   $("#FileUpload2 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
   $("#FileUpload3 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
   $("#FileUpload5 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
   $("#FileUpload6 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
   $("#FileUpload7 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
});
</script>
</head>
<body>
<div id="container">
<div id="wb_Image1" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:99;">
<img src="images/logo e ipwl1.png" id="Image1" alt=""></div>

<div id="wb_Text3" style="position:absolute;left:19px;top:155px;width:422px;height:21px;z-index:101;">
<p style="font-size:19px;line-height:21px;font-weight:bold;color:#000000;"><span style="color:#000000;">INPUT LAPORAN KEUANGAN RAWAT JALAN</span></p></div>
<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:102;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<form name="Tabs1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Tabs1" style="position:absolute;left:11px;top:206px;width:923px;height:563px;z-index:103;">
<ul>
<li><a href="#tabs1-page-0"><span>Input Rincian Penarikan</span></a></li>
<li><a href="#tabs1-page-1"><span>Input Rekapitulasi Pemanfaatan</span></a></li>
<li><a href="#tabs1-page-2"><span>Input Rincian Tanda Terima</span></a></li>
</ul>
<div style="height:539px;" id="tabs1-page-0">
<label for="" id="Label9" style="position:absolute;left:6px;top:19px;width:60px;height:16px;line-height:16px;z-index:0;">Tahun</label>
<select name="Combobox1" size="1" id="Combobox2" style="position:absolute;left:74px;top:17px;width:109px;height:28px;z-index:1;">
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
</select>
<label for="" id="Label6" style="position:absolute;left:201px;top:19px;width:60px;height:16px;line-height:16px;z-index:2;">Periode</label>
<select name="Combobox1" size="1" id="Combobox3" style="position:absolute;left:269px;top:17px;width:109px;height:28px;z-index:3;">
<option value="Tahap I">Tahap I</option>
<option value="Tahap II">Tahap II</option>
</select>
<label for="" id="Label8" style="position:absolute;left:6px;top:58px;width:156px;height:16px;line-height:16px;z-index:4;">Jumlah Bantuan Diterima</label>
<input type="text" id="Editbox1" style="position:absolute;left:170px;top:57px;width:198px;height:16px;z-index:5;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label13" style="position:absolute;left:394px;top:58px;width:169px;height:16px;line-height:16px;z-index:6;">Tanggal Bantuan Diterima</label>
<div id="wb_Spinner1" style="position:absolute;left:561px;top:56px;width:55px;height:28px;z-index:7;">
<input type="text" id="Spinner1" style="width:26px;height:20px;line-height:20px;" name="Spinner1" value="1"></div>
<select name="Combobox1" size="1" id="Combobox1" style="position:absolute;left:635px;top:56px;width:152px;height:28px;z-index:8;">
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
<div id="wb_Spinner2" style="position:absolute;left:813px;top:56px;width:94px;height:28px;z-index:9;">
<input type="text" id="Spinner2" style="width:65px;height:20px;line-height:20px;" name="Spinner1" value="2018"></div>
<label for="" id="Label14" style="position:absolute;left:6px;top:107px;width:156px;height:16px;line-height:16px;z-index:10;">Bulan Ke</label>
<label for="" id="Label15" style="position:absolute;left:394px;top:107px;width:169px;height:16px;line-height:16px;z-index:11;">Tanggal Penarikan</label>
<div id="wb_Spinner3" style="position:absolute;left:561px;top:105px;width:55px;height:28px;z-index:12;">
<input type="text" id="Spinner3" style="width:26px;height:20px;line-height:20px;" name="Spinner1" value="1"></div>
<select name="Combobox1" size="1" id="Combobox4" style="position:absolute;left:635px;top:105px;width:152px;height:28px;z-index:13;">
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
<div id="wb_Spinner4" style="position:absolute;left:813px;top:105px;width:94px;height:28px;z-index:14;">
<input type="text" id="Spinner4" style="width:65px;height:20px;line-height:20px;" name="Spinner1" value="2018"></div>
<select name="Combobox1" size="1" id="Combobox5" style="position:absolute;left:170px;top:105px;width:48px;height:28px;z-index:15;">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select>
<label for="" id="Label10" style="position:absolute;left:6px;top:154px;width:156px;height:16px;line-height:16px;z-index:16;">Jumlah Penarikan</label>
<input type="text" id="Editbox2" style="position:absolute;left:170px;top:153px;width:198px;height:16px;z-index:17;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox3" style="position:absolute;left:170px;top:201px;width:198px;height:16px;z-index:18;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label16" style="position:absolute;left:6px;top:202px;width:156px;height:16px;line-height:16px;z-index:19;">Uraian Alokasi Dana</label>
<input type="text" id="Editbox4" style="position:absolute;left:170px;top:232px;width:198px;height:16px;z-index:20;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox5" style="position:absolute;left:170px;top:264px;width:198px;height:16px;z-index:21;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox6" style="position:absolute;left:170px;top:296px;width:198px;height:16px;z-index:22;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox7" style="position:absolute;left:451px;top:201px;width:198px;height:16px;z-index:23;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox8" style="position:absolute;left:451px;top:232px;width:198px;height:16px;z-index:24;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox9" style="position:absolute;left:451px;top:264px;width:198px;height:16px;z-index:25;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox10" style="position:absolute;left:451px;top:296px;width:198px;height:16px;z-index:26;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label17" style="position:absolute;left:397px;top:202px;width:156px;height:16px;line-height:16px;z-index:27;">Jumlah </label>
<input type="text" id="Editbox11" style="position:absolute;left:170px;top:328px;width:198px;height:16px;z-index:28;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox12" style="position:absolute;left:451px;top:328px;width:198px;height:16px;z-index:29;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox13" style="position:absolute;left:170px;top:361px;width:198px;height:16px;z-index:30;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox14" style="position:absolute;left:451px;top:361px;width:198px;height:16px;z-index:31;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label18" style="position:absolute;left:6px;top:409px;width:156px;height:16px;line-height:16px;z-index:32;">Keterangan</label>
<input type="text" id="Editbox15" style="position:absolute;left:170px;top:408px;width:479px;height:16px;z-index:33;" name="Editbox1" value="" spellcheck="false">
<input type="reset" id="Button1" onclick="document.getElementById('Tabs1').reset();return false;" name="Simpan Data" value="Simpan Data" style="position:absolute;left:763px;top:476px;width:144px;height:37px;z-index:34;">
</div>
<div style="height:539px;" id="tabs1-page-1">
<label for="" id="Label3" style="position:absolute;left:6px;top:19px;width:60px;height:16px;line-height:16px;z-index:35;">Tahun</label>
<select name="Combobox1" size="1" id="Combobox8" style="position:absolute;left:74px;top:17px;width:109px;height:28px;z-index:36;">
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
</select>
<label for="" id="Label4" style="position:absolute;left:190px;top:19px;width:60px;height:16px;line-height:16px;z-index:37;">Periode</label>
<label for="" id="Label19" style="position:absolute;left:6px;top:56px;width:130px;height:16px;line-height:16px;z-index:38;">Komponen Bantuan</label>
<select name="Combobox1" size="1" id="Combobox10" style="position:absolute;left:144px;top:54px;width:333px;height:28px;z-index:39;">
<option value="Pendekatan Awal (Kuota KPN)">Pendekatan Awal (Kuota KPN)</option>
<option value="Pendekatan Awal (Kuota Konselor)">Pendekatan Awal (Kuota Konselor)</option>
<option value="Pendekatan Awal (Transport)">Pendekatan Awal (Transport)</option>
<option value="Assesmen (Kuota KPN)">Assesmen (Kuota KPN)</option>
<option value="Assesmen (Kuota Konselor)">Assesmen (Kuota Konselor)</option>
<option value="Assesmen (Transport)">Assesmen (Transport)</option>
<option value="Konseling (Kuota KPN)">Konseling (Kuota KPN)</option>
<option value="Konseling (Kuota Konselor)">Konseling (Kuota Konselor)</option>
<option value="Konseling (Transport)">Konseling (Transport)</option>
<option value="Family Dialog (Kuota Keluarga KPN)">Family Dialog (Kuota Keluarga KPN)</option>
<option value="Family Dialog (Kuota Konselor)">Family Dialog (Kuota Konselor)</option>
<option value="Family Dialog (Transport)">Family Dialog (Transport)</option>
<option value="Family Support (Kuota / Transport)">Family Support (Kuota / Transport)</option>
<option value="Sembako">Sembako</option>
<option value="Pemeliharaan Kesehatan">Pemeliharaan Kesehatan</option>
<option value="Pakaian Seragam">Pakaian Seragam</option>
<option value="ATK,Pengadaan Materi,Pembuatan Laporan">ATK,Pengadaan Materi,Pembuatan Laporan</option>
<option value="Flashdisk (Case Record)">Flashdisk (Case Record)</option>
</select>
<label for="" id="Label1" style="position:absolute;left:6px;top:96px;width:60px;height:16px;line-height:16px;z-index:40;">Bulan 1</label>
<label for="" id="Label2" style="position:absolute;left:6px;top:133px;width:60px;height:16px;line-height:16px;z-index:41;">Bulan 2</label>
<input type="text" id="Editbox16" style="position:absolute;left:74px;top:95px;width:272px;height:16px;z-index:42;" name="Editbox16" value="" spellcheck="false">
<input type="text" id="Editbox17" style="position:absolute;left:74px;top:132px;width:272px;height:16px;z-index:43;" name="Editbox16" value="" spellcheck="false">
<label for="" id="Label20" style="position:absolute;left:6px;top:167px;width:60px;height:16px;line-height:16px;z-index:44;">Bulan 3</label>
<input type="text" id="Editbox18" style="position:absolute;left:74px;top:166px;width:272px;height:16px;z-index:45;" name="Editbox16" value="" spellcheck="false">
<div id="FileUpload1" class="input-group" style="position:absolute;left:381px;top:95px;width:154px;height:26px;z-index:46;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload1-file" style="display:none;"><span class="btn">Upload Bukti Keuangan</span>
</label>
</div>
<div id="FileUpload2" class="input-group" style="position:absolute;left:381px;top:132px;width:154px;height:26px;z-index:47;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload2-file" style="display:none;"><span class="btn">Upload Bukti Keuangan</span>
</label>
</div>
<div id="FileUpload3" class="input-group" style="position:absolute;left:381px;top:166px;width:154px;height:26px;z-index:48;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload3-file" style="display:none;"><span class="btn">Upload Bukti Keuangan</span>
</label>
</div>
<div id="FileUpload5" class="input-group" style="position:absolute;left:547px;top:95px;width:141px;height:26px;z-index:49;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload5-file" style="display:none;"><span class="btn">Upload Bukti Dukung</span>
</label>
</div>
<div id="FileUpload6" class="input-group" style="position:absolute;left:547px;top:132px;width:141px;height:26px;z-index:50;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload6-file" style="display:none;"><span class="btn">Upload Bukti Dukung</span>
</label>
</div>
<div id="FileUpload7" class="input-group" style="position:absolute;left:547px;top:166px;width:141px;height:26px;z-index:51;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload7-file" style="display:none;"><span class="btn">Upload Bukti Dukung</span>
</label>
</div>
<input type="submit" id="Button2" name="Simpan Data" value="Simpan Data" style="position:absolute;left:761px;top:476px;width:144px;height:37px;z-index:52;">
<select name="Combobox1" size="1" id="Combobox9" style="position:absolute;left:272px;top:17px;width:109px;height:28px;z-index:53;">
<option value="Tahap I">Tahap I</option>
<option value="Tahap II">Tahap II</option>
</select>
</div>
<div style="height:539px;" id="tabs1-page-2">
<label for="" id="Label5" style="position:absolute;left:9px;top:21px;width:60px;height:16px;line-height:16px;z-index:54;">Tahun</label>
<select name="Combobox1" size="1" id="Combobox6" style="position:absolute;left:77px;top:19px;width:109px;height:28px;z-index:55;">
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
</select>
<label for="" id="Label7" style="position:absolute;left:193px;top:21px;width:60px;height:16px;line-height:16px;z-index:56;">Periode</label>
<label for="" id="Label11" style="position:absolute;left:9px;top:58px;width:130px;height:16px;line-height:16px;z-index:57;">Komponen Bantuan</label>
<label for="" id="Label12" style="position:absolute;left:9px;top:95px;width:130px;height:16px;line-height:16px;z-index:58;">Jenis Tanda Bukti</label>
<select name="Combobox1" size="1" id="Combobox12" style="position:absolute;left:147px;top:93px;width:333px;height:28px;z-index:59;">
<option value="Nota / Faktur">Nota / Faktur</option>
<option value="Kuitansi">Kuitansi</option>
<option value="Tanda Terima">Tanda Terima</option>
</select>
<select name="Combobox1" size="1" id="Combobox13" style="position:absolute;left:147px;top:128px;width:48px;height:28px;z-index:60;">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
<label for="" id="Label22" style="position:absolute;left:9px;top:130px;width:156px;height:16px;line-height:16px;z-index:61;">Bulan Ke</label>
<label for="" id="Label23" style="position:absolute;left:9px;top:170px;width:130px;height:16px;line-height:16px;z-index:62;">Nomor Tanda Bukti</label>
<input type="text" id="Editbox20" style="position:absolute;left:147px;top:170px;width:112px;height:16px;z-index:63;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox21" style="position:absolute;left:147px;top:201px;width:112px;height:16px;z-index:64;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox22" style="position:absolute;left:147px;top:233px;width:112px;height:16px;z-index:65;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox23" style="position:absolute;left:147px;top:265px;width:112px;height:16px;z-index:66;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox24" style="position:absolute;left:147px;top:297px;width:112px;height:16px;z-index:67;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label24" style="position:absolute;left:271px;top:169px;width:49px;height:16px;line-height:16px;z-index:68;">Tanggal</label>
<input type="text" id="Editbox25" style="position:absolute;left:325px;top:169px;width:29px;height:16px;z-index:69;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox26" style="position:absolute;left:325px;top:200px;width:29px;height:16px;z-index:70;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox27" style="position:absolute;left:325px;top:232px;width:29px;height:16px;z-index:71;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox28" style="position:absolute;left:325px;top:264px;width:29px;height:16px;z-index:72;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox29" style="position:absolute;left:325px;top:296px;width:29px;height:16px;z-index:73;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox30" style="position:absolute;left:370px;top:296px;width:29px;height:16px;z-index:74;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox31" style="position:absolute;left:370px;top:264px;width:29px;height:16px;z-index:75;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox32" style="position:absolute;left:370px;top:232px;width:29px;height:16px;z-index:76;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox33" style="position:absolute;left:370px;top:200px;width:29px;height:16px;z-index:77;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox34" style="position:absolute;left:370px;top:169px;width:29px;height:16px;z-index:78;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox35" style="position:absolute;left:416px;top:169px;width:74px;height:16px;z-index:79;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox36" style="position:absolute;left:416px;top:200px;width:74px;height:16px;z-index:80;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox37" style="position:absolute;left:416px;top:232px;width:74px;height:16px;z-index:81;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox38" style="position:absolute;left:416px;top:264px;width:74px;height:16px;z-index:82;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox39" style="position:absolute;left:416px;top:296px;width:74px;height:16px;z-index:83;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label25" style="position:absolute;left:500px;top:171px;width:82px;height:16px;line-height:16px;z-index:84;">Nama Vendor</label>
<input type="text" id="Editbox40" style="position:absolute;left:590px;top:170px;width:142px;height:16px;z-index:85;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox41" style="position:absolute;left:590px;top:201px;width:142px;height:16px;z-index:86;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox42" style="position:absolute;left:590px;top:233px;width:142px;height:16px;z-index:87;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox43" style="position:absolute;left:590px;top:265px;width:142px;height:16px;z-index:88;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox44" style="position:absolute;left:590px;top:297px;width:142px;height:16px;z-index:89;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label26" style="position:absolute;left:742px;top:171px;width:82px;height:16px;line-height:16px;z-index:90;">Nominal</label>
<input type="text" id="Editbox45" style="position:absolute;left:798px;top:170px;width:104px;height:16px;z-index:91;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox46" style="position:absolute;left:798px;top:201px;width:104px;height:16px;z-index:92;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox47" style="position:absolute;left:798px;top:233px;width:104px;height:16px;z-index:93;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox48" style="position:absolute;left:798px;top:265px;width:104px;height:16px;z-index:94;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox49" style="position:absolute;left:798px;top:297px;width:104px;height:16px;z-index:95;" name="Editbox1" value="" spellcheck="false">
<input type="submit" id="Button3" name="Simpan Data" value="Simpan Data" style="position:absolute;left:760px;top:475px;width:144px;height:37px;z-index:96;">
<select name="Combobox1" size="1" id="Combobox7" style="position:absolute;left:259px;top:19px;width:109px;height:28px;z-index:97;">
<option value="Tahap I">Tahap I</option>
<option value="Tahap II">Tahap II</option>
</select>
<select name="Combobox1" size="1" id="Combobox11" style="position:absolute;left:147px;top:56px;width:333px;height:28px;z-index:98;">
<option value="Pendekatan Awal (Kuota KPN)">Pendekatan Awal (Kuota KPN)</option>
<option value="Pendekatan Awal (Kuota Konselor)">Pendekatan Awal (Kuota Konselor)</option>
<option value="Pendekatan Awal (Transport)">Pendekatan Awal (Transport)</option>
<option value="Assesmen (Kuota KPN)">Assesmen (Kuota KPN)</option>
<option value="Assesmen (Kuota Konselor)">Assesmen (Kuota Konselor)</option>
<option value="Assesmen (Transport)">Assesmen (Transport)</option>
<option value="Konseling (Kuota KPN)">Konseling (Kuota KPN)</option>
<option value="Konseling (Kuota Konselor)">Konseling (Kuota Konselor)</option>
<option value="Konseling (Transport)">Konseling (Transport)</option>
<option value="Family Dialog (Kuota Keluarga KPN)">Family Dialog (Kuota Keluarga KPN)</option>
<option value="Family Dialog (Kuota Konselor)">Family Dialog (Kuota Konselor)</option>
<option value="Family Dialog (Transport)">Family Dialog (Transport)</option>
<option value="Family Support (Kuota / Transport)">Family Support (Kuota / Transport)</option>
<option value="Sembako">Sembako</option>
<option value="Pemeliharaan Kesehatan">Pemeliharaan Kesehatan</option>
<option value="Pakaian Seragam">Pakaian Seragam</option>
<option value="ATK,Pengadaan Materi,Pembuatan Laporan">ATK,Pengadaan Materi,Pembuatan Laporan</option>
<option value="Flashdisk (Case Record)">Flashdisk (Case Record)</option>
</select>
</div>
</form>

<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:104;">
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
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:105;">
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
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:106;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:107;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:108;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>