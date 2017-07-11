<?php
session_start();
header("Content-Type: application/json");
include("dbconnection.php");
if(isset($_POST['email']))
{
$user_name =  mysql_real_escape_string($_POST['email']);
$password  =  mysql_real_escape_string(md5($_POST['password']));
$result=  userlogin($user_name,$password);
$user=  mysql_fetch_array($result);
if(($user['email']==$user_name and $user['password']==$password))
{
  $user_data=array(
        'user_id'=>$user['user_id'],
        'name'=>$user['name'],        
        'email'=>$user['email'],
        'phone_number'=>$user['phone_number'],        
        'status'=>'1'         
      );
  echo json_encode($user_data);      
}else {
     $status=array('status'=>0,'error'=>'Invalid User name or password');          
     echo json_encode($status);
}
}else
{
    $status=array('status'=>0,'error'=>'Error in Data post');          
     echo json_encode($status);
}
?>