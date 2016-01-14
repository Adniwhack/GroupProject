<?php
/**
 * Created by PhpStorm.
 * User: GP60
 * Date: 11/2/2015
 * Time: 12:18 AM
 */
include 'function.php';
if (isset($_SESSION['hotel_login'])){
    $id = $_SESSION['hotel_id'];
    
    $log = new dbHotel();
    $data = $log->get_hotel_data($id);
    $lat = $data['Hotel_Lat'];
    $lng = $data['Hotel_Lng'];
    
}
else{
    header("Location:index.html");
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
                center: {lat: <?php echo $lat;?>, lng: <?php echo $lng ;?> },
                zoom:12
            });
            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();

            var geocoder = new google.maps.Geocoder();
            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
            })
            document.getElementById('city').addEventListener('keyup', function() {
                geocodeAddress(geocoder, map);
            })
            var initlatlng = {lat: <?php echo $lat;?>, lng: <?php echo $lng ;?> };
            var marker = new google.maps.Marker({
                position: initlatlng,
                map: map,
                title: 'Current Marker'
              });
            
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

<body>
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
            <li><a href="room_edit.php"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Back</font></b></a></li>
            <li><a href="homepage.php"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></a></li>
            


    </div>
</nav>


<!--Create account for hotel -->
<div class="container">
    <div class="col-lg-12">
        <!--  Create the form horizontally !-->
        <br><br>
    </div>
	<p><font size="4" >Please edit the location of your hotel in the provided space. Or else mark the exact location in the map using the marker, inside the map.</font></p>
    <br><br>
    <form name="mapmark" method="post" action="editmarking.php">
        <div id="map" style="width: 300px; height: 300px"></div><br>

        <input type="text" name="city" id="city" >
        <input  id="latitude" name="latitude" type="hidden">
        <input  id="longitude" name="longitude" type="hidden">
        <input type="hidden" name="id" value="<?php echo $id?>">
        <button type="submit" class="btn btn-success btn-md" >Insert</button> 
	

	</form>


</div>
<br><br><br>
<div class="container">
<div class="col-sm-8 col-sm-offset-2 text-center">
<h4>
<a href="homepage.php">OHRMS</a>
</h4>
<p><b><font color="#161640">"Smarter choice for your business and vacation plans in Sri Lanka"</font></b></p>
<hr>
<!-- starting of facebook icons-->
<p> Join Us On </p>
<ul class="list-inline center-block">
<li><a href="#"><img src="hotelimages/facebook.png"></a></li>
<li><a href="#"><img src="hotelimages/twitter.png"></a></li>
<li><a href="#"><img src="hotelimages/google.png"></a></li>
<li><a href="#"><img src="hotelimages/youtube.png"></a></li>
</ul>

</div><!--/col-->
</div><!--/container-->

<!-- scroll up button-->

<ul class="nav pull-right scroll-top">
<li><a href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
</ul>

<script>
$('.scroll-top').click(function(){
$('body,html').animate({scrollTop:0},1000);
})

</script>
<!--footer-->

<div id="footer">
<div class="container">
<div class="row">
<div class="col-sm-4">
<p><a href="homepage.php"> Online Hotel Reservation and Management System</a></p>
</div>
<div class="col-sm-4">
</div>
<div class="col-sm-4">
<font color="#fff">© 2016 All Rights Reserved</font>
</div>
</div>
</div>


</div>
<!--footer end-->

	<style>
		#footer {
		height: 80px;
		background-color: #161640;
		margin-top:50px;
		padding-top:20px;


		}
		#footer {
		background-color:#161640;
		}

		#footer a {
		color:#efefef;
		}
		#footer > .container {

		}

	</style>
</body>
</html>
