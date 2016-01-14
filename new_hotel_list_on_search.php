<?php

require_once('function.php');

$search = new dbSearch();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $query_array = array();
    if (isset($_POST['city'])){
        $City = $_POST['city'];
        $query_array[] = "city=$City";
    }
    if (isset($_POST['hotelname'])){
        $Name = $_POST['hotelname'];
        $query_array[] = "name=$Name";
    }
    if (isset($_POST['roomtype'])){
    $type = $_POST['roomtype'];
    $query_array[] = "type=$type";
    }
    if (isset($_POST['view']) and $_POST['view'] != ""){
    $view = $_POST['view'];
    $query_array[] = "view=$view";
    }
    if (isset( $_POST['options'])){
    $options = $_POST['options'];
    if (in_array("ac", $options)){
        $query_array[]="ac=1";
    }
    if (in_array("ground", $options)){
        $query_array[]="gnd=1";
    }
    if (in_array("wifi", $options)){
        $query_array[]= "wifi=1";
    }
    if (in_array("parking", $options)){
        $query_array[]= "park=1";
        
    }
    if (in_array("pool", $options)){
        $query_array[]= "pool=1";
    }
    }
    if (isset($_POST['datefilter']) and $_POST['datefilter'] != ""){
        $date = explode(' - ',$_POST['datefilter'] );
        $stdate = $date[0];
        $startDate = date('Y-m-d',strtotime($stdate));
        $query_array[] = "checkin=$startDate";
        if($date[1]==""){
            $enddate = "";
        }
            $endate = $date[1];


        $endDate = date('Y-m-d',strtotime($endate));
        $query_array[] = "checkout=$endDate";
    }
    
    $string = implode("&", $query_array);
    $query = "advanced_search.php?".$string;
    echo $query;
}
else{
    $query = "adv_search.php";
}
echo $query;
?>



<!DOCTYPE html>
<br><br><br>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--Adding google map to the profile -->
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <link rel="stylesheet" href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css"/>
   
    <script src="js/star-rating.min.js" type="text/javascript"></script>
    <!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
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
        height: 925px;
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
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
<body>
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
    <div class="col-md-6" align ="center">
	<!--hotel list table-->
  <h2>The hotel list</h2>
             
  <table class="table" id="table" >
    
  </table>
  <div id="count"></div>
</div>
<div class="col-md-6" align ="center">
	<!--search options-->
  <h2>Search Options</h2>
  <div class="jumbotron">
  <form action="" name="search" method="post">
  			<div class="form-group">
                            <label for="roomtype"><font size="4" color="black"><b>Name:</b></font></label><br>
                            <input type="text" name="hotelname" placeholder="Hotel Name" value="" class="form-control"/>
				<label for="roomtype"><font size="4" color="black"><b>Room Type:</b></font></label>
				
				
				<select class="form-control" name="roomtype" >
					
					<option value="Single">Single</option>
					<option value="Double">Double</option>
					<option value="Triple">Triple</option>
					
				</select>
                                <br>
                                <label for="city"><font size="4" color="black"><b>City:</b></font></label>
                                <select class="form-control" name="city">
                                    <option value="Colombo">Colombo</option>
                                    <option value="Hikkaduwa">Hikkaduwa</option>
                                    <option value="Galle">Galle</option>
                                    <option value="Unawatuna">Unawatuna</option>
                                </select>
			<br>
				<label for="view"><font size="4" color="black"><b>View:</b></font></label>
				
				
				<select class="form-control" name="view" >
                                        
					<option value="sea">Sea View</option>
					<option value="mountain">Mountain View</option>	
                                        
				</select>
			<br>
					<label class="checkbox-inline"><input name=options[] type="checkbox" value="ac"><b>AC</b></label>
					<label class="checkbox-inline"><input name=options[] type="checkbox" value="ground"><b>Ground Floor</b></label>
					<label class="checkbox-inline"><input name=options[] type="checkbox" value="wifi"><b>Free Wifi</b></label>
					<label class="checkbox-inline"><input name=options[] type="checkbox" value="parking"><b>Parking</b></label>
                                        <label class="checkbox-inline"><input name=options[] type="checkbox" value="pool"><b>Pool</b></label>
			<br><br>
				
          
                <input type="text" name="datefilter"  placeholder="Check in - check out" class="form-control"/>
            
            
                <br>
	<button type="submit" class="btn btn-primary">
            Search
	</button>					
    </form>
<script type="text/javascript">
$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
      var startDate=$startDate.val();
      document.getElementById('demo').innerHTML='<p>'+startDate+'</p>';
      
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
</script>
			</div>
	</form>
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
