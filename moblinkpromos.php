<?php
header("Content-Type: application/json");
include("dbconnection.php");
   //---------------------get all cities--------------------------------------------------------
    $user_provinces=  getMoblinkPromos();
    $result = array();
    while($data = mysql_fetch_assoc($user_provinces)) {
    $result[] = $data;
    } 
    //------------------------------------setting array for all-----------------------------------------------
    $data = array("promos" => $result,'status'=>1);
    echo json_encode($data);
?>