<?php
error_reporting(E_ALL ^ E_DEPRECATED);
//------------------------Variable for Server name,Database,User name,Password--------------------------------
    $adb ="goliveco_mobilink_db";
    $db_server ="localhost";
    $db_user = "root";
    $db_password = "";
 $link_db=mysql_connect($db_server,$db_user,$db_password);
 if(!$link_db) {
        die('Failed to connect to server: ' . mysql_error());
    }
 $db=mysql_select_db($adb,$link_db);    
    if(!$db) {
        die('Unable to select database:'.mysql_error());
    }
 date_default_timezone_set("Asia/Karachi");    
//-------------------------------sql injection and remove space and slashes---------------------------------------
function clean($str){
$str = @trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return mysql_real_escape_string($str);
}
//-----------------------------------add new user-------------------------------------------------------------
function newUserRegister($name,$email,$password,$phone)
{
    $createdAt=  date('Y-m-d H:i:s');
    $query="insert into moblink_users(name,email,password,phone_number,createdAt) values ('$name','$email','$password','$phone','$createdAt')";
    mysql_query($query) or die(mysql_error());    
}
//-------------------------------login user-------------------------------------------------------------------
function loginUser($email,$password)
{
   $query="select user_id,name,email,password,phone_number,createdAt from moblink_users where email='$email' and  password='$password'";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}
//-----------------------------------register 3g users---------------------------------------------------------
function newThreeGUsers($name,$phone,$province,$city,$location,$email,$address)
{
    $createdAt=  date('Y-m-d H:i:s');
    $query="insert into moblink_threegform(name,phone,province_id,city_id,location,email,address,createdAt) values ('$name','$phone',$province,$city,'$location','$email','$address','$createdAt')";
    mysql_query($query) or die(mysql_error());
}
//--------------------------get povince and cities list-------------------------------------------------------
function getAllProvince()
{
    $query="SELECT province_id,province_name FROM  moblink_provinces";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//-----------------------------get all cities list----------------------------------------------------------
function getAllCities()
{
    $query="select city_id,city_name from moblink_cities";
    $result= mysql_query($query) or die(mysql_error());
    return $result;
}
//------------------------add new retailer visit--------------------------------------------------------
function addNewRetailerVisit($province,$city,$area,$shop_name,$sim_no,$mobi_cash,$easy_load,$comments)
{
    $createdAt=  date('Y-m-d H:i:s');
    $query="insert into retailer_visist(province_name,city_name,area,shop_name,sim_no,mobi_cash,easy_load,comments,createdAt) values ('$province','$city','$area','$shop_name','$sim_no','$mobi_cash','$easy_load','$comments','$createdAt')";
    mysql_query($query) or die(mysql_error());  
}
//-----------------------moblink promos------------------------------------------------------------------
function getMoblinkPromos()
{
    $query="select promo_video,	promo_detail from moblink_promo order by promo_id DESC";
    $result= mysql_query($query) or die(mysql_error());
    return $result;
}
//-----------------------------add new outdoortracking--------------------------------------------------------
function addNewOutDoorTracking($outdoor_image,$comments,$logitude,$latitude,$address)
{
    $createdAt=  date('Y-m-d H:i:s');
    $query="INSERT INTO moblink_outdoortracking(outdoor_image,comments,logitude,latitude,address,createdAt) VALUES ('$outdoor_image','$comments','$logitude','$latitude','$address','$createdAt')";
    mysql_query($query) or die(mysql_error());  
    
}
//-----------------------------add new brand investment--------------------------------------------------------
function addNewBrandActivation($brand_image,$comments,$logitude,$latitude,$address)
{
    $createdAt=  date('Y-m-d H:i:s');
    $query="INSERT INTO moblink_brandactivation(brand_image,comments,logitude,latitude,address,createdAt) VALUES ('$brand_image','$comments','$logitude','$latitude','$address','$createdAt')";
    mysql_query($query) or die(mysql_error());  
}
//-----------------------------add new trade investment--------------------------------------------------------
function addNewTradeInvesment($trade_image,$comments,$logitude,$latitude,$address)
{
    $createdAt=  date('Y-m-d H:i:s');
    $query="INSERT INTO moblink_tradeinvesment(trade_image,comments,logitude,latitude,address,createdAt) VALUES ('$trade_image','$comments','$logitude','$latitude','$address','$createdAt')";
    mysql_query($query) or die(mysql_error());  
}
//----------------------------------get all outdoor tracking--------------------------------------------------
function getOurDoorTracking()
{
    $query="select outdoor_tracking_id, outdoor_image, comments, address , createdAt from moblink_outdoortracking";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;    
}
//----------------------------------get all brand activation--------------------------------------------------
function getBrandActivation()
{
    $query="select brand_activation_id, brand_image, comments, address, createdAt from moblink_brandactivation";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;    
}
//----------------------------------get all trade invesment--------------------------------------------------
function getTradeInvesment()
{
    $query="select trade_invesment_id, trade_image, comments,address,createdAt from moblink_tradeinvesment";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;    
}
//-----------------------get address from latitude and logitude---------------------------------------------
function getaddress($lat,$lng)
{
$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
$json = @file_get_contents($url);
$data=json_decode($json);
$status = $data->status;
if($status=="OK")
return $data->results[0]->formatted_address;
else
return false;
}
?>