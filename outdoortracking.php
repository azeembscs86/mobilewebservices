<?php
header("Content-Type: application/json");
include("dbconnection.php");
   //---------------------get all outdoortracking--------------------------------------------------------
    $oudoor_track=  getOurDoorTracking();
    $result = array();
    while($data = mysql_fetch_assoc($oudoor_track)) {
    $result[] = $data;
    }    
    //------------------------------------setting array for all-----------------------------------------------
    $data = array("oudoor_track" => $result,'status'=>1);
    echo json_encode($data);
?>