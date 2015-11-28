<?php
$Message = "";
require_once('function.php');
$db = new dbConnect();

 if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $City = $_POST['city'];

     $Check_In = $_POST['checkin'];
     $Check_Out = $_POST['checkout'];

     if(isset($_POST['option'])){$Options = $_POST['option'];}

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
     }
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
    var markers = [];

    function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
            center: new google.maps.LatLng(6.9218386, 79.8562055),
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(mapCanvas, mapOptions);


    }

    function addmarker(lat, lng, map){
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(lat, lng),
            animation: google.maps.Animation.DROP;
        map: map
    });
    markers.push(marker);
    }
    initialize();

    google.maps.event.addDomListener(window, 'load', initialize);
</script>
</head>
<body>

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
            <input type="checkbox" value="SeaView" name="option[]"><label for="option">Sea View</label><br>
            <input type="checkbox" value="Mountain" name="option[]"><label for="option">Mountain</label><br>
            <input type="checkbox" value="GndFlr" name="option[]"><label for="option">Ground Floor</label><br>
            <label for="others">Other Options</label><input type="text" name="others"><br>
            <input type="submit" placeholder="Search">
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