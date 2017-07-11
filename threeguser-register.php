<?php
header("Content-Type: application/json");
include("dbconnection.php");
if(isset($_POST['name']))
{
    $user_id  =  mysql_real_escape_string($_POST['user_id']);
    $name   =  mysql_real_escape_string($_POST['name']);
    $phone  =  mysql_real_escape_string($_POST['phone']);
    $province  =  mysql_real_escape_string($_POST['province']);
    $city  =  mysql_real_escape_string($_POST['city']);
    $location  =  mysql_real_escape_string($_POST['location']);
    $email  =  mysql_real_escape_string($_POST['email']);
    $address  =  mysql_real_escape_string($_POST['address']);
    newThreeGUsers($user_id,$name,$phone,$province,$city,$location,$email,$address);
    $status=array('status'=>1,'success'=>'Successfuly added'); 
    echo json_encode($status);
}else
{
   $status=array('status'=>0,'error'=>'Error occured not data post'); 
   echo json_encode($status);
}