<?php require_once('../Connections/connection.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_connection, $connection);
$query_Recordsetlogin = "SELECT * FROM login";
$Recordsetlogin = mysql_query($query_Recordsetlogin, $connection) or die(mysql_error());
$row_Recordsetlogin = mysql_fetch_assoc($Recordsetlogin);
$totalRows_Recordsetlogin = mysql_num_rows($Recordsetlogin);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtuser'])) {
  $loginUsername=$_POST['txtuser'];
  $password=$_POST['pwd'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connection, $connection);
  
  $LoginRS__query=sprintf("SELECT username, password FROM registration WHERE username=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $connection) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login page</title>
<link href="gold.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="bgimage">
<div class="frame">
<div class="loginbox">
<h1> Log In</h1>
<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" id="form1">
<p> Username</p>
<input type="text" name="txtuser" placeholder="Enter your user name" id="txtuser" />
<p>Password</p>
<input type="password" name="pwd" placeholder="Enter your password" id="pwd" /> 
<input type="submit" name="login" value ="Login" id="login" /></br>
<a href="#"> lost your password?</a></br>
<a href="#"> don't have an account!</a>
<button id="buttonone"> <a href="sign up.php">REGISTER</a>  </button>


</form>
</div>
</div>
</div>

</body>
</html>
<?php
mysql_free_result($Recordsetlogin);
?>
