<?php
function getaddress($lat,$lng)
{
$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
$json = @file_get_contents($url);
$data=json_decode($json);
$status = $data->status;
if($status=="OK")
return $data->results[0]->formatted_address;
else
return false;
}

$lat= 25.819794; //latitude
$lng= 68.066436; //longitude
$address= getaddress($lat,$lng);
if($address)
{
echo $address;
}
else
{
echo "Not found";
}

?>