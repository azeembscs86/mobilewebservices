<?php
header("Content-Type: application/json");
include("dbconnection.php");
if(isset($_POST['name']))
{
    $name      =  mysql_real_escape_string($_POST['name']);
    $phone     =  mysql_real_escape_string($_POST['phone_no']);
    $email     =  mysql_real_escape_string($_POST['email']);
    $password  =  mysql_real_escape_string(md5($_POST['password']));
    newUserRegister($name,$email,$password,$phone);
    $status=array('status'=>1,'success'=>'Successfuly added'); 
    echo json_encode($status);
}else
{
   $status=array('status'=>0,'error'=>'Error occured not data post'); 
   echo json_encode($status);
}
?>