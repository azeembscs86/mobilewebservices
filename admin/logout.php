<?php

session_start();
            unset( $_SESSION['loged_password']);  
            unset($_SESSION['user_loged_id']);           
            unset($_SESSION['loged_user_name']); 
			unset($_SESSION['user_full_name']); 
            header("location:index.php"); 

?>
