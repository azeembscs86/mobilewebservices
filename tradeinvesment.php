<?php
header("Content-Type: application/json");
include("dbconnection.php");
   //---------------------get all cities--------------------------------------------------------
    $trade_invesment=  getTradeInvesment();
    $result = array();
    while($data = mysql_fetch_assoc($trade_invesment)) {
    $result[] = $data;
    }
    //------------------------------------setting array for all-----------------------------------------------
    $data = array("trade_invesment" => $result,'status'=>1);
    echo json_encode($data);
?>