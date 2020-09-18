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
<title>After Care Input</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="base/jquery-ui.min.css" rel="stylesheet">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="input-after.css" rel="stylesheet">
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
   $("#Spinner1").spinner(
   {
      min: 1,
      max: 31,
      step: 1
   });
   $("#Tabs2").tabs(
   {
      show: false,
      hide: false,
      event: 'click',
      collapsible: false
   });
   $("#Spinner2").spinner(
   {
      min: 1,
      max: 31,
      step: 1
   });
   $("#Spinner5").spinner(
   {
      min: 1900,
      max: 3000,
      step: 1
   });
   $("#Spinner6").spinner(
   {
      min: 0,
      max: 99,
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
});
</script>
</head>
<body>
<div id="container">
<div id="wb_Image1" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:135;">
<img src="images/logo e ipwl1.png" id="Image1" alt=""></div>

<div id="wb_Text3" style="position:absolute;left:19px;top:160px;width:422px;height:21px;z-index:137;">
<p style="font-size:19px;line-height:21px;font-weight:bold;color:#000000;"><span style="color:#000000;">INPUT LAPORAN KEUANGAN AFTERCARE</span></p></div>
<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:138;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<form name="Tabs1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Tabs1" style="position:absolute;left:11px;top:193px;visibility:hidden;width:923px;height:563px;z-index:139;">
<ul>
<li><a href="#tabs1-page-0"><span>Profil PPKS KPN</span></a></li>
<li><a href="#tabs1-page-1"><span>Rincian Belanja Keahlian</span></a></li>
<li><a href="#tabs1-page-2"><span>Rincian Kursus</span></a></li>
</ul>
<div style="height:539px;" id="tabs1-page-0">
<label for="" id="Label9" style="position:absolute;left:6px;top:19px;width:60px;height:16px;line-height:16px;z-index:0;">Tahun</label>
<select name="Combobox1" size="1" id="Combobox2" style="position:absolute;left:74px;top:17px;width:109px;height:28px;z-index:1;">
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
</select>
<label for="" id="Label8" style="position:absolute;left:6px;top:58px;width:156px;height:16px;line-height:16px;z-index:2;">Nama PPKS</label>
<input type="text" id="Editbox1" style="position:absolute;left:170px;top:57px;width:198px;height:16px;z-index:3;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label14" style="position:absolute;left:6px;top:107px;width:156px;height:16px;line-height:16px;z-index:4;">Tempat Lahir</label>
<label for="" id="Label15" style="position:absolute;left:394px;top:107px;width:169px;height:16px;line-height:16px;z-index:5;">Tanggal Lahir</label>
<div id="wb_Spinner3" style="position:absolute;left:561px;top:105px;width:55px;height:28px;z-index:6;">
<input type="text" id="Spinner3" style="width:26px;height:20px;line-height:20px;" name="Spinner1" value="1"></div>
<select name="Combobox1" size="1" id="Combobox4" style="position:absolute;left:635px;top:105px;width:152px;height:28px;z-index:7;">
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
<div id="wb_Spinner4" style="position:absolute;left:813px;top:105px;width:94px;height:28px;z-index:8;">
<input type="text" id="Spinner4" style="width:65px;height:20px;line-height:20px;" name="Spinner1" value="2018"></div>
<label for="" id="Label10" style="position:absolute;left:6px;top:154px;width:156px;height:16px;line-height:16px;z-index:9;">Jenis Kelamin</label>
<label for="" id="Label16" style="position:absolute;left:6px;top:202px;width:156px;height:16px;line-height:16px;z-index:10;">Jenis Bantuan</label>
<input type="text" id="Editbox7" style="position:absolute;left:590px;top:200px;width:307px;height:16px;z-index:11;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox8" style="position:absolute;left:590px;top:231px;width:307px;height:16px;z-index:12;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox9" style="position:absolute;left:590px;top:263px;width:307px;height:16px;z-index:13;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label17" style="position:absolute;left:397px;top:202px;width:211px;height:16px;line-height:16px;z-index:14;">Alamat Usaha / Tempat Kursus</label>
<input type="submit" id="Button1" name="Simpan Data" value="Simpan Data" style="position:absolute;left:763px;top:476px;width:144px;height:37px;z-index:15;">
<input type="text" id="Editbox19" style="position:absolute;left:170px;top:106px;width:198px;height:16px;z-index:16;" name="Editbox1" value="" spellcheck="false">
<select name="Combobox3" size="1" id="Combobox5" style="position:absolute;left:170px;top:152px;width:208px;height:28px;z-index:17;">
<option selected value="Laki - Laki">Laki - Laki</option>
<option value="Perempuan">Perempuan</option>
</select>
<select name="Combobox3" size="1" id="Combobox1" style="position:absolute;left:170px;top:200px;width:208px;height:28px;z-index:18;">
<option selected value="Usaha">Usaha</option>
<option value="Kursus Keterampilan">Kursus Keterampilan</option>
</select>
<input type="text" id="Editbox2" style="position:absolute;left:170px;top:304px;width:307px;height:16px;z-index:19;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox3" style="position:absolute;left:170px;top:334px;width:307px;height:16px;z-index:20;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox4" style="position:absolute;left:170px;top:364px;width:307px;height:16px;z-index:21;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label6" style="position:absolute;left:6px;top:305px;width:211px;height:16px;line-height:16px;z-index:22;">Alamat PPKS</label>
<label for="" id="Label21" style="position:absolute;left:521px;top:305px;width:147px;height:16px;line-height:16px;z-index:23;">Nomor Handphone</label>
<input type="text" id="Editbox14" style="position:absolute;left:681px;top:304px;width:216px;height:16px;z-index:24;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label18" style="position:absolute;left:521px;top:336px;width:147px;height:16px;line-height:16px;z-index:25;">Status Perkawinan</label>
<select name="Combobox3" size="1" id="Combobox3" style="position:absolute;left:681px;top:334px;width:226px;height:28px;z-index:26;">
<option selected value="Menikah">Menikah</option>
<option value="Belum Menikah">Belum Menikah</option>
</select>
<label for="" id="Label27" style="position:absolute;left:521px;top:365px;width:147px;height:16px;line-height:16px;z-index:27;">Nama Suami / Istri</label>
<input type="text" id="Editbox6" style="position:absolute;left:681px;top:364px;width:216px;height:16px;z-index:28;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label28" style="position:absolute;left:521px;top:395px;width:147px;height:16px;line-height:16px;z-index:29;">Jumlah Anak</label>
<div id="wb_Spinner1" style="position:absolute;left:681px;top:393px;width:55px;height:28px;z-index:30;">
<input type="text" id="Spinner1" style="width:26px;height:20px;line-height:20px;" name="Spinner1" value="1"></div>
<select name="Combobox2" size="1" id="Combobox14" style="position:absolute;left:170px;top:393px;width:110px;height:28px;z-index:31;">
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
<label for="" id="Label29" style="position:absolute;left:3px;top:395px;width:113px;height:16px;line-height:16px;z-index:32;">Pendidikan Terakhir</label>
<input type="text" id="Editbox10" style="position:absolute;left:170px;top:424px;width:307px;height:16px;z-index:33;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label31" style="position:absolute;left:521px;top:425px;width:147px;height:16px;line-height:16px;z-index:34;">Pekerjaan Orangtua</label>
<input type="text" id="Editbox11" style="position:absolute;left:681px;top:424px;width:216px;height:16px;z-index:35;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label30" style="position:absolute;left:6px;top:425px;width:156px;height:16px;line-height:16px;z-index:36;">Nama Orangtua</label>
</div>
<div style="height:539px;" id="tabs1-page-1">
<label for="" id="Label3" style="position:absolute;left:6px;top:19px;width:60px;height:16px;line-height:16px;z-index:37;">Tahun</label>
<select name="Combobox1" size="1" id="Combobox8" style="position:absolute;left:74px;top:17px;width:109px;height:28px;z-index:38;">
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
</select>
<label for="" id="Label4" style="position:absolute;left:190px;top:19px;width:86px;height:16px;line-height:16px;z-index:39;">Jenis Usaha</label>
<label for="" id="Label19" style="position:absolute;left:6px;top:56px;width:130px;height:16px;line-height:16px;z-index:40;">Komponen Bantuan</label>
<select name="Combobox1" size="1" id="Combobox10" style="position:absolute;left:144px;top:54px;width:333px;height:28px;z-index:41;">
<option value="Peralatan">Peralatan</option>
<option value="Bahan">Bahan</option>
</select>
<label for="" id="Label1" style="position:absolute;left:6px;top:96px;width:130px;height:16px;line-height:16px;z-index:42;">Nama Alat / Bahan</label>
<label for="" id="Label2" style="position:absolute;left:487px;top:96px;width:129px;height:16px;line-height:16px;z-index:43;">Volume / Spesifikasi</label>
<input type="text" id="Editbox16" style="position:absolute;left:143px;top:95px;width:324px;height:16px;z-index:44;" name="Editbox16" value="" spellcheck="false">
<input type="reset" id="Button2" name="Simpan Data" value="Simpan Data" style="position:absolute;left:761px;top:476px;width:144px;height:37px;z-index:45;">
<input type="text" id="Editbox12" style="position:absolute;left:272px;top:18px;width:195px;height:16px;z-index:46;" name="Editbox16" value="" spellcheck="false">
<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:611px;top:96px;width:293px;height:92px;z-index:47;" rows="5" cols="34" spellcheck="false"></textarea>
<label for="" id="Label20" style="position:absolute;left:6px;top:130px;width:130px;height:16px;line-height:16px;z-index:48;">Harga Satuan (Rp)</label>
<input type="text" id="Editbox13" style="position:absolute;left:143px;top:129px;width:190px;height:16px;z-index:49;" name="Editbox16" value="" spellcheck="false">
</div>
<div style="height:539px;" id="tabs1-page-2">
<label for="" id="Label5" style="position:absolute;left:9px;top:21px;width:60px;height:16px;line-height:16px;z-index:50;">Tahun</label>
<select name="Combobox1" size="1" id="Combobox6" style="position:absolute;left:77px;top:19px;width:109px;height:28px;z-index:51;">
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
</select>
<label for="" id="Label7" style="position:absolute;left:193px;top:21px;width:60px;height:16px;line-height:16px;z-index:52;">Periode</label>
<label for="" id="Label11" style="position:absolute;left:9px;top:58px;width:130px;height:16px;line-height:16px;z-index:53;">Komponen Bantuan</label>
<label for="" id="Label12" style="position:absolute;left:9px;top:95px;width:130px;height:16px;line-height:16px;z-index:54;">Jenis Tanda Bukti</label>
<select name="Combobox1" size="1" id="Combobox12" style="position:absolute;left:147px;top:93px;width:333px;height:28px;z-index:55;">
<option value="Nota / Faktur">Nota / Faktur</option>
<option value="Kuitansi">Kuitansi</option>
<option value="Tanda Terima">Tanda Terima</option>
</select>
<select name="Combobox1" size="1" id="Combobox13" style="position:absolute;left:147px;top:128px;width:48px;height:28px;z-index:56;">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
</select>
<label for="" id="Label22" style="position:absolute;left:9px;top:130px;width:156px;height:16px;line-height:16px;z-index:57;">Bulan Ke</label>
<label for="" id="Label23" style="position:absolute;left:9px;top:170px;width:130px;height:16px;line-height:16px;z-index:58;">Nomor Tanda Bukti</label>
<input type="text" id="Editbox20" style="position:absolute;left:147px;top:170px;width:112px;height:16px;z-index:59;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox21" style="position:absolute;left:147px;top:201px;width:112px;height:16px;z-index:60;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox22" style="position:absolute;left:147px;top:233px;width:112px;height:16px;z-index:61;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox23" style="position:absolute;left:147px;top:265px;width:112px;height:16px;z-index:62;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox24" style="position:absolute;left:147px;top:297px;width:112px;height:16px;z-index:63;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label24" style="position:absolute;left:271px;top:169px;width:49px;height:16px;line-height:16px;z-index:64;">Tanggal</label>
<input type="text" id="Editbox25" style="position:absolute;left:325px;top:169px;width:29px;height:16px;z-index:65;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox26" style="position:absolute;left:325px;top:200px;width:29px;height:16px;z-index:66;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox27" style="position:absolute;left:325px;top:232px;width:29px;height:16px;z-index:67;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox28" style="position:absolute;left:325px;top:264px;width:29px;height:16px;z-index:68;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox29" style="position:absolute;left:325px;top:296px;width:29px;height:16px;z-index:69;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox30" style="position:absolute;left:370px;top:296px;width:29px;height:16px;z-index:70;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox31" style="position:absolute;left:370px;top:264px;width:29px;height:16px;z-index:71;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox32" style="position:absolute;left:370px;top:232px;width:29px;height:16px;z-index:72;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox33" style="position:absolute;left:370px;top:200px;width:29px;height:16px;z-index:73;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox34" style="position:absolute;left:370px;top:169px;width:29px;height:16px;z-index:74;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox35" style="position:absolute;left:416px;top:169px;width:74px;height:16px;z-index:75;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox36" style="position:absolute;left:416px;top:200px;width:74px;height:16px;z-index:76;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox37" style="position:absolute;left:416px;top:232px;width:74px;height:16px;z-index:77;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox38" style="position:absolute;left:416px;top:264px;width:74px;height:16px;z-index:78;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox39" style="position:absolute;left:416px;top:296px;width:74px;height:16px;z-index:79;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label25" style="position:absolute;left:500px;top:171px;width:82px;height:16px;line-height:16px;z-index:80;">Nama Vendor</label>
<input type="text" id="Editbox40" style="position:absolute;left:590px;top:170px;width:142px;height:16px;z-index:81;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox41" style="position:absolute;left:590px;top:201px;width:142px;height:16px;z-index:82;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox42" style="position:absolute;left:590px;top:233px;width:142px;height:16px;z-index:83;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox43" style="position:absolute;left:590px;top:265px;width:142px;height:16px;z-index:84;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox44" style="position:absolute;left:590px;top:297px;width:142px;height:16px;z-index:85;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label26" style="position:absolute;left:742px;top:171px;width:82px;height:16px;line-height:16px;z-index:86;">Nominal</label>
<input type="text" id="Editbox45" style="position:absolute;left:798px;top:170px;width:104px;height:16px;z-index:87;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox46" style="position:absolute;left:798px;top:201px;width:104px;height:16px;z-index:88;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox47" style="position:absolute;left:798px;top:233px;width:104px;height:16px;z-index:89;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox48" style="position:absolute;left:798px;top:265px;width:104px;height:16px;z-index:90;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox49" style="position:absolute;left:798px;top:297px;width:104px;height:16px;z-index:91;" name="Editbox1" value="" spellcheck="false">
<input type="submit" id="Button3" name="Simpan Data" value="Simpan Data" style="position:absolute;left:760px;top:475px;width:144px;height:37px;z-index:92;">
<select name="Combobox1" size="1" id="Combobox7" style="position:absolute;left:259px;top:19px;width:109px;height:28px;z-index:93;">
<option value="Triwulan I">Triwulan I</option>
<option value="Triwulan II">Triwulan II</option>
<option value="Triwulan III">Triwulan III</option>
<option value="Triwulan IV">Triwulan IV</option>
</select>
<select name="Combobox1" size="1" id="Combobox11" style="position:absolute;left:147px;top:56px;width:333px;height:28px;z-index:94;">
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

<form name="Tabs1" method="post" action="mailto:yourname@yourdomain.com" enctype="multipart/form-data" id="Tabs2" style="position:absolute;left:11px;top:193px;width:923px;height:563px;z-index:140;">
<ul>
<li><a href="#tabs2-page-0"><span>Profil PPKS KPN</span></a></li>
<li><a href="#tabs2-page-1"><span>Upload Data Dukung</span></a></li>
</ul>
<div style="height:539px;" id="tabs2-page-0">
<label for="" id="Label13" style="position:absolute;left:6px;top:19px;width:60px;height:16px;line-height:16px;z-index:95;">Tahun</label>
<select name="Combobox1" size="1" id="Combobox9" style="position:absolute;left:74px;top:17px;width:109px;height:28px;z-index:96;">
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
</select>
<label for="" id="Label32" style="position:absolute;left:6px;top:58px;width:156px;height:16px;line-height:16px;z-index:97;">Nama PPKS</label>
<input type="text" id="Editbox5" style="position:absolute;left:170px;top:57px;width:198px;height:16px;z-index:98;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label33" style="position:absolute;left:6px;top:107px;width:156px;height:16px;line-height:16px;z-index:99;">Tempat Lahir</label>
<label for="" id="Label34" style="position:absolute;left:394px;top:107px;width:169px;height:16px;line-height:16px;z-index:100;">Tanggal Lahir</label>
<div id="wb_Spinner2" style="position:absolute;left:561px;top:105px;width:55px;height:28px;z-index:101;">
<input type="text" id="Spinner2" style="width:26px;height:20px;line-height:20px;" name="Spinner1" value="1"></div>
<select name="Combobox1" size="1" id="Combobox15" style="position:absolute;left:635px;top:105px;width:152px;height:28px;z-index:102;">
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
<div id="wb_Spinner5" style="position:absolute;left:813px;top:105px;width:94px;height:28px;z-index:103;">
<input type="text" id="Spinner5" style="width:65px;height:20px;line-height:20px;" name="Spinner1" value="2018"></div>
<label for="" id="Label35" style="position:absolute;left:6px;top:154px;width:156px;height:16px;line-height:16px;z-index:104;">Jenis Kelamin</label>
<label for="" id="Label36" style="position:absolute;left:6px;top:202px;width:156px;height:16px;line-height:16px;z-index:105;">Jenis Kursus</label>
<input type="text" id="Editbox15" style="position:absolute;left:561px;top:200px;width:336px;height:16px;z-index:106;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox17" style="position:absolute;left:561px;top:231px;width:336px;height:16px;z-index:107;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox18" style="position:absolute;left:561px;top:263px;width:336px;height:16px;z-index:108;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label37" style="position:absolute;left:397px;top:202px;width:145px;height:16px;line-height:16px;z-index:109;">Alamat Tempat Kursus</label>
<input type="reset" id="Button4" onclick="document.getElementById('Tabs1').reset();return false;" name="Simpan Data" value="Simpan Data" style="position:absolute;left:763px;top:476px;width:144px;height:37px;z-index:110;">
<input type="text" id="Editbox81" style="position:absolute;left:170px;top:106px;width:198px;height:16px;z-index:111;" name="Editbox1" value="" spellcheck="false">
<select name="Combobox3" size="1" id="Combobox23" style="position:absolute;left:170px;top:152px;width:208px;height:28px;z-index:112;">
<option selected value="Laki - Laki">Laki - Laki</option>
<option value="Perempuan">Perempuan</option>
</select>
<input type="text" id="Editbox82" style="position:absolute;left:170px;top:304px;width:307px;height:16px;z-index:113;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox83" style="position:absolute;left:170px;top:334px;width:307px;height:16px;z-index:114;" name="Editbox1" value="" spellcheck="false">
<input type="text" id="Editbox84" style="position:absolute;left:170px;top:364px;width:307px;height:16px;z-index:115;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label52" style="position:absolute;left:6px;top:305px;width:211px;height:16px;line-height:16px;z-index:116;">Alamat PPKS</label>
<label for="" id="Label53" style="position:absolute;left:521px;top:305px;width:147px;height:16px;line-height:16px;z-index:117;">Nomor Handphone</label>
<input type="text" id="Editbox85" style="position:absolute;left:681px;top:304px;width:216px;height:16px;z-index:118;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label54" style="position:absolute;left:521px;top:336px;width:147px;height:16px;line-height:16px;z-index:119;">Status Perkawinan</label>
<select name="Combobox3" size="1" id="Combobox25" style="position:absolute;left:681px;top:334px;width:226px;height:28px;z-index:120;">
<option selected value="Menikah">Menikah</option>
<option value="Belum Menikah">Belum Menikah</option>
</select>
<label for="" id="Label55" style="position:absolute;left:521px;top:365px;width:147px;height:16px;line-height:16px;z-index:121;">Nama Suami / Istri</label>
<input type="text" id="Editbox86" style="position:absolute;left:681px;top:364px;width:216px;height:16px;z-index:122;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label56" style="position:absolute;left:521px;top:395px;width:147px;height:16px;line-height:16px;z-index:123;">Jumlah Anak</label>
<div id="wb_Spinner6" style="position:absolute;left:681px;top:393px;width:55px;height:28px;z-index:124;">
<input type="text" id="Spinner6" style="width:26px;height:20px;line-height:20px;" name="Spinner1" value="0"></div>
<select name="Combobox2" size="1" id="Combobox26" style="position:absolute;left:170px;top:393px;width:110px;height:28px;z-index:125;">
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
<label for="" id="Label57" style="position:absolute;left:3px;top:395px;width:113px;height:16px;line-height:16px;z-index:126;">Pendidikan Terakhir</label>
<input type="text" id="Editbox87" style="position:absolute;left:170px;top:424px;width:307px;height:16px;z-index:127;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label58" style="position:absolute;left:521px;top:425px;width:147px;height:16px;line-height:16px;z-index:128;">Pekerjaan Orangtua</label>
<input type="text" id="Editbox88" style="position:absolute;left:681px;top:424px;width:216px;height:16px;z-index:129;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label59" style="position:absolute;left:3px;top:425px;width:156px;height:16px;line-height:16px;z-index:130;">Nama Orangtua</label>
<input type="text" id="Editbox51" style="position:absolute;left:170px;top:200px;width:198px;height:16px;z-index:131;" name="Editbox1" value="" spellcheck="false">
</div>
<div style="height:539px;" id="tabs2-page-1">
<input type="reset" id="Button6" onclick="document.getElementById('FileUpload2').reset();document.getElementById('FileUpload3').reset();return false;" name="Simpan Data" value="Simpan Data" style="position:absolute;left:760px;top:475px;width:144px;height:37px;z-index:132;">
<div id="FileUpload2" class="input-group" style="position:absolute;left:8px;top:32px;width:604px;height:26px;z-index:133;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload2" id="FileUpload2-file" style="display:none;"><span class="btn">Upload Surat Keterangan Kursus&nbsp; </span>
</label>
</div>
<div id="FileUpload3" class="input-group" style="position:absolute;left:8px;top:65px;width:604px;height:26px;z-index:134;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload2" id="FileUpload3-file" style="display:none;"><span class="btn">Upload Bukti Pembayaran Kursus</span>
</label>
</div>
</div>
</form>

<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:141;">
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
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:142;">
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
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:143;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:144;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:145;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>