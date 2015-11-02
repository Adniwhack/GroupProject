<?php
    $array = [[7,81], [12, 40]];


?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple markers</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100%;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    function addmarker(lat, lng, map, title){
        var loc = new google.maps.LatLng(lat, lng);

        var marker = new google.maps.Marker({
            position : loc,
            map: map,
            title: title
        });

    }
    function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
        <?php
        for ($i = 0 ; $i < count($array); $i++){
            $str = "addmarker(".strval($array[$i][0]).",".strval($array[$i][1]).",map, 'lol');";
            echo $str;
        }?>
        addmarker(0,0,map, "Middle");
        addmarker(6, 80, map, "Somewhere");
    }


    initMap();

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsgBFqz2cjiLyvYBDRHrOdgf9vDBIvno8&signed_in=true&callback=initMap"></script>
</body>
</html>