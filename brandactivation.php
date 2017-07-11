<?php
header("Content-Type: application/json");
include("dbconnection.php");
   //---------------------get all brand activations--------------------------------------------------------
    $brand_activation=  getBrandActivation();
    $result = array();
    while($data = mysql_fetch_assoc($brand_activation)) {
    $result[] = $data;
    } 
    //------------------------------------setting array for all-----------------------------------------------
    $data = array("brand_activation" => $result,'status'=>1);
    echo json_encode($data);
?>