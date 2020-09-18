<?php
if (session_id() == "")
{
   session_start();
}
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formid']) && $_POST['formid'] == 'form1')
{
   $mailto = 'yourname@yourdomain.com';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $subject = 'Profil IPWL form';
   $message = 'Values submitted from web site form:';
   $success_url = '';
   $error_url = '';
   $eol = "\n";
   $error = '';
   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field", "g-recaptcha-response");
   $boundary = md5(uniqid(time()));
   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;

   try
   {
      if (!ValidateEmail($mailfrom))
      {
         $error .= "The specified email address (" . $mailfrom . ") is invalid!\n<br>";
         throw new Exception($error);
      }

      $message .= $eol;
      $message .= "IP Address : ";
      $message .= $_SERVER['REMOTE_ADDR'];
      $message .= $eol;
      foreach ($_POST as $key => $value)
      {
         if (!in_array(strtolower($key), $internalfields))
         {
            if (!is_array($value))
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            }
            else
            {
               $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
         }
      }
      $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
      $body .= '--'.$boundary.$eol;
      $body .= 'Content-Type: text/plain; charset=UTF-8'.$eol;
      $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
      $body .= $eol.stripslashes($message).$eol;
      if (!empty($_FILES))
      {
         foreach ($_FILES as $key => $value)
         {
             if ($_FILES[$key]['error'] == 0)
             {
                $body .= '--'.$boundary.$eol;
                $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
                $body .= 'Content-Transfer-Encoding: base64'.$eol;
                $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
                $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
             }
         }
      }
      $body .= '--'.$boundary.'--'.$eol;
      if ($mailto != '')
      {
         mail($mailto, $subject, $body, $header);
      }
      header('Location: '.$success_url);
   }
   catch (Exception $e)
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $e->getMessage(), $errorcode);
      echo $errorcode;
   }
   exit;
}
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
$roles = array("Administrator", "IPWL");
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
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Input Profile IPWL</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="Test_Project.css" rel="stylesheet">
<link href="Profile-Input.css" rel="stylesheet">
<script src="jquery-3.4.1.min.js"></script>
<script src="wb.validation.min.js"></script>
<script src="wwb15.min.js"></script>
<script>
$(document).ready(function()
{
   $("#FileUpload1 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
      input.blur();
   });
   $("#FileUpload1 .form-control").validate(
   {
      required: true,
      bootstrap: true,
      type: 'custom',
      param: /\S/,
      color_text: '#000000',
      color_hint: '#00FF00',
      color_error: '#FF0000',
      color_border: '#808080',
      nohint: false,
      font_family: 'Arial',
      font_size: '13px',
      position: 'topleft',
      offsetx: 0,
      offsety: 0,
      effect: 'none',
      error_text: ''
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
   $("#FileUpload4 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
   $("#FileUpload5 :file").on('change', function()
   {
      var input = $(this).parents('.input-group').find(':text');
      input.val($(this).val());
   });
});
</script>
</head>
<body>
<div id="container">
<div id="wb_LoginName1" style="position:absolute;left:606px;top:17px;width:338px;height:36px;text-align:center;z-index:339;">
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
<div id="wb_Text3" style="position:absolute;left:19px;top:155px;width:210px;height:30px;z-index:340;">
<p style="font-size:27px;line-height:30px;font-weight:bold;color:#000000;"><span style="color:#000000;">PROFIL INPUT</span></p></div>
<div id="wb_Image1" style="position:absolute;left:19px;top:204px;width:126px;height:145px;z-index:341;">
<img src="images/creative-illustration-default-avatar-profile-placeholder-isolated-background-art-design-grey-photo-blank-template-mockup-144849704.jpg" id="Image1" alt=""></div>
<div id="wb_Form1" style="position:absolute;left:154px;top:204px;width:571px;height:2676px;z-index:342;">
<form name="FormProfil_IPWL" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" target="_self" id="Form1">
<input type="hidden" name="formid" value="form1">
<label for="Label1" id="Label1" style="position:absolute;left:6px;top:37px;width:98px;height:16px;line-height:16px;z-index:0;">Nama IPWL</label>
<label for="Label2" id="Label2" style="position:absolute;left:6px;top:68px;width:98px;height:16px;line-height:16px;z-index:1;">Alamat IPWL</label>
<input type="text" id="Editbox1" style="position:absolute;left:150px;top:37px;width:281px;height:16px;z-index:2;" name="Nama IPWL" value="" spellcheck="false">
<input type="text" id="Editbox2" style="position:absolute;left:150px;top:68px;width:281px;height:16px;z-index:3;" name="Alamat Row 1" value="" maxlength="35" spellcheck="false">
<input type="text" id="Editbox3" style="position:absolute;left:150px;top:99px;width:281px;height:16px;z-index:4;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label3" style="position:absolute;left:6px;top:129px;width:98px;height:16px;line-height:16px;z-index:5;">Nomor Telp</label>
<input type="text" id="Editbox4" style="position:absolute;left:150px;top:129px;width:44px;height:16px;z-index:6;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label4" style="position:absolute;left:6px;top:190px;width:98px;height:16px;line-height:16px;z-index:7;">Jumlah SDM</label>
<input type="text" id="Editbox5" style="position:absolute;left:239px;top:190px;width:32px;height:16px;z-index:8;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label5" style="position:absolute;left:346px;top:191px;width:98px;height:16px;line-height:16px;z-index:9;">Pekerja Sosial</label>
<label for="" id="Label6" style="position:absolute;left:147px;top:191px;width:98px;height:16px;line-height:16px;z-index:10;">Staff</label>
<input type="text" id="Editbox7" style="position:absolute;left:149px;top:251px;width:45px;height:16px;z-index:11;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label7" style="position:absolute;left:6px;top:252px;width:133px;height:16px;line-height:16px;z-index:12;">Kapasitas Rawat Inap</label>
<input type="text" id="Editbox8" style="position:absolute;left:207px;top:129px;width:134px;height:16px;z-index:13;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label8" style="position:absolute;left:6px;top:159px;width:98px;height:16px;line-height:16px;z-index:14;">e-Mail</label>
<input type="text" id="Editbox9" style="position:absolute;left:150px;top:159px;width:191px;height:16px;z-index:15;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label9" style="position:absolute;left:6px;top:5px;width:178px;height:16px;line-height:16px;z-index:16;">A. IDENTITAS IPWL</label>
<label for="" id="Label10" style="position:absolute;left:207px;top:252px;width:43px;height:16px;line-height:16px;z-index:17;">PPKS</label>
<label for="" id="Label11" style="position:absolute;left:281px;top:191px;width:43px;height:16px;line-height:16px;z-index:18;">Orang</label>
<input type="text" id="Editbox6" style="position:absolute;left:442px;top:190px;width:33px;height:16px;z-index:19;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label12" style="position:absolute;left:487px;top:191px;width:43px;height:16px;line-height:16px;z-index:20;">Orang</label>
<label for="" id="Label13" style="position:absolute;left:6px;top:444px;width:178px;height:16px;line-height:16px;z-index:21;">B. KELENGKAPAN BERKAS</label>
<label for="" id="Label14" style="position:absolute;left:6px;top:478px;width:133px;height:16px;line-height:16px;z-index:22;">Program Pelayanan</label>
<label for="" id="Label15" style="position:absolute;left:6px;top:509px;width:133px;height:16px;line-height:16px;z-index:23;">Struktur Organisasi</label>
<label for="" id="Label16" style="position:absolute;left:190px;top:444px;width:232px;height:16px;line-height:16px;z-index:24;">*(harap upload file dengan format .jpeg / .png / .pdf)</label>
<div id="wb_Checkbox1" style="position:absolute;left:149px;top:509px;width:24px;height:24px;z-index:25;">
<input type="checkbox" id="Checkbox1" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox1"></label></div>
<label for="" id="Label17" style="position:absolute;left:174px;top:509px;width:43px;height:16px;line-height:16px;z-index:26;">Ada</label>
<div id="wb_Checkbox2" style="position:absolute;left:218px;top:509px;width:24px;height:24px;z-index:27;">
<input type="checkbox" id="Checkbox2" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox2"></label></div>
<label for="" id="Label18" style="position:absolute;left:243px;top:509px;width:66px;height:16px;line-height:16px;z-index:28;">Tidak Ada</label>
<div id="wb_Text4" style="position:absolute;left:10px;top:556px;width:134px;height:40px;z-index:29;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Akta Notaris yang menyebutkan adanya pelayanan RSKPN</span></p></div>
<div id="wb_Checkbox3" style="position:absolute;left:150px;top:559px;width:24px;height:24px;z-index:30;">
<input type="checkbox" id="Checkbox3" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox3"></label></div>
<label for="" id="Label19" style="position:absolute;left:175px;top:559px;width:43px;height:16px;line-height:16px;z-index:31;">Ada</label>
<div id="wb_Checkbox4" style="position:absolute;left:219px;top:559px;width:24px;height:24px;z-index:32;">
<input type="checkbox" id="Checkbox4" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox4"></label></div>
<label for="" id="Label20" style="position:absolute;left:244px;top:559px;width:66px;height:16px;line-height:16px;z-index:33;">Tidak Ada</label>
<input type="text" id="Editbox11" style="position:absolute;left:149px;top:607px;width:192px;height:16px;z-index:34;" name="Editbox1" value="Nomor Akta" spellcheck="false">
<input type="text" id="Editbox12" style="position:absolute;left:149px;top:638px;width:116px;height:16px;z-index:35;" name="Editbox1" value="Tempat Dikeluarkan" spellcheck="false">
<label for="" id="Label21" style="position:absolute;left:6px;top:608px;width:133px;height:16px;line-height:16px;z-index:36;">Nomor Akta Notaris</label>
<label for="" id="Label22" style="position:absolute;left:6px;top:639px;width:133px;height:16px;line-height:16px;z-index:37;">Dikeluarkan di</label>
<label for="" id="Label23" style="position:absolute;left:290px;top:639px;width:53px;height:16px;line-height:16px;z-index:38;">Tanggal</label>
<input type="text" id="Editbox13" style="position:absolute;left:351px;top:638px;width:32px;height:16px;z-index:39;" name="hr" value="hr" spellcheck="false">
<input type="text" id="Editbox14" style="position:absolute;left:395px;top:638px;width:32px;height:16px;z-index:40;" name="bln" value="bln" spellcheck="false">
<input type="text" id="Editbox15" style="position:absolute;left:439px;top:638px;width:89px;height:16px;z-index:41;" name="thn" value="thn" spellcheck="false">
<div id="wb_Checkbox5" style="position:absolute;left:155px;top:806px;width:24px;height:24px;z-index:42;">
<input type="checkbox" id="Checkbox5" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox5"></label></div>
<label for="" id="Label24" style="position:absolute;left:180px;top:806px;width:43px;height:16px;line-height:16px;z-index:43;">Ada</label>
<label for="" id="Label25" style="position:absolute;left:249px;top:806px;width:66px;height:16px;line-height:16px;z-index:44;">Tidak Ada</label>
<div id="wb_Checkbox6" style="position:absolute;left:224px;top:806px;width:24px;height:24px;z-index:45;">
<input type="checkbox" id="Checkbox6" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox6"></label></div>
<input type="text" id="Editbox16" style="position:absolute;left:154px;top:839px;width:192px;height:16px;z-index:46;" name="Editbox1" value="Nama Bank" spellcheck="false">
<input type="text" id="Editbox17" style="position:absolute;left:154px;top:870px;width:192px;height:16px;z-index:47;" name="Nomor Rekening" value="Nomor Rekening" spellcheck="false">
<div id="wb_Text5" style="position:absolute;left:15px;top:805px;width:134px;height:27px;z-index:48;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Nomor Rekening Bank Atas Nama Lembaga</span></p></div>
<label for="" id="Label26" style="position:absolute;left:11px;top:840px;width:133px;height:16px;line-height:16px;z-index:49;">Nama Bank</label>
<label for="" id="Label27" style="position:absolute;left:11px;top:871px;width:133px;height:16px;line-height:16px;z-index:50;">Nomor Rekening</label>
<input type="submit" id="Button7" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:368px;top:805px;width:107px;height:26px;z-index:51;">
<div id="wb_Text6" style="position:absolute;left:14px;top:911px;width:130px;height:40px;z-index:52;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Akta Legalitas Kementerian Hukum dan Hak Asasi Manusia</span></p></div>
<div id="wb_Checkbox7" style="position:absolute;left:154px;top:914px;width:24px;height:24px;z-index:53;">
<input type="checkbox" id="Checkbox7" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox7"></label></div>
<label for="" id="Label28" style="position:absolute;left:179px;top:914px;width:43px;height:16px;line-height:16px;z-index:54;">Ada</label>
<div id="wb_Checkbox8" style="position:absolute;left:223px;top:914px;width:24px;height:24px;z-index:55;">
<input type="checkbox" id="Checkbox8" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox8"></label></div>
<label for="" id="Label29" style="position:absolute;left:248px;top:914px;width:66px;height:16px;line-height:16px;z-index:56;">Tidak Ada</label>
<input type="submit" id="Button8" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:367px;top:913px;width:107px;height:26px;z-index:57;">
<label for="" id="Label30" style="position:absolute;left:10px;top:963px;width:133px;height:16px;line-height:16px;z-index:58;">Nomor Akta</label>
<input type="text" id="Editbox18" style="position:absolute;left:153px;top:962px;width:192px;height:16px;z-index:59;" name="Editbox1" value="Nomor Akta" spellcheck="false">
<label for="" id="Label31" style="position:absolute;left:10px;top:994px;width:133px;height:16px;line-height:16px;z-index:60;">Dikeluarkan di</label>
<input type="text" id="Editbox19" style="position:absolute;left:153px;top:993px;width:116px;height:16px;z-index:61;" name="Editbox1" value="Tempat Dikeluarkan" spellcheck="false">
<label for="" id="Label32" style="position:absolute;left:294px;top:994px;width:53px;height:16px;line-height:16px;z-index:62;">Tanggal</label>
<input type="text" id="Editbox20" style="position:absolute;left:355px;top:993px;width:32px;height:16px;z-index:63;" name="hr" value="hr" spellcheck="false">
<input type="text" id="Editbox21" style="position:absolute;left:399px;top:993px;width:32px;height:16px;z-index:64;" name="bln" value="bln" spellcheck="false">
<input type="text" id="Editbox22" style="position:absolute;left:443px;top:993px;width:89px;height:16px;z-index:65;" name="thn" value="thn" spellcheck="false">
<div id="wb_Checkbox9" style="position:absolute;left:159px;top:1032px;width:24px;height:24px;z-index:66;">
<input type="checkbox" id="Checkbox9" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox9"></label></div>
<label for="" id="Label33" style="position:absolute;left:184px;top:1032px;width:43px;height:16px;line-height:16px;z-index:67;">Ada</label>
<div id="wb_Checkbox10" style="position:absolute;left:228px;top:1032px;width:24px;height:24px;z-index:68;">
<input type="checkbox" id="Checkbox10" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox10"></label></div>
<label for="" id="Label34" style="position:absolute;left:253px;top:1032px;width:66px;height:16px;line-height:16px;z-index:69;">Tidak Ada</label>
<input type="submit" id="Button9" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:367px;top:1031px;width:107px;height:26px;z-index:70;">
<label for="" id="Label35" style="position:absolute;left:10px;top:1071px;width:133px;height:16px;line-height:16px;z-index:71;">Nomor NPWP</label>
<input type="text" id="Editbox23" style="position:absolute;left:158px;top:1070px;width:212px;height:16px;z-index:72;" name="Editbox1" value="Nomor NPWP" spellcheck="false">
<label for="" id="Label36" style="position:absolute;left:10px;top:1032px;width:133px;height:16px;line-height:16px;z-index:73;">NPWP</label>
<label for="" id="Label42" style="position:absolute;left:10px;top:1104px;width:133px;height:16px;line-height:16px;z-index:74;">KTP Ketua IPWL</label>
<div id="wb_Checkbox13" style="position:absolute;left:159px;top:1104px;width:24px;height:24px;z-index:75;">
<input type="checkbox" id="Checkbox13" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox13"></label></div>
<label for="" id="Label43" style="position:absolute;left:184px;top:1104px;width:43px;height:16px;line-height:16px;z-index:76;">Ada</label>
<div id="wb_Checkbox14" style="position:absolute;left:228px;top:1104px;width:24px;height:24px;z-index:77;">
<input type="checkbox" id="Checkbox14" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox14"></label></div>
<label for="" id="Label44" style="position:absolute;left:253px;top:1104px;width:66px;height:16px;line-height:16px;z-index:78;">Tidak Ada</label>
<input type="submit" id="Button11" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:372px;top:1103px;width:107px;height:26px;z-index:79;">
<label for="" id="Label45" style="position:absolute;left:10px;top:1143px;width:133px;height:16px;line-height:16px;z-index:80;">Nomor KTP</label>
<input type="text" id="Editbox29" style="position:absolute;left:158px;top:1142px;width:212px;height:16px;z-index:81;" name="Editbox1" value="Nomor KTP" spellcheck="false">
<label for="" id="Label46" style="position:absolute;left:10px;top:1185px;width:133px;height:16px;line-height:16px;z-index:82;">BNBA Klien</label>
<div id="wb_Checkbox15" style="position:absolute;left:155px;top:1185px;width:24px;height:24px;z-index:83;">
<input type="checkbox" id="Checkbox15" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox15"></label></div>
<label for="" id="Label47" style="position:absolute;left:180px;top:1185px;width:43px;height:16px;line-height:16px;z-index:84;">Ada</label>
<div id="wb_Checkbox16" style="position:absolute;left:224px;top:1185px;width:24px;height:24px;z-index:85;">
<input type="checkbox" id="Checkbox16" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox16"></label></div>
<label for="" id="Label48" style="position:absolute;left:249px;top:1185px;width:66px;height:16px;line-height:16px;z-index:86;">Tidak Ada</label>
<input type="submit" id="Button12" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:368px;top:1184px;width:107px;height:26px;z-index:87;">
<label for="" id="Label49" style="position:absolute;left:10px;top:1221px;width:133px;height:16px;line-height:16px;z-index:88;">BNBA SDM</label>
<div id="wb_Checkbox17" style="position:absolute;left:155px;top:1221px;width:24px;height:24px;z-index:89;">
<input type="checkbox" id="Checkbox17" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox17"></label></div>
<label for="" id="Label50" style="position:absolute;left:180px;top:1221px;width:43px;height:16px;line-height:16px;z-index:90;">Ada</label>
<div id="wb_Checkbox18" style="position:absolute;left:224px;top:1221px;width:24px;height:24px;z-index:91;">
<input type="checkbox" id="Checkbox18" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox18"></label></div>
<label for="" id="Label51" style="position:absolute;left:249px;top:1221px;width:66px;height:16px;line-height:16px;z-index:92;">Tidak Ada</label>
<input type="submit" id="Button13" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:368px;top:1220px;width:107px;height:26px;z-index:93;">
<label for="" id="Label52" style="position:absolute;left:10px;top:1257px;width:133px;height:16px;line-height:16px;z-index:94;">Keberhasilan Layanan</label>
<div id="wb_Checkbox19" style="position:absolute;left:155px;top:1257px;width:24px;height:24px;z-index:95;">
<input type="checkbox" id="Checkbox19" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox19"></label></div>
<label for="" id="Label53" style="position:absolute;left:180px;top:1257px;width:43px;height:16px;line-height:16px;z-index:96;">Ada</label>
<div id="wb_Checkbox20" style="position:absolute;left:224px;top:1257px;width:24px;height:24px;z-index:97;">
<input type="checkbox" id="Checkbox20" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox20"></label></div>
<label for="" id="Label54" style="position:absolute;left:249px;top:1257px;width:66px;height:16px;line-height:16px;z-index:98;">Tidak Ada</label>
<input type="submit" id="Button14" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:368px;top:1256px;width:107px;height:26px;z-index:99;">
<label for="" id="Label55" style="position:absolute;left:10px;top:1293px;width:133px;height:16px;line-height:16px;z-index:100;">Keterangan Domisili</label>
<div id="wb_Checkbox21" style="position:absolute;left:155px;top:1293px;width:24px;height:24px;z-index:101;">
<input type="checkbox" id="Checkbox21" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox21"></label></div>
<label for="" id="Label56" style="position:absolute;left:180px;top:1293px;width:43px;height:16px;line-height:16px;z-index:102;">Ada</label>
<div id="wb_Checkbox22" style="position:absolute;left:224px;top:1293px;width:24px;height:24px;z-index:103;">
<input type="checkbox" id="Checkbox22" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox22"></label></div>
<label for="" id="Label57" style="position:absolute;left:249px;top:1293px;width:66px;height:16px;line-height:16px;z-index:104;">Tidak Ada</label>
<input type="submit" id="Button15" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:368px;top:1292px;width:107px;height:26px;z-index:105;">
<div id="wb_Text8" style="position:absolute;left:14px;top:1328px;width:137px;height:81px;z-index:106;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Izin dari Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu (PMTSP) / Izin Operasional dari Dinsos Kab/Kota</span></p></div>
<div id="wb_Checkbox23" style="position:absolute;left:155px;top:1329px;width:24px;height:24px;z-index:107;">
<input type="checkbox" id="Checkbox23" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox23"></label></div>
<label for="" id="Label58" style="position:absolute;left:180px;top:1329px;width:43px;height:16px;line-height:16px;z-index:108;">Ada</label>
<div id="wb_Checkbox24" style="position:absolute;left:224px;top:1329px;width:24px;height:24px;z-index:109;">
<input type="checkbox" id="Checkbox24" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox24"></label></div>
<label for="" id="Label59" style="position:absolute;left:249px;top:1329px;width:66px;height:16px;line-height:16px;z-index:110;">Tidak Ada</label>
<input type="submit" id="Button16" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:368px;top:1328px;width:107px;height:26px;z-index:111;">
<label for="" id="Label60" style="position:absolute;left:10px;top:1413px;width:133px;height:16px;line-height:16px;z-index:112;">Nomor Surat</label>
<label for="" id="Label61" style="position:absolute;left:10px;top:1444px;width:133px;height:16px;line-height:16px;z-index:113;">Dikeluarkan di</label>
<input type="text" id="Editbox30" style="position:absolute;left:154px;top:1443px;width:116px;height:16px;z-index:114;" name="Editbox1" value="Tempat Dikeluarkan" spellcheck="false">
<input type="text" id="Editbox31" style="position:absolute;left:154px;top:1412px;width:192px;height:16px;z-index:115;" name="Editbox1" value="Nomor Surat" spellcheck="false">
<label for="" id="Label62" style="position:absolute;left:295px;top:1444px;width:53px;height:16px;line-height:16px;z-index:116;">Tanggal</label>
<input type="text" id="Editbox32" style="position:absolute;left:356px;top:1443px;width:32px;height:16px;z-index:117;" name="hr" value="hr" spellcheck="false">
<input type="text" id="Editbox33" style="position:absolute;left:400px;top:1443px;width:32px;height:16px;z-index:118;" name="bln" value="bln" spellcheck="false">
<input type="text" id="Editbox34" style="position:absolute;left:444px;top:1443px;width:89px;height:16px;z-index:119;" name="thn" value="thn" spellcheck="false">
<div id="wb_Text9" style="position:absolute;left:14px;top:1479px;width:137px;height:27px;z-index:120;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Hasil Akreditasi dari BALK Pusbangprof</span></p></div>
<div id="wb_Checkbox25" style="position:absolute;left:159px;top:1482px;width:24px;height:24px;z-index:121;">
<input type="checkbox" id="Checkbox25" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox25"></label></div>
<label for="" id="Label63" style="position:absolute;left:184px;top:1482px;width:12px;height:16px;line-height:16px;z-index:122;">A</label>
<div id="wb_Checkbox26" style="position:absolute;left:211px;top:1482px;width:24px;height:24px;z-index:123;">
<input type="checkbox" id="Checkbox26" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox26"></label></div>
<label for="" id="Label64" style="position:absolute;left:236px;top:1482px;width:14px;height:16px;line-height:16px;z-index:124;">B</label>
<input type="submit" id="Button18" name="Upload Berkas" value="Upload Berkas" style="position:absolute;left:372px;top:1481px;width:107px;height:26px;z-index:125;">
<label for="" id="Label65" style="position:absolute;left:287px;top:1482px;width:14px;height:16px;line-height:16px;z-index:126;">C</label>
<div id="wb_Checkbox27" style="position:absolute;left:262px;top:1482px;width:24px;height:24px;z-index:127;">
<input type="checkbox" id="Checkbox27" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox27"></label></div>
<label for="" id="Label66" style="position:absolute;left:10px;top:1547px;width:178px;height:16px;line-height:16px;z-index:128;">C. SARANA & PRASARANA</label>
<label for="" id="Label67" style="position:absolute;left:194px;top:1547px;width:267px;height:16px;line-height:16px;z-index:129;">*(harap upload file dengan format .jpeg / .png / .pdf)</label>
<label for="Label1" id="Label68" style="position:absolute;left:6px;top:282px;width:130px;height:16px;line-height:16px;z-index:130;">Nama Ketua IPWL</label>
<input type="text" id="Editbox35" style="position:absolute;left:150px;top:282px;width:281px;height:16px;z-index:131;" name="Nama IPWL" value="" spellcheck="false">
<input type="text" id="Editbox36" style="position:absolute;left:150px;top:313px;width:191px;height:16px;z-index:132;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label69" style="position:absolute;left:6px;top:313px;width:137px;height:16px;line-height:16px;z-index:133;">Contact Number</label>
<label for="Label1" id="Label70" style="position:absolute;left:6px;top:343px;width:133px;height:16px;line-height:16px;z-index:134;">Nama Program Manager</label>
<input type="text" id="Editbox37" style="position:absolute;left:150px;top:343px;width:281px;height:16px;z-index:135;" name="Nama IPWL" value="" spellcheck="false">
<label for="" id="Label71" style="position:absolute;left:6px;top:374px;width:137px;height:16px;line-height:16px;z-index:136;">Contact Number</label>
<input type="text" id="Editbox38" style="position:absolute;left:150px;top:374px;width:191px;height:16px;z-index:137;" name="Editbox1" value="" spellcheck="false">
<select name="Jenis Pelayanan" size="1" id="Combobox1" style="position:absolute;left:149px;top:476px;width:195px;height:28px;z-index:138;">
<option selected value="Pilih Jenis Pelayanan">Pilih Jenis Pelayanan</option>
<option value="Pelayanan Sesuai Permensos">Pelayanan Sesuai Permensos</option>
<option value="Pelayanan Mandiri">Pelayanan Mandiri</option>
</select>
<div id="wb_Checkbox28" style="position:absolute;left:159px;top:1509px;width:24px;height:24px;z-index:139;">
<input type="checkbox" id="Checkbox28" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox28"></label></div>
<label for="" id="Label72" style="position:absolute;left:184px;top:1509px;width:117px;height:16px;line-height:16px;z-index:140;">Belum Ada Sertifikat</label>
<label for="" id="Label73" style="position:absolute;left:147px;top:220px;width:98px;height:16px;line-height:16px;z-index:141;">Konselor Adiksi</label>
<input type="text" id="Editbox10" style="position:absolute;left:239px;top:219px;width:32px;height:16px;z-index:142;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label74" style="position:absolute;left:281px;top:220px;width:43px;height:16px;line-height:16px;z-index:143;">Orang</label>
<label for="" id="Label75" style="position:absolute;left:346px;top:220px;width:98px;height:16px;line-height:16px;z-index:144;">SDM Lainnya</label>
<input type="text" id="Editbox39" style="position:absolute;left:442px;top:219px;width:33px;height:16px;z-index:145;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label76" style="position:absolute;left:487px;top:220px;width:43px;height:16px;line-height:16px;z-index:146;">Orang</label>
<div id="wb_Checkbox11" style="position:absolute;left:155px;top:680px;width:24px;height:24px;z-index:147;">
<input type="checkbox" id="Checkbox11" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox11"></label></div>
<div id="wb_Text7" style="position:absolute;left:10px;top:677px;width:137px;height:40px;z-index:148;">
<p style="font-size:12px;line-height:13.5px;color:#000000;"><span style="color:#000000;">Rekomendasi Dinsos Provinsi untuk menjadi IPWL Kementerian Sosial</span></p></div>
<label for="" id="Label37" style="position:absolute;left:180px;top:680px;width:43px;height:16px;line-height:16px;z-index:149;">Ada</label>
<div id="wb_Checkbox12" style="position:absolute;left:224px;top:680px;width:24px;height:24px;z-index:150;">
<input type="checkbox" id="Checkbox12" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox12"></label></div>
<label for="" id="Label38" style="position:absolute;left:249px;top:680px;width:66px;height:16px;line-height:16px;z-index:151;">Tidak Ada</label>
<a id="Button10" href="#" onclick="ShowObject('Button17', 1);return false;" style="position:absolute;left:368px;top:679px;width:105px;height:24px;z-index:152;">Upload Berkas</a>
<label for="" id="Label39" style="position:absolute;left:10px;top:729px;width:133px;height:16px;line-height:16px;z-index:153;">Nomor Surat</label>
<input type="text" id="Editbox24" style="position:absolute;left:154px;top:728px;width:192px;height:16px;z-index:154;" name="Editbox1" value="Nomor Surat" spellcheck="false">
<label for="" id="Label40" style="position:absolute;left:10px;top:760px;width:133px;height:16px;line-height:16px;z-index:155;">Dikeluarkan di</label>
<input type="text" id="Editbox25" style="position:absolute;left:154px;top:759px;width:116px;height:16px;z-index:156;" name="Editbox1" value="Tempat Dikeluarkan" spellcheck="false">
<label for="" id="Label41" style="position:absolute;left:295px;top:760px;width:53px;height:16px;line-height:16px;z-index:157;">Tanggal</label>
<input type="text" id="Editbox26" style="position:absolute;left:356px;top:759px;width:32px;height:16px;z-index:158;" name="hr" value="hr" spellcheck="false">
<input type="text" id="Editbox27" style="position:absolute;left:400px;top:759px;width:32px;height:16px;z-index:159;" name="bln" value="bln" spellcheck="false">
<input type="text" id="Editbox28" style="position:absolute;left:444px;top:759px;width:89px;height:16px;z-index:160;" name="thn" value="thn" spellcheck="false">
<label for="" id="Label77" style="position:absolute;left:11px;top:1596px;width:133px;height:16px;line-height:16px;z-index:161;">Ruang Pimpinan</label>
<div id="wb_Checkbox29" style="position:absolute;left:156px;top:1596px;width:24px;height:24px;z-index:162;">
<input type="checkbox" id="Checkbox29" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox29"></label></div>
<label for="" id="Label78" style="position:absolute;left:181px;top:1596px;width:43px;height:16px;line-height:16px;z-index:163;">Ada</label>
<div id="wb_Checkbox30" style="position:absolute;left:225px;top:1596px;width:24px;height:24px;z-index:164;">
<input type="checkbox" id="Checkbox30" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox30"></label></div>
<label for="" id="Label79" style="position:absolute;left:250px;top:1596px;width:66px;height:16px;line-height:16px;z-index:165;">Tidak Ada</label>
<input type="submit" id="Button1" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1595px;width:107px;height:26px;z-index:166;">
<label for="" id="Label80" style="position:absolute;left:11px;top:1571px;width:141px;height:16px;line-height:16px;z-index:167;">1. Perkantoran</label>
<label for="" id="Label81" style="position:absolute;left:11px;top:1626px;width:133px;height:16px;line-height:16px;z-index:168;">Ruang Kerja Staff</label>
<div id="wb_Checkbox31" style="position:absolute;left:156px;top:1626px;width:24px;height:24px;z-index:169;">
<input type="checkbox" id="Checkbox31" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox31"></label></div>
<label for="" id="Label82" style="position:absolute;left:181px;top:1626px;width:43px;height:16px;line-height:16px;z-index:170;">Ada</label>
<div id="wb_Checkbox32" style="position:absolute;left:225px;top:1626px;width:24px;height:24px;z-index:171;">
<input type="checkbox" id="Checkbox32" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox32"></label></div>
<label for="" id="Label83" style="position:absolute;left:250px;top:1626px;width:66px;height:16px;line-height:16px;z-index:172;">Tidak Ada</label>
<input type="submit" id="Button19" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1625px;width:107px;height:26px;z-index:173;">
<label for="" id="Label84" style="position:absolute;left:11px;top:1655px;width:133px;height:16px;line-height:16px;z-index:174;">Ruang Rapat</label>
<div id="wb_Checkbox33" style="position:absolute;left:156px;top:1655px;width:24px;height:24px;z-index:175;">
<input type="checkbox" id="Checkbox33" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox33"></label></div>
<label for="" id="Label85" style="position:absolute;left:181px;top:1655px;width:43px;height:16px;line-height:16px;z-index:176;">Ada</label>
<div id="wb_Checkbox34" style="position:absolute;left:225px;top:1655px;width:24px;height:24px;z-index:177;">
<input type="checkbox" id="Checkbox34" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox34"></label></div>
<label for="" id="Label86" style="position:absolute;left:250px;top:1655px;width:66px;height:16px;line-height:16px;z-index:178;">Tidak Ada</label>
<input type="submit" id="Button20" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1654px;width:107px;height:26px;z-index:179;">
<label for="" id="Label87" style="position:absolute;left:11px;top:1685px;width:133px;height:16px;line-height:16px;z-index:180;">Ruang Tamu</label>
<div id="wb_Checkbox35" style="position:absolute;left:156px;top:1685px;width:24px;height:24px;z-index:181;">
<input type="checkbox" id="Checkbox35" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox35"></label></div>
<label for="" id="Label88" style="position:absolute;left:181px;top:1685px;width:43px;height:16px;line-height:16px;z-index:182;">Ada</label>
<div id="wb_Checkbox36" style="position:absolute;left:225px;top:1685px;width:24px;height:24px;z-index:183;">
<input type="checkbox" id="Checkbox36" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox36"></label></div>
<label for="" id="Label89" style="position:absolute;left:250px;top:1685px;width:66px;height:16px;line-height:16px;z-index:184;">Tidak Ada</label>
<input type="submit" id="Button21" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1684px;width:107px;height:26px;z-index:185;">
<label for="" id="Label93" style="position:absolute;left:11px;top:1716px;width:133px;height:16px;line-height:16px;z-index:186;">Ruang Data & Informasi</label>
<div id="wb_Checkbox39" style="position:absolute;left:156px;top:1716px;width:24px;height:24px;z-index:187;">
<input type="checkbox" id="Checkbox39" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox39"></label></div>
<label for="" id="Label94" style="position:absolute;left:181px;top:1716px;width:43px;height:16px;line-height:16px;z-index:188;">Ada</label>
<div id="wb_Checkbox40" style="position:absolute;left:225px;top:1716px;width:24px;height:24px;z-index:189;">
<input type="checkbox" id="Checkbox40" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox40"></label></div>
<input type="submit" id="Button23" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1715px;width:107px;height:26px;z-index:190;">
<label for="" id="Label95" style="position:absolute;left:250px;top:1716px;width:66px;height:16px;line-height:16px;z-index:191;">Tidak Ada</label>
<label for="" id="Label96" style="position:absolute;left:11px;top:1745px;width:133px;height:16px;line-height:16px;z-index:192;">Ruang Perpustakaan</label>
<div id="wb_Checkbox41" style="position:absolute;left:156px;top:1745px;width:24px;height:24px;z-index:193;">
<input type="checkbox" id="Checkbox41" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox41"></label></div>
<label for="" id="Label97" style="position:absolute;left:181px;top:1745px;width:43px;height:16px;line-height:16px;z-index:194;">Ada</label>
<div id="wb_Checkbox42" style="position:absolute;left:225px;top:1745px;width:24px;height:24px;z-index:195;">
<input type="checkbox" id="Checkbox42" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox42"></label></div>
<label for="" id="Label98" style="position:absolute;left:250px;top:1745px;width:66px;height:16px;line-height:16px;z-index:196;">Tidak Ada</label>
<input type="submit" id="Button24" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1744px;width:107px;height:26px;z-index:197;">
<label for="" id="Label99" style="position:absolute;left:11px;top:1775px;width:133px;height:16px;line-height:16px;z-index:198;">Kamar Mandi</label>
<div id="wb_Checkbox43" style="position:absolute;left:156px;top:1775px;width:24px;height:24px;z-index:199;">
<input type="checkbox" id="Checkbox43" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox43"></label></div>
<label for="" id="Label100" style="position:absolute;left:181px;top:1775px;width:43px;height:16px;line-height:16px;z-index:200;">Ada</label>
<div id="wb_Checkbox44" style="position:absolute;left:225px;top:1775px;width:24px;height:24px;z-index:201;">
<input type="checkbox" id="Checkbox44" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox44"></label></div>
<label for="" id="Label101" style="position:absolute;left:250px;top:1775px;width:66px;height:16px;line-height:16px;z-index:202;">Tidak Ada</label>
<input type="submit" id="Button25" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1774px;width:107px;height:26px;z-index:203;">
<label for="" id="Label102" style="position:absolute;left:11px;top:1805px;width:133px;height:16px;line-height:16px;z-index:204;">Dapur</label>
<div id="wb_Checkbox45" style="position:absolute;left:156px;top:1805px;width:24px;height:24px;z-index:205;">
<input type="checkbox" id="Checkbox45" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox45"></label></div>
<label for="" id="Label103" style="position:absolute;left:181px;top:1805px;width:43px;height:16px;line-height:16px;z-index:206;">Ada</label>
<div id="wb_Checkbox46" style="position:absolute;left:225px;top:1805px;width:24px;height:24px;z-index:207;">
<input type="checkbox" id="Checkbox46" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox46"></label></div>
<label for="" id="Label104" style="position:absolute;left:250px;top:1805px;width:66px;height:16px;line-height:16px;z-index:208;">Tidak Ada</label>
<input type="submit" id="Button26" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1804px;width:107px;height:26px;z-index:209;">
<label for="" id="Label105" style="position:absolute;left:11px;top:1869px;width:177px;height:16px;line-height:16px;z-index:210;">2. Ruang Pelayanan Tekhnis</label>
<label for="" id="Label106" style="position:absolute;left:11px;top:1894px;width:133px;height:16px;line-height:16px;z-index:211;">Ruang Asrama</label>
<div id="wb_Checkbox47" style="position:absolute;left:156px;top:1894px;width:24px;height:24px;z-index:212;">
<input type="checkbox" id="Checkbox47" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox47"></label></div>
<label for="" id="Label107" style="position:absolute;left:181px;top:1894px;width:43px;height:16px;line-height:16px;z-index:213;">Ada</label>
<div id="wb_Checkbox48" style="position:absolute;left:225px;top:1894px;width:24px;height:24px;z-index:214;">
<input type="checkbox" id="Checkbox48" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox48"></label></div>
<label for="" id="Label108" style="position:absolute;left:250px;top:1894px;width:66px;height:16px;line-height:16px;z-index:215;">Tidak Ada</label>
<input type="submit" id="Button27" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1893px;width:107px;height:26px;z-index:216;">
<label for="" id="Label109" style="position:absolute;left:11px;top:1924px;width:133px;height:16px;line-height:16px;z-index:217;">Ruang Pengasuhan</label>
<div id="wb_Checkbox49" style="position:absolute;left:156px;top:1924px;width:24px;height:24px;z-index:218;">
<input type="checkbox" id="Checkbox49" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox49"></label></div>
<label for="" id="Label110" style="position:absolute;left:181px;top:1924px;width:43px;height:16px;line-height:16px;z-index:219;">Ada</label>
<div id="wb_Checkbox50" style="position:absolute;left:225px;top:1924px;width:24px;height:24px;z-index:220;">
<input type="checkbox" id="Checkbox50" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox50"></label></div>
<label for="" id="Label111" style="position:absolute;left:250px;top:1924px;width:66px;height:16px;line-height:16px;z-index:221;">Tidak Ada</label>
<input type="submit" id="Button28" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1923px;width:107px;height:26px;z-index:222;">
<label for="" id="Label112" style="position:absolute;left:11px;top:1953px;width:133px;height:16px;line-height:16px;z-index:223;">Ruang Detoksifikasi</label>
<div id="wb_Checkbox51" style="position:absolute;left:156px;top:1953px;width:24px;height:24px;z-index:224;">
<input type="checkbox" id="Checkbox51" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox51"></label></div>
<label for="" id="Label113" style="position:absolute;left:181px;top:1953px;width:43px;height:16px;line-height:16px;z-index:225;">Ada</label>
<div id="wb_Checkbox52" style="position:absolute;left:225px;top:1953px;width:24px;height:24px;z-index:226;">
<input type="checkbox" id="Checkbox52" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox52"></label></div>
<label for="" id="Label114" style="position:absolute;left:250px;top:1953px;width:66px;height:16px;line-height:16px;z-index:227;">Tidak Ada</label>
<input type="submit" id="Button29" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1952px;width:107px;height:26px;z-index:228;">
<label for="" id="Label115" style="position:absolute;left:11px;top:1983px;width:133px;height:16px;line-height:16px;z-index:229;">Ruang Konseling</label>
<div id="wb_Checkbox53" style="position:absolute;left:156px;top:1983px;width:24px;height:24px;z-index:230;">
<input type="checkbox" id="Checkbox53" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox53"></label></div>
<label for="" id="Label116" style="position:absolute;left:181px;top:1983px;width:43px;height:16px;line-height:16px;z-index:231;">Ada</label>
<div id="wb_Checkbox54" style="position:absolute;left:225px;top:1983px;width:24px;height:24px;z-index:232;">
<input type="checkbox" id="Checkbox54" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox54"></label></div>
<label for="" id="Label117" style="position:absolute;left:250px;top:1983px;width:66px;height:16px;line-height:16px;z-index:233;">Tidak Ada</label>
<input type="submit" id="Button30" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:1982px;width:107px;height:26px;z-index:234;">
<label for="" id="Label118" style="position:absolute;left:11px;top:2013px;width:133px;height:16px;line-height:16px;z-index:235;">Ruang Observasi</label>
<div id="wb_Checkbox55" style="position:absolute;left:156px;top:2013px;width:24px;height:24px;z-index:236;">
<input type="checkbox" id="Checkbox55" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox55"></label></div>
<label for="" id="Label119" style="position:absolute;left:181px;top:2013px;width:43px;height:16px;line-height:16px;z-index:237;">Ada</label>
<div id="wb_Checkbox56" style="position:absolute;left:225px;top:2013px;width:24px;height:24px;z-index:238;">
<input type="checkbox" id="Checkbox56" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox56"></label></div>
<label for="" id="Label120" style="position:absolute;left:250px;top:2013px;width:66px;height:16px;line-height:16px;z-index:239;">Tidak Ada</label>
<input type="submit" id="Button31" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2012px;width:107px;height:26px;z-index:240;">
<label for="" id="Label121" style="position:absolute;left:11px;top:2043px;width:133px;height:16px;line-height:16px;z-index:241;">Ruang Instalasi Produksi</label>
<div id="wb_Checkbox57" style="position:absolute;left:156px;top:2043px;width:24px;height:24px;z-index:242;">
<input type="checkbox" id="Checkbox57" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox57"></label></div>
<label for="" id="Label122" style="position:absolute;left:181px;top:2043px;width:43px;height:16px;line-height:16px;z-index:243;">Ada</label>
<div id="wb_Checkbox58" style="position:absolute;left:225px;top:2043px;width:24px;height:24px;z-index:244;">
<input type="checkbox" id="Checkbox58" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox58"></label></div>
<label for="" id="Label123" style="position:absolute;left:250px;top:2043px;width:66px;height:16px;line-height:16px;z-index:245;">Tidak Ada</label>
<input type="submit" id="Button32" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2042px;width:107px;height:26px;z-index:246;">
<label for="" id="Label124" style="position:absolute;left:11px;top:2072px;width:133px;height:16px;line-height:16px;z-index:247;">Ruang Olahraga</label>
<div id="wb_Checkbox59" style="position:absolute;left:156px;top:2072px;width:24px;height:24px;z-index:248;">
<input type="checkbox" id="Checkbox59" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox59"></label></div>
<label for="" id="Label125" style="position:absolute;left:181px;top:2072px;width:43px;height:16px;line-height:16px;z-index:249;">Ada</label>
<div id="wb_Checkbox60" style="position:absolute;left:225px;top:2072px;width:24px;height:24px;z-index:250;">
<input type="checkbox" id="Checkbox60" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox60"></label></div>
<label for="" id="Label126" style="position:absolute;left:250px;top:2072px;width:66px;height:16px;line-height:16px;z-index:251;">Tidak Ada</label>
<input type="submit" id="Button33" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2071px;width:107px;height:26px;z-index:252;">
<label for="" id="Label127" style="position:absolute;left:11px;top:2102px;width:133px;height:16px;line-height:16px;z-index:253;">Ruang Bimbingan Mental</label>
<div id="wb_Checkbox61" style="position:absolute;left:156px;top:2102px;width:24px;height:24px;z-index:254;">
<input type="checkbox" id="Checkbox61" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox61"></label></div>
<label for="" id="Label128" style="position:absolute;left:181px;top:2102px;width:43px;height:16px;line-height:16px;z-index:255;">Ada</label>
<div id="wb_Checkbox62" style="position:absolute;left:225px;top:2102px;width:24px;height:24px;z-index:256;">
<input type="checkbox" id="Checkbox62" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox62"></label></div>
<label for="" id="Label129" style="position:absolute;left:250px;top:2102px;width:66px;height:16px;line-height:16px;z-index:257;">Tidak Ada</label>
<input type="submit" id="Button34" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2101px;width:107px;height:26px;z-index:258;">
<label for="" id="Label130" style="position:absolute;left:11px;top:2132px;width:133px;height:16px;line-height:16px;z-index:259;">Ruang Keterampilan</label>
<div id="wb_Checkbox63" style="position:absolute;left:156px;top:2132px;width:24px;height:24px;z-index:260;">
<input type="checkbox" id="Checkbox63" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox63"></label></div>
<label for="" id="Label131" style="position:absolute;left:181px;top:2132px;width:43px;height:16px;line-height:16px;z-index:261;">Ada</label>
<div id="wb_Checkbox64" style="position:absolute;left:225px;top:2132px;width:24px;height:24px;z-index:262;">
<input type="checkbox" id="Checkbox64" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox64"></label></div>
<label for="" id="Label132" style="position:absolute;left:250px;top:2132px;width:66px;height:16px;line-height:16px;z-index:263;">Tidak Ada</label>
<input type="submit" id="Button35" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2131px;width:107px;height:26px;z-index:264;">
<label for="" id="Label133" style="position:absolute;left:11px;top:2162px;width:133px;height:16px;line-height:16px;z-index:265;">Ruang Kesenian</label>
<div id="wb_Checkbox65" style="position:absolute;left:156px;top:2162px;width:24px;height:24px;z-index:266;">
<input type="checkbox" id="Checkbox65" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox65"></label></div>
<label for="" id="Label134" style="position:absolute;left:181px;top:2162px;width:43px;height:16px;line-height:16px;z-index:267;">Ada</label>
<div id="wb_Checkbox66" style="position:absolute;left:225px;top:2162px;width:24px;height:24px;z-index:268;">
<input type="checkbox" id="Checkbox66" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox66"></label></div>
<label for="" id="Label135" style="position:absolute;left:250px;top:2162px;width:66px;height:16px;line-height:16px;z-index:269;">Tidak Ada</label>
<input type="submit" id="Button36" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2161px;width:107px;height:26px;z-index:270;">
<label for="" id="Label136" style="position:absolute;left:11px;top:2222px;width:133px;height:16px;line-height:16px;z-index:271;">Peralatan Perkantoran</label>
<label for="" id="Label137" style="position:absolute;left:11px;top:2252px;width:133px;height:16px;line-height:16px;z-index:272;">Peralatan Komunikasi</label>
<label for="" id="Label138" style="position:absolute;left:11px;top:2195px;width:177px;height:16px;line-height:16px;z-index:273;">3. Peralatan Lembaga RSKPN</label>
<label for="" id="Label139" style="position:absolute;left:11px;top:2281px;width:133px;height:16px;line-height:16px;z-index:274;">Penerangan</label>
<label for="" id="Label140" style="position:absolute;left:11px;top:2311px;width:133px;height:16px;line-height:16px;z-index:275;">Instalasi & Air Bersih</label>
<label for="" id="Label141" style="position:absolute;left:11px;top:2341px;width:133px;height:16px;line-height:16px;z-index:276;">Peralatan Bantu PPKS</label>
<label for="" id="Label142" style="position:absolute;left:11px;top:2371px;width:133px;height:16px;line-height:16px;z-index:277;">Peralatan Penunjang</label>
<div id="wb_Checkbox67" style="position:absolute;left:156px;top:2371px;width:24px;height:24px;z-index:278;">
<input type="checkbox" id="Checkbox67" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox67"></label></div>
<label for="" id="Label143" style="position:absolute;left:181px;top:2371px;width:43px;height:16px;line-height:16px;z-index:279;">Ada</label>
<div id="wb_Checkbox68" style="position:absolute;left:225px;top:2371px;width:24px;height:24px;z-index:280;">
<input type="checkbox" id="Checkbox68" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox68"></label></div>
<label for="" id="Label144" style="position:absolute;left:250px;top:2371px;width:66px;height:16px;line-height:16px;z-index:281;">Tidak Ada</label>
<input type="submit" id="Button37" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2370px;width:107px;height:26px;z-index:282;">
<input type="submit" id="Button38" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2340px;width:107px;height:26px;z-index:283;">
<label for="" id="Label145" style="position:absolute;left:250px;top:2341px;width:66px;height:16px;line-height:16px;z-index:284;">Tidak Ada</label>
<div id="wb_Checkbox69" style="position:absolute;left:225px;top:2341px;width:24px;height:24px;z-index:285;">
<input type="checkbox" id="Checkbox69" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox69"></label></div>
<label for="" id="Label146" style="position:absolute;left:181px;top:2341px;width:43px;height:16px;line-height:16px;z-index:286;">Ada</label>
<div id="wb_Checkbox70" style="position:absolute;left:156px;top:2341px;width:24px;height:24px;z-index:287;">
<input type="checkbox" id="Checkbox70" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox70"></label></div>
<div id="wb_Checkbox71" style="position:absolute;left:156px;top:2311px;width:24px;height:24px;z-index:288;">
<input type="checkbox" id="Checkbox71" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox71"></label></div>
<label for="" id="Label147" style="position:absolute;left:181px;top:2311px;width:43px;height:16px;line-height:16px;z-index:289;">Ada</label>
<div id="wb_Checkbox72" style="position:absolute;left:225px;top:2311px;width:24px;height:24px;z-index:290;">
<input type="checkbox" id="Checkbox72" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox72"></label></div>
<label for="" id="Label148" style="position:absolute;left:250px;top:2311px;width:66px;height:16px;line-height:16px;z-index:291;">Tidak Ada</label>
<input type="submit" id="Button39" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2310px;width:107px;height:26px;z-index:292;">
<input type="submit" id="Button40" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2280px;width:107px;height:26px;z-index:293;">
<label for="" id="Label149" style="position:absolute;left:250px;top:2281px;width:66px;height:16px;line-height:16px;z-index:294;">Tidak Ada</label>
<div id="wb_Checkbox73" style="position:absolute;left:225px;top:2281px;width:24px;height:24px;z-index:295;">
<input type="checkbox" id="Checkbox73" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox73"></label></div>
<label for="" id="Label150" style="position:absolute;left:181px;top:2281px;width:43px;height:16px;line-height:16px;z-index:296;">Ada</label>
<div id="wb_Checkbox74" style="position:absolute;left:156px;top:2281px;width:24px;height:24px;z-index:297;">
<input type="checkbox" id="Checkbox74" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox74"></label></div>
<div id="wb_Checkbox75" style="position:absolute;left:156px;top:2252px;width:24px;height:24px;z-index:298;">
<input type="checkbox" id="Checkbox75" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox75"></label></div>
<label for="" id="Label151" style="position:absolute;left:181px;top:2252px;width:43px;height:16px;line-height:16px;z-index:299;">Ada</label>
<div id="wb_Checkbox76" style="position:absolute;left:225px;top:2252px;width:24px;height:24px;z-index:300;">
<input type="checkbox" id="Checkbox76" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox76"></label></div>
<label for="" id="Label152" style="position:absolute;left:250px;top:2252px;width:66px;height:16px;line-height:16px;z-index:301;">Tidak Ada</label>
<input type="submit" id="Button41" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2251px;width:107px;height:26px;z-index:302;">
<input type="submit" id="Button42" name="Upload Foto" value="Upload Foto" style="position:absolute;left:369px;top:2221px;width:107px;height:26px;z-index:303;">
<label for="" id="Label153" style="position:absolute;left:250px;top:2222px;width:66px;height:16px;line-height:16px;z-index:304;">Tidak Ada</label>
<div id="wb_Checkbox77" style="position:absolute;left:225px;top:2222px;width:24px;height:24px;z-index:305;">
<input type="checkbox" id="Checkbox77" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox77"></label></div>
<label for="" id="Label154" style="position:absolute;left:181px;top:2222px;width:43px;height:16px;line-height:16px;z-index:306;">Ada</label>
<div id="wb_Checkbox78" style="position:absolute;left:156px;top:2222px;width:24px;height:24px;z-index:307;">
<input type="checkbox" id="Checkbox78" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox78"></label></div>
<label for="" id="Label155" style="position:absolute;left:11px;top:2408px;width:177px;height:16px;line-height:16px;z-index:308;">4. Alat Transportasi</label>
<label for="" id="Label156" style="position:absolute;left:11px;top:2433px;width:133px;height:16px;line-height:16px;z-index:309;">Mobil Operasional</label>
<input type="text" id="Editbox40" style="position:absolute;left:156px;top:2432px;width:32px;height:16px;z-index:310;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label157" style="position:absolute;left:200px;top:2432px;width:43px;height:16px;line-height:16px;z-index:311;">Unit</label>
<input type="submit" id="Button43" name="Upload Foto" value="Upload Foto" style="position:absolute;left:368px;top:2432px;width:107px;height:26px;z-index:312;">
<label for="" id="Label158" style="position:absolute;left:11px;top:2463px;width:133px;height:16px;line-height:16px;z-index:313;">Sepeda Motor</label>
<input type="text" id="Editbox41" style="position:absolute;left:156px;top:2462px;width:32px;height:16px;z-index:314;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label159" style="position:absolute;left:200px;top:2462px;width:43px;height:16px;line-height:16px;z-index:315;">Unit</label>
<input type="submit" id="Button44" name="Upload Foto" value="Upload Foto" style="position:absolute;left:368px;top:2462px;width:107px;height:26px;z-index:316;">
<label for="" id="Label160" style="position:absolute;left:11px;top:2493px;width:133px;height:16px;line-height:16px;z-index:317;">Ambulance (opsional)</label>
<input type="text" id="Editbox42" style="position:absolute;left:156px;top:2492px;width:32px;height:16px;z-index:318;" name="Editbox1" value="" spellcheck="false">
<label for="" id="Label161" style="position:absolute;left:200px;top:2492px;width:43px;height:16px;line-height:16px;z-index:319;">Unit</label>
<input type="submit" id="Button45" name="Upload Foto" value="Upload Foto" style="position:absolute;left:368px;top:2492px;width:107px;height:26px;z-index:320;">
<label for="" id="Label162" style="position:absolute;left:11px;top:2526px;width:308px;height:16px;line-height:16px;z-index:321;">5. Sandang dan Pangan Bagi Penerima Pelayanan</label>
<label for="" id="Label163" style="position:absolute;left:14px;top:2551px;width:133px;height:16px;line-height:16px;z-index:322;">Pakaian Seragam </label>
<div id="wb_Checkbox79" style="position:absolute;left:159px;top:2551px;width:24px;height:24px;z-index:323;">
<input type="checkbox" id="Checkbox79" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox79"></label></div>
<label for="" id="Label164" style="position:absolute;left:184px;top:2551px;width:43px;height:16px;line-height:16px;z-index:324;">Ada</label>
<div id="wb_Checkbox80" style="position:absolute;left:228px;top:2551px;width:24px;height:24px;z-index:325;">
<input type="checkbox" id="Checkbox80" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox80"></label></div>
<label for="" id="Label165" style="position:absolute;left:253px;top:2551px;width:66px;height:16px;line-height:16px;z-index:326;">Tidak Ada</label>
<input type="submit" id="Button46" name="Upload Foto" value="Upload Foto" style="position:absolute;left:372px;top:2550px;width:107px;height:26px;z-index:327;">
<label for="" id="Label166" style="position:absolute;left:14px;top:2581px;width:133px;height:16px;line-height:16px;z-index:328;">Ketersediaan Pangan</label>
<div id="wb_Checkbox81" style="position:absolute;left:159px;top:2581px;width:24px;height:24px;z-index:329;">
<input type="checkbox" id="Checkbox81" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox81"></label></div>
<label for="" id="Label167" style="position:absolute;left:184px;top:2581px;width:43px;height:16px;line-height:16px;z-index:330;">Ada</label>
<div id="wb_Checkbox82" style="position:absolute;left:228px;top:2581px;width:24px;height:24px;z-index:331;">
<input type="checkbox" id="Checkbox82" name="Checkbox1" value="Ada" style="position:absolute;left:0;top:0;"><label for="Checkbox82"></label></div>
<label for="" id="Label168" style="position:absolute;left:253px;top:2581px;width:66px;height:16px;line-height:16px;z-index:332;">Tidak Ada</label>
<input type="submit" id="Button47" name="Upload Foto" value="Upload Foto" style="position:absolute;left:372px;top:2580px;width:107px;height:26px;z-index:333;">
<a id="Button17" href="./Profile-View.php" onclick="document.getElementById('Button17').submit();return false;" style="position:absolute;left:444px;top:2632px;width:117px;height:26px;visibility:hidden;z-index:334;">Submit Data</a>
<div id="FileUpload2" class="input-group" style="position:absolute;left:468px;top:68px;width:88px;height:26px;z-index:335;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload2-file" style="display:none;"><span class="btn">Upload Foto</span>
</label>
</div>
<div id="FileUpload3" class="input-group" style="position:absolute;left:362px;top:477px;width:103px;height:26px;z-index:336;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload3-file" style="display:none;"><span class="btn">Upload Berkas</span>
</label>
</div>
<div id="FileUpload4" class="input-group" style="position:absolute;left:362px;top:508px;width:103px;height:26px;z-index:337;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload4-file" style="display:none;"><span class="btn">Upload Berkas</span>
</label>
</div>
<div id="FileUpload5" class="input-group" style="position:absolute;left:362px;top:558px;width:103px;height:26px;z-index:338;">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload5-file" style="display:none;"><span class="btn">Upload Berkas</span>
</label>
</div>
</form>
</div>
<div id="wb_Image2" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:343;">
<img src="images/logo e ipwl1.png" id="Image2" alt=""></div>

<div id="wb_Logout1" style="position:absolute;left:848px;top:59px;width:94px;height:22px;text-align:center;z-index:345;">
<form name="logoutform" method="post" action="<?php echo basename(__FILE__); ?>" id="logoutform">
<input type="hidden" name="form_name" value="logoutform">
<input type="submit" name="logout" value="Logout" id="Logout1">
</form>
</div>
<div id="wb_FileUpload1" style="position:absolute;left:19px;top:363px;width:126px;height:26px;z-index:346;">
<div id="FileUpload1" class="input-group" style="">
<input class="form-control" type="text" readonly="">
<label class="input-group-btn">
<input type="file" name="FileUpload1" id="FileUpload1-file" style="display:none;"><span class="btn">Upload Logo IPWL</span>
</label>
</div></div>
<div id="wb_ResponsiveMenu1" style="position:absolute;left:11px;top:90px;width:933px;height:63px;z-index:347;">
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
<div id="wb_Image9" style="position:absolute;left:429px;top:26px;width:55px;height:48px;z-index:348;">
<img src="images/Picture4 (1).png" id="Image9" alt=""></div>
<div id="wb_Image8" style="position:absolute;left:369px;top:26px;width:60px;height:48px;z-index:349;">
<img src="images/Kemensos.png" id="Image8" alt=""></div>
<div id="wb_FontAwesomeIcon1" style="position:absolute;left:537px;top:26px;width:69px;height:48px;text-align:center;z-index:350;">
<a href="./Home-Page.php"><div id="FontAwesomeIcon1"><i class="fa fa-home"></i></div></a></div>
</div>
</body>
</html>