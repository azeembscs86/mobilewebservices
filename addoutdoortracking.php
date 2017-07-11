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
    $smallimage = $_FILES['outdoor_image'];
    if($smallimage!="")
    {
     $outdoor_image = $smallimage['name'];
    }else
    {
     $outdoor_image=$user_images;
    }
    addNewOutDoorTracking($user_id,$outdoor_image,$comments,$logitude,$latitude,$address);   
    if (!$smallimage['error']) 
   {
   if (!@move_uploaded_file($smallimage['tmp_name'],"outdoortracking/".$smallimage['name']) ) 
   {
        $status=array('status'=>0,'error'=>'Error occured user not added'); 
        echo json_encode($status);
        exit();
   }
   else
   {
        $work = new ImgResizer("outdoortracking/". $smallimage['name']);
    }
  }
    $status=array('status'=>1,'success'=>'Successfuly added'); 
    echo json_encode($status);
}else
{
    $status=array('status'=>0,'error'=>'Error occured not data post'); 
    echo json_encode($status);
}

class ImgResizer {
 var $originalFile = '';
 function ImgResizer($originalFile = '') {
  $this -> originalFile = $originalFile;
 }
 function resize($newWidth, $targetFile) {
  if (empty($newWidth) || empty($targetFile)) {
   return false;
  }
  $src = imagecreatefromjpeg($this -> originalFile);
  list($width, $height) = getimagesize($this -> originalFile);
  $newHeight = ($height / $width) * $newWidth;
  $tmp = imagecreatetruecolor($newWidth, $newHeight);
  imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
  if (file_exists($targetFile)) {
   unlink($targetFile);
  }
  imagejpeg($tmp, $targetFile, 85);
 }
}
?>

