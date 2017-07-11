<?php
header("Content-Type: application/json");
include("dbconnection.php");
if(isset($_POST['province']))
{
    $province   =  mysql_real_escape_string($_POST['province']);
    $city       =  mysql_real_escape_string($_POST['city ']);
    $area       =  mysql_real_escape_string($_POST['area']); 
    $shop_name   =  mysql_real_escape_string($_POST['shop_name']);
    $sim_no      =  mysql_real_escape_string($_POST['sim_no']);
    $mobi_cash   =  mysql_real_escape_string($_POST['mobi_cash']);
    $easy_load   =  mysql_real_escape_string($_POST['easy_load']);
    $comments    =  mysql_real_escape_string($_POST['comments']);
    addNewRetailerVisit($province,$city,$area,$shop_name,$sim_no,$mobi_cash,$easy_load,$comments);
    $status=array('status'=>1,'success'=>'Successfuly added'); 
    echo json_encode($status);
}else
{
    $status=array('status'=>0,'error'=>'Error occured not data post'); 
    echo json_encode($status);
}
?>