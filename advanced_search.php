<?php
$Message = "";
require_once('function.php');
$log = new dbSearch();

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $City = $_POST['city'];

     $Check_In = $_POST['checkin'];
     $Check_Out = $_POST['checkout'];
     
    if(isset($_POST['option'])){$Options = $_POST['option'];}

    if(isset($_POST['View'])){$view = $_POST['View'];}
    if(isset($_POST['Bed'])){$bed = $_POST['Bed'];}
    
    $quearray = array('city'=>$City, 'check_in'=>$Check_In, 'check_out'=>$Check_Out, 'options'=>$Options, 'view'=>$view, 'bed'=>$bed);
    $opt = http_build_query($quearray);
    $url = "adv_search.php?".$opt;
    echo $url;
     
     /*
     $cquery = $nquery=$inquery = $outquery = $optquery = "";
     if(isset($City)){
         $cquery = "City = '".$City."'";
     }

     if(isset($Check_In)){
         $inquery = "and Checkin >= '".$Check_In."'";
     }
     if(isset($Check_Out)){
         $outquery = "and Checkout <= '".$Check_Out."'";
     }
     if(isset($Options)){
         foreach($Options as $Opt){
             if ($optquery == ""){
                 $optquery = "Room_Option = '".$Opt."'";
             }
             else{
                 $optquery = $optquery." and Room_Option = '".$Opt."'";
             }
         }

     }

     if (isset($Options)){
         $Query = "SELECT
	DISTINCT Hotel_Name,
	Hotel_ID,
	address,
	Hotel_Lat,
	Hotel_Lng
FROM
	hotel
	INNER JOIN hotel_room on hotel.email = hotel_room.Hotel_email
	INNER JOIN reservation on hotel.Hotel_ID = reservation.HotelID
	inner join room_options on room_options.Room_ID = hotel_room.Room_id
WHERE
    City = '".$City."'
	and not (
		(
			reservation.Checkin >= '".$Check_In."'
			and reservation.Checkin <= '".$Check_Out."'
		)
		or (
			reservation.Checkout >= '".$Check_In."'
			and reservation.Checkout <= '".$Check_Out."'
		)
		or (
			reservation.Checkin <= '".$Check_In."'
			and reservation.Checkout >= '".$Check_Out."'
		)
	)
    and (".$optquery.")

    order by hotel_room.Room_weight DESC ";
         echo $Query;
         $res = mysql_query($Query);
         if (mysql_num_rows($res) == 0){
             $Message = "Search failed. We are unable to provide all the Functionalities. Here are some suggestions that may satisfy you:";
             $weight = count($Options);

             $
            $Query = "SELECT
	DISTINCT Hotel_Name,
	Hotel_ID,
	address,
	Hotel_Lat,
	Hotel_Lng
FROM
	hotel
	INNER JOIN hotel_room on hotel.email = hotel_room.Hotel_email
WHERE
    City = '".$City."'
     order by hotel_room.Room_weight DESC

     ";
             echo $Query;
             $res = mysql_query($Query);

         }else{
             $Message = "Search Successful";
         }
     }
     else{
         $Query = "SELECT
	DISTINCT Hotel_Name,
	Hotel_ID,
	address,
	Hotel_Lat,
	Hotel_Lng
FROM
	hotel
	INNER JOIN hotel_room on hotel.email = hotel_room.Hotel_email
	INNER JOIN reservation on hotel.Hotel_ID = reservation.HotelID
	inner join room_options on room_options.Room_ID = hotel_room.Room_id
WHERE
    City = '".$City."'
	and not (
		(
			reservation.Checkin >= '".$Check_In."'
			and reservation.Checkin <= '".$Check_Out."'
		)
		or (
			reservation.Checkout >= '".$Check_In."'
			and reservation.Checkout <= '".$Check_Out."'
		)
		or (
			reservation.Checkin <= '".$Check_In."'
			and reservation.Checkout >= '".$Check_Out."'
		)
	)


    order by hotel_room.Room_weight DESC ";
         echo $Query;
         $res = mysql_query($Query);
         if (mysql_num_rows($res) == 0){
             $Message = "Search failed. We are unable to provide all the Functionalities. Here are some suggestions that may satisfy you:";
             $weight = count($Options);

             $
             $Query = "SELECT
	DISTINCT Hotel_Name,
	Hotel_ID,
	address,
	Hotel_Lat,
	Hotel_Lng
FROM
	hotel
	INNER JOIN hotel_room on hotel.email = hotel_room.Hotel_email
WHERE
    City = '".$City."'
     order by hotel_room.Room_weight DESC

     ";
             echo $Query;
             $res = mysql_query($Query);

         }else{
             $Message = "Search Successful";
         }
     }*/

     //send data to xmlrequest
     
     
 }

?>

<!DOCTYPE html>
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
    

    function load() {
      var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(7.0, 81),
        zoom: 5,
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
          
          var point = new google.maps.LatLng(
              parseFloat(markers[i].getAttribute("lat")),
              parseFloat(markers[i].getAttribute("lng")));
          var html = "<b>" + name + "</b> <br/>" + address;
          //var icon = customIcons[type] || {};
          var marker = new google.maps.Marker({
            map: map,
            position: point,
            //icon: icon.icon
          });
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
<body onload="load()" onsubmit="load()">

<div class="container" >
    <div id="map" class="col-md-5"></div>
    <div class="col-md-6" align ="center">
        <div class="container">
        <h1>Advanced Search</h1>
        <br>
        <form name="advanced" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <h2>Options</h2><br>
            <label for="city">City</label><input type="text" name="city" required><br>

            <label for="checkin">Check In Date</label><input type="date" name="checkin" required><br>
           <label for="checkout">Check Out Date</label><input type="date" name="checkout" required><br>
           <input type="radio" value="Sea" name="View"><label for="option">Sea View</label><br>
            <input type="radio" value="Mtn" name="View"><label for="option">Mountain</label><br>
            <input type="checkbox" value="GndFlr" name="option[]"><label for="option">Ground Floor</label><br>
            <input type="checkbox" value="AC" name="option[]"><label for="option">Room A/C</label><br>
            <input type="radio" value="S" name="Bed"><label for="Bed">Single Bed</label><br>
            <input type="radio" value="D" name="Bed"><label for="Bed">Double Bed</label><br>
            <input type="radio" value="T" name="Bed"><label for="Bed">Triple Bed</label><br>
            <label for="others">Other Options</label><input type="text" name="others"><br>
            <input type="submit" value="Search">
        </form>
        </div>
        <h2>The hotel list</h2>
        <?php echo $Message;?>
        <table class="table" >
            <thead>
            <tr>
                <th>Hotel name</th>
                <th>Address</th>
            </tr>
            </thead>
            <tbody>

            <?php
                if (isset($res) and $res!= false){
                    while($data = mysql_fetch_array($res)){
                        echo "<tr><td><a href='Hotel-profile.php?hotel_id=".$data['Hotel_ID']."'>".$data['Hotel_Name']."</a></td><td>".$data['address']."</td></tr>";
                    }

                }
            ?>


            </tbody>
        </table>
    </div>
</div>
</body>
</html>