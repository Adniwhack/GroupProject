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
<?php
           $cx= $cy = 0;
           $count = 0;
           $str = "";
          while ($data = mysql_fetch_array($res)){
                $lat = $data['Hotel_Lat'];
                $lng = $data['Hotel_Lng'];
                
                if($lat != null and $lng != null){
                    if ($count == 0){$cx = $lat; $cy = $lng;}
                    $str.= "addmarker(".strval($lat).",".strval($lng).", map);";
                    $count += 1;
                }
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
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        var markers = [];

      function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(<?php echo $cx;?>, <?php echo $cy;?>),
          zoom: 13,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(mapCanvas, mapOptions);
        <?php echo $str;?>
          
      }

        function addmarker(lat, lng, map){
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, lng),
                
                map: map
            });
            markers.push(marker);
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
