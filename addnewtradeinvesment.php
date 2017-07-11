<?php
header("Content-Type: application/json");
include("dbconnection.php");
if(isset($_POST['address']))
{
    $user_id         = mysql_real_escape_string($_POST['user_id']);
    $comments        = mysql_real_escape_string($_POST['comments']);
    $logitude        = mysql_real_escape_string($_POST['logitude']);
    $latitude        = mysql_real_escape_string($_POST['latitude']);    
    $address         = getaddress($latitude, $logitude);
    $smallimage = $_FILES['outdoor_image'];
    if($smallimage!="")
    {
     $trade_image = $smallimage['name'];
    }else
    {
     $trade_image=$user_images;
    }
    addNewTradeInvesment($user_id,$trade_image,$comments,$logitude,$latitude,$address);
    if (!$smallimage['error']) 
   {
   if (!@move_uploaded_file($smallimage['tmp_name'],"tradeinvesment/".$smallimage['name']) ) 
   {
        $status=array('status'=>0,'error'=>'Error occured user not added'); 
        echo json_encode($status);
        exit();
   }
   else
   {
        $work = new ImgResizer("tradeinvesment/". $smallimage['name']);
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