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
<style>
.error {
	color: #FF0000;
	font-size: 14px;
	font-weight: bold;
	padding-left: 29px;
}

</style>
  </head>
  <body class="login">  
   <div class="container-fluid">
   <div class="col-lg-5 col-lg-offset-3">
   <header>
     <h1 class="text-center"><img src="images/logo.png" width="274" height="75" alt=""></h1>
   </header>
   <div class="loginbox">
   <h3><strong>Admin Panel Login</strong></h3>
   <div class="loginboxinner">
   <form  id="loginForm" name="loginForm" method="post" action="user_login.php" >
  <div class="form-group inner-addon left-addon">
  <i class="glyphicon glyphicon-user"></i>
  
    <input type="text" class="form-control" name="user_name" id="user_name" value="<?php if(isset($_COOKIE['user_name'])) echo $_COOKIE['user_name'];?>">
	<span style="color:red" id="emailaddress"></span>
  </div>
  <div class="form-group inner-addon left-addon">
  <i class="glyphicon glyphicon-lock"></i>
  
    <input type="password" class="form-control" id="password" name="password" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'];?>">
  
	<span style="color:red" id="passwordalert"></span>
  </div>
  <div class="loginboxbttom">
  <div id="triangle-bottomleft"></div>
  <div id="triangle-bottomright"></div>
  <div class="row">
  <div class="col-lg-8"><div class="checkbox">
     <input type="checkbox" id="checkbox1" name="rememberme" value="rememberme" <?php if(isset($_COOKIE['user_name'])) { ?> checked="checked" <?php }?>>
     <label for="checkbox1">
     Remind my password
     </label>
     </div></div>
  <div class="col-lg-4"><input type="submit" name="submit" value="Login" class="btn btn-login pull-right"></div>
  </div>
  </div>
  </form>
  </div>
   
   </div>
   </div>
   </div>
<?php
	include("includes/scripts.php");
?>

<script src="js/jquery.validate.js" type="text/javascript"></script> 
<script type="text/javascript">
            $().ready(function() {
                $("#loginForm").validate({
                    rules: {
                        user_name: {
                            required: true,
                            minlength: 3
                        },
                        password: {
                            required: true
                        }
                    },
                    messages: {
                        user_name: {
                            required: "Please enter user name",
                            minlength: "user name must be atleast 3 letter"
                        },
                        password: {
                            required: "Please enter a password"
                        }
                    }
                });
                $("#password").focus(function() {
                    var password = $("#password").val();
                    var user_name = $("#user_name").val();
                    if (password && user_name && !this.value) {
                        this.value = password + "." + user_name;
                    }
                });
            });
        </script> 

  </body>
</html>