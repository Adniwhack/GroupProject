<?php

require_once('function.php');

$search = new dbSearch();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $City = $_POST['city'];
    $Name = $_POST['hotelname'];
    $Check_In = $_POST['checkin'];
    $Check_Out = $_POST['checkout'];
    $res = $search->advanced_search($Name, $City, array(), $Check_In, $Check_Out);
}   
else{
    $res = $search->return_hotel();
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Search_Query</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsgBFqz2cjiLyvYBDRHrOdgf9vDBIvno8">
    </script>
    <style>
      #map {
        width: 500px;
        height: 800px;
      }
    </style>
    
   <script>
    

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(6.9218386, 79.8562055)),
        zoom: 13,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP file
      downloadUrl("adv_search.php", function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        var table="<tr><th>Name</th><th>Address</th></tr>";
        for (var i = 0; i < markers.length; i++) {
            
          var name = markers[i].getAttribute("name");
          var address = markers[i].getAttribute("address");
          var lat = markers[i].getAttribute("lat");
          var lng = markers[i].getAttribute("lng")
          if(lat != "" and  lng != ""){
          var point = new google.maps.LatLng(
              parseFloat(lat),
              parseFloat(lng));
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            //icon: icon.icon
          });
          }
          var html = "<b>" + name + "</b> <br/>" + address;
          //var icon = customIcons[type] || {};
          
          bindInfoWindow(marker, map, infoWindow, html);
          
          table += "<tr><td>"+name + "</td><td>" + address + "</td></tr>";
          
          
        }
        document.getElementById("table").innerHTML = table;
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
<body onload="load()">

<div class="container" >
    <div id="map" class="col-md-5"></div>
    <div class="col-md-6" align ="center">
  <h2>The hotel list</h2>
             
  <table class="table" >
    <thead>
      <tr>
          <th>Hotel name</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $City = $_POST['city'];
            $Name = $_POST['hotelname'];
            $Checkin = $_POST["checkin"];
            $Checkout = $_POST["checkout"];
            $res= $search->search_hotel_city_name($City, $Name);
            if ($res == null){
                $res = $search->search_hotel_city($City);
                if($res == null) {
                    $res = $search->search_hotel_name($Name);
                    if ($res == null) {
                        echo "<script></script>";
                    }
                }
            }
        }
        else{
        $res = $search->return_hotel();
        }
        while ($data = mysql_fetch_array($res)){
            echo "<tr><td><a href='Hotel-profile.php?hotel_id=".$data['Hotel_ID']."'>".$data['Hotel_Name']."</a></td><td>".$data['address']."</td></tr>";
        }
        ?>

      
    </tbody>
  </table>
</div>
    </div>
</body>
</html>
