<?php
   session_start();
   include_once('config.php');
   $itemCount=0;
   
   if(isset($_session['cart'])){
	    $itemCount = count(isset($_SESSION['cart']) ? $_SESSION['cart'] : array());
   }
   ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>menu</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="gold.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body,td,th {
	color: #000;
}
</style>
</head>

<body>
<div class="container">
<div class="wrap">
<div class="header">
  <h4> THE FOOD VENDOR</h4>
 </div>
 <div class="menu">

<ul>
  <li> <a href="index.php">HOME </a></li>
  <li> <a href="#">MENU </a></li>
  <li> <a href="#">ORDER NOW </a></li>
  <li> <div class="cart-a">{<?php echo $itemCount;?> } </div></li>

</ul>
   </div>
</div>
</div>
<div class="wrap1">
<p class="msg">
		 
<div class="wrap1">
<ul>
  <li> <a href="#">BREAKFAST </a></li>
  <li> <a href="#">GO-LOCAL </a></li>
  <li> <a href="#">GRILL 'N' SPICE </a></li>
  <li> <a href="#">CUISINE-FEAST </a></li>
  <li> <a href="#">SEAFOOD </a></li>
  <li> <a href="#">PASTA </a></li>

</ul>
</div>
<div class="wrapbox">


<table width="1000" height="354" border="1" align="center" cellpadding="5" cellspacing="4">
  <tr>
    <td width="222"><img src="../img/images (1).jpg" width="289" height="180" /></td>
    <td width="225"><img src="../img/download.jpg" width="275" height="183" /></td>
    <td width="184"><img src="../img/fish.jpg" width="237" height="183" /></td>
    <td width="167"><img src="../img/images (2).jpg" width="275" height="183" /></td>
  </tr>
</table>
<table width="1095" height="34" border="0" align="center">
  <tr>
    <td width="276">Price: #1000.00</td>
    <td width="283">&Price: #800.00</td>
    <td width="239">Price: #1500.00</td>
    <td width="262">Price: #3000.00</td>
  </tr>
</table>
<table width="1095" height="34" border="0" align="center">
  <tr>
    <td width="247" height="28"><form id="form1" name="form1" method="post" action="">
      
 <button id="buttonone"> <a href="checkout.php">ADD CART</a>  </button>
    </form></td>
    <td width="313"><form id="form2" name="form2" method="post" action="">
       <button id="buttonone"> <a href="checkout.php">ADD CART</a>  </button>

    </form></td>
    <td width="270"><form id="form3" name="form3" method="post" action="">
 <button id="buttonone"> <a href="CHECKOUT.php">ADD CART</a>  </button>
    </form></td>
    <td width="8"><form id="form4" name="form4" method="post" action="">
    </form></td>
    <td width="223"><form id="form5" name="form5" method="post" action="">
 <button id="buttonone"> <a href="CHECKOUT.php">ADD CART</a>  </button>
    </form></td>
  </tr>
</table>


</div>

</div>
</body>
</html>