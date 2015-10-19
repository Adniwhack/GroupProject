<?php

require_once('function.php');

$search = new dbSearch();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $City = $_POST['city'];
    $Name = $_POST['hotelname'];
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
    <style>
      #map {
        width: 500px;
        height: 800px;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
      function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(6.9218386, 79.8562055),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>

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
