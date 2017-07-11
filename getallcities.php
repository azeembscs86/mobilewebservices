<?php
header("Content-Type: application/json");
include("dbconnection.php");
   //---------------------get all cities--------------------------------------------------------
    $user_provinces=  getAllProvince();
    $result = array();
    while($data = mysql_fetch_assoc($user_provinces)) {
    $result[] = $data;
    } 
    //----------------------------------get all cities---------------------------------------------------  
    $user_cities=  getAllCities();
    $result1 = array();
    while($data1 = mysql_fetch_assoc($user_cities)) {
    $result1[] = $data1;
    }
    //------------------------------------setting array for all-----------------------------------------------
    $data = array("province" => $result,'cities'=>$result1,'status'=>1);
    echo json_encode($data);
?>