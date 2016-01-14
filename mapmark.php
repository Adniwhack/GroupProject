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
                center: {lat: 7.873054, lng: 80.771797},
                zoom:8
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
                        //alert('Geocode was not successful for the following reason: ' + status);
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
    
    <style>
        
   	


</style>
	
</head>

<body>
   <!-- navbar -->
  <style>
.navbar {
    color: #FFFFFF;
    background-color: #161640;
}

/* OR*/

.nav {
    color: #FFFFFF;
    background-color: #161640;
  
.nav-pills > li > a {
  color: #A7A79Bf;
  font-family: 'Oswald', sans-serif;
  font-size: 0.8em ;
  padding: 1px 1px 1px ;
}
</style>

<nav class="navbar navbar-default responsive">
    <div class="container-fluid">
          <div class="navbar-header">
              <ul class="nav navbar-nav navbar-left">
                
                <li><img src="hotelimages/logotra.png" height=50px width=50px align="left"></li>
          </ul>
          <a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
          </div>
    <div>

        
              <ul class="nav nav-pills navbar-right">
                  
                  <li><a href="aboutus.html"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> About Us</font></b></span></a></li>
              <li><a href="contactus.html"><span class="glyphicon glyphicon-log-out"><b><font size="4" color="#FFF" face="calibri light">Contact Us</font></b></a></li></ul>
          
      </div>
    
    
    
      </div>
  </nav>         

<!--Create account for hotel -->
<div class="container">
    <div class="col-lg-12">
        <!--  Create the form horizontally !-->
        <br><br>
    </div>
	<p><font size="4" >Please enter the location of your hotel in the provided space. Or else mark the exact location in the map using the marker, inside the map.</font></p>
    <br><br>
	
	<form name="mapmark" method="post" action="markaction.php">
        <div id="map" style="width: 600px; height: 600px"></div><br>

        <input type="text" name="city" id="city" >
        <input  id="latitude" name="latitude" type="hidden">
        <input  id="longitude" name="longitude" type="hidden">
        <input type="hidden" name="id" value="<?php echo $id?>">
		
		
	<!--modal><input type="submit" name="submit" id="submit" data-toggle="modal" data-target="#myModal"><-->
	
	
    <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Insert</button>                  
	
	
	
	
<!--modal><-->
 <!-- Modal content-->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-m">
    
      <!-- Modal content-->
      <div class="modal-content"  style='background-color:#000'>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color='white' >Thank you!</font></h4>
        </div>
        <div class="modal-body">
          <p><font color='white' >Please wait for the confirmation e-mail. And follow the procedure mentioned in the e-mail.</font></p>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="submit" id="submit" >Finish</button>
        </div>
      </div>
	 
      
  </div>
  </div>
  
		
<!--modal><-->
 

	

</form>
 <br><br><br>

</div>
</body>
</html>
