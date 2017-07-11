<?php
	session_start();
include("dbconnection.php");
if(isset($_SESSION['user_full_name']))
{
	
}else
{
	header("location:index.php"); 
}
$_SESSION['trade_map_type'] = $_GET['type'];
?>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEOuAGkPmRuwG0fcD_2KIIJiMiUNHwKV4"
            type="text/javascript"></script>
    <script type="text/javascript">
    //<![CDATA[

    var customIcons = {
      outdoor_tracking: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_blue.png'
      },
      brand_activation: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png'
      },
      retail_visit: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_black.png'
      },
      trade_investment: {
        icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png'
      }
    };

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(47.6145, -122.3418),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("trade_map_xml.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        for (var i = 0; i < markers.length; i++) {
          var name = markers[i].getAttribute("name");
		  var image = markers[i].getAttribute("image");
          var address = markers[i].getAttribute("address");
          var type = markers[i].getAttribute("type");
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;var html = '<img height=50px width=100px src="https://design.ubuntu.com/wp-content/uploads/logo-ubuntu_su-orange-hex.png">' +" <br/> <b>" + name + "</b> <br/>" + address + " <br/>"   ;
          var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            icon: icon.icon
          });
          bindInfoWindow(marker, map, infoWindow, html);
        }
      });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
      google.maps.event.addListener(marker, 'click', function() {
        infoWindow.setContent(html);
        infoWindow.open(map, marker);
      });
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function doNothing() {}

    //]]>

  </script>

  </head>
  <body class="bg-spiral" onload="load()">
  <header class="header-inner">  
<div class="container-fluid">
  <div class="col-lg-6">
     <h1 class="logo"><img src="images/logo.png" width="274" height="75" alt=""></h1>
   </div>
   <div class="col-lg-6">
   <ul class="loginnav">
   <li><p><?php if(isset( $_SESSION['user_full_name'])){ echo  $_SESSION['user_full_name']; } ?></p></li>
   <li><a href="logout.php">Log Out</a></li>
   </ul>
   </div>
 </div>
   </header>
<div class="col-lg-10 col-lg-offset-1">
<div style="width:1100px;overflow:hidden;height:500px;max-width:100%;"><div id="map" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Pakistan&key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU"></iframe></div><a class="embed-map-code" rel="nofollow" href="https://www.treat-lice.com" id="enable-maps-data">treat-lice</a></div>
</div>
<div class="clearfix"></div><br>



  </body>
</html>