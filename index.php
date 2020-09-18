<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'loginform')
{
   $success_page = './Home-Page.php';
   $error_page = './Login-Error.html';
   $mysql_server = 'localhost';
   $mysql_username = 'root';
   $mysql_password = '';
   $mysql_database = 'eipwl';
   $mysql_table = 'users';
   $crypt_pass = md5($_POST['password']);
   $found = false;
   $fullname = '';
   $role = '';
   $avatar = '';
   $session_timeout = 600;
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysqli_error($db));
   }
   mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
   mysqli_set_charset($db, 'utf8');
   $sql = "SELECT * FROM ".$mysql_table." WHERE username = '".mysqli_real_escape_string($db, $_POST['username'])."'";
   $result = mysqli_query($db, $sql);
   if ($data = mysqli_fetch_array($result))
   {
      if ($crypt_pass == $data['password'] && $data['active'] != 0)
      {
         $found = true;
         $fullname = $data['fullname'];
         $role = $data['role'];
         $folder = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
         $avatar = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$folder" . "avatars/" . $data['avatar'];
      }
   }
   mysqli_close($db);
   if($found == false)
   {
      header('Location: '.$error_page);
      exit;
   }
   else
   {
      if (session_id() == "")
      {
         session_start();
      }
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['fullname'] = $fullname;
      $_SESSION['role'] = $role;
      $_SESSION['avatar'] = $avatar;
      $_SESSION['expires_by'] = time() + $session_timeout;
      $_SESSION['expires_timeout'] = $session_timeout;
      $rememberme = isset($_POST['rememberme']) ? true : false;
      if ($rememberme)
      {
         setcookie('username', $_POST['username'], time() + 3600*24*30);
         setcookie('password', $_POST['password'], time() + 3600*24*30);
      }
      header('Location: '.$success_page);
      exit;
   }
}
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>e-Evaluasi IPWL Login</title>
<meta name="generator" content="WYSIWYG Web Builder 15 - http://www.wysiwygwebbuilder.com">
<link href="Test_Project.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_Login1" style="position:absolute;left:333px;top:121px;width:360px;height:272px;z-index:0;">
<form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="Login1">
<tr>
   <td class="header">Masukan ID dan Password Untuk Masuk Ke Aplikasi</td>
</tr>
<tr>
   <td class="label"><label for="username">User ID</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="username" type="text" id="username" value="<?php echo $username; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="password">Password</label></td>
</tr>
<tr>
   <td class="row"><input class="input" name="password" type="password" id="password" value="<?php echo $password; ?>"></td>
</tr>
<tr>
   <td class="row"><input id="rememberme" type="checkbox" name="rememberme"><label for="rememberme">Remember me</label></td>
</tr>
<tr>
   <td style="text-align:center;vertical-align:bottom"><input class="button" type="submit" name="login" value="Masuk" id="login"></td>
</tr>
</table>
</form>
</div>
<div id="wb_Image1" style="position:absolute;left:11px;top:17px;width:348px;height:66px;z-index:1;">
<img src="images/logo e ipwl1.png" id="Image1" alt=""></div>
<div id="wb_Image2" style="position:absolute;left:795px;top:12px;width:78px;height:71px;z-index:2;">
<img src="images/Picture4 (1).png" id="Image2" alt=""></div>
<div id="wb_Image3" style="position:absolute;left:698px;top:12px;width:91px;height:71px;z-index:3;">
<img src="images/Kemensos.png" id="Image3" alt=""></div>
</div>
</body>
</html>