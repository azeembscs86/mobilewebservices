<?php
session_start();
include("dbconnection.php");
if(isset($_SESSION['user_full_name']))
{
	
}else
{
	header("location:index.php"); 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Mobilink</title>
<?php
	include("includes/styles.php");
?>
  </head>
  <body class="bg-spiral">
  <header class="header-inner">  
<div class="container-fluid">
  <div class="col-lg-6">
     <h1 class="logo"><img src="images/logo.png" width="274" height="75" alt=""></h1>
   </div>
   <div class="col-lg-6">
   <ul class="loginnav">
   <li><p><?php if(isset( $_SESSION['user_full_name'])){ echo  $_SESSION['user_full_name']; } ?></p></li>
   <li><a href="logout.php">Log Out</a></li>
   </ul>
   </div>
 </div>
   </header>
   <div class="clearfix"></div>
   <div class="container-fluid">
   <div class="col-lg-10 col-lg-offset-1">
   <div class="col-lg-3">
   <a href="outdoor_tracking_page.php?type=outdoor_tracking"><div class="dashbox">
   <img src="images/box-img-1.png" width="257" height="258" class="img-responsive" alt="">
   <p>Outdoor Tracking</p>
   </div></a>
   </div>
   <div class="col-lg-3">
   <a href="brand_activation_page.php?type=brand_activation"><div class="dashbox">
   <img src="images/box-img-2.png" width="257" height="258" class="img-responsive" alt="">
   <p>Brand Activation</p>
   </div></a>
   </div>
   <div class="col-lg-3">
   <a href="retail_visit_page.php?type=retail_visit"><div class="dashbox">
   <img src="images/box-img-3.png" width="257" height="258" class="img-responsive" alt="">
   <p>Retail Visit</p>
   </div></a>
   </div>
   <div class="col-lg-3">
   <a href="trade_investment_page.php?type=trade_investment"><div class="dashbox">
   <img src="images/box-img-4.png" width="257" height="258" class="img-responsive" alt="">
   <p>Trade Investment</p>
   </div></a>
   </div>
   </div>
   </div>
   
   
<?php
	include("includes/scripts.php");
?>
  </body>
</html>