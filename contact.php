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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO contact (name, email, phone, message) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['txtname'], "text"),
                       GetSQLValueString($_POST['txtemail'], "text"),
                       GetSQLValueString($_POST['txtphone'], "int"),
                       GetSQLValueString($_POST['txtmsg'], "text"));

  mysql_select_db($database_connection, $connection);
  $Result1 = mysql_query($insertSQL, $connection) or die(mysql_error());

  $insertGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_connection, $connection);
$query_Recordsetcontact = "SELECT * FROM contact";
$Recordsetcontact = mysql_query($query_Recordsetcontact, $connection) or die(mysql_error());
$row_Recordsetcontact = mysql_fetch_assoc($Recordsetcontact);
$totalRows_Recordsetcontact = mysql_num_rows($Recordsetcontact);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>contact us</title>
<link href="gold.css" rel="stylesheet" type="text/css" />



<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body>

<div class="container">
<div class="wrap">
<div class="header">
<h2> THE FOOD VENDOR </h2>
</div>
<div class="menu">

<ul>
  <li><a href="index.php">HOME </a></li>
    <li> <a href="menu.php">MENU </a></li>
      <li> <a href="contact.php">CONTACT </a></li>
          <li> <a href="login.php">LOGIN </a></li>
            <li> <a href="#">ORDER NOW </a></li>

</ul>
</div>
  </div>     
<div class="contact">

<h1> ***Contact Us ***</h1>
<h2>Your feedback is precious!</h2>
<h4>Feel free to share anything good or bad with us!</h4>


<form method="POST" action="<?php echo $editFormAction; ?>" name="form" id="form">

<select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
  <option value="contact.php">Enquiries</option>
  <option value="contact.php">Complaints</option>
</select>
<br /> <br />
<p> NAME *</p>
<input name="txtname" type="text" id="txtname" placeholder="" />
<p> EMAIL *</p>
<input name="txtemail" type="text" id="txtemail" placeholder="" />
<p> PHONE NUMBER *</p>
<input name="txtphone" type="text" id="txtphone" placeholder="" />
<p>MESSAGE*</p>
<input name="txtmsg" type"text" id="message" placeholder="" /> 
<br /><br />
<input type="submit" name="button" value ="SEND" id="button" />
<input type="hidden" name="MM_insert" value="form" />



</form>

</div>




</div>

</body>
</html>
<?php
mysql_free_result($Recordsetcontact);
?>
