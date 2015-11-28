<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 11/2/2015
 * Time: 12:18 AM
 */

if (isset($_GET['id'])){
    $id = $_GET['id'];


}
?>


<!DOCTYPE html>
<html lang="en">
<!--  Adding bootstrap !-->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var oldMarker;

        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 0, lng: 0},
                zoom:12
            });
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();

            var geocoder = new google.maps.Geocoder();
           
            document.getElementById('city').addEventListener('keyup', function() {
                geocodeAddress(geocoder, map);
            })

            google.maps.event.addListener(map,'click', function(e){
                document.getElementById("latitude").value = e.latLng.lat();
                document.getElementById("longitude").value = e.latLng.lng();
                var lat = e.latLng.lat();
                var lng = e.latLng.lng();
                placeMarker(e.latLng);

            })



        }
        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('city').value;
            try {
                geocoder.geocode({'address': address, 'region': 'lk'}, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        resultsMap.setCenter(results[0].geometry.location);

                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });

            }
            catch(err){}
        }
        function placeMarker(location) {


            var marker = new google.maps.Marker({
                position: location,
                map: map
            });


            if (oldMarker != undefined){
                oldMarker.setMap(null);
            }
            oldMarker = marker;

        }

    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsgBFqz2cjiLyvYBDRHrOdgf9vDBIvno8&callback=initMap">
    </script>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Adding recaptcha file in to the page -->
    <style>
        .captcha, #recaptcha_image, #recaptcha_image img {
            width:100% !important;
        }
        .navbar {
            color: #FFFFFF;
            background-color: #161640;
        }

        /* OR*/

        .nav {
            color: #FFFFFF;
            background-color: #161640;

        .nav-pills > li > a {
            color: #A7A79BF6;
            font-family: 'Oswald', sans-serif;
            font-size: 0.8em ;
            padding: 1px 1px 1px ;
        }


    </style>
</head>

<body background="images/123.jpg">
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <ul class="nav navbar-nav navbar-left"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
            </ul>
        </div>
        <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>



        <ul class="nav nav-pills navbar-right">

            <!--<li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#A7A79B">Rooms</font></b></span></a></li>-->
            <!--li><a href="#"><span class="glyphicon glyphicon-user"><b><font size="4" color="#A7A79B">Profile</font></b></span></a></li-->
            <!--<li><a href="#"><span class="glyphicon glyphicon-file"><b><font size="4" color="#A7A79B">Reports</font></b></span></a></li>-->
            <li><a href="#"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#FFF" face="calibri light"> AboutUs</font></b></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-phone-alt"><b><font size="4" color="#FFF" face="calibri light"> ContactUs</font></b></a></li></ul>


    </div>
</nav>


<!--Create account for hotel -->
<div class="container">
    <div class="col-lg-12">
        <!--  Create the form horizontally !-->
        <br><br>
    </div>
    <form name="mapmark" method="post" action="markaction.php">
        <div id="map" style="width: 300px; height: 300px"></div><br>

        <input type="text" name="city" id="city" >
        <input  id="latitude" name="latitude" type="hidden">
        <input  id="longitude" name="longitude" type="hidden">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="submit" name="submit" id="submit" >


    </form>


</div>
</body>
</html>
