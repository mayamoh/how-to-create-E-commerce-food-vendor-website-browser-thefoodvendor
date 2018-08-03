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
$query_checkout = "SELECT * FROM checkout_form";
$checkout = mysql_query($query_checkout, $connection) or die(mysql_error());
$row_checkout = mysql_fetch_assoc($checkout);
$totalRows_checkout = mysql_num_rows($checkout);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="gold.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,th {
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	color: #FFF;
	font-weight: bold;
}
</style>
<title>checkout</title>
</head>

<body>
<div class="checkoutcon">
<div class="actionheader">
   <h1> The Food Vendor</h1>
   <h4> The chekout form</h4>
  </div>
 <div class="actionpage">
 <form ACTION="" METHOD="POST" id="form1">
<p> Billing Address</p>
<input type="text" name="txtbill" placeholder="lekki phase" id="txtuser" />
<p> Email</p>
<input type="email" name="txtemail" placeholder=" @mariamgmail.com" id="txtuser" />
<p> Address</p>
 <input type="text" name="txtaddress" placeholder="lekki phase" id="txtuser" />
<p> State</p>
<input type="text" name="txtstate" placeholder="lagos" id="txtuser" />
<p> zip </p>
<input type="number" name="txtzip" placeholder="00011" id="" />

<h1> Payment</h1>

<p> Name on card      <br />
</p>
<input type="text" name="txtname" placeholder="marai mo" id="txtuser" /><p>Card Number</p><input type="text" name="number" placeholder="6674-4654-898-8709" id="crditcard" />
<p> Exp Month</p>
<input type="text" name="txtexpmon" placeholder="12" id="txtuser" />
<p> Exp year</p>
<input type="text" name="txtexpyear" placeholder="2020" id="txtuser" />
<p> CVV</p>
<input type="text" name="txtcvv" placeholder="987" id="txtuser" /> <br />
<button id="buttonone"> <a href="https://rave.flutterwave.com/">Checkout</a>  </button>
 </form>
 
 </div>
 <div class="actionpageright">
 <table width="400" border="1">
   <tr>
     <td>CART</td>
     <td>&nbsp;</td>
     <td>Price</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td height="40">&nbsp;</td>
     <td>Ewedu &amp; Amala</td>
     <td>#1000.00</td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td height="80">Total</td>
     <td>&nbsp;</td>
     <td>1000.00</td>
     <td>&nbsp;</td>
   </tr>
 </table>
 
 </div>
 
</div>
</body>
</html>
<?php
mysql_free_result($checkout);
?>
