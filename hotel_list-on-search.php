<?php

require_once('function.php');

$search = new dbSearch();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $City = $_POST['city'];
    $Name = $_POST['hotelname'];
    
    
    if (isset($City) and $City != ""){ $data[] = "city=".$City;}
    if(isset($Name) and $Name != ""){ $data[]= "name=".$Name; }
    
    
    $query = "adv_search.php?".implode("&", $data);
    //echo $query;
}   
else{
    
    $query = "adv_search.php";
}

?>



<!DOCTYPE html>
<html lang="en">
    <head><br><br><br>
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
    <style>
      #map {
        width: 500px;
        height: 800px;
        margin: 0px;
        padding: 0px;
      }
    </style>
    
   <script>
    
function load() {
                var map = new google.maps.Map(document.getElementById("map"), {
                  center: new google.maps.LatLng(6.9218386, 79.8562055),
                  zoom: 13,
                  mapTypeId: 'roadmap'
                });
                var infoWindow = new google.maps.InfoWindow();
                downloadUrl("<?php echo $query;?>", function(data) {
                var xml = data.responseXML;
                //var xml = xmlParse(xmlData);
                var bounds = new google.maps.LatLngBounds();
                var markers = xml.documentElement.getElementsByTagName("marker");
                var table = "<table><tr><th>Name</th><th>Address</th></tr>";
                
                for (var i = 0; i < markers.length; i++) {
                  var id = markers[i].getAttribute("id");
                  var name = markers[i].getAttribute("name");
                  var address = markers[i].getAttribute("address");
                  var lat = markers[i].getAttribute("lat");
                  var lng = markers[i].getAttribute("lng");
                  if (lat != "" && lng != "") {
                    var point = new google.maps.LatLng(
                      parseFloat(lat),
                      parseFloat(lng));
                    var marker = new google.maps.Marker({
                      map: map,
                      position: point
                    });
                    bounds.extend(point);
                    var html = "<b>" + name + "</b> <br/>" + address;
                    bindInfoWindow(marker, map, infoWindow, html);
                    

                  }
                  table += "<tr><td><a href='Hotel-Profile.php?hotel_id="+id+"'>" + name + "</a></td><td>" + address + "</td></tr>";
                }
                var htmld = "";
                var c = markers.length;
                if (c == 0){
                    htmld = "<h3>No Results</h3>";
                }
                else{
                    //htmld = "<h3>"+c+" Results</h3>";
                    
                }
                document.getElementById("count").innerHTML = htmld;
                table += "</table>";
                document.getElementById("table").innerHTML = table;
                map.fitBounds(bounds);
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
              google.maps.event.addDomListener(window, "load", load);

              function xmlParse(str) {
                if (typeof ActiveXObject != 'undefined' && typeof GetObject != 'undefined') {
                  var doc = new ActiveXObject('Microsoft.XMLDOM');
                  doc.loadXML(str);
                  return doc;
                }

                if (typeof DOMParser != 'undefined') {
                  return (new DOMParser()).parseFromString(str, 'text/xml');
                }

                return createElement('div', null);
              }
    //]]>
</script>
</head>
<body onload="load()">
<nav class="navbar navbar-default navbar-fixed-top navbar-responsive">
		<div class="container-fluid">
			<div class="navbar-header">
				<ul class="nav navbar-nav navbar-right"><li><img src="images/logo.png" height=50px width=50px align="left"></li>
				<a class="navbar-brand" href="#"><font color= #FFF>Online Hotel Reservation and Management System </font></a>
				</ul>
        
			
			</div>
				<ul class="nav nav-pills navbar-right">
                                                <li><a href="homepage.php"><span class="glyphicon glyphicon-chevron-left"></span><b><font size="4" color="#FFF" face="calibri light">Back</font></b></a></li>
                                                <li><a href="homepage.php"><span class="glyphicon glyphicon-home"><b><font size="4" color="#FFF" face="calibri light"> Home</font></b></span></a></li>
						
						<li><a href="aboutus.html"><span class="glyphicon glyphicon-thumbs-up"><b><font size="4" color="#FFF" face="calibri light">AboutUs</font></b></span></a></li>
						<li><a href="#"><span class="glyphicon glyphicon-modal-window"><b><font size="4" color="#FFF" face="calibri light">Rooms</font></b></span></a></li>
			
				</ul>                
		</div>	
	</nav>
<div class="container" >
    <div id="map" class="col-md-5"></div>
    
    <div class="container">
    <div class="col-md-6" align ="center">
        <p>Want more features? Try out Advanced Search</p>
        <button class="btn btn-primary"><a href="new_hotel_list_on_search.php"><span class="glyphicon glyphicon-search"></span><b><font size="4" color="#FFF" face="calibri light">Advanced Search</font></b></a></button>
        <br><br>
  <h2>The hotel list</h2>
  
  
  <table id='table' class="table"></table>
  <div id="count"></div>
</div>
    </div>
    
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
