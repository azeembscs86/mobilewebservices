<?php
header("Content-Type: application/json");
include("dbconnection.php");
if(isset($_POST['address']))
{
    $user_id         = mysql_real_escape_string($_POST['user_id']);
    $comments        = mysql_real_escape_string($_POST['comments']);
    $logitude        = mysql_real_escape_string($_POST['logitude']);
    $latitude        = mysql_real_escape_string($_POST['latitude']);
    $address         = mysql_real_escape_string($_POST['address']);
    $smallimage = $_FILES['brand_image'];
    if($smallimage!="")
    {
     $brand_image = $smallimage['name'];
    }else
    {
     $brand_image=$user_images;
    }
    addNewBrandActivation($user_id,$brand_image,$comments,$logitude,$latitude,$address);
    if (!$smallimage['error']) 
   {
   if (!@move_uploaded_file($smallimage['tmp_name'],"brandactivation/".$smallimage['name']) ) 
   {
        $status=array('status'=>0,'error'=>'Error occured user not added'); 
        echo json_encode($status);
        exit();
   }
   else
   {
        $work = new ImgResizer("brandactivation/". $smallimage['name']);
    }
  }
    $status=array('status'=>1,'success'=>'Successfuly added'); 
    echo json_encode($status);
}else
{
    $status=array('status'=>0,'error'=>'Error occured not data post'); 
    echo json_encode($status);
}
?>