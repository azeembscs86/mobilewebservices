<?php
session_start();
include("dbconnection.php");
if(isset($_POST['user_name']))
{
$user_name =  $_POST['user_name'];
$password  = $_POST['password'];
$result= adminLogin($user_name,$password);
$row=mysql_fetch_array($result);   
     
            $fullname = $row['fullname']; 
            $userId = $row['user_id'];
            $login_user_name =$row['email'];
            $loginpassword = $row['password'];
       if(($login_user_name==$user_name and $loginpassword==$password))
       {
	    $_SESSION['loged_name']=$fullname;       
            $_SESSION['loged_password']=$loginpassword;       
            $_SESSION['user_loged_id']=$userId;
            $_SESSION['loged_user_name']=$login_user_name;    
			$_SESSION['user_full_name']=$fullname;
           header("location:dashboard");  
           if(isset($_REQUEST['remember']))
	    {
	      header("location:dashboard");     					
              setcookie("user_name", $_SESSION['loged_user_name'], time()+60*60*24*100, "/");
              setcookie("password", $_REQUEST['password'], time()+60*60*24*100, "/");   
              setcookie($_COOKIE['user_name'],  $_COOKIE['password'], $expire); 			
            }
       }else
       {
           header("location:index.php?err");  
       }
}else
{
    header("location:index.php?err");
}